<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model common\models\Siswax */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswax-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'tglhr')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Masukkan Tanggal Lahir ...'],
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
    ]);
    ?>

    <?= $form->field($model, 'kelas_id')->textInput() ?>

    <?= 
    $form->field($model, 'gaji_ortu')->widget(NumberControl::classname(), [
    'model' => $model,
    'attribute' => 'currency',
    'maskedInputOptions' => [
        'prefix' => 'Rp ', 
        'suffix' => ' '],
    ]); 
    ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
