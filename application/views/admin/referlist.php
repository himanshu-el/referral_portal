<!-- <link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script> -->


<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>


<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.0.2/js/dataTables.dateTime.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.0.2/css/dataTables.dateTime.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css" />

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />


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
  .doctor_select{
    border:1px solid #cdcdcd;
    border-radius:6px;
    padding:.5rem;
    margin-bottom:2rem;
  }
  .dt-button{
    padding:0px !important;
    margin:0px !important;
    background:transparent !important;
    border:none !important;
  }
  .excel_button{
    width:7rem;
    height:auto;
    padding:.5rem 1rem;
    border:1px solid #1d6f42;
    border-radius:6px;
    background-color:#1d6f42;
    color:white;
    margin-right:.5rem;
  }
  .flex{
    width:100%;
    height:auto;
    display:flex;
    margin-top:-4rem;
  }
  .flex .card{
    width:50%;
    height:auto;
    background:transparent;
    border:none;
    padding-left: 0.5em;
  }
  .date_class{
    width:100%;
    height:auto;
    padding:.5rem;
    /* margin:1rem; */
    border:1px solid #cdcdcd;
    outline:none;
    border-radius:6px;
  }
</style>

<?php 
    $refer_list = $this->db->get('patient')->result_array();

    $doctor_list = $this->db->get('doctor')->result_array();

?>

<div class="all_post">
  <div class="container">
    <h3>Refer Patient List</h3>
    <hr>



     

    <h4>Fillter Doctor / Hospital Name</h4>
        <div class="date_filter">
            <div class="row">
                <div class="col-md-5">
                    <!-- <input type="text"  name="min" id="min"  placeholder="Enter First date" autocomplete="off"/>  -->
                    
                    <select class="doctor_select" name="filterdoctor" id="filterdoctor">
                        <option value="">Please Select Doctor / Hospital </option>
                        <?php foreach($doctor_list as $doctors){?>
                        <option value="<?php echo $doctors['id']?>"><?php echo $doctors['name']?> (<?php echo $doctors['email']?>)</option>
                        <?php }?>
                    </select>
                </div>
                <div class="col-md-7">
                  <div class="flex">
                        <div class="card">
                            <h4 for="">Strat Date</h4>
                            <input type="text" class="date_class" name="min" id="min"  placeholder="Enter First date" autocomplete="off"/>
                        </div>
                        <div class="card">
                            <h4 for="">End Date</h4>
                            <input type="text" name="max" class="date_class" id="max" placeholder="Enter Second date" autocomplete="off"/>
                        </div>
                    </div>
                </div>
            </div>    
          
          
        </div> 
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
            <table id="lowinventory" style="width:100%" class="table table-striped table-bordered table_shop_custom display">
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
                        <th>Doctor / Hospital Name</th>
                        <th>Doctor/Hospital No.</th>
                        <th>Doctor/Hospital email</th>
                        <th>Doctor/Hospital Refer Code</th>

                </tr>

              </thead>
              <tbody>
                  
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


<!-- <script>
  $(document).ready(function() {
    $('#lowinventory').DataTable({
     
    });


    $(document).on('click', '.delete_sliders', function() {

      $('.deletesliderId').val($(this).attr('data-id'));
      $('#deletePurchaseModal').modal('show');

    });

  });
</script> -->


 
<script type="text/javascript">
	$(document).ready(function(){
	   	var userDataTable = $('#lowinventory').DataTable({
	      	'processing': true,
	      	'serverSide': true,
	      	'serverMethod': 'post',
	      	'pageLength':25,
	      	'ajax': {
	          'url':'<?=base_url()?>admin/referlist/addinventory_api',
	          'data': function(data){
	          		data.doctorId = $('#filterdoctor').val();
	          		data.startDate = $('#min').val();
	          		data.endDate = $('#max').val();
	          }
	      	},
	      	dom: 'Bfrtip',
            "buttons": [
                {
                    "extend": 'excel',
                    "text": '<button class="excel_button">Excel</button>',
                    "titleAttr": 'Excel',
                    "action": newexportaction,
                    "exportOptions": {
                        columns: ':not(:last-child)',
                    },
                    "filename": function () {
                        return 'Refer Patient List';
                    },
                },
                            
                {
                    "extend": 'csv',
                    "text": '<button class="excel_button" >Csv</button>',
                    "titleAttr": 'Csv',
                    "action": newexportaction,
                    "exportOptions": {
                        columns: ':not(:last-child)',
                    },
                    "filename": function () {
                      return 'Refer Patient List';
                    },
                },
                {
                    "extend": 'pdfHtml5',
                    "text": '<button class="excel_button" >Pdf</button>',
                    "titleAttr": 'Pdf',
                    "orientation" : 'landscape',
                    "pageSize" : 'A2',

                    "action": newexportaction,
                    "exportOptions": {
                        columns: ':not(:last-child)',
                    },
                    "filename": function () {
                      return 'Refer Patient List';
                    },
                }
            ],
	      	
	   	});

	   	$('#min,#max').change(function(){
	   		userDataTable.draw();
	   	});

       $('#filterdoctor').change(function(){
	   		userDataTable.draw();
	   	});
	   	
	   	
	   	function newexportaction(e, dt, button, config) {
            var self = this;
            var oldStart = dt.settings()[0]._iDisplayStart;
            dt.one('preXhr', function (e, s, data) {
                // Just this once, load all data from the server...
                data.start = 0;
                data.length = 2147483647;
                dt.one('preDraw', function (e, settings) {
                    // Call the original action function
                    if (button[0].className.indexOf('buttons-copy') >= 0) {
                        $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                        $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                        $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                        $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                    } else if (button[0].className.indexOf('buttons-print') >= 0) {
                        $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                    }
                    dt.one('preXhr', function (e, s, data) {
                        // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                        // Set the property to what it was before exporting.
                        settings._iDisplayStart = oldStart;
                        data.start = oldStart;
                    });
                    // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                    setTimeout(dt.ajax.reload, 0);
                    // Prevent rendering of the full data to the DOM
                    return false;
                });
            });
            // Requery the server with the new one-time export settings
            dt.ajax.reload();
        };
	});
	
	

</script>


<script>
$(function() {
  $('#min').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    locale: {
        format: 'DD/MM/YYYY'
    }
  
  }, function(start, end, label) {
   
  });
});
</script>

<script>
$(function() {
  $('#max').daterangepicker({
    singleDatePicker: true,
    showDropdowns: true,
    minYear: 1901,
    locale: {
        format: 'DD/MM/YYYY'
    }
  }, function(start, end, label) {
    
  });
});
</script>
