<!--page content -->
<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Part<small>Stock</small></h2>
                    <a href="<?php echo base_url();?>stock/addpart"><button class="btn btn-primary pull-right">Add New</button></a>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
          
                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Part name</th>
                          <th>Phone Model</th>
                          <!-- <th>Image</th> -->
                          <th>Price</th>
                          <th>Quantity</th>
                          <th>Warranty period</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($phones as $value) { ?>
                        <tr>
                          <td><?php echo $value->partname; ?></td>
                          <td><?php echo $value->parttype; ?></td>
                          <!-- <td><?php echo $value->pimage; ?></td> -->
                          <td><?php echo $value->price; ?></td>
                          <td><?php echo $value->quantity; ?></td>
                          <td><?php echo $value->warranty; ?></td>
                          <td>
                            <a title="Edit" class="btn btn-xs btn-primary" href="<?php echo base_url();?>stock/editpart/<?php echo''.$value->id.'';?>" data-toggle="modal"><span class="fa fa-edit"></span></a>
                                                   
                            <a class="btn btn-xs btn-danger" href="#<?php echo'' .$value->id.'';?>" title="Delete" onclick="" data-toggle="modal" data-target="">
                            <i class="fa fa-remove" aria-hidden="true"></i></a>
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> -->

                  <div class="modal fade bs-example-modal-lg" id="<?php echo'' .$value->id.'';?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                          <a href="<?php echo base_url();?>stock/deletepart/<?php echo $value->id;?>"><button type="button" class="btn btn-primary">Yes</button></a>
                        </div>

                      </div>
                    </div>
                  </div>
                          </td>
                        </tr>
                    <?php } ?>
                      </tbody>
                    </table>
          
          
                  </div>
                </div>
              </div>
</div>
<!-- /page content