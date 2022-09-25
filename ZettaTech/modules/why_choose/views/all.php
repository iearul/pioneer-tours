<style>
    .zt-why_choose{
        max-height: 100px;
        max-width: 200px;
    }
</style>    
<div class="row">
        <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet light bordered">
                        <div class="portlet-title">
                                <div class="caption">
                                        Why Choose US
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                                <th>Title</th>
                                                <th>Icon</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($why_chooses as $why_choose):?>
                                            <tr>
                                                <td><?=$why_choose->t_english?></td>
                                                <td><i class="<?=$why_choose->icon?>"></i></td>
                                                <td><?php echo anchor("why_choose/edit/".$why_choose->url, 'Edit') ;?> | <?php echo anchor("why_choose/delete/".$why_choose->url, 'Delete', array('onclick' => 'if(confirm(\'Are you sure to Delete This Why Choose US.\'))return true; return false;')) ;?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>

<script src="https://kit.fontawesome.com/d1f5d6e6d9.js" crossorigin="anonymous"></script>