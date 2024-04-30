<?php
$errorMsg = '';

if (isset($_SESSION['users'])) {
    // header('Location: ../public');
    echo "<script>window.location.href = '../public';</script>";
    exit();
}

if (isset($_POST['register'])) {
    $message = '';
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmPassword = htmlspecialchars(trim($_POST['confirm_password']));

    if ($email != '' && $password != '' && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $userMgr = new UserManager();
        if ($userMgr->passwordMatch($password, $confirmPassword)) {
            $result = $userMgr->register($email, $password);

            if ($result) {
                // header('Location: ?page=login');
                echo "<script>window.location.href = '?page=login';</script>";
                exit();
            } else {
                $errorMsg = 'Registrazione Fallita, La mail potrebbe già esistere';
            }
        } else {
            $errorMsg = "Le password non corrispondono";
        }
    } else {
        $errorMsg = "Devi compilare correttamente tutti i campi";
    }
}
?>

<h2>Registrati</h2>
<form class="mt-3" method="POST">
    <div class="form-group">
        <label for="email">E-Mail</label>
        <input name="email" id="email" type="text" class="form-control" placeholder="es: mario.rossi@gmail.com">
    </div>
    <div class="form-group my-3">
        <label for="password">Password</label>
        <input name="password" id="password" type="password" class="form-control">
    </div>
    <div class="form-group my-3">
        <label for="confirm_password">Conferma Password</label>
        <input name="confirm_password" id="confirm_password" type="password" class="form-control">
    </div>

    <div style="min-height: 70px;">
        <?php if ($errorMsg != '') { ?>
            <div class="alert alert-danger m-0">
                <?= $errorMsg ?>
            </div>
        <?php } ?>
    </div>

    <button class="btn btn-primary mt-1 mb-4" name="register" type="submit">Registrati</button>
</form>