<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="tp-list">
                    <li>
                        <h4>Total Patient Refered</h4>
                        <h6 id="total_refer"></h6>
                    </li>
                    <li>
                        <h4>Total Patient Completed the Treatment At TNWH</h4>
                        <h6 id="visited"></h6>
                    </li>
                    <li>
                        <h4>Today Patient Refered</h4>
                        <h6 id="today_refer"></h6>
                    </li>
                    <li>
                        <h4>This Month Patient Refered</h4>
                        <h6 id="month_refer"></h6>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<script src="<?php echo base_url()?>assets/js/ajaxjquery.min.js"></script>
<script>
  $(document).ready(function() {
    $.ajax({
                url:'<?php echo base_url('frontend/user/dashboard/stats');?>',
                type:'POST',
                data: {nationalid:1},
                success:function(data){
                    var parseData = JSON.parse(data);
                    $("#visited").html(parseData.visited);
                    $("#today_refer").html(parseData.today_refer);
                    $("#total_refer").html(parseData.total_refer);
                    $("#month_refer").html(parseData.month_refer);
                }
            });

});

</script>