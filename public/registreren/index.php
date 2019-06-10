<?php
    include '../../boot.php'; // laadt alle benodigdheden in

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $query = 'INSERT INTO users
        (first_name, suffix_name, last_name, email, password, country, city)
        VALUES
        (:first_name, :suffix_name, :last_name, :email, :password, :country, :city)';

        $db = new DB();
        $db->insert($query, [
            'first_name' => $_POST['first_name'],
            'suffix_name' => $_POST['suffix_name'],
            'last_name' => $_POST['last_name'],
            'email' => $_POST['email'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'country' => $_POST['country'],
            'city' => $_POST['city'],
        ]);
    }

    $title = 'Registreren';
    include "../../partials/head.php";

    include "../../partials/menu.php";
?>

<div class="container">
    <h1>Registreren</h1>

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
                Voornaam
            </label>
            <div class="col-sm-9">
                <input type="text" name="first_name" class="form-control" value="Matthijs" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Tussenvoegsel
            </label>
            <div class="col-sm-9">
                <input type="text" name="suffix_name" class="form-control">
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Achternaam
            </label>
            <div class="col-sm-9">
                <input type="text" name="last_name" class="form-control" value="Openneer" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Country
            </label>
            <div class="col-sm-9">
                <select name="country" class="form-control">
                    <option value="NL" selected>Nederland</option>
                    <option value="DE">Duitsland</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Stad
            </label>
            <div class="col-sm-9">
                <input type="text" name="city" class="form-control" value="Amsterdam" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Wachtwoord
            </label>
            <div class="col-sm-9">
                <input type="password" name="password" class="form-control" required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Wachtwoord bevestigen
            </label>
            <div class="col-sm-9">
                <input type="password" name="password_confirmed" class="form-control" required>
            </div>
        </div>

        <button class="btn btn-primary" type="submit">Registreren</button>
    </form>
</div>

<?php include "../../partials/footer.php"; ?>
