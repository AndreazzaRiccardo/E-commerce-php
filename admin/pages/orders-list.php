<?php

$ordersMgr = new OrderManager();
$orders = $ordersMgr->getAll(10, 1);

?>

<div class="p-2">
  <h1>Ordini</h1>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col" class="text-center">ID</th>
        <th scope="col" class="text-center">Totale</th>
        <th scope="col" class="text-center">Azioni</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($orders as $order) { ?>
        <tr>
          <th><?= $order->name ?></th>
          <td><?= $order->id ?></td>
          <td><?= $order->total_amount ?> €</td>
          <td class="d-flex justify-content-center">
            <a class="btn btn-sm btn-warning rounded" href="?page=order&id=<?= $order->id ?>">Dettagli</a>
          </td>
        </tr>
      <?php  } ?>
    </tbody>
  </table>
</div>