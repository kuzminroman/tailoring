<?php


namespace frontend\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class ShowStatisticObjectWidget extends Widget
{
    public $objectId;
    private $basePath = '/images/icons/';
    private $tag;
    private $svgData = '#svg_1';


    public function init()
    {
        parent::init();

    }

    /**
     * @param int $objectId
     * @return array
     */
    private function getInfoMetro($objectId = 1)
    {
        return [
            [
                'color' => '#008000',
                'name' => 'Василеостровская',
                'time' => '10 минут'
            ],
            [
                'color' => '#800080',
                'name' => 'Спортивная',
                'time' => '33 минуты'
            ],
        ];
    }

    /**
     * @param int $objectId
     * @return string
     */
    private function getSvgPath($objectId = 1)
    {
        $cities = [
            self::SPB => 'metroSpb.svg',
            self::MSK => 'metroMsk.svg',
            self::EKB => 'metroEkb.svg',
        ];

        return $this->basePath . $cities[1] . $this->svgData;

    }

    public function run()
    {
        $metroArray = $this->getInfoMetro($this->objectId);
        if (isset($this->objectId)) {
            $use = '<use xlink:href="'. $this->getSvgPath($this->objectId) . '"></use>';
            foreach($metroArray as $id => $metroData) {
                echo Html::beginTag('div', ['class'=> 'object-list__item__right-block__info__address__metro__item']);
                $this->tag = Html::tag('svg', $use, ['class' => 'metro-svg', 'viewBox' => '0 0 95 95', 'style' => ['fill' => $metroData['color']]]);
                $this->tag .= Html::tag('span', $metroData['name'], ['class' => 'metro-title']);
                $this->tag .= Html::tag('span', '(' . $metroData['time'] . ')', ['class' => 'metro-time']);
                echo $this->tag . '<br/>';
                echo Html::endTag('div');
            }
        }
    }

}