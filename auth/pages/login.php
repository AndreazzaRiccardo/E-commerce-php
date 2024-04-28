<?php
if (isset($_SESSION['users']) && !empty($_SESSION['users'])) {
    if ($_SESSION['users']->is_admin) {
        header('Location: ../admin');
        exit();
    } else {
        header('Location: ../public');
        exit();
    }
}

if (isset($_POST['login'])) {
    $message = '';
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $userMgr = new UserManager();
    $result = $userMgr->login($email, $password);

    if ($result) {
        if (isset($_SESSION['users']) && !$_SESSION['users']->is_admin) {
            header('Location: ../public');
            exit();
        } else {
            header('Location: ../admin');
            exit();
        }
    } else {
        $errorMsg = 'Mail o password errati';
    }
}
?>

<h2>Login</h2>
<form class="mt-3" method="POST">
    <div class="form-group">
        <label for="email">E-Mail</label>
        <input name="email" id="email" type="text" class="form-control" placeholder="es: mario.rossi@gmail.com">
    </div>
    <div class="form-group my-3">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control">
    </div>

    <div style="min-height: 70px;">
        <?php if (isset($errorMsg)) { ?>
            <div class="alert alert-danger m-0">
                <?= $errorMsg ?>
            </div>
        <?php } ?>
    </div>

    <button class="btn btn-primary mt-1" name="login" type="submit">Login</button>
</form>
<p class="mt-4">Non hai un Account ? <a href="<?= ROOT_URL ?>auth/?page=sign_up">Registrati &raquo;</a></p>