<?php $title = 'Ajouter un jeux'; ?>

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
            <form action="?action=addGame" method="post" class="form-signin">
                <img class="mb-4" src="src/public/image/controller.png" width="72" height="72">
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
                            echo '<option value="' ,$platform->getId(),'">',$platform->platform(),'  </option>';
                        }
                    ?>
                </select>


                <label for="editor" >Editeur :</label>
                <select name="editor" class="form-control">
                    <?php
                        foreach($listEditor as $editor)
                        {  
                            echo '<option value="' ,$editor->getId(),'">',$editor->editor(),'  </option>';
                        }
                    ?>
                </select>


                <label for="releaseDate"> Date de sortie : </label>
                <input type="date" name="releaseDate" class="form-control" />     

                <input type="submit" value="Ajouter" name="addpost" class="btn btn-lg btn-primary btn-block mt-3"/>
            </form>
        </div>
    </div>

<?php $content = ob_get_clean(); ?>    

<?php require(__DIR__ . "/template/adminLayout.php"); ?>