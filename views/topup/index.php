<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TopupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Topups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="topup-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Topup', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            //'transaction_type',
            'transaction_amt',
            'old_balance',
             'balance',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
