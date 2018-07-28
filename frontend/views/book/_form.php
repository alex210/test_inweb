<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\Author;
use \common\models\Heading;
use \dosamigos\selectize\SelectizeDropDownList;
use \yii\helpers\ArrayHelper;
use sjaakp\illustrated\Uploader;

/* @var $this yii\web\View */
/* @var $model common\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin([
			'options' => ['enctype' => 'multipart/form-data']
		]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?=$form->field($model, 'img')->widget(Uploader::className(), []) ?>

		<?php
      $author = Author::find()->asArray()->all();
      echo $form->field($model, 'rel_author')->label('Автор:')
        ->widget(SelectizeDropDownList::className(),
        ['items' => ArrayHelper::map($author, 'id', 'name'),
          'options' => ['multiple' => true, 'class' => 'form-control'],
          'clientOptions' => ['plugins' => ['remove_button']]
        ]);
    ?>

    <?php
      $author = Heading::find()->asArray()->all();
      echo $form->field($model, 'rel_heading')->label('Рубрика:')
        ->widget(SelectizeDropDownList::className(),
        ['items' => ArrayHelper::map($author, 'id', 'title'),
          'options' => ['multiple' => true, 'class' => 'form-control'],
          'clientOptions' => ['plugins' => ['remove_button']]
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
