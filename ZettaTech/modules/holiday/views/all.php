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
                                        All Holidays
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-responsive"  id="sample_1">
                                    <thead>
                                        <tr>
                                                <th>Title</th>
                                                <th>Date<span style="color: #b5b5b5;font-size: 10px;padding-left: 5px;">(YYYY/MM/DD)</span></th>
                                                <th>Repeat</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($holidays as $holiday):?>
                                            <tr>
                                                <td><?=$holiday->title?></td>
                                                <td><?=date('Y/m/d' ,$holiday->date)?></td>
                                                <td><?=($holiday->rept ? 'Yes' : 'No')?></td>
                                                <td><?php echo anchor("holiday/delete/".$holiday->url, 'Delete', array('onclick' => 'if(confirm(\'Are you sure to Delete This Holiday.\'))return true; return false;')) ;?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>

