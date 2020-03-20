<?php

    use yii\helpers\Url;
    use yii\helpers\StringHelper;
    use yii\helpers\Html;

    /**
     * @var $model \app\models\Articles
     */
?>

<div>
    <a href="<?=Url::to(['/articles/view', 'slug'=>$model->slug])?>">
        <h3><?= Html::encode($model->title) ?></h3>
    </a>
    <div>
        <?= StringHelper::truncateWords($model->getEncodedBody(), 50) ?>
    </div>
    <p class="text-muted text-right"> 
        <small>Created At: <?= Yii::$app->formatter->asRelativeTime($model->created_at) ?>  
            <b>By: <?= $model->createdBy->username ?></b>
        </small>
    </p>
    <hr>
</div>