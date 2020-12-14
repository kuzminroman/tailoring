<?php


namespace frontend\widgets;


use common\models\Reports;
use yii\base\Widget;
use yii\helpers\Html;

class ShowReportsWidget extends Widget
{
    private $tag;

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $reports = Reports::getColorsSpecialIcon();
        $i = 0;
        $countNotAll = count($reports) - 1;

        foreach ($reports as $key => $report) {
            $i++;

            $hideClass = $i === 1 ? 'first-report' : 'all-reports';


            echo Html::beginTag('div', ['class' => $hideClass]);

            echo Html::beginTag('div', ['class' => 'object-page__reports__item']);
            echo Html::beginTag('div', ['class' => 'object-page__reports__item__block-circle']);
            echo Html::beginTag('div', ['class' => 'object-page__reports__item__block-circle__circle', 'style' => ['background-color' => $report['colorLatter']]]);
            echo Html::tag('div', $report['nameFirstLatter'] . $report['surnameFirstLatter'], ['class' => 'object-page__reports__item__block-circle__circle__initials']);
            echo Html::endTag('div');
            echo Html::endTag('div');

            echo Html::beginTag('div', ['class' => 'object-page__reports__item__user-info']);
            echo Html::tag('span', $report['name'] . ' ' . $report['surname'], ['class' => 'object-page__reports__item__user-info__name']);
            echo Html::tag('div', $report['text'], ['class' => 'object-page__reports__item__user-info__text']);
            echo Html::endTag('div');
            echo Html::endTag('div');
            echo Html::endTag('div');

            if ($hideClass === 'first-report') {
                echo Html::tag('div', Html::tag('span', 'Скрыть', ['class' => 'hide_reports__button']), ['class' => 'hide_reports', 'style' => ['display' => 'none', 'text-align' => 'center']]);

                if ($countNotAll >= 1) {
                    echo Html::tag('div', Html::tag('span', 'Показать ещё (' . $countNotAll . ')', ['class' => 'show_more']), ['style' => ['text-align' => 'center']]);
                }
            }

        }
    }
}