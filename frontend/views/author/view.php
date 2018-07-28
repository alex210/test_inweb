<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Author */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Авторы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<ul class="list-group">
<?php
	$books = $model->books;
	foreach ($books as $book) {
?>
	<li class="list-group-item"><a href="/book/view?id=<?=$book->id?>"><?=$book->title?></a></li>
<?php } ?>
</ul>