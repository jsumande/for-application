<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\jui\AutoComplete;

$this->title = 'Report';
?>
<div class="site-report">

  <div class="row">
    <div class="row">
      <div class="col-sm-12">
          <h1 class="page-header">
              Reports
              <!-- Button trigger modal -->
              <button class="btn btn-primary btn-default" data-toggle="modal" data-target="#myModalHorizontal">
                  <i class="fa fa-fw fa-plus"></i>
              </button>
          </h1>
      </div>
    </div>
    

    <!-- Modal -->
    <div class="modal fade" id="myModalHorizontal" tabindex="-1" role="dialog" 
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <button type="button" class="close" 
                       data-dismiss="modal">
                           <span aria-hidden="true">&times;</span>
                           <span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">
                        Modal title
                    </h4>
                </div>
                
                <!-- Modal Body -->
                <div class="modal-body">
                    
                    <form class="form-horizontal" role="form">
                      <div class="form-group">
                        <label  class="col-sm-2 control-label"
                                  for="inputEmail3">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" 
                            id="inputEmail3" placeholder="Email"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label"
                              for="inputPassword3" >Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control"
                                id="inputPassword3" placeholder="Password"/>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                                <input type="checkbox"/> Remember me
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                      </div>
                    </form>
                    
                </div>
                
                <!-- Modal Footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                                Close
                    </button>
                    <button type="button" class="btn btn-primary">
                        Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
  </div>

  <?php
    // var_dump($model);exit;
    //  $row = [];

    //  foreach ($model as $key => $value) {
    //    //var_dump($value['customername']);exit;
    //    $row[] = $value['customername'];
    //  }
      
    //  echo AutoComplete::widget([
    //     'model' => $model,
    //     'attribute' => 'country',
    //     'clientOptions' => [
    //         'source' => ['Ram', 'Ram1', 'Ram2', 'Ram3', 'Ram4', 'Ram5'],
    //     ],
    // ]);
    ?>
    
   <div class="row">
      <div class="col-md-12">
          <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped">
                  <thead>
                      <tr>
                          <th>Date</th>
                          <th>D.R. # / O.R #</th>
                          <th>Charge</th>
                          <th>Payment</th>
                          <th>Balance</th>
                          <th>Remarks</th>
                          <th>Collector</th>
                      </tr>
                  </thead>
                  <tbody>
                      <tr class="active">
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                      </tr>
                      <tr class="success">
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                      </tr>
                      <tr class="warning">
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                      </tr>
                      <tr class="danger">
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                      </tr>
                      <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                      </tr>
                      <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                      </tr>
                      <tr>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <<td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                          <td>&nbsp;</td>
                      </tr>
                  </tbody>
              </table>
          </div>
      </div>
  </div>
  <!-- /.row -->



</div>
