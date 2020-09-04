<?php $title = 'Ajouter un chapitre'; ?>

<?php ob_start(); ?>

    <header class="masthead">
        <div>
            <h1>Administration  !!!</h1>
        </div>
    </header>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

    <div class="newpost">
        <div class="container-fluid">
            <form action="?action=addNews" method="post" class="form-signin">
                <img class="mb-4" src="public/images/booki.png" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Nouveau article</h1>

                <label for="title" >Titre de l'actu :</label>
                <input type="text" name="title" class="form-control" value=""/>

                <label for="content" >Contenu :</label>
                <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                

                <input type="submit" value="Ajouter" name="addnews" class="btn btn-lg btn-primary btn-block mt-3"/>
            </form>
        </div>
    </div>


<?php $content = ob_get_clean(); ?>    

<?php require(__DIR__ . "/template/adminLayout.php"); ?>