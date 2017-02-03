<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',        
        '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css',
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css',
        'css/sb-admin.css',
        'css/style.css'
    ];
    public $js = [
        '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js',
        '//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
