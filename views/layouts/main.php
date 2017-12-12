<?php

use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

list(, $url) = Yii::$app->assetManager->publish('@app/modules/admin/assets');
$this->registerCssFile($url . '/main.css');
?>
<?php $this->beginPage();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?=Html::csrfMetaTags();?>
        <title><?=Html::encode($this->title);?></title>
        <?php $this->head();?>
        <link href="/assets/a5b2355c/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <?php $this->beginBody();?>

        <div class="container">
            <?=$content;?>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-right"><?=Yii::powered();?></p>
            </div>
        </footer>

        <?php $this->endBody();?>
    </body>
</html>
<?php $this->endPage();?>
