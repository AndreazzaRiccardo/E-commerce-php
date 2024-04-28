<?php

$usersMgr = new UserManager();
$users = $usersMgr->getAll(10, 1);

if (isset($_POST['delete'])) {
  $userID = htmlspecialchars(trim($_POST['id']));
  $usersMgr->delete($userID);

  header("Location: ?page=users-list");
  exit();
}

?>

<div class="p-2">
  <h1>Utenti</h1>
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">Email</th>
          <th scope="col" class="text-center">ID</th>
          <th scope="col" class="text-center">Tipo Utente</th>
          <th scope="col" class="text-center">Dettagli</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user) { ?>
          <tr>
            <th class="text-truncate" style="max-width: 150px;"><?= $user->email ?></th>
            <td><?= $user->id ?></td>
            <td><?php if ($user->user_type_id == 1) {
                  echo 'Admin';
                } else {
                  echo 'Regular';
                } ?>
            </td>
            <td class="d-flex justify-content-center gap-2">
              <a class="btn btn-sm btn-outline-primary rounded" href="?page=profile&id=<?= $user->id ?>">Dettagli</a>
              <form method="POST">
                <input type="hidden" name="id" value="<?= $user->id ?>">
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