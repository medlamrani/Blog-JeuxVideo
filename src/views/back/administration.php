<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

    <header class="masthead">
        <div>
            <h1>Administration  !!!</h1>
        </div>
    </header>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <h2>Heello</h2>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/adminLayout.php"); ?>