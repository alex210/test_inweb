<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Author */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Книги', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1><?=$model->title?></h1>

<img src="/uploads/img/<?=$model->img?>" alt="<?=$model->title?>">