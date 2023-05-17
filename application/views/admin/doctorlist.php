<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>


<style type="text/css">
  a.edit {
    display: none;
  }


  .btn-group,
  .btn-group-vertical {
    float: right;
  }

  .btn {
    color: #4e73df;
  }

  #lowinventory_filter label {
    color: grey;
    font-size: 15px;
  }

  #lowinventory_filter input[type=search] {
    border: 1px solid grey;
    outline: none;
    padding: 5px;
    font-size: 15px;
    margin-right: 5px;
  }

  .buu {
    width: 15rem;
    color: white !important;
    background-color: rgb(239, 69, 84);
    border: none;
    outline: none !important;
    padding-top: 1rem;
    padding-bottom: 1rem;
    font-size: 14px;
    margin-bottom: 1rem;
  }

  img {
    width: 70px;
    height: 70px;
  }
</style>

<?php $speciality_list = $this->db->get('speciality')->result_array();?>

<div class="all_post">
  <div class="container">
    <h3>ALL Doctor / Hospital Data</h3>
    <hr>

    <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
    ?>
    

      <div class="row">
        <div class="col-md-12">
          <div class="card-box table-responsive">
            <table id="lowinventory" data-order='[[ 0, "desc" ]]' style="width:100%" class="table table-striped table-bordered table_shop_custom display">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>User Type</th>
                  <th>Refer Code</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Number</th>
                  <th>Speciality</th>
                  <th>Address Line 1</th>
                  <th>Address Line 2</th>
                  <th>Address Line 3</th>
                  <th>city</th>
                  <th>Po Box</th>
                  <th>Payment Method</th>
                  <th>Account Number</th>
                  <th>Regsiterd Name</th>
                  <th>Pay Bill Number</th>
                  <th>Bank Name</th>
                  <th>Branch Code</th>
                  <th>Other Bank</th>
                  <th>Joining Date</th>
                  
                  <th>Action</th>

                </tr>

              </thead>
              <tbody>
                <?php $i=1; foreach ($list as $value) { ?>
                  <tr>
                   
                    <td><?php echo $i; ?></td>
                      <td><?php echo $value['userType']; ?></td>
                      <td><?php echo $value['refer_code']; ?></td>
                      <td><?php echo $value['name']; ?></td>
                      <td><?php echo $value['email']; ?></td>
                      <td><?php echo $value['number']; ?></td>
                     
                      <td><?php

                          $specialityIDS = $value['speciality'];

                          $createArray = explode(',', $specialityIDS);
                          $length = count($createArray);

                          foreach($speciality_list as $speciality){
                            for($i=0; $i<$length; $i++){
                              if($speciality['id'] == $createArray[$i]){
                                if($i == 0){
                                    echo $speciality['speciality_name'];
                                }else{
                                    echo ', '.$speciality['speciality_name'];
                                }
                            }
                            }
                          }
                        ?></td>
                      <td><?php echo $value['address1']?></td>
                      <td><?php echo $value['address2']?></td>
                      <td><?php echo $value['address3']?></td>
                      <td><?php echo $value['city']?></td>
                      <td><?php echo $value['po_box']?></td>

                      <td><?php echo $value['payment_method']?></td>
                      <td><?php echo $value['account_number']; ?></td>
                      
                      <td><?php echo $value['regitered_name']; ?></td>
                      <td><?php echo $value['pay_bill_number']; ?></td>
                      <td><?php echo $value['bank_name']; ?></td>
                      <td><?php echo $value['branch_code']; ?></td>
                      
                      <td><?php echo $value['other_bank']; ?></td>
                      <td><?php echo $value['created_on']; ?></td>
                     
                      <td><a class="delete_sliders" data-id="<?php echo $value['id']?>"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </form>
                  </tr>

                <?php $i++;} ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

  </div>
</div>






<!--Delete-->

<!--Delete-->

<div id="deletePurchaseModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <?php echo form_open(base_url('admin/doctorlist/deletecontactdetail'), array('method' => 'post')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title">Delete Doctor / Hospital Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="deletesliderId" name="deletesliderId" />
            <h4><b>Do you really want to Delete this Doctor / Hospital Data ?</b></h4>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-info" name="deleteslider" value="Delete">
      </div>
    </div>
    <?php echo form_close(); ?>
  </div>
</div>


<script>
  $(document).ready(function() {
    $('#lowinventory').DataTable({
     
    });


    $(document).on('click', '.delete_sliders', function() {

      $('.deletesliderId').val($(this).attr('data-id'));
      $('#deletePurchaseModal').modal('show');

    });

  });
</script>