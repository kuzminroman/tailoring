<?php

/* @var $this yii\web\View */
/* @var $model common\modules\subject\models\Subject */
/* @var $typeWork common\models\TypeWork */

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = 'Tailoring';

?>
<div class="filter-container">
<?php
$form = ActiveForm::begin();

$works = $typeWork::find()->all();
$model = $model::find()->all();

$items = ArrayHelper::map($works, 'id', 'name');
?>
<?= $form->field($typeWork, 'name')->dropDownList($items)->label(false);?>

<?php foreach ($model as $subject) : ?>

    <?= $form->field($subject, 'title')->checkbox([
        'label' => $subject['title'],
    ]);?>
<?php endforeach;?>

<?php ActiveForm::end(); ?>
</div>
