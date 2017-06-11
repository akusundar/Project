<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\User;
  use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Topup */
/* @var $form yii\widgets\ActiveForm */
?>
<script>
function addbalance(val){
     var t_amt = $("#topup-transaction_amt").val();
	 //alert(t_amt);
	 var total = parseInt(t_amt)+parseInt(val);

	 $("#topup-balance").val(total);
	 
}	
	
</script>

<div class="topup-form">

    <?php $form = ActiveForm::begin(); ?>

    
	<?= $form->field($model, 'user_id')->widget(Select2::classname(), [
           'data' => ArrayHelper::map(User::find()->where('parent_id!=0')->all(),'iduser','username'),
           'language' => 'en',
           'options' => ['placeholder' => 'Select User'],
           'pluginOptions' => [ 'allowClear' => true  ], 
		   
                 ]);
           ?>

   
	<?= $form->field($model, 'transaction_amt')->widget(Select2::classname(), [
           'data' => ['10'=>'10','50'=>'50','100'=>'100'],
           'language' => 'en',
           'options' => ['placeholder' => 'Select a Transaction Amount ...'],
           'pluginOptions' => [ 'allowClear' => true  ], 
		   
                 ]);
           ?>


    <?= $form->field($model, 'old_balance')->textInput(['maxlength' => 45, 'onkeyup'=>"addbalance(this.value)"]) ?>

    <?= $form->field($model, 'balance')->textInput(['maxlength' => 45]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  
