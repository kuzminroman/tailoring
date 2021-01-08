<?php

use kartik\select2\Select2;

?>
<div style="padding: 10px; background-color: white;" class="settings-personal-area-contacts-main">

    <label class="control-label">Тэги</label>

    <?php
    echo Select2::widget([
        'name' => 'color_2a',
        'value' => \frontend\widgets\ShowTagsWidget::getTags(),
        //  'data' => $data,
        'maintainOrder' => true,
        'options' => ['multiple' => true],
        'pluginOptions' => [
            'tags' => true,
            'maximumInputLength' => 100
        ],
    ]);
    ?>
</div>
