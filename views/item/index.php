<?php

use app\modules\admin\components\Configs;
use app\modules\admin\components\RouteRule;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel app\modules\admin\models\searchs\AuthItem */
/* @var $context app\modules\admin\components\ItemController */

$context = $this->context;
$labels = $context->labels();
$this->title = Yii::t('rbac-admin', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;

$rules = array_keys(Configs::authManager()->getRules());
$rules = array_combine($rules, $rules);
unset($rules[RouteRule::RULE_NAME]);
?>
<div class="role-index">
    <h1><?=Html::encode($this->title);?></h1>
    <p>
        <?=Html::a(Yii::t('rbac-admin', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success']);?>
    </p>
    <?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'name',
            'label' => Yii::t('rbac-admin', 'Name'),
        ],
        [
            'attribute' => 'ruleName',
            'label' => Yii::t('rbac-admin', 'Rule Name'),
            'filter' => $rules,
        ],
        [
            'attribute' => 'description',
            'label' => Yii::t('rbac-admin', 'Description'),
        ],
        ['class' => 'yii\grid\ActionColumn'],
    ],
])
;?>

</div>
