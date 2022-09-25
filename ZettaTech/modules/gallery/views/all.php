<style>
    .zt-gallery{
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
                                        All Gallery Images
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                                <th>Image</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($gallerys as $gallery):?>
                                            <tr>
                                                <td><img src="uploads/contents/<?=$gallery->image?>" class="zt-gallery"></td>
                                                <td><?php echo anchor("gallery/edit/".$gallery->url, 'Edit') ;?> | <?php echo anchor("gallery/delete/".$gallery->url, 'Delete', array('onclick' => 'if(confirm(\'Are you sure to Delete This Gallery.\'))return true; return false;')) ;?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>

