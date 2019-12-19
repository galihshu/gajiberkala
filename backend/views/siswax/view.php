<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Siswax */
?>
<div class="siswax-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nis',
            'nama',
            'tglhr',
            'kelas_id',
            'gaji_ortu',
        ],
    ]) ?>

</div>
