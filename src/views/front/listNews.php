<?php $title = 'Actualites'; ?>

<?php ob_start(); ?>

    <header class="masthead">
        <div>
            <h1>Welcome to Gaming Univers</h1>
        </div>
    </header>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<section id="articles">
    <div class="container bg-white shadow">
        <div class="row">
            <div class="col-10 offset-1 mb-5 mt-5">
                <h2 class="text-justify" style="36px">Actu</h2>
                <br />
                <hr>
                
                <?php 
                foreach ($listOfNews as $news)
                {                 
                ?>
                    <article class="mb-5 mt-5">
                    <?php
                    if (strlen($news->content()) <= 400)
                    {
                      $content = $news->content();
                    }
                    
                    else
                    {
                      $debut = substr($news->content(), 0, 400);
                      $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
                      
                      $content = $debut;
                    }
                    
                    echo '<h4><a href="index.php?action=post&amp;id=', $news->id(), '">', $news->title(), '</a></h4>', "\n",
                        '<p>', nl2br($content), '</p>',
                        '<a href="index.php?action=post&amp;id=', $news->id(),'" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Lire la suite</a>';
                  ?>
                  <hr>
                    </article>
                <?php
                }
            ?>
            </div>
        </div>
    </div>
</section>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>