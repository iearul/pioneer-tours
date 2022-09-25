<?php
        /**
         * 
         * @copyright	Copyright (c) 2017 Zettabyte Technologies.
         * @author      Tanveer Ahmed Ivan
         * @version 	1.0.0
         * @Edited	01/14/2018
         * @link	http://zettatech.io/
         * 
	 */
?>
<link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
<script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
<script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="assets/pages/scripts/table-datatables-rowreorder.min.js" type="text/javascript"></script>
<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                        <div class="portlet-title">
                                <div class="caption">
                                        Payment Search  <?=((!empty($from) && !empty($to)) ? "From ".$from.' To '.$to : '' )?>
                                </div>
                        </div>
                        <div class="portlet-body form">
                                <?=form_open("payment/all", array('class' => 'form-horizontal'))?>
                                        <div class="form-body">
                                                <div class="form-group">
                                                        <label class="control-label col-md-3">Date Range</label>
                                                        <div class="col-md-4">
                                                                <div class="input-group input-large date-picker input-daterange" data-date="2012/11/13" data-date-format="yyyy/mm/dd">
                                                                        <input type="text" class="form-control" value="<?=$from?>" name="from">
                                                                        <span class="input-group-addon">
                                                                        to </span>
                                                                        <input type="text" class="form-control" value="<?=$to?>" name="to">
                                                                </div>
                                                                <!-- /input-group -->
                                                                <span class="help-block">
                                                                Select date range for view specific reports</span>
                                                        </div>
                                                </div>    
                                                <?php if(!empty($total_amount)){ ?>
                                                <div class="form-group">
                                                        <label class="control-label col-md-3">Total Amount</label>
                                                        <div class="col-md-4"  style="padding-top: 7px;">
                                                            <span> <?=$total_amount?> </span>
                                                        </div>
                                                </div>    
                                                <?php } ?>
                                        </div>
                                        <div class="form-actions">
                                                <div class="row">
                                                        <div class="col-md-offset-3 col-md-9">
                                                                <button type="submit" class="btn green">Search</button>
                                                                <button type="reset" class="btn default">Reset</button>
                                                        </div>
                                                </div>
                                        </div>
                                <?php echo form_close();?>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>
<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                        <div class="portlet-title">
                                <div class="caption">
                                        All Payments <?=((!empty($from) && !empty($to)) ? "From ".$from.' To '.$to : '' )?>
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-responsive" id="sample_1">
                                    <thead>
                                        <tr>
                                                <th>Payment Time</th>
                                                <th>Client Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Sub Total</th>
                                                <th>Fees</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($payments as $payment) { ?>
                                            <tr>
                                                <td><?=date('Y/m/d H:i' ,$payment->PaymentTime)?></td>
                                                <td><?=$payment->full_name?></td>
                                               <td><?=$payment->email?></td>
                                               <td><?=$payment->phone?></td>
                                               <td><?= number_format($payment->total-$payment->fees,2)?></td>
                                               <td><?=$payment->fees?></td>
                                               <td><?=$payment->total?></td>
                                               <td><?php echo anchor("payment/details/".$payment->url, 'Detail') ;?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>





















