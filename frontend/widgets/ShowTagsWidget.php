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
    public static function getTags()
    {
        return [
            'Пошив платья',
            'Ремонт джинс',
            'Пошив джинс',
            'Вышивка бисером',
            'Ремонт шубы',
            'Пошив костюма',
            'Ремонт костюмов',
            'Раскрой костюмов',
            'Ремонт рубашек',
            'Ремонт ромашек',
            'Пошив букашек',
        ];
    }

    public function run()
    {
        $tags = self::getTags();
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
