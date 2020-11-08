<?php


namespace frontend\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class ShowTagsWidget extends Widget
{
    public $objectId;
    public $isObject = false;
    private $tag;


    public function init()
    {
        parent::init();

    }

    /**
     * @return string[]
     */
    private function getTags()
    {
        return [
            'Пошив платья',
            'Пошив платья',
            'Пошив платья',
            'Пошив платья',
            'Пошив платья',
            'Пошив платья',
            'Ремонт джинс',
            'Ремонт джинс',
            'Ремонт джинс',
            'Ремонт джинс',
            'Ремонт джинс',
            'Ремонт джинс',
            'Ремонт джинс',
            'Вышивка бисером',
            'Вышивка бисером',
            'Вышивка бисером',
            'Вышивка бисером',
            'Ремонт шубы',
            'Ремонт шубы',
            'Ремонт шубы',
            'Ремонт шубы',
            'Пошив костюма',
            'Пошив костюма',
            'Пошив костюма',
            'Пошив костюма',
            'Пошив костюма',
            'Пошив костюма',
            'Ремонт рубашек'
        ];
    }

    public function run()
    {
        $tags = $this->getTags();
        $i = 0;
        $emptyTag = Html::tag('span', '...');
        if ($this->objectId) {
            foreach ($tags as $tag) {
                $i++;
                if (!$this->isObject && (int)$i >= 8) {
                    echo Html::beginTag('div', ['class' => 'object-list__item__right-block__info__tags__item']);
                    echo $this->tag = Html::tag('span', $emptyTag, ['class' => 'view-tag-gray']);
                    echo Html::endTag('div');
                    break;
                }
                echo Html::beginTag('div', ['class' => "object-list__item__right-block__info__tags__item"]);
                $tag = Html::tag('span', $tag);
                echo $this->tag = Html::tag('span', $tag, ['class' => 'view-tag-gray']);
                echo Html::endTag('div');
            }
        }
    }
}