<?php
/* @var $this yii\web\View */

use app\models\Country;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$this->title = 'Cigo Order Tracker';
?>

<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Add an Order
                    </div>
                    <div class="card-body">
                        <?php $form = ActiveForm::begin(); ?>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $form->field($model, 'first_name') ?>
                            </div>
                            <div class="col-xs-6">
                                <?= $form->field($model, 'last_name') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $form->field($model, 'email') ?>
                            </div>
                            <div class="col-xs-6">
                                <?= $form->field($model, 'phone_number') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $form->field($model, 'order_type_id')->dropDownList($orderTypeList, ['prompt'=>'Select order type']) ?>
                            </div>
                            <div class="col-xs-6">
                                <?php
                                echo $form->field($model, 'order_value')->begin();
                                echo Html::activeLabel($model,'order_value');
                                ?>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fas fa-dollar-sign"></i>
                                    </div>
                                    <?= Html::activeTextInput($model, 'order_value',['class' => 'form-control pull-right']) ?>
                                </div>
                                <?php
                                echo Html::error($model,'order_value', ['class' => 'help-block']);
                                echo $form->field($model, 'order_value')->end();
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                            <?php
                                echo $form->field($model, 'scheduled_date')->begin();
                                echo Html::activeLabel($model,'scheduled_date');
                                ?>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <?= Html::activeTextInput($model, 'scheduled_date',['class' => 'form-control pull-right datepicker']) ?>
                                </div>
                                <?php
                                echo Html::error($model,'scheduled_date', ['class' => 'help-block']);
                                echo $form->field($model, 'scheduled_date')->end();
                                ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <?= $form->field($model, 'street_address') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $form->field($model, 'city') ?>
                            </div>
                            <div class="col-xs-6">
                                <?= $form->field($model, 'state') ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <?= $form->field($model, 'zip_code') ?>
                            </div>
                            <div class="col-xs-6">
                                <?= $form->field($model, 'country_id')->dropDownList($countryList, ['prompt'=>'Select Country']) ?>
                            </div>
                        </div>
                        <div class="row pull-right">
                            <div class="col-xs-12">
                            <?= $form->field($model, 'order_status_id')->hiddenInput(['value' => 1])->label(false) ?>
                            <?= Html::resetButton('Cancel', ['class' => 'btn btn-danger']) ?>
                            <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
                            </div>
                        </div>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <br/>
                <div class="card">
                    <div class="card-header">
                        Existing Orders
                    </div>
                    <div class="card-body">
                        <?= $this->render('@app/views/order/table', ['orderData' => $orderData]) ?>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Map
                    </div>
                    <div class="card-body">
                        <?= $this->render('@app/views/order/map', ['mapPoints' => $mapPoints]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$jsMap = <<<JS
    // initialize the map on the "map" div with a given center and zoom
    var cigoMap = L.map('mapId', {
        center: [51.505, -0.09],
        zoom: 13
    });
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoiY2Rvc2hpIiwiYSI6ImNrOHRjdHptazBkZHczbWw5b3l2bTVibnUifQ.mJjGvkOEMAa8pkpMz_QK0w', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoiY2Rvc2hpIiwiYSI6ImNrOHRjdHptazBkZHczbWw5b3l2bTVibnUifQ.mJjGvkOEMAa8pkpMz_QK0w'
    }).addTo(cigoMap);
JS;
$this->registerJs(
    "$('.datepicker').datepicker({format: 'yyyy/mm/dd'})",
    View::POS_READY,
    'datepicker'
);
$this->registerJs(
    $jsMap,
    View::POS_READY,
    'leafMap'
);
?>
