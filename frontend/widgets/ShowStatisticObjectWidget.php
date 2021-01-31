<?php

namespace frontend\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class ShowStatisticObjectWidget extends Widget
{
    public $objectId;
    public $viewBoxFavorite;
    public $viewBoxReport;
    public $viewBoxView;
    private $basePath = '/images/icons/';
    private $tag;
    private $baseClass = 'statistic-object';
    private $classFavorite = 'favorite';
    private $classReport = 'report';
    private $classViews = 'views';
    private $classIcon = 'icon';
    private $classCount = 'count-all';
    private $classToday = 'today';

    const FAVORITE = 1;
    const REPORT = 2;
    const VIEW = 3;

    public function init()
    {
        parent::init();
    }

    /**
     * @param int $typeStat
     * @return array
     */
    private function getStatistic($typeStat)
    {
        $countFavorites = 55;
        $countReport = 41;
        $countViews = [
            'all' => 41,
            'today' => 12,
        ];
        $arrayStat = [
            self::FAVORITE => $countFavorites,
            self::REPORT => $countReport,
            self::VIEW => $countViews,
        ];

        return $arrayStat[$typeStat];
    }

    /**
     * @param int $typeId
     * @return string
     */
    private function getSvgPath($typeId)
    {
        $svg = [
            self::FAVORITE => 'heart.svg#Layer_1',
            self::REPORT => 'report.svg#Layer_x0020_1',
            self::VIEW => 'views.svg#icon',
        ];
        return $this->basePath . $svg[$typeId];
    }

    /**
     * @param $typeId
     */
    private function getHtml($typeId)
    {
        $countToday = 0;

        $classes = [
            self::FAVORITE =>
                $this->classFavorite,
            self::REPORT => $this->classReport,
            self::VIEW => $this->classViews
        ];

        $viewBox = [
            self::FAVORITE => $this->viewBoxFavorite,
            self::REPORT => $this->viewBoxReport,
            self::VIEW => $this->viewBoxView,
        ];

        $mainClass = $this->baseClass . '-' . $classes[$typeId];
        $pathSvg = '<use xlink:href="' . $this->getSvgPath($typeId) . '"></use>';
        $count = $this->getStatistic($typeId);

        if ((int)$typeId === self::VIEW) {
            $countToday = $count['today'];
            $count = $count['all'];
        }

        echo Html::beginTag('div', ['class' => $mainClass]);
        $this->tag = Html::tag('span', $count, ['class' => $mainClass . '__' . $this->classCount]);

        if ((int)$typeId === self::VIEW) {
            $this->tag .= Html::tag('span', $countToday, ['class' => $mainClass . '__' . $this->classToday]);
        }

        $this->tag .= Html::tag('svg', $pathSvg, ['class' => $mainClass . '__' . $this->classIcon, 'viewBox'=>$viewBox[$typeId]]);
        echo $this->tag;
        echo Html::endTag('div');
    }

    public function run()
    {
        if (isset($this->objectId)) {
            $this->getHtml(self::VIEW);
            $this->getHtml(self::FAVORITE);
            $this->getHtml(self::REPORT);
        }
    }
}