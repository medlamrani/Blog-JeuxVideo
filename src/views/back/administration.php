<?php $title = 'Administration'; ?>

<?php ob_start(); ?>

    <header class="backhead">
        <div class="bloc">
            <h1>Welcome <?= $_SESSION['username'] ?></h1>
        </div>
    </header>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <div class="container bloc mb-5">
        <div class="bloc mb-5">
            <h2 class="text-center" style="36px">Liste des actualites</h2>
        </div>
        <div class="row">
            <div class="col-12 ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titre de l'actualite</th>
                        <th scope="col">Contenu</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($listOfNews as $news)
                {   
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
                    <tr>
                        <td><?= $news->getTitle() ?></td>
                        <td><?= nl2br($content) ?></td>
                        <td>
                            <a href="http://localhost/projet5/admin/updateNews/<?= $news->getId() ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Modifier</a>
                            <a href="http://localhost/projet5/admin/deleteNews/<?= $news->getId() ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                ?>    
                </tbody>
                </table>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <div class="mb-5 container bloc">
        <div class="bloc mb-5">
            <h2 class="text-center" style="36px">Liste des Jeux</h2>
        </div>
        <div class="row">
            <div class="col-12 ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Titre du jeu</th>
                        <th scope="col">Contenu</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($listOfGames as $game)
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
                    <tr>
                        <td><?= $game->getName() ?></td>
                        <td><?= nl2br($resume) ?></td>
                        <td>
                            <a href="http://localhost/projet5/admin/deleteGame/<?= $game->getId() ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                ?>    
                </tbody>
                </table>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

    <div class="mb-5 container bloc">
        <div class="bloc mb-5">
            <h2 class="text-center" style="36px">Liste des Commentaire signales</h2>
        </div>
        <div class="row">
            <div class="col-12 ">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Pseudo</th>
                        <th scope="col">Contenu</th>
                        <th scope="col">Date du commentaire</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                foreach ($reportedCommentGame as $commentGame)
                {              
                ?>
                    <tr>
                        <td><?= $commentGame->getUser() ?></td>
                        <td><?= $commentGame->getContent() ?></td>
                        <td><?= $commentGame->getCommentDate() ?></td>
                        <td>
                            <a href="http://localhost/projet5/admin/approveCommentGame/<?= $commentGame->getId() ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Approuver</a>
                            <a href="http://localhost/projet5/admin/deleteCommentGame/<?= $commentGame->getId() ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                foreach ($reportedCommentNews as $commentNews)
                {
                ?>
                    <tr>
                        <td><?= $commentNews->getUser() ?></td>
                        <td><?= $commentNews->getContent() ?></td>
                        <td><?= $commentNews->getCommentDate() ?></td>
                        <td>
                            <a href="http://localhost/projet5/admin/approveCommentNews/<?= $commentNews->getId() ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Approuver</a>
                            <a href="http://localhost/projet5/admin/deleteCommentNews/<?= $commentNews->getId() ?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">Supprimer</a>
                        </td>
                    </tr>
                <?php
                }
                ?>    
                </tbody>
                </table>
            </div>
            <div class="col-4"></div>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require(__DIR__ . "/template/adminLayout.php"); ?>