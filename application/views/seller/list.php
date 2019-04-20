<!--page content -->
<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Seller<small>List</small></h2>
                    <a href="<?php echo base_url();?>seller/add"><button class="btn btn-primary pull-right">Add New</button></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
					
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Seller name</th>
                          <th>Email</th>
                          <!-- <th>Image</th> -->
                          <th>Phone</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php foreach ($sellers as $value) {
                        if($value->admin_id!=1){  ?>
                        <tr>
                          <td><?php echo $value->name; ?></td>
                          <td><?php echo $value->email; ?></td>
                          <!-- <td><?php echo $value->pimage; ?></td> -->
                          <td><?php echo $value->phone; ?></td>
                          <td>
                          	<a title="Edit" class="btn btn-xs btn-primary" href="<?php echo base_url();?>seller/edit/<?php echo''.$value->admin_id.'';?>" data-toggle="modal"><span class="fa fa-edit"></span></a>
                                                   
                          	<a class="btn btn-xs btn-danger" href="#<?php echo'' .$value->admin_id.'';?>" title="Delete" onclick="" data-toggle="modal" data-target="">
                          	<i class="fa fa-remove" aria-hidden="true"></i></a>
                          	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->

                  <div class="modal fade bs-example-modal-lg" id="<?php echo'' .$value->admin_id.'';?>" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">

                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        </div>
                        <div class="modal-body">
                          <h4>Delete Record</h4>
                          <p>Are You Sure to Delete This Record?.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          <a href="<?php echo base_url();?>seller/delete/<?php echo $value->admin_id;?>"><button type="button" class="btn btn-primary">Yes</button></a>
                        </div>

                      </div>
                    </div>
                  </div>
                          </td>
                        </tr>
                    <?php } } ?>
                      </tbody>
                    </table>
					
					
                  </div>
                </div>
              </div>
</div>
<!-- /page content