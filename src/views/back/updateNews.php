<?php $title = 'Modifier un chapitre'; ?>

<?php ob_start(); ?>

    <header class="backhead">
        <div class="bloc">
            <h1 class="text-center">Administration  !</h1>
        </div>
    </header>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <div class="container form-game">
        <form action="http://localhost/projet5/admin/updateNews/<?= $_GET['id'] ?>" method="post" class="form-signin bloc-form">
            <img class="mb-4" src="/projet5/src/public/image/news.png" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">modifier l'article</h1>

            <label for="title" >Titre de l'actu :</label>
            <input type="text" name="title" class="form-control" value=""/>

            <label for="content" >Contenu :</label>
            <textarea class="form-control" id="content" name="content" rows="3"></textarea>
            

            <input type="submit" value="Modifier" name="updatenews" class="btn btn-lg btn-primary btn-block mt-3"/>
        </form>
    </div>


<?php $content = ob_get_clean(); ?>    

<?php require(__DIR__ . "/template/adminLayout.php"); ?>