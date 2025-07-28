<?php

namespace ZakharovAndrew\pages\models;

use Yii;
use ZakharovAndrew\pages\Module;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $url url
 * @property string|null $content
 * @property string $create_at
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property string|null $meta_keywords
 * @property string|null $og_title
 * @property string|null $og_description
 * @property string|null $og_image
 */
class Pages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['create_at'], 'safe'],
            [['title', 'meta_title', 'og_title', 'meta_description', 'og_description'], 'string', 'max' => 200],
            [['url', 'meta_keywords', 'og_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => Module::t('Title'),
            'url' => 'url',
            'content' => Module::t('Content'),
            'create_at' => Module::t('Created At'),
            'meta_title' => Module::t('Meta Title'),
            'meta_description' => Module::t('Meta Description'),
            'meta_keywords' => Module::t('Meta Keywords'),
            'og_title' => Module::t('OG Title'),
            'og_description' => Module::t('OG Description'),
            'og_image' => Module::t('OG Image'),
        ];
    }
    
    /**
     * Schema for translite
     * @return array
     */
    public static function getSchema()
    {
        return [
            "Є"=>"EH","І"=>"I","і"=>"i","№"=>"#","є"=>"eh",
            "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G","Д"=>"D",
            "Е"=>"E","Ё"=>"JO","Ж"=>"ZH",
            "З"=>"Z","И"=>"I","Й"=>"JJ","К"=>"K","Л"=>"L",
            "М"=>"M","Н"=>"N","О"=>"O","П"=>"P","Р"=>"R",
            "С"=>"S","Т"=>"T","У"=>"U","Ф"=>"F","Х"=>"KH",
            "Ц"=>"C","Ч"=>"CH","Ш"=>"SH","Щ"=>"SHH","Ъ"=>"'",
            "Ы"=>"Y","Ь"=>"","Э"=>"EH","Ю"=>"YU","Я"=>"YA",
            "а"=>"a","б"=>"b","в"=>"v","г"=>"g","д"=>"d",
            "е"=>"e","ё"=>"jo","ж"=>"zh",
            "з"=>"z","и"=>"i","й"=>"jj","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"kh",
            "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shh","ъ"=>"",
            "ы"=>"y","ь"=>"","э"=>"eh","ю"=>"yu","я"=>"ya",
            "«"=>"","»"=>"","—"=>"-"," "=>"-",','=>'', ':'=>'-',
        ];
    }
    
    /**
     * Транслетиризация
     * @return string
     */
    public static function translite($text)
    {
        return strtr(mb_strtolower($text), static::getSchema());
    }
    
}
