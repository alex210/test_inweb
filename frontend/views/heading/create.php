<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Heading */

$this->title = 'Добавление рубрики';
$this->params['breadcrumbs'][] = ['label' => 'Рубрики', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="heading-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
