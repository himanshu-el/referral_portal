

<?php 

    $newData = $refer_data['newData'];
    $refer_list = $refer_data['refer_list'];
?>

<div class="content">
    <div class="container">
        <div class="table-responsive">
            <table id="example" class="table table-striped " style="width:100%" >
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Referral Number</th>
                        <th>Refferal date</th>
                        <th>Refferal Type</th>
                        <th>Patient Name</th>
                        <th>Mobile Number</th>
                        <th>Email Id</th>
                        <th>National Id</th>
                        <th>Speciality</th>
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
                        <th>Patient Visited</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                </tbody>
            </table>

        </div>
    </div>
</div>




<script src="<?php echo base_url()?>assets/js/ajaxjquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "<?php echo base_url(); ?>frontend/user/referlist/referlist"
    } );

});

  </script>