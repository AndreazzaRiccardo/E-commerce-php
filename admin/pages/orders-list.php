<?php

$ordersMgr = new OrderManager();
$orders = $ordersMgr->getAll();

if (isset($_POST['delete'])) {
  $orderID = htmlspecialchars(trim($_POST['id']));
  $ordersMgr->delete($orderID);

  // header("Location: ?page=orders-list");
  echo "<script>window.location.href = '?page=orders-list';</script>";
  exit();
}

?>

<div class="p-2">
  <h1>Ordini</h1>
  <div class="table-responsive" style="max-height: 67vh;">
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
            <td class="d-flex justify-content-center gap-2">
              <a class="btn btn-sm btn-outline-primary rounded" href="?page=order&id=<?= $order->id ?>">Dettagli</a>
              <form method="POST">
                <input type="hidden" name="id" value="<?= $order->id ?>">
                <input type="hidden" name="delete">
                <button class="btn btn-sm btn-outline-danger rounded fs-4" type="submit"><i class="fa-solid fa-trash"></i></button>
              </form>
            </td>
          </tr>
        <?php  } ?>
      </tbody>
    </table>
  </div>
</div>