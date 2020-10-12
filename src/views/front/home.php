<?php $title = 'Accueil'; ?>

<?php ob_start(); ?>

    <header class="masthead">
        
    </header>
    <div class="container bloc">
        <h1 class="text-center">Bienvenue a l'univers du Gaming</h1>
    </div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<section id="games">

    <div class="container bg-white shadow">
        <div class="container">
            <div class="container-flex">
                <?php 
                foreach ($lastGame as $game)
                {
                    //$resume = $game->getResume();
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
                   // $resume = $game->getResume();
                ?>
                    <div class="game-card">
                        <h3 class="card-title text-center"> <?= $game->getName() ?></h3>
                        <p class="card-text"><?= nl2br($resume) ?></p>
                        <div class="platform"><?= $game->getPlatform() ?></div>
                        <div class="editor"><?= $game->getEditor() ?></div>
                        <a href="http://localhost/projet5/Controller/Game/<?= $game->getId() ?>" class="btn btn-primary">Go</a>
                    </div>                        
                <?php
                }
                ?>
            </div>    
        </div>
    </div>
</section>

<section id="articles">
    <div class="container bg-white shadow">
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
                        <a href="index.php?action=actu&amp;id=<?= $news->getId() ?>" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Lire la suite</a>
                    </article>

                    <hr>
                <?php
                }
            ?>
            </div>
        </div>
    </div>
</section>



<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>