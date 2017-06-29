<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= $this->e($title) ?></title>

        <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
    </head>
    <body>
        <div class="container">
            <header>
                <h1>W :: <?= $this->e($title) ?></h1>
            </header>

            <section>

                <?= $this->section('main_content') ?>
            </section>

            <footer>
            </footer>
        </div>

        <script
                src="https://code.jquery.com/jquery-3.2.1.js"
                integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
                crossorigin="anonymous">
        </script>
        <?=$this->section('js'); ?>

    </body>
</html>