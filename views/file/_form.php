<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Attachments;
use kartik\file\FileInput;
use yii\web\UploadedFile;
use kartik\select2\Select2;
use app\models\User;
  use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\File */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="file-form">

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form','options'=>['enctype'=>'multipart/form-data','class' => 'form-vertical']]); ?>
    <?php if(Yii::$app->user->identity->username == "superadmin"){ ?>
	<?= $form->field($model, 'user_id')->widget(Select2::classname(), [
           'data' => ArrayHelper::map(User::find()->where('parent_id!=0')->all(),'iduser','username'),
           'language' => 'en',
           'options' => ['placeholder' => 'Select User'],
           'pluginOptions' => [ 'allowClear' => true  ], 
		   
                 ]);
           ?>
	<?php }

	echo $form->field($model, 'pages')->textInput(['maxlength' => 45]);


	echo $form->field($model, 'file')->widget(FileInput::classname(), [
    'options'=>['accept'=>'image/*,csv,png,doc,jpeg,jpg,gif,pdf,3gp,mp4,mp3,xls,zip,ppsx,pptx', 'multiple'=>true],
    'pluginOptions'=>['allowedFileExtensions'=>['pdf','doc','jpeg','jpg','gif','png','csv','3gp','mp4','mp3','xls','zip','ppsx','pptx'], 'showUpload' => false,'overwriteInitial'=>true,

        ]
    ]); ?>
    

    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
