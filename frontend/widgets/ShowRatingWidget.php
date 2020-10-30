<?php


namespace frontend\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class ShowRatingWidget extends Widget
{
    public $objectId;
    private $basePath = '/images/icons/';
    private $tag;
    private $svgData = '#star_id';
    private $colorGray = '#C0C0C0';
    private $colorGold = '#FFD700';

    const FINAL_RATING = 5;

    public function init()
    {
        parent::init();

    }

    /**
     * @param int $objectId
     * @return float
     */
    private function getInfoRatingObject($objectId = 1)
    {
        $sumOfRatings = 9;
        $countUsers = 4;
        return round($sumOfRatings / $countUsers);
    }

    /**
     * @return string
     */
    private function getSvgPath()
    {
        return $this->basePath . 'new-star.svg' . $this->svgData;

    }

    public function run()
    {
        $rating = (int)$this->getInfoRatingObject();

        if (isset($this->objectId)) {
            $use = '<use xlink:href="'. $this->getSvgPath(). '"></use>';
            echo Html::beginTag('div', ['class'=> 'rating-object']);
            for($i = 1; $i <= self::FINAL_RATING; $i++) {
                $color = $i > $rating ? $this->colorGray : $this->colorGold;
                echo $this->tag = Html::tag('svg', $use, ['class' => 'rating-object__icon', 'viewBox' => '0 0 55 55', 'style' => ['fill' => $color]]);
            }
            echo Html::endTag('div');
        }
    }

}