<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Articles */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="articles-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <p class="text-muted"> 
        <small>Created At: <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?>  
            <b>By: <?= $model->createdBy->username ?></b>
        </small>
    </p>
    <?php if(!Yii::$app->user->isGuest): ?>
        <?php if(Yii::$app->user->id === $model->created_by):?>
            <p>
                <?= Html::a('Update', ['update', 'slug' => $model->slug], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'slug' => $model->slug], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>
        <?php endif;?>
    <?php endif;?>
    
    <div>
        <?= $model->getEncodedBody()?>
    </div> 

</div>
