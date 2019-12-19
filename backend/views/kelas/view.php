<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Kelas */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Kelas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kelas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nama_kelas',
        ],
    ]) ?>


    <h2>Daftar Siswa</h2>
    <table id="w0" class="table table-striped table-bordered detail-view">
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
        </tr>
            
        <?php
        $no=0;
        foreach($siswas as $siswa) :
            $no++;
            echo "
            <tr>
                <td>".$no."</td>
                <td>".$siswa->nis."</td>
                <td>".$siswa->nama."</td>
            </tr>
            ";
        endforeach;
        ?>

    </table>
</div>
