<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

    <header class="masthead">
        
    </header>
    <div class="container bloc">
        <h1 class="text-center">Bienvenue a l'univers du Gaming</h1>
    </div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>



<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>