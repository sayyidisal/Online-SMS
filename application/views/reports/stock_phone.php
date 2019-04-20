<!--page content -->
<div class="right_col" role="main">
<div class="col-md-12 col-sm-12 col-xs-12">
  <a href="#phone_report"  data-toggle="modal" data-target=""><img  src="<?php echo base_url();?>assets/phone_stock.png"></a>
    </div>
    <div class="modal fade bs-example-modal-lg" id="phone_report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
<?php $modal=$this->db->select('*')->from('modal')->where('id',1)->get()->row();
 ?>
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"><?php echo $modal->header; ?></h4>
          </div>
          <div class="modal-body">
            <h4><?php echo $modal->title; ?></h4>
            <p><?php echo $modal->description; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
</div>
<!-- /page content