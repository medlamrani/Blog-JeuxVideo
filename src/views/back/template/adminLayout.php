<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="public/css/style.css">
        <link rel="stylesheet" type="text/css" href="public/css/bootstrap.css">
        <title><?= $title ?></title>
    </head>
    <body>  
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top justify-content-between">
            <a class="navbar-brand">
                <img src="public/images/">
                Jeux Video
            </a>
        </nav>  
        
        <?= $header ?>   
    
        <div class="main">
            <?= $content ?>
        </div>

    </body>
</html>