<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

 $this->title = 'Login';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
      <div class="row">
          <div class="col-md-4 col-md-offset-4">
              <div class="panel panel-default">
                  <div class="panel-heading">
                      <span class="glyphicon glyphicon-lock"></span> <?= Html::encode($this->title) ?>
                    </div>
                  <div class="panel-body">
                        <p>Please fill out the following fields to login:</p>
                        <div class="panel-body">
                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'layout' => 'horizontal',
                                'fieldConfig' => [
                                    'template' => "{label}\n<div class=\"col-sm-9\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                    'labelOptions' => ['class' => 'col-sm-3 control-label control-label'],
                                ],
                            ]); ?>
                          <div class="form-group">
                              <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                          </div>
                          <div class="form-group">
                              <?= $form->field($model, 'password')->passwordInput() ?>
                          </div>
                          <div class="form-group">
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                        'template' => "<div class=\"col-sm-offset-3 col-sm-9\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                                    ]) ?>
                          </div>
                          <div class="form-group last">
                              <div class="col-sm-offset-3 col-sm-9">
                                        <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-sm', 'name' => 'login-button']) ?>
                                       <button type="reset" class="btn btn-default btn-sm">
                                      Reset</button>
                              </div>
                          </div>
                          <?php ActiveForm::end(); ?>
                        </div>
                  </div>
                  <div class="col-lg-offset-1" style="color:#999;">
                        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
                        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
                   </div><br>
                  <div class="panel-footer">
                      Not Registred? <a href="#">Register here</a></div>
              </div>
          </div>
      </div>
</div>
<?php
    $rand = rand(1,4);
    $bgUrl = "background: url(".Yii::$app->getUrlManager()->getBaseUrl()."/images/login-image". $rand .".jpg) no-repeat center center fixed;";
?>
<style type="text/css">
    body {
        <?php echo $bgUrl?>
          -webkit-background-size: cover;
          -moz-background-size: cover;
          -o-background-size: cover;
          background-size: cover;
    }
</style>