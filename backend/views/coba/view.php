<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Coba */
?>
<div class="coba-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama',
            'alamat',
        ],
    ]) ?>

</div>
