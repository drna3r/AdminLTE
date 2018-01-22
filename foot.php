</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>


<!-------------------------------
JS Files!
Manage Whit DepenLoader File In future !
 -------------------------------->


<?php
//Get Name Of Page And Echo Spesific JS
switch ($pagename) { case "new-customer.php": ?>
    <!---------------------------------------- new-customer.php ----------------------------------------------------------------------->
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- persian-datepicker -->
    <script src="bower_components/persian-date/dist/persian-date.js"></script>
    <script src="bower_components/persian-datepicker/dist/js/persian-datepicker.min.js"></script>
    <!-- bootstrap datepicker -->
    <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="bower_components/fastclick/lib/fastclick.js"></script>
    <!-- Page script -->
    <script>
        //Persian DatePicker Config
        $(document).ready(function() {

            //Persian Date Picker Lunch For BirthDay Test Input
            $(".pdpicker").pDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '.observer-example-alt',
                toolbox:{
                    "enabled": false,
                }
            });

            //Enbale Referral Customer Code If Select introduction: referral
            $("#rcode").prop('disabled', true);
            $("#rcode").val('');
            $('#introduction').on('change', function() {
                if($('option:selected', this).val() == 'referral'){
                    $("#rcode").prop('disabled', false);
                }else {
                    $("#rcode").prop('disabled', true);
                    $("#rcode").val('');
                }
            })
        });


    </script>
    <?php break; case "customer-list.php": ?>
    <!---------------------------------------- customer-list.php ----------------------------------------------------------------------->

    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="bower_components/jszip/dist/jszip.min.js"></script>
    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable({
                "stateSave" : true,
                "bLengthChange": false,
                "bInfo": false,
                "oLanguage": {
                    "sSearch": "جستجوی مشتریان ",
                    "oPaginate": {
                        "sNext": "صفحه بعد",
                        "sPrevious": "صفحه قبل"
                    },
                },
                dom: 'Bfrtip',
                buttons: [
                    { extend: 'print', text: 'پرینت' },
                    { extend: 'print', text: 'کپی' },
                    { extend: 'excel', text: 'خروجی اکسل' },
                    { extend: 'colvis', text: 'انتخاب ستون ها', columns: ':gt(1)'}
                ]
            })
        })
    </script>
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php break; case "invoice.php": ?>
    <!---------------------------------------- invoice.php ----------------------------------------------------------------------->
    <script>
        $(document).ready(function() {

            //Limit Of usable Credit / Set in Admin Panel
            var percent = 50;

            //Value Of Customer's Deposit / Set In Customer Page
            var deposit = 20000;

            //Value Of Credit Public in DataBase
            var credit_pub = 10000;

            //Value Of Customer Credit for Each Partner
            var partners_c = {1:3500, 2:9000, 3:4000};

            //Value Of Total "Payment"
            var payment = 0;

            //Value Of Total "Credit"
            var credt_pay = 0;

            //Value In Each Payment Row!
            var cost = 0;
            var partner_id = 0;
            var credit = 0;
            var pay = 0;
            var credituse = 0;

            //Reset (Empty and Set to defult) Value inpute for Add New Sevice.
            reset_value();

            //Show Deposit
            $(".deposit").text(deposit);

            //Show Credit Public
            $(".credit_pub").text(credit_pub);


            //Get Cost From Services Attribute , Set Pay And Cost input from it
            $('.service').on('change', function() {
                cost = $('option:selected', this).attr('cost');
                $(".cost:text").val(cost);
                $(".pay").text(cost);

                //Enable Cost Inpute
                $(".cost").prop('disabled', false);
            })

            //Manual Change Cost Input
            $(".cost:text").keyup(function(){
                cost = $(this).val();
                $(".pay").text($(this).val());
            });

            //Get Customer Credit For Partner And Show Partner Credit
            $('.partner').on('change', function() {
                partner_id = $('option:selected', this).attr('id');
                credit = partners_c[partner_id];
                $(".credit").text(credit);

                //Check Credit for enable Credit Checkbox
                if(credit > 1){
                    $("#c_check").attr("disabled", false);
                }else{
                    $("#c_check").attr("disabled", true);
                }
            })

            $("#c_check").click(function() {

                if ($('#c_check').is(':checked')) {
                    var ct = ((cost * percent) / 100 ) ;

                    //limit Of Use Credit
                    if(credit <= ct){
                        credituse = credit;
                    }else{
                        credituse = ct;
                    }

                    //Show Credit that Customer Can be Use
                    $(".credituse").text(credituse);

                    //Disable to Change Cost,Partner and Service
                    $(".cost").prop('disabled', true);
                    $(".partner").prop('disabled', true);
                    $(".service").prop('disabled', true);


                    pay = $(".pay").text();
                    $(".pay").text(pay - credituse);
                }else{

                    //Dont Use From Credit
                    credituse = 0;
                    $(".credituse").text(credituse);

                    //????????
                    $(".pay").text(pay);

                    //Enable to Change Cost,Partner and Service
                    $(".cost").prop('disabled', false);
                    $(".partner").prop('disabled', false);
                    $(".service").prop('disabled', false);

                }

            });


            //Add New Service Row!

            var row_id = 0;

            $("#add").click(function() {

                //Define Value In Each Row
                var newservice = $(".service").val();
                var newpartnet = $(".partner").val();
                var newcost = $(".cost").val();
                var newcredit = $(".credit").text();
                var newc_check = '<input type="checkbox" disabled="disabled">';
                if ($('#c_check').is(':checked')) {newc_check = '<input type="checkbox" disabled="disabled" checked>';}
                var newcredituse = $(".credituse").text();
                var newpay = $(".pay").text();


                if (newpartnet !== null & newservice !== null & newcost.length > 0) {

                    row_id ++;

                    //Generate Html tr / td Table row For new Service Row.
                    $("#services_list").append("<tr id='row"+ row_id +"'><td>" + newservice +
                        "</td><td>" + newpartnet +
                        "</td><td>" + newcost +
                        "</td><td>" + newcredit +
                        "</td><td>" + newc_check +
                        "</td><td class='credt_pay'>" + newcredituse +
                        "</td><td class='payment'>" + newpay +
                        "</td><td><button class='remove' rowid='#row"+ row_id +"' pid='"+ partner_id +"'  cuse='"+ newcredituse +"'  payment='"+ newpay +"' >حذف</button></td></tr>");

                    //Reset (Empty and Set to defult) Value inpute for Add New Sevice.
                    reset_value();

                    //Reduce Credit Of Customer For Partnet
                    partners_c[partner_id] -= credituse;

                    //Sum With Total and Credit
                    payment += Number(newpay);
                    credt_pay += Number(newcredituse);

                }else{
                    $('#modal-danger').modal();
                }

                //Show Total Credit And Total Payment
                $(".total").text(payment);
                $(".credt_payment").text(credt_pay);
                totalservices();


            });

            //Remove Row - Reverse Sum and Reduce
            $("table").on("click", ".remove", function(){
                $($(this).attr('rowid')).remove();
                $(".total").text($(".total").text() - $(this).attr('payment'));
                $(".credt_payment").text($(".credt_payment").text() - $(this).attr('cuse'));

                payment -= Number($(this).attr('payment'));
                credt_pay -= Number($(this).attr('cuse'));

                //Revert Credit Of Customer For Partnet
                partners_c[$(this).attr('pid')] += Number($(this).attr('cuse'));
                totalservices();
                reset_value();

            });

            /*
                $("#use_credit_pub").click(function() {

                    if ($('#use_credit_pub').is(':checked')) {
                        var ct = (($(".total_services").text() * percent) / 100 ) ;

                        //limit Of Use Credit Public
                            if($(".credit_pub").text() <= ct){
                                credituse = credit;
                            }else{
                                credituse = ct;
                            }


                    }else{

            console.log('else..!!!');
                    }

                });
            */

        });


        //Calculate Total Service Value
        function totalservices(){
            $(".total_services").text(Number($(".total").text()) + Number($(".credt_payment").text()));
        }

        //Reset (Empty and Set to defult) Value inpute for Add New Sevice.
        function reset_value(){

            $(".partner").prop('disabled', false);
            $(".partner").prop('selectedIndex',0);
            $(".service").prop('disabled', false);
            $(".service").prop('selectedIndex',0);
            $(".cost").prop('disabled', true);
            $("#c_check").attr("disabled", true);
            $(".cost").val(" ");
            $('#c_check').prop('checked', false);
            $("#c_check").attr("disabled", true);
            $(".credit").text('0');
            $(".credituse").text('0');
            $(".pay").text('0');
        }


    </script>
    <?php break; default: ?>
    <!---------------------------------------- WHITHOUT SPESIFIC JS ----------------------------------------------------------------------->
<?php } ?>

<!-------------------------------
End - JS Files!
 -------------------------------->

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>