<?php

$usersMgr = new UserManager();
$users = $usersMgr->getAll();

?>

<div class="p-5">
  <h1>Utenti</h1>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Email</th>
        <th scope="col" class="text-center">Tipo Utente</th>
        <th scope="col" class="text-center">Dettagli</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($users as $user) { ?>
        <tr>
          <th><?= $user->email ?></th>
          <td><?php if ($user->user_type_id == 1) {
                echo 'Admin';
              } else {
                echo 'Regular';
              } ?>
          </td>
          <td class="d-flex justify-content-center">
            <a class="btn btn-sm btn-warning rounded" href="?page=profile&id=<?= $user->id ?>">Dettagli</a>
          </td>
        </tr>
      <?php  } ?>
    </tbody>
  </table>
</div>