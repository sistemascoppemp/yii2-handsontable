<?php

namespace dee\handsontable;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Inflector;
use yii\web\View;

/**
 * Description of Handsontable
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class Handsontable extends Widget
{
    public $position;
    public $varName;
    public $options = [];
    public $clientOptions = [];

    /**
     * 
     */
    public function registerClientOptions()
    {
        $options = empty($this->clientOptions) ? '{}' : Json::htmlEncode($this->clientOptions);
        if (empty($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        if ($this->varName === null) {
            $this->varName = Inflector::variablize($this->options['id']);
        }
        $view = $this->getView();
        $var = empty($this->varName) ? '' : "var {$this->varName} = ";
        $id = json_encode($this->options['id']);
        if ($this->position !== null && $this->position <= View::POS_BEGIN) {
            $view->registerAssetBundle(HandsontableAsset::className(), View::POS_HEAD);
        } else {
            $view->registerAssetBundle(HandsontableAsset::className());
        }
        $position = $this->position ? : View::POS_READY;
        $view->registerJs("{$var}new Handsontable(document.getElementById({$id}),{$options});", $position);
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $tag = ArrayHelper::remove($this->options, 'tag', 'div');
        $this->registerClientOptions();
        return Html::tag($tag, '', $this->options);
    }
}
