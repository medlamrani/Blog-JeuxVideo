<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

    <header class="masthead">
        
    </header>
    <div class="container bloc">
        <h1 class="text-center">Bienvenue a l'univers du Gaming</h1>
    </div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<div class="container bloc mb-5 mt-5">
        <div class="bloc mb-5">
            <h2 class="text-center" style="36px">Nouveaute</h2>
        </div>
        <div class="row">
            <div class="col-12 ">
                <?php 
                foreach ($lastGame as $game)
                {
                    if (strlen($game->getResume()) <= 40)
                    {
                        $resume = $game->getResume();
                    }
                    
                    else
                    {
                      $debut = substr($game->getResume(), 0, 40);
                      $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                      
                      $resume = $debut;
                    }

                ?>
                    <div class="game-card">
                        <h3 class="card-title text-center"> <?= $game->getName() ?></h3>
                        <p class="card-text"><?= nl2br($resume) ?></p>
                        <div class="platform"><?= $game->getPlatform() ?></div>
                        <div class="editor"><?= $game->getEditor() ?></div>
                        <a href="http://localhost/projet5/controller/game/<?= $game->getId() ?>" class="btn btn-primary">Go</a>
                    </div>                        
                <?php
                }
                ?>    
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <div class="container bloc mb-5">
        <div class="bloc mb-5">
            <h2 class="text-center" style="36px">Derniere Actu</h2>
        </div>
        <div class="row">
            <div class="col-10 offset-1 mb-5 mt-5">
            
                <?php 
                foreach ($lastNews as $news)
                {                 
                ?>
                    <article class="bloc-news">
                    <?php
                    if (strlen($news->getContent()) <= 400)
                    {
                      $content = $news->getContent();
                    }
                    
                    else
                    {
                      $debut = substr($news->getContent(), 0, 400);
                      $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                      
                      $content = $debut;
                    }
                  ?>
                  
                        <h3 class="card-title text-center"> <?= $news->getTitle() ?></h3>
                        <p class="card-text"><?= nl2br($content) ?></p>
                        <a href="http://localhost/projet5/controller/news/<?= $news->getId() ?>" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Lire la suite</a>
                    </article>

                    <hr>
                <?php
                }
            ?>
            </div>
        </div>
    </div>       

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>