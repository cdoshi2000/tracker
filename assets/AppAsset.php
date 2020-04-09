<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'node_modules/@fortawesome/fontawesome-free/css/all.min.css',
        'node_modules/leaflet/dist/leaflet.css'
    ];
    public $js = [
        'node_modules/@fortawesome/fontawesome-free/js/all.min.js',
        'node_modules/bootstrap-datepicker/js/bootstrap-datepicker.js',
        'node_modules/leaflet/dist/leaflet.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
