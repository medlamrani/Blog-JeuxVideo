<?php $title = 'Ajouter un jeux'; ?>

<?php ob_start(); ?>

    <header class="backhead">
        <div class="bloc">
            <h1 class="text-center">Administration  !</h1>
        </div>
    </header>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>
    <div class="container form-game">
        <form action="http://localhost/projet5/admin/addgame" method="post" class="form-signin bloc-form">
            <img class="mb-4" src="/projet5/src/public/image/controller.png" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Ajouter un jeux</h1>

            <label for="name" >Nom :</label>
            <input type="text" name="name" class="form-control" value=""/>

            <label for="resume" >Resume :</label>
            <textarea class="form-control" id="resume" name="resume" rows="3"></textarea>

            <label for="platform" >Platform :</label>
            <select name="platform" class="form-control">
                <?php
                    foreach($listPlatform as $platform)
                    {   
                        echo '<option value="' ,$platform->getId(),'">',$platform->getPlatformName(),'  </option>';
                    }
                ?>
            </select>


            <label for="editor" >Editeur :</label>
            <select name="editor" class="form-control">
                <?php
                    foreach($listEditor as $editor)
                    {  
                        echo '<option value="' ,$editor->getId(),'">',$editor->getEditorName(),'  </option>';
                    }
                ?>
            </select>


            <label for="releaseDate"> Date de sortie : </label>
            <input type="date" name="releaseDate" class="form-control" />     

            <input type="submit" value="Ajouter" name="addpost" class="btn btn-lg btn-primary btn-block mt-3"/>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>    

<?php require(__DIR__ . "/template/adminLayout.php"); ?>