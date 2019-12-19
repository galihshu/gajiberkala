<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use kartik\number\NumberControl;

/* @var $this yii\web\View */
/* @var $model common\models\Siswa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="siswa-form">

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

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
