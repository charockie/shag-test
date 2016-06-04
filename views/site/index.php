<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Students';
?>

<div class="site-index">

    <?= $this->render('_form', [
        'select' => $select,
        'groups' => $groups,
    ]) ?>

    <?php yii\widgets\Pjax::begin(['id' => 'students']) ?>
    <div class="container student-container">

        <?php foreach ($dataProvider->getModels() as $student): ?>
        <div class="col-md-3">
            <div class="panel info-field">
                <button type="button" class="close" data-toggle="modal" data-target="#myModal" data-id="<?= $student['id']; ?>"><span class="glyphicon glyphicon-info-sign info" aria-hidden="true"></span></button>
                <?= Html::img('/img/no_photo.jpg', [
                    'class' => 'img-circle img-responsive',
                    'style' => [
                        'margin-left' => '50px',
                        'margin-top' => '15px',
                    ]
                ]) ?>
                <h4 class="text-center"><?= $student['surname']; ?> <?= $student['name']; ?></h4>
                <div class="list-group-item-info">
                    <ul class="list-inline text-center">
                        <li>15 <span class="glyphicon glyphicon-heart"></span></li>
                        <li>0 <span class="glyphicon glyphicon-pencil"></span></li>
                        <li>89 <span class="glyphicon glyphicon-heart"></span></li>
                    </ul>
                </div>
                <p class="text-center">Был: <?= $student['last_visit']; ?></p>
                <div class="row phone-age-field">
                    <div class="col-md-8 phone-field">
                        <p class="text-center"><?= $student['phone']; ?></p>
                    </div>
                    <div class="col-md-4 age-field">
                        <p class="text-center"><?= $student['age']; ?> age</p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>

    </div>
    <?php \yii\widgets\Pjax::end() ?>

    <?= $this->render('_modal') ?>
</div>
