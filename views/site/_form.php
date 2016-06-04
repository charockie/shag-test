<?php

use yii\helpers\Html;

?>

<?php \yii\widgets\Pjax::begin(['id' => 'groups']); ?>
<?= Html::beginForm(['site/index'], 'get', ['data-pjax' => true, 'class' => 'form-inline']) ?>
<?= Html::dropDownList('group', ['selected' => $select], $groups, ['id' => 'drop-list', 'class' => 'btn btn-primary dropdown-toggle', 'onchange' => 'this.form.submit()']) ?>
<?= Html::endForm() ?>
<?php \yii\widgets\Pjax::end(); ?>