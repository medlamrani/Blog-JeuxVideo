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

    <section id="rating">
        <div class="container bg-white shadow">
            <div class="row">
                <div class="col-sm-12">
                    <form action="http://localhost/projet5/Controller/addRating/<?= $game->getId() ?>" method="post">
                        <div class="stars-rating">
                            <h4>Note ce Jeux</h4>
                                <input id="rate-1" type="checkbox" name="rate" value="1"></input>
                                <label for="rate-1" class="fa fa-star fa-lg star-grey rateButton"></label>

                                <input id="rate-2" type="checkbox" name="rate" value="2"></input>
                                <label for="rate-2" class="fa fa-star fa-lg star-grey rateButton"></label>

                                <input id="rate-3" type="checkbox" name="rate" value="3"></input>
                                <label for="rate-3" class="fa fa-star fa-lg star-grey rateButton"></label>

                                <input id="rate-4" type="checkbox" name="rate" value="4"></input>
                                <label for="rate-4" class="fa fa-star fa-lg star-grey rateButton"></label>

                                <input id="rate-5" type="checkbox" name="rate" value="5"></input>
                                <label for="rate-5" class="fa fa-star fa-lg star-grey rateButton"></label>
                            <input type="submit" name="addRating" value="Notez"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </section>   

    <section id="article">
        <div class="container bg-white shadow">
            <div class="row">
                <div class="col-10 offset-1 mb-5 mt-5">
                    <div class="text-justify mb-5">Date de sortie <?= $game->getReleaseDate()->format('d/m/Y') ?></div>
                    <div class="text-justify article-text text-reader"><?= nl2br($game->getResume()) ?></div>
                    <div class="text-justify article-text text-reader"><?= $game->getPlatform() ?></div>
                    <div class="text-justify article-text text-reader"><?= $game->getEditor() ?></div>
                    <div class="mb-5">
                    <?php
                    
                        //$averageRating = round($average);
                        
                        for ($i = 1; $i <= 5; $i++) {
                            $ratingClass = "star-grey";
                          
                            if($i <= $average) {
                                
                                $ratingClass = "star-highlight";
                            }


                        echo	'<i class="fa fa-star '.$ratingClass. '"; aria-hidden="true"></i>';

                        }
                        //echo $count . ' Reviews';
                    ?>
                    </div>
                </div>    
            </div>
        </div>
    </section>

    <a class="btn btn-primary btn-lg active" href="http://localhost/projet5/Controller/games">Retour</a>

    <section id="commentaire">
        <div class="container bg-white shadow">
            <div class="row">
            <?php
            foreach ($listOfComments as $comment)
            {
            ?>
                <div class="col-10 offset-1 mb-5 mt-5">
                
                    <div class="text-justify mb-5">Posté par <strong><?= $comment->getUser() ?></strong> le <?= $comment->getCommentDate() ?></div>
                    <div class="text-justify article-text text-reader"><?= nl2br($comment->getContent()) ?></div>
                    <a class="btn btn-primary btn-lg active" href="http://localhost/projet5/Controller/reportComment&amp;id=<?= $comment->getId() ?>">Signaler</a>
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
                    <form action="http://localhost/projet5/Controller/commentGame&amp;id=<?= $game->getId() ?>" method="post" class="form-signin">
                        <div>
                            <label for="content">Commentaire</label><br />
                            <textarea class="form-control" id="content" name="content" ></textarea>
                        </div>
                        <div>
                            <input class="btn btn-lg btn-primary btn-block mt-3" type="submit" name="commentGame" value="ajouter" />
                        </div>
                    </form>
                </div>    
            </div>
        </div>
    </section>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/frontLayout.php"); ?>