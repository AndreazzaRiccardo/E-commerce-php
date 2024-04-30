<?php
if (!defined('ROOT_URL')) {
    die;
}

$id = htmlspecialchars($_GET['id']);


$productMgr = new ProductManager();
$product = $productMgr->get($id);

$categoryMgr = new CategoryManager();
$categories = $categoryMgr->getAll();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_FILES['image_path']['name'] != '') {
        // Controlla se è stata caricata un'immagine
        if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
            // Percorso di destinazione per l'immagine caricata
            $uploadDir = __DIR__ . "\\..\\..\public\imgs\\";
            // Genera un nome univoco per l'immagine
            $uniqueID = uniqid();
            $uploadFile = $uploadDir . $uniqueID . '_' . basename($_FILES['image_path']['name']);

            // Se c'è già un'immagine associata al prodotto, eliminiamola
            if ($product->image_path) {
                unlink(__DIR__ . "\\..\\..\\" . $product->image_path);
            }

            // Sposta il file temporaneo nel percorso di destinazione
            if (move_uploaded_file($_FILES['image_path']['tmp_name'], $uploadFile)) {
                // Aggiungi il percorso dell'immagine ai dati del form
                $_POST['image_path'] = 'public/imgs/' . $uniqueID . '_' . basename($_FILES['image_path']['name']);
            }
        }
    }
    // Chiamata alla funzione update del ProductManager
    $productMgr->update($_POST, $id);
    // header('Location: ?page=products-list');
    echo "<script>window.location.href = '?page=products-list';</script>";
    exit();
}

?>

<div class="col-md-8 offset-md-2 my-4">
    <a href="<?= ROOT_URL ?>admin/?page=products-list" class="btn btn-primary mb-4">Indietro</a>
    <div class="card">
        <div class="card-header">
            <h2 class="mb-0">Modifica Prodotto</h2>
        </div>
        <div class="card-body p-4">
            <small class="text-danger">I campi contrassegnati con un asterisco (*) sono obbligatori.</small>
            <form class="mt-3" method="POST" enctype="multipart/form-data">

                <div class="mb-3">
                    <label for="name" class="form-label">Nome: <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="<?= $product->name ?>" required>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Prezzo: <span class="text-danger">*</span></label>
                    <input type="number" min="0.00" step="0.01" class="form-control " id="price" name="price" value="<?= $product->price ?>" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione:</label>
                    <textarea class="form-control" id="description" name="description"><?= $product->description ?></textarea>
                </div>

                <hr>

                <div class="mb-3 w-100">
                    <label for="category">Categoria <span class="text-danger">*</span></label>
                    <select required class="mt-2 form-select" name="category_id" id="categories">
                        <option value="">Seleziona Categoria</option>
                        <?php foreach ($categories as $category) { ?>
                            <option <?= ($product->category_id == $category->id) ? 'selected' : ''; ?> value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php } ?>
                    </select>
                </div>

                <hr>

                <div class="mb-3">
                    <label for="cover_image" class="form-label">Immagine</label>
                    <?php if (!empty($product->image_path)) : ?>
                        <img src="<?= ROOT_URL . $product->image_path ?>" alt="Immagine attuale" class="img-thumbnail mb-2 ms-1" style="max-width: 200px;">
                    <?php endif; ?>
                    <input type="file" class="form-control" id="cover_image" name="image_path">
                </div>

                <button class="btn btn-outline-warning mt-3" type="submit">Modifica</button>
            </form>
        </div>
    </div>
</div>