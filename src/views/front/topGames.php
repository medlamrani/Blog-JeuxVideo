<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

    <header class="masthead">
    </header>

    <div class="bloc">
        <h2 class="text-center" style="36px">Top 5 </h2>
    </div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<section id="articles">

    <div class="container bg-white shadow">
        <div class="container">
            <div class="container-flex">
                <?php 
                foreach ($topRate as $rate)
                {
                ?>
                    <div class="game-card">
                        <h3 class="card-title text-center"> <?= $rate->getGame() ?></h3>
                        <p class="card-text"><?= $rate->getRate() ?></p>
                    </div>                        
             
                   
                <?php    
                }
                ?>
            </div>    
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>