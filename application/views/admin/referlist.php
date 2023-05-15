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

<?php 
    $refer_list = $this->db->get('patient')->result_array();
?>

<div class="all_post">
  <div class="container">
    <h3>Refer Patient List</h3>
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
            <table id="lowinventory" style="width:100%" class="table table-striped table-bordered table_shop_custom display">
              <thead>
                <tr>
                        <th>Sr. No.</th>
                        <th>Doctor / Hospital Name</th>
                        <th>Doctor/Hospital No.</th>
                        <th>Doctor/Hospital email</th>
                        <th>Doctor/Hospital Refer Code</th>
                        <th>Referral Number</th>
                        <th>Refferal date</th>
                        <th>Refferal Type</th>
                        <th>Patient Name</th>
                        <th>Mobile Number</th>
                        <th>Email Id</th>
                        <th>National Id</th>
                        <th>Xray</th>
                        <th>MRI</th>
                        <th>Ct scan</th>
                        <th>Ultra Sound</th>
                        <th>Echo Scan</th>
                        <th>Branch Code</th>
                        <!-- <th>pecialitycode</th> -->
                        <th>Clinical Notes</th>
                        <th>Labtest Details</th>
                        <th>Radiology Notes</th>
                        <th>Other Investigation</th>
     

                </tr>

              </thead>
              <tbody>
               
                   
                  <?php $i = 1; foreach($refer_list as $value){?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <?php $doctor_data = $this->db->where('id',$value['username'])->get('doctor')->result_array();
                            foreach($doctor_data as $doctor){?>
                        <td><?php echo $doctor['name']?></td>
                        <td><?php echo $doctor['number']?></td>
                        <td><?php echo $doctor['email']?></td>
                        <td><?php echo $doctor['refer_code']?></td>
                        <?php }?>


                        <td><?php echo $value['referralno'] ?></td>
                        <td><?php echo $value['referraldate'] ?></td>
                        <td><?php if($value['referraltype'] == 1){ echo "OPD";}elseif($value['referraltype'] == 2){echo "ADDMISSION";}elseif($value['referraltype'] == 3){echo "DIAGNOSIS ONLY";}else{echo "N/A";}?></td>
                        <td><?php echo $value['patientfirstname'].' '.$value['patientmiddlename'].' '.$value['patientlastname']  ?></td>
                        <td><?php echo $value['mobileno'] ?></td>
                        <td><?php echo $value['emailid']?></td>
                        <td><?php echo $value['nationalid'] ?></td>
                        <td><?php echo $value['xray'] ?></td>
                        <td><?php echo $value['mri'] ?></td>
                        <td><?php echo $value['ctscan'] ?></td>
                        <td><?php echo $value['ultrasound'] ?></td>
                        <td><?php echo $value['echoscan'] ?></td>
                        <td><?php echo $value['branchcode'] ?></td>
                       
                        <td><?php echo $value['clinicalnotes'] ?></td>

                        <td><?php echo $value['labtestdetails'] ?></td>
                        <td><?php echo $value['radiologynotes'] ?></td>
                        <td><?php echo $value['otherinvestigation'] ?></td>

                      
                    </tr>
                    <?php $i++;}?>
                  
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