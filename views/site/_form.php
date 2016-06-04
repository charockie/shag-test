<?php

use yii\helpers\Html;

$this->registerJs(
    '$("document").ready(function(){
            $("#groups").on("pjax:end", function() {
            $.pjax.reload({container:"#students"});
            document.getElementById("drop-list").selected="";
        });
    });'
);
?>

<?php \yii\widgets\Pjax::begin(['id' => 'groups']); ?>
<?= Html::beginForm(['site/index'], 'get', ['data-pjax' => true, 'class' => 'form-inline']) ?>
<?= Html::dropDownList('StudentsSearch[group]', ['selected' => $select], $groups, ['id' => 'drop-list', 'class' => 'btn btn-primary dropdown-toggle']) ?>
<?= Html::submitButton('Просмотреть', ['class' => 'btn', 'name' => 'hash-button']) ?>
<?= Html::endForm() ?>
<?php \yii\widgets\Pjax::end(); ?>