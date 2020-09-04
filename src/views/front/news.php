<?php $title = htmlspecialchars($news->title()); ?>

<?php ob_start(); ?>
    <header>
        <div class="container h-100">
            <div class="row">
                <div class="col-lg-7 headtext list">
                    <div class="header-content mx-auto">
                        <h1 class="mb-5 text-center text-black">
                            <?= $news->title() ?>
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
                    <div class="text-justify mb-5">Publié le <?= $news->addDate()->format('d/m/Y à H\hi') ?></div>
                    <div class="text-justify article-text text-reader"><?= nl2br($news->content()) ?></div>
                </div>    
            </div>
        </div>
    </section>


    <a class="btn btn-primary btn-lg active" href="index.php">Retour</a>


    <section id="commentaire">
        <div class="container bg-white shadow">
            <div class="row">
            <?php
            foreach ($comments as $comment)
            {
            ?>
                <div class="col-10 offset-1 mb-5 mt-5">
                    <div class="text-justify article-text text-reader"><?= nl2br($comment['content']) ?></div>
                    <a class="btn btn-primary btn-lg active" href="index.php?action=reportComment&amp;id=<?= $comment['id'] ?>">Signaler</a>
                    <hr>
                </div>    
            <?php
            }
            ?>
            </div>
        </div>
    </section>


    <section id="comment">
        <div class="container bg-white shadow">
            <div class="row">
                <div class="col-10 offset-1 mb-5 mt-5">
                    <div class="text-justify mb-5">Laisser un commentaire</div>
                    <form action="index.php?action=addComment&amp;id=<?= $post->id() ?>" method="post" class="form-signin">
                        <div>
                            <label for="author">Auteur</label><br />
                            <input class="form-control" type="text" id="author" name="author" value="" />
                        </div>
                        <div>
                            <label for="content">Commentaire</label><br />
                            <textarea class="form-control" id="content" name="content" ></textarea>
                        </div>
                        <div>
                            <input class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="addcomment" value="ajouter" />
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </section>

    

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>