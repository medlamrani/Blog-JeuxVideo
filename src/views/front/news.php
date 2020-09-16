<?php $title = htmlspecialchars($news->getTitle()); ?>

<?php ob_start(); ?>
    <header>
        <div class="container h-100">
            <div class="row">
                <div class="col-lg-7 headtext list">
                    <div class="header-content mx-auto">
                        <h1 class="mb-5 text-center text-black">
                            <?= $news->getTitle() ?>
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
                    <div class="text-justify mb-5">Publié le <?= $news->getAddDate()->format('d/m/Y à H\hi') ?></div>
                    <div class="text-justify article-text text-reader"><?= nl2br($news->getContent()) ?></div>
                </div>    
            </div>
        </div>
    </section>


    <a class="btn btn-primary btn-lg active" href="index.php">Retour</a>


    

    

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>