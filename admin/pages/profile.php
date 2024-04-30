<?php
if (!isset($_GET['id'])) {
  // header('Location: ../admin');
  echo "<script>window.location.href = '../admin';</script>";
  exit;
}

$id = htmlspecialchars(trim($_GET['id']));
$my_user = new UserManager();
$user = $my_user->get($id);
$detailsMgr = new UserDetailsManager();
$details = $detailsMgr->getDetails($id);

if (!(property_exists($user, 'id'))) {
  // header('Location: ../admin');
  echo "<script>window.location.href = '../admin';</script>";
  exit();
}

if (isset($_POST['id'])) {
  $my_user->changeType($_POST['id']);
  // header('Location: ../admin/?page=users-list');
  echo "<script>window.location.href = '../admin/?page=users-list';</script>";
  exit();
}
?>

<div class="col-md-6 offset-md-3 my-4">
  <div class="card mt-5">
    <h5 class="card-header text-center"><?= $user->email ?></h5>
    <div class="card-body">
      <h5 class="card-title mb-3">Dettagli</h5>
      <p class="card-text"><strong>Tipo Utente:</strong> <?php if ($user->user_type_id == 1) {
                                                            echo 'Admin';
                                                          } else {
                                                            echo 'Regular';
                                                          } ?></p>
      <p class="card-text"><strong>Nome:</strong> <?= isset($details['name']) ? $details['name'] : 'Info non disponibile' ?></p>
      <p class="card-text"><strong>Indirizzo:</strong> <?= isset($details['address']) ? $details['address'] : 'Info non disponibile' ?></p>
      <p class="card-text"><strong>Telefono:</strong> <?= isset($details['phone']) ? $details['phone'] : 'Info non disponibile' ?></p>
      <hr>
      <form class="text-end" method="POST">
        <input name="id" type="hidden" value="<?= $user->id ?>">
        <button <?= $user->id == 1 ? 'disabled' : '' ?> class="btn btn-warning text-dark fw-bold" type="submit">
          <?php if ($user->user_type_id == 1) {
            echo 'Rendi Regular';
          } else {
            echo 'Rendi Admin';
          } ?>
        </button>
      </form>
    </div>
  </div>
</div>