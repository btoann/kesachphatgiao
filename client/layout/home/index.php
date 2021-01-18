<!DOCTYPE html>
<html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Lab 1 - WEB3013</title>
        <link rel="stylesheet" href="public/style/style.css">

        <?php $headBool = new boolean(); ?>
            <!-- Jquery -->
            <script src="<?= $headBool->issetURL('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', null, '../public/js/jquery_3.5.1.js') ?>">
            </script>
            <!-- Bootstrap -->
            <?= $headBool->issetURL(
                    'https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css',
                    '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
                        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">',
                    '<link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">'
                )
            ?>
        <?php unset($headBool) ?>

        <?php $this->renderSection('head'); ?>

    </head>

    <body>

        <?php $this->renderSection('header'); ?>

        <?php $this->renderSection('content'); ?>

        <?php $this->renderSection('script'); ?>

        <script src="public/js/client/index.js"></script>
    </body>

</html>