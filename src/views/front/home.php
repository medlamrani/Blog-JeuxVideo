<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

    <header class="masthead">
        <div>
            <h1>Welcome to Gaming Univers</h1>
        </div>
    </header>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>


    <div>
        <h2>Games</h2>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>