<?php
    include '../../boot.php'; // load all functions

    // If form has posted, check login data with database and login if correct
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        // dd($_POST);
        if($user = Auth::attempt($_POST['email'], $_POST['password'])) {

        }
    }

    // If loggend in, redirect to url
    if(Auth::check()) {
        Http::redirect('');
    }

    $title = 'Inloggen';
    include "../../partials/head.php";

    include "../../partials/menu.php";
?>

<div class="container">
    <h1>Inloggen</h1>

    <form action="" method="POST">
        <div class="form-group">
            <label class="col-sm-3">
                E-mail
            </label>
            <div class="col-sm-9">
                <input type="email" name="email" class="form-control" required>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3">
                Password
            </label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Inloggen</button>
    </form>

</div>

<?php include "../../partials/footer.php"; ?>
