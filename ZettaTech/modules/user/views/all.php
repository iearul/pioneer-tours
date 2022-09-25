<?php
        /**
         * 
         * @copyright	Copyright (c) 2017 Zettabyte Technologies.
         * @Created     19/03/2017
         * @version 	1.0.0
         * @link	http://zettatech.io/
         * 
	 */
?>
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
                                        All Users
                                </div>
                        </div>
                        <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover" id="sample_1">
                                    <thead>
                                        <tr>
                                                <th><?php echo lang('index_fname_th');?></th>
                                                <th><?php echo lang('index_lname_th');?></th>
                                                <th><?php echo lang('index_email_th');?></th>
                                                <th><?php echo lang('index_groups_th');?></th>
                                                <th><?php echo lang('index_status_th');?></th>
                                                <th><?php echo lang('index_action_th');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($users as $single_user):?>
                                            <?php if($single_user->id != 1){ ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($single_user->first_name,ENT_QUOTES,'UTF-8');?></td>
                                                <td><?php echo htmlspecialchars($single_user->last_name,ENT_QUOTES,'UTF-8');?></td>
                                                <td><?php echo htmlspecialchars($single_user->email,ENT_QUOTES,'UTF-8');?></td>
                                                <td>
                                                    <?php foreach ($single_user->groups as $group):?>
                                                            <?php echo anchor("user/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br />
                                                    <?php endforeach?>
                                                </td>
                                                <td><?php echo ($single_user->active) ? anchor("user/deactivate/".$single_user->username, lang('index_active_link'),array('onclick' => 'if(confirm(\'Are you sure to Block this User.\'))return true; return false;')) : anchor("user/activate/". $single_user->username, lang('index_inactive_link'));?></td>
                                                <td><?php echo anchor("user/edit/".$single_user->username, 'Edit') ;?></td>
                                            </tr>
                                            <?php } ?>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                        </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->
        </div>
</div>



