<style>
    .zt-tour{
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
                                        All Tours
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-responsive">
                                    <thead>
                                        <tr>
                                                <th>Tour Type</th>
                                                <th>Tour Title</th>
                                                <th>Price Adult</th>
                                                <th>Price Student</th>
                                                <th>Price Children</th>
                                                <th>Time</th>
                                                <th>Featured</th>
                                                <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tours as $tour):?>
                                            <tr>
                                                <td><?=$tour->type?></td>
                                                <td><?=$tour->t_english?></td>
                                                <td><?=$tour->price_adult?></td>
                                                <td><?=$tour->price_student?></td>
                                                <td><?=$tour->price_child?></td>
                                                <td>
                                                    <?php
                                                        $times = json_decode($tour->tour_time, true);
                                                        foreach ($times as $key => $language){
                                                            if($tour->type == 'Regular Tour')
                                                                echo $key.'<br>';
                                                            foreach ($language as $time)
                                                                echo $time.'<br>';
                                                        }
                                                    ?>
                                                </td>
                                                <td><?php echo ($tour->featured) ? anchor("tour/un_featured/".$tour->url, 'Yes', array('onclick' => 'if(confirm(\'Are you sure to Un-Featured this Tour.\'))return true; return false;')) : anchor("tour/featured/".$tour->url, 'No');?></td>
                                                <td><?php echo anchor("tour/edit/".$tour->url, 'Edit') ;?> | <?php echo anchor("tour/delete/".$tour->url, 'Delete', array('onclick' => 'if(confirm(\'Are you sure to Delete This Tour.\'))return true; return false;')) ;?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>

