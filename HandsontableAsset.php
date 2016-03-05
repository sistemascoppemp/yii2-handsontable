<?php

namespace dee\handsontable;

use yii\web\AssetBundle;

/**
 * Description of HandsontableAsset
 *
 * @author Misbahul D Munir <misbahuldmunir@gmail.com>
 * @since 1.0
 */
class HandsontableAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@bower/handsontable/dist';

    /**
     * @inheritdoc
     */
    public $css = [
        'handsontable.full.css'
    ];

    /**
     * @inheritdoc
     */
    public $js = [
        'handsontable.full.js'
    ];

}
