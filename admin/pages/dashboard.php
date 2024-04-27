<?php
$productMgr = new ProductManager();
$products = $productMgr->getWithCategory();

?>

<div class="container-fluid mt-4 mb-4">
  <div class="row g-4">
    <div class="col-12 col-lg-8">
      <div class="row g-4">
        <!-- Table -->
        <div class="col-12">
          <div class="card">
            <div class="card-header h2">
              Lista Prodotti
            </div>
            <div class="card-body">
              <div class="table-responsive">
              <table id="myTable" class="table table-hover">
                <thead>
                  <tr>
                    <th class="p-0" scope="col">Nome</th>
                    <th scope="col" class="text-center">Prezzo</th>
                    <th scope="col" class="text-center">Categoria</th>
                    <th scope="col" class="text-center">Stato</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($products as $product) { ?>
                    <tr>
                      <th><?= $product['name'] ?></th>
                      <td><?= $product['price'] ?> €</td>
                      <td><?= $product['category_name'] ?></td>
                      <td><span class="bg-success ms_status">Done</span></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              </div>
              <button id="expandButton" class="btn btn-success w-100">Espandi</button>
            </div>
          </div>
        </div>
        <!-- /Table -->
      </div>
    </div>
    <div class="col-12 col-lg-4">

      <div class="row g-4">
        <div class="col-12">
          <!-- Todo section -->
          <div class="card">
            <div class="card-header h2">
              Todo
            </div>
            <div class="card-body">
              <div class="card p-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                  <label class="form-check-label" for="flexCheckDefault">
                    Nuovi Arrivi
                  </label>
                </div>
              </div>
              <div class="card p-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-1">
                  <label class="form-check-label" for="flexCheckDefault">
                    Call Clienti
                  </label>
                </div>
              </div>
              <div class="card p-1">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault-2">
                  <label class="form-check-label" for="flexCheckDefault">
                    Controllo Server Status
                  </label>
                </div>
              </div>

            </div>
          </div>
          <!-- /Todo section -->
        </div>

        <!-- Diagram section -->
        <div class="col-12">
          <div class="card">
            <div class="card">
              <img src="<?= ROOT_URL ?>/assets/imgs/stats.jpeg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Utenti attivi</h5>
                <p class="card-text">Lista degli utenti attivi in piattaforma nell'ultimo mese</p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">Gennaio: 1200</li>
                <li class="list-group-item">Febbraio: 800</li>
                <li class="list-group-item">Marzo: 1500</li>
              </ul>
              <div class="card-body">
                <a href="#" class="card-link fw-bold">Visualizza report approfondito</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  var table = document.getElementById("myTable");
  var expandButton = document.getElementById("expandButton");

  var maxRows = 10;

  if (table.rows.length > maxRows) {
    
    for (var i = maxRows; i < table.rows.length; i++) {
      table.rows[i].style.display = "none";
    }
  
    expandButton.style.display = "block";

    expandButton.addEventListener("click", function() {
      for (var i = maxRows; i < table.rows.length; i++) {
        table.rows[i].style.display = "table-row";
      }
      expandButton.style.display = "none";
    });
  }
});</script>