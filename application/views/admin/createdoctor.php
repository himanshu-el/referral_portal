<link href="<?php echo base_url(); ?>admin/assets/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>admin/assets/css/core.css" rel="stylesheet" type="text/css" />

<script src="<?php echo base_url(); ?>admin/assets/js/jquery.dataTables.min.js"></script>


<style>
    .new-post {
        width: 100%;
        height: auto;
        padding-top: 2rem;
        padding-bottom: 2rem;

    }

    .new-post .box {
        width: 100%;
        height: auto;
        background-color: white;
        box-shadow: 0 3px 3px -2px rgb(0 0 0 / 40%);
        border: 1px solid #cdcdcd;
        padding-top: 2rem;
        padding-bottom: 2rem;
        padding-left: 1rem;
        padding-right: 1rem;
        margin-bottom: 2rem;
    }

    .new-post input[type="text"],
    input[type="file"],input[type="number"],input[type="email"],
    select,
    textarea, .uinpuuu {
        width: 100%;
        height: auto;
        padding-top: .5rem;
        padding-bottom: .5rem;
        padding-left: 1rem;
        border: 1px solid #cdcdcd;
        margin-bottom: 1rem;
    }

    .new-post button {
        width: 10rem;
        height: auto;
        padding-top: .6rem;
        padding-bottom: .6rem;
        color: white;
        background-color: rgb(239, 69, 84);
        outline: none;
        border: none;
        transition: .5s;
    }

    .new-post button:hover {
        opacity: .7;

    }

    .new-post p {
        margin-top: -.5rem;
        color: #666;
        font-size: 12px;
        font-weight: 300;
        font-style: italic;
    }
    li:hover {
    background-color: transparent !important;
    color:black !important;
  }
</style>

<?php $speciality_list = $this->db->get('speciality')->result_array();?>

<div class="new-post">
    <div class="container">
        <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
        <h3>Add Doctor / Hospital</h3>
        <form method="post" action="<?php echo base_url()?>admin/createdoctor/create" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        
                        <fieldset id="userType">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <input type="radio" name="userType" value="Hospital">Hospital</input>
                                </div>
                                <div class="col-md-6">
                                    <input type="radio" name="userType" value="Doctor">Doctor</input>
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Doctor / Hospital Name <span style="color:red;">*</span></label>
                                <input type="text" placeholder="Enter Doctor / Hospital Name" name="name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Speciality <span style="color:red;">*</span></label>
                                

                                <select multiple id="elem" placeholder="Select Speciality" data-allow-clear="1" required>
                                    <?php foreach($speciality_list as $value){?>
                                        <option value="<?php echo $value['id']?>"><?php echo $value['speciality_name']?></option>
                                    <?php }?>
                                </select>
                                <input type="hidden" name="speciality" id="specialidi" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Refferal Code <span style="color:red;">*</span></label>
                                <input type="text" placeholder="Enter Refferal Code" name="refer_code" required maxlength="5">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Mobile Number <span style="color:red;">*</span></label>
                                <input type="number" placeholder="Enter Mobile Number" name="number" required>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Email Id <span style="color:red;">*</span></label>
                                <input type="email" placeholder="Enter Email" name="email" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Address Line 1 <span style="color:red;">*</span></label>
                                <input type="text" name="address_line1" id="" placeholder="Enter Address line 1">
                                <!-- <textarea name="address" id="" cols="30" rows="5" placeholder="Enter Address line 1"></textarea> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Address Line 2 <span style="color:red;">*</span></label>
                                <input type="text" name="address_line2" id="" placeholder="Enter Address line 2">
                                <!-- <textarea name="address" id="" cols="30" rows="5" placeholder="Enter Address line 1"></textarea> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Address Line 3 <span style="color:red;">*</span></label>
                                <input type="text" name="address_line3" id="" placeholder="Enter Address line 3">
                                <!-- <textarea name="address" id="" cols="30" rows="5" placeholder="Enter Address line 1"></textarea> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">City <span style="color:red;">*</span></label>
                                <input type="text" name="city" id="" placeholder="Enter City">
                                <!-- <textarea name="address" id="" cols="30" rows="5" placeholder="Enter Address line 1"></textarea> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">PO BOX <span style="color:red;">*</span></label>
                                <input type="text" name="po_box" id="" placeholder="Enter PO BOX">
                                <!-- <textarea name="address" id="" cols="30" rows="5" placeholder="Enter Address line 1"></textarea> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Payment Method <span style="color:red;">*</span></label>
                                <select name="payment_method" id="" required>
                                    <option value="">Select Payment Method</option>
                                    <option value="Buy Goods">Buy Goods</option>
                                    <option value="EFT">EFT</option>
                                    <option value="till number">Till Number</option>
                                    <option value="pay bill number">Pay Bill Number</option>
                                    <option value="mpesa send money">Mpesa Send Money</option>
                                </select>
                            </div>
                        </div>


                        <div class="row" id="buy_goods">
                            <div class="col-md-12">
                                <label for="">Buy Goods Number <span style="color:red;">*</span></label>
                                <input type="text" name="buy_goods_account_number" placeholder="Enter Buy Goods Number">
                            </div>
                            <div class="col-md-12">
                                <label for="">Buy Goods Regsiterd Name <span style="color:red;">*</span></label>
                                <input type="text" name="buy_goods_regitered_name" placeholder="Enter Buy Goods Regsiterd Name">
                            </div>
                        </div>

                        <div class="row" id="send_money">
                            <div class="col-md-12">
                                <label for="">Payment Mobile Number <span style="color:red;">*</span></label>
                                <input type="text" name="payment_account_number" placeholder="Enter Payment Mobile Number">
                            </div>
                            <div class="col-md-12">
                                <label for="">Payment Mobile Number Regsiterd Name <span style="color:red;">*</span></label>
                                <input type="text" name="payment_regitered_name" placeholder="Enter Payment Mobile Number Regsiterd Name">
                            </div>
                        </div>

                        <div class="row" id="till_number">
                            <div class="col-md-12">
                                <label for="">Till Number <span style="color:red;">*</span></label>
                                <input type="text" name="till_account_number" placeholder="Enter Till number">
                            </div>
                            <div class="col-md-12">
                                <label for="">Till Regsiterd Name <span style="color:red;">*</span></label>
                                <input type="text" name="till_regitered_name" placeholder="Enter Till Regsiterd Name">
                            </div>
                        </div>


                        <div class="row" id="pay_bill">
                            <div class="col-md-12">
                                <label for="">Pay Bill Number <span style="color:red;">*</span></label>
                                <input type="text" name="pay_bill_number" placeholder="Enter Pay Bill Number">
                            </div>
                            <div class="col-md-12">
                                <label for="">Account Number <span style="color:red;">*</span></label>
                                <input type="text" name="paybill_account_number" placeholder="Enter Account Number">
                            </div>
                            <div class="col-md-12">
                                <label for="">Payment Regsiterd Name <span style="color:red;">*</span></label>
                                <input type="text" name="paybill_regitered_name" placeholder="Enter Regsiterd Name">
                            </div>
                        </div>


                        <div class="row" id="eft">
                            <div class="col-md-12">
                                <label for="">Bank Account Number <span style="color:red;">*</span></label>
                                <input type="text" name="bank_account_number" placeholder="Enter Bank Account Number">
                            </div>
                            <div class="col-md-12">
                                <label for="">Bank Name <span style="color:red;">*</span></label>
                                <input type="text" name="bank_name" placeholder="Enter Bank Name">
                            </div>
                            <div class="col-md-12">
                                <label for="">Branch Code <span style="color:red;">*</span></label>
                                <input type="text" name="branch_code" placeholder="Enter Branch Code">
                            </div>
                            <div class="col-md-12">
                                <label for="">Account Holder Name <span style="color:red;">*</span></label>
                                <input type="text" name="bank_regitered_name" placeholder="Enter Account Holder Name">
                            </div>
                            <div class="col-md-12">
                                <label for="">Other Bank Details (optional)</label>
                                <textarea name="other_bank" id="" cols="30" rows="5" placeholder="Enter Other Bank Details..."></textarea>
                            </div>
                        </div>

                        <button name="formSubmit">Create</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<script>

$(function () {
  $('select').each(function () {
    $(this).select2({
      theme: 'bootstrap4',
      width: 'style',
      placeholder: $(this).attr('placeholder'),
      allowClear: Boolean($(this).data('allow-clear')),
    });
  });
});

$( "#elem" ).change(function() {
    var alldata = $(this).select2('data');
    var arrr = [];
    alldata.map((d)=>{
        arrr.push(d.id);
    })
    selectedvalue = arrr.join();
    $('#specialidi').val(selectedvalue);
});

jQuery(document).ready(function($){
    $('#send_money').hide();
    $('#buy_goods').hide();
    $('#till_number').hide();
    $('#pay_bill').hide();
    $('#eft').hide();
    $('select[name=payment_method]').change(function () {

        var selectedValue = $('select[name=payment_method]').val();

        if(selectedValue == "EFT"){
            $('#send_money').hide();
            $('#till_number').hide();
            $('#pay_bill').hide();
            $('#eft').show();
            $('#buy_goods').hide();
        }else if(selectedValue == "till number"){
            $('#send_money').hide();
            $('#till_number').show();
            $('#pay_bill').hide();
            $('#eft').hide();
            $('#buy_goods').hide();

        }else if(selectedValue == "pay bill number"){
            $('#send_money').hide();
            $('#till_number').hide();
            $('#pay_bill').show();
            $('#eft').hide();
            $('#buy_goods').hide();
        }else if(selectedValue == "mpesa send money"){
            $('#send_money').show();
            $('#till_number').hide();
            $('#pay_bill').hide();
            $('#eft').hide();
            $('#buy_goods').hide();
        }else if(selectedValue == "Buy Goods"){
            $('#send_money').hide();
            $('#till_number').hide();
            $('#pay_bill').hide();
            $('#eft').hide();
            $('#buy_goods').show();
        }else{
            $('#send_money').hide();
            $('#till_number').hide();
            $('#pay_bill').hide();
            $('#eft').hide();
            $('#buy_goods').hide();
        }
}); 
});

</script>



