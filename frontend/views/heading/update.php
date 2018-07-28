<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Heading */

$this->title = 'Редактировать рубрику: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Рубрики', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="heading-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
