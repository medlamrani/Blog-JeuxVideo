<?php $title = 'Actualites'; ?>

<?php ob_start(); ?>

    <header class="masthead">
    </header>

    <div class="bloc">
        <h2 class="text-center" style="36px">Les Actualites</h2>
    </div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<section id="articles">
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-10 offset-1 mb-5 mt-5">
                <?php 
                foreach ($listOfNews as $news)
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
                        <a href="http://localhost/projet5/Controller/news/<?= $news->getId() ?>" class="btn btn-info btn-lg active" role="button" aria-pressed="true">Lire la suite</a>
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