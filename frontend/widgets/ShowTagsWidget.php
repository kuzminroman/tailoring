<?php

namespace frontend\widgets;

use common\models\Client;
use common\modules\tag\models\Tag;
use yii\base\Widget;
use yii\helpers\Html;

class ShowTagsWidget extends Widget
{
    public $model;
    public $isObject = false;
    private $tag;


    public function init()
    {
        parent::init();

    }

    /**
     * @return string[]
     */
    public function getTags()
    {
        foreach ($this->model->tagRelations as $tag) {
            $tags[] = $tag['name'];
        }

        return $tags;
    }

    public function run()
    {
        $tags = $this->getTags();
        $i = 0;
        $emptyTag = Html::tag('span', '...');
        if (!empty($this->model)) {
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
