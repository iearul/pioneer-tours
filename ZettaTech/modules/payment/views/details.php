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

<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                        <div class="portlet-title">
                                <div class="caption">
                                        Order ID <?=$order->url?>
                                </div>
                        </div>
                        <div class="portlet-body form">
                                <form class="form-horizontal">
                                        <div class="form-body">
                                                <div class="form-group">
                                                        <label class="control-label col-md-3">Full Name</label>
                                                        <div class="col-md-4"  style="padding-top: 7px;">
                                                            <span> <?=$order->full_name?> </span>
                                                        </div>
                                                </div>    
                                                <div class="form-group">
                                                        <label class="control-label col-md-3">Email</label>
                                                        <div class="col-md-4"  style="padding-top: 7px;">
                                                            <span> <?=$order->email?> </span>
                                                        </div>
                                                </div>    
                                                <div class="form-group">
                                                        <label class="control-label col-md-3">Phone</label>
                                                        <div class="col-md-4"  style="padding-top: 7px;">
                                                            <span> <?=$order->phone?> </span>
                                                        </div>
                                                </div>    
                                                <div class="form-group">
                                                        <label class="control-label col-md-3">Total</label>
                                                        <div class="col-md-4"  style="padding-top: 7px;">
                                                            <span> <?=$order->total?> </span>
                                                        </div>
                                                </div>    
                                        </div>
                                </form>
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
                                        All Tour
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                                <th>Tour ID</th>
                                                <th>Adult</th>
                                                <th>Student</th>
                                                <th>Child</th>
                                                <th>Language</th>
                                                <th>Time</th>
                                                <th>Download Ticket</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($order_details as $order_detail) { ?>
                                            <tr>
                                                <td><?=$order_detail->tourID?></td>
                                                <td><?=$order_detail->adult_qty?></td>
                                                <td><?=$order_detail->student_qty?></td>
                                                <td><?=$order_detail->child_qty?></td>
                                                <td><?=(!empty($order_detail->language) ? $order_detail->language : '')?></td>
                                                <td><?=$order_detail->time?></td>
                                                <td><?php echo anchor("order/downloadTicket/".$order_detail->url, 'Download') ;?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>





















