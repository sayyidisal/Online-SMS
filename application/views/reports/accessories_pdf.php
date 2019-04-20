<!DOCTYPE html>
<html>
<head>
  <title>Accessories Stock Report  </title>
  <style type="text/css">
    .table td{
      /*border: 1px solid black;*/
    }
    .table th{
      /*border: 1px solid black;*/
      background-color: #4a4847;
      color:white;
    }
    .table{
      margin: 10px;
    }
    .footerpad
    {
      padding: 4px;
    }
    .footerpad{
      padding: 5px;
    }
  </style>
</head>
<body>
  <table style="border:0px solid black;margin: 0px; width:100%; font-size: 14px;height:100%; font-family: arial;">
      <tr><td>
        <div class="col-sm-4 invoice-col" align="right">
        <img src="<?php echo base_url(); ?>assets/profile/<?php echo $admin->image;?>" style="width: 100px;">
        </div>
      </td><td align="right"><h2>Accessories Stock Report</h2></td></tr>
              <tr>
                <td class="col-md-7">
                </td>
              <!--  <td class="text-right">
                  <div class="col-md-4">
              <b><h2>INVOICE</h2>
            </div><br><br>
                </td> -->
                <td  class="text-right" align="right">
              <div class="col-md-4"> 
              <address>
              <strong><?php echo $admin->company; ?></strong><br>
              Address: <?php echo $admin->address;?><br>
               Phone: <?php echo $admin->phone;?><br>
              Email: <?php echo $admin->email;?><br>
              
            </address>
            </div>
                </td>
                </tr>
                      
                    </table>

  <br><br>
  <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table" width="100%" border="1">
            <thead>
                        <tr>
                          <th width="10%">Sr No.</th>
                          <th>Accessories name</th>
                          <th>Quantity</th>
                          <!-- <th>Image</th> -->
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i=1; foreach ($phones as $value) { ?>
                        <tr>
                          <td><?php echo $i; $i++; ?></td>
                          <td><?php echo $value->aname; ?></td>
                          <td><?php echo $value->quantity; ?></td>
                          <!-- <td><?php echo $value->pimage; ?></td> -->
                          <td><?php echo $value->price; ?></td>
                        </tr>
                    <?php } ?>
                      </tbody>
          </table>


        </div>
        <!-- /.col -->
      </div>
</div>
</body>
</html>