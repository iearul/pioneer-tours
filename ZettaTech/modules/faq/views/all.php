<style>
    .zt-faq{
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
                                        All FAQ
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                                <th>FAQ Question</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($faqs as $faq):?>
                                            <tr>
                                                <td><?=$faq->q_english?></td>
                                                <td><?=$faq->category?></td>
                                                <td><?php echo anchor("faq/edit/".$faq->url, 'Edit') ;?> | <?php echo anchor("faq/delete/".$faq->url, 'Delete', array('onclick' => 'if(confirm(\'Are you sure to Delete This FAQ Question.\'))return true; return false;')) ;?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>

