<?php
    include '../../boot.php'; // laadt alle benodigdheden in

    if(! Auth::check()) {
        Http::redirect('');
    }

    $title = 'CRM';
    include "../../partials/head.php";

    include "../../partials/menu.php";
?>

<div class="container">
    CRM
</div>

<?php include "../../partials/footer.php"; ?>
