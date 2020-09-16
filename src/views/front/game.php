<?php $title = htmlspecialchars($game->getName()); ?>

<?php ob_start(); ?>
    <header>
        <div class="container h-100">
            <div class="row">
                <div class="col-lg-7 headtext list">
                    <div class="header-content mx-auto">
                        <h1 class="mb-5 text-center text-black">
                            <?= $game->getName() ?>
                        </h1> 
                    </div>
                </div>
            </div>
        </div> 
    </header>  
<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <section id="article">
        <div class="container bg-white shadow">
            <div class="row">
                <div class="col-10 offset-1 mb-5 mt-5">
                    <div class="text-justify mb-5">Date de sortie <?= $game->getReleaseDate()->format('d/m/Y') ?></div>
                    <div class="text-justify article-text text-reader"><?= nl2br($game->getResume()) ?></div>
                    <div class="text-justify article-text text-reader"><?= $game->getPlatform() ?></div>
                    <div class="text-justify article-text text-reader"><?= $game->getEditor() ?></div>
                </div>    
            </div>
        </div>
    </section>


    <a class="btn btn-primary btn-lg active" href="index.php?action=games">Retour</a>


    

    

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>