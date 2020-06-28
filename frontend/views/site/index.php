<?php

/* @var $this yii\web\View */
/* @var $model common\modules\subject\models\Subject */
/* @var $typeWork common\models\TypeWork */

use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

$this->title = 'Tailoring';

?>
<br/>
<br/>
<br/>
<?php
$form = ActiveForm::begin();
$works = \common\models\TypeWork::find()->all();
$items = ArrayHelper::map($works,'id','name');
?>
<?= $form->field($model, 'name')->dropDownList($items)->label(false);?>
<?php ActiveForm::end(); ?>