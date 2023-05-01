<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

<div class="content">
    <div class="container">
        <div class="">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Referral Number</th>
                        <th>Refferal date</th>
                        <th>Refferal Type</th>
                        <th>Patient Name</th>
                        <th>Mobile Number</th>
                        <th>National Id</th>
                        <th>Patient Visited</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- <?php $i = 1; foreach($refer_list as $value){?>
                    <tr>
                        <td><?php echo $i;?></td>
                        <td><?php echo $value->REFERALNUMBER?></td>
                        <td><?php echo $value->REFERALDATE?></td>
                        <td><?php echo $value->REFERALTYPE?></td>
                        <td><?php echo $value->PATIENTNAME?></td>
                        <td><?php echo $value->MOBILENUMBER?></td>
                        <td><?php echo $value->NATIONALID?></td>
                        <td><?php echo $value->PATIENTVISITED?></td>
                    </tr>
                    <?php $i++;}?> -->
                    
                </tbody>
            </table>

        </div>
    </div>
</div>





<script>
  $(document).ready(function() {
    $('#example').DataTable( {
        "ajax": "<?php echo base_url(); ?>frontend/user/referlist/referlist"
    } );

});

  </script>