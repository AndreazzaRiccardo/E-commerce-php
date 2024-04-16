<?php
$errorMsg = '';

if (isset($_SESSION['user'])) {
    header('Location: ../public');
}

if (isset($_POST['login'])) {
    $message = '';
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    $userMgr = new UserManager();
    $result = $userMgr->login($email, $password);

    if ($result) {
        header('Location: ../public');
    } else {
        $errorMsg = 'Mail o password errati';
    }
}
?>

<h2>Login</h2>
<form method="POST">
    <div class="form-group">
        <label for="email">E-Mail</label>
        <input name="email" id="email" type="text" class="form-control" placeholder="es: mario.rossi@gmail.com">
    </div>
    <div class="form-group my-3">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control">
    </div>

    <div style="min-height: 70px;">
        <?php if ($errorMsg != '') { ?>
            <div class="alert alert-danger m-0">
                <?= $errorMsg ?>
            </div>
        <?php } ?>
    </div>

    <button class="btn btn-primary mt-1" name="login" type="submit">Login</button>
</form>