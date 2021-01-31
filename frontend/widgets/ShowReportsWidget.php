<?php


namespace frontend\widgets;


use common\models\Reports;
use DateTime;
use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class ShowReportsWidget extends Widget
{
    private $tag;

    public function init()
    {
        parent::init();

    }

    private static function getRating($ratingUser)
    {
        return ShowRatingWidget::widget([
            'objectId' => 1,
            'viewBox' => '0 0 175 50',
            'ratingUser' => $ratingUser,
        ]);
    }

    /**
     * @param $date
     * @return false|string
     */
    public static function getDatetimeBack($date)
    {
        $dateReport = Yii::$app->formatter->asDatetime($date, 'php:Y-m-d H:i:s');
        $dateReportDiff = (new DateTime($dateReport))->diff(new DateTime());

        $notification = ' только что';

        if ($dateReportDiff->i > 1 && $dateReportDiff->i <= 5) {
            return ' больше минуты назад';
        }

        if ($dateReportDiff->i > 5
            && $dateReportDiff->h < 1
            && $dateReportDiff->y === 0
            && $dateReportDiff->d === 0
            && $dateReportDiff->m === 0
        ) {
            return ' ' . $dateReportDiff->i . ' минут назад';
        }


        if ($dateReportDiff->h > 0
            && $dateReportDiff->y === 0
            && $dateReportDiff->d === 0
            && $dateReportDiff->m === 0
        ) {
            $hour = $dateReportDiff->h;
            return \Yii::$app->i18n->messageFormatter->format(
                '{n, plural, =1{ час назад} one{ # час назад} few{ # часа назад} many{ # часов назад} other{ # часов назад}}',
                ['n' => $hour],
                \Yii::$app->language
            );
        }

        if ($dateReportDiff->d > 0
            && $dateReportDiff->m === 0
            && $dateReportDiff->y === 0)
        {
            $day = $dateReportDiff->d;
            return \Yii::$app->i18n->messageFormatter->format(
                '{n, plural, =1{ день назад} one{ # день назад} few{ # дня назад} many{ # дней назад} other{ # дня назад}}',
                ['n' => $day],
                \Yii::$app->language
            );
        }

        if ($dateReportDiff->m > 0
            && $dateReportDiff->y === 0)
        {
            $month = $dateReportDiff->m;
            return \Yii::$app->i18n->messageFormatter->format(
                '{n, plural, =1{ месяц назад} one{ # месяц назад} few{ # месяца назад} other{ # месяц назад}}',
                ['n' => $month],
                \Yii::$app->language
            );
        }

        if ($dateReportDiff->y > 0) {
            $year = $dateReportDiff->y;
            return \Yii::$app->i18n->messageFormatter->format(
                '{n, plural, =1{ год назад} one{ # год назад} few{ # года назад} many{ # лет назад} other{ # лет назад}}',
                ['n' => $year],
                \Yii::$app->language
            );
        }

        return $notification;
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
            echo self::getRating($report['rating']);

            echo Html::endTag('div');

            echo Html::beginTag('div', ['class' => 'object-page__reports__item__user-info']);
            echo Html::tag('span', $report['name'] . ' ' . $report['surname'], ['class' => 'object-page__reports__item__user-info__name']);
            echo Html::tag('span', self::getDatetimeBack($report['datetime']), ['class' => 'object-page__reports__item__user-info__date', 'style' => ['font-style' => 'italic', 'color' => 'gray', 'font-size' => '13px']]);
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
