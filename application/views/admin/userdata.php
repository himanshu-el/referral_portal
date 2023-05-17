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

<div class="all_post">
  <div class="container">
    <h3>ALL Users Data</h3>
    <hr>

    <?php
    if ($this->session->flashdata('success')) {
      echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
      unset($_SESSION['success']);

    } else if ($this->session->flashdata('error')) {
      echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
      unset($_SESSION['error']);

    }


    ?>
    

      <div class="row">
        <div class="col-md-12">

          <div class="card-box table-responsive">

            <table id="lowinventory" data-order='[[ 0, "desc" ]]' style="width:100%" class="table table-striped table-bordered table_shop_custom display">
              <thead>
                <tr>

                  <th>Sr. No.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Number</th>
                  <th>Addmission</th>
                  <th>OPD</th>
                  <th>Diagnosis only</th>
                  <th>National Id</th>
                  <th>Speciality</th>
                  <th>History and clinical findings</th>
                  <th>Laboratory</th>
                  <th>History and clinical findings</th>
                  <th>Report Description</th>
                  <th>Other Description</th>
                  
                  <th>Action</th>

                </tr>

              </thead>
              <tbody>
                <?php foreach ($list as $value) { ?>
                  <tr>
                   
                    <td><?php echo $value['id']; ?></td>
                      <td><?php echo $value['name']; ?></td>
                      <td><?php echo $value['email']; ?></td>
                      <td><?php echo $value['number']; ?></td>
                     
                      <td><?php if($value['admission'] == 1){echo 'yes';}else{ echo 'no';}?></td>
                      <td><?php if($value['opd'] == 1){echo 'yes';}else{ echo 'no';}?></td>
                      <td><?php if($value['diagnosis_only'] == 1){echo 'yes';}else{ echo 'no';}?></td>
                      <td><?php echo $value['national_id']; ?></td>
                      
                      <td><?php echo $value['speciality']; ?></td>
                      <td><?php echo $value['history']; ?></td>
                      <td><?php echo $value['laboratory']; ?></td>
                      <td><?php echo $value['clinical_finding']; ?></td>
                      
                      <td><?php echo $value['report_description']; ?></td>
                      <td><?php echo $value['other_investigation']; ?></td>
                     
                      <td><a class="delete_sliders" data-id="<?php echo $value['id']?>"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                    </form>
                  </tr>

                <?php } ?>
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
    <?php echo form_open(base_url('admin/userdata/deletecontactdetail'), array('method' => 'post')); ?>
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title">Delete User Data</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <input type="hidden" class="deletesliderId" name="deletesliderId" />
            <h4><b>Do you really want to Delete this User Data ?</b></h4>
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