<?php

namespace common\models;

/**
 * Class Reports
 * @package common\models
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * @var string[]
     */
    public static $enLetters = [
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'
    ];

    /**
     * @var string[]
     */
    public static $ruLetters = [
        'А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ы', 'Э', 'Ю', 'Я'
    ];

    /**
     * @var \int[][]
     */
    public static $colors = [
        '#B22222' => [0, 1, 2, 3, 4, 5, 6, 7],
        '#FF1493' => [8, 9, 10, 11],
        '#008000' => [12, 13, 14, 15],
        '#0000FF' => [16, 17, 18, 19, 20, 21],
        '#A0522D' => [22, 23, 24, 25],
        '#12B6F9' => [26, 27, 28, 29, 30],
    ];


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public static function getColorsSpecialIcon()
    {
        mb_internal_encoding("UTF-8");

        $reports = [
            [
                'name' => 'Роман',
                'surname' => 'Кузьмин',
                'text' => '<p>Отличное ателье!</p>
                           <p>Заказ был выполнен быстро и качественно.</p>
                           <p>Советую всем посетить.</p>',
            ],
            [
                'name' => 'Александр',
                'surname' => 'Гуриев',
                'text' => '<p>Замечательное ателье!</p>
                           <p>Заказ был выполнен быстро и качественно.</p>
                           <p>Советую всем посетить.</p>',
            ],

            [
                'name' => 'Александр',
                'surname' => 'Гуриев',
                'text' => '<p>Замечательное ателье!</p>
                           <p>Заказ был выполнен быстро и качественно.</p>
                           <p>Советую всем посетить.</p>',
            ],

            [
                'name' => 'Александр',
                'surname' => 'Гуриев',
                'text' => '<p>Замечательное ателье!</p>
                           <p>Заказ был выполнен быстро и качественно.</p>
                           <p>Советую всем посетить.</p>',
            ],

            [
                'name' => 'Александр',
                'surname' => 'Гуриев',
                'text' => '<p>Замечательное ателье!</p>
                           <p>Заказ был выполнен быстро и качественно.</p>
                           <p>Советую всем посетить.</p>',
            ],

            [
                'name' => 'Александр',
                'surname' => 'Гуриев',
                'text' => '<p>Замечательное ателье!</p>
                           <p>Заказ был выполнен быстро и качественно.</p>
                           <p>Советую всем посетить.</p>',
            ],

            [
                'name' => 'Александр',
                'surname' => 'Гуриев',
                'text' => '<p>Замечательное ателье!</p>
                           <p>Заказ был выполнен быстро и качественно.</p>
                           <p>Советую всем посетить.</p>',
            ],

        ];

        foreach ($reports as $key => $report) {

            $nameFirstLatter = mb_substr($report['name'], 0, 1);
            $surnameFirstLatter = mb_substr($report['surname'], 0, 1);

            $nameFirstLatterUp = strtoupper($nameFirstLatter);
            $surnameFirstLatterUp = strtoupper($surnameFirstLatter);

            $report['nameFirstLatter'] = $nameFirstLatterUp;
            $report['surnameFirstLatter'] = $surnameFirstLatterUp;
            $report['colorLatter'] = self::getColorByLatterSurname($surnameFirstLatterUp);


            $reportsNew[] = $report;

        }

        return $reportsNew;
    }

    private static function getColorByLatterSurname($latter)
    {
        $ruLetter = false;
        $colorLetters = '#ADFF2F';

        foreach (self::$ruLetters as $k => $w) {
            if ($w === $latter) {
                $ruLetter = true;
                foreach (self::$colors as $key => $item) {
                    if (in_array($k, $item)) {
                        $colorLetters = $key;
                    }
                }

            }
        }

        if ($ruLetter === false) {
            foreach (self::$enLetters as $k => $w) {
                if ($w === $latter) {
                    foreach (self::$colors as $key => $item) {
                        if (in_array($k, $item)) {
                            $colorLetters = $key;
                        }
                    }
                }
            }
        }

        return $colorLetters;
    }
}
