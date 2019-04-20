<!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="row top_tiles">
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-mobile"></i></div>
                  <div class="count"><?php
                  $this->db->select('*');
                  $this->db->from('phone');
                  $this->db->where('delete_status',0);
                  $query=$this->db->get();
                  echo $query->num_rows();
                  ?></div>
                  <h3>Phones</h3>
                  <p>No. of Phones Available.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-clone"></i></div>
                  <div class="count"><?php
                  $this->db->select('*');
                  $this->db->from('accessory');
                  $this->db->where('delete_status',0);
                  $query=$this->db->get();
                  echo $query->num_rows();
                  ?></div>
                  <h3>Accessories</h3>
                  <p>No. of Accessories Available.</p>
                </div>
              </div>
              <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-sort-amount-desc"></i></div>
                  <div class="count"><?php
                  $this->db->select('*');
                  $this->db->from('part');
                  $this->db->where('delete_status',0);
                  $query=$this->db->get();
                  echo $query->num_rows();
                  ?></div>
                  <h3>Parts</h3>
                  <p>No. of Parts Available.</p>
                </div>
              </div>
              <!-- <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="tile-stats">
                  <div class="icon"><i class="fa fa-check-square-o"></i></div>
                  <div class="count">179</div>
                  <h3>New Sign ups</h3>
                  <p>Lorem ipsum psdea itgum rixt.</p>
                </div>
              </div> -->
            </div>
          </div>
        </div>
        <!-- /page content -->