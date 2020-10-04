<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

    <header class="backhead">
        <div class="bloc">
            <h1>Welcome <?= $_SESSION['username'] ?></h1>
        </div>
    </header>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <div class="container">
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4"></div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/adminLayout.php"); ?>