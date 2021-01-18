<!DOCTYPE html>
<html lang="vi">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Triết lý Buddha</title>

        <?php $headBool = new boolean(); ?>
            <!-- Jquery -->
            <script src="<?= $headBool->issetURL('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', null, '../public/js/jquery_3.5.1.js') ?>">
            </script>
            <!-- Bootstrap -->
            <?= $headBool->issetURL(
                    'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css',
                    '<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet" 
                        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">',
                    '<link rel="stylesheet" href="../public/bootstrap/css/bootstrap.min.css">'
                )
            ?>
            <?= $headBool->issetURL(
                    'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js',
                    '<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" 
                        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>',
                    '<script src="../public/bootstrap/js/bootstrap.min.js"></script>'
                )
            ?>
        <?php unset($headBool) ?>

        <?php $this->renderSection('head'); ?>

    </head>

    <body>

        <?php $this->renderSection('header'); ?>

        <?php $this->renderSection('content'); ?>

        <?php $this->renderSection('footer'); ?>

        <?php $this->renderSection('script'); ?>

    </body>

</html>