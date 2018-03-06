</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Cleave.js -->
<script src="bower_components/cleave.js/dist/cleave.js"></script>
<!-- PersianNumber.js -->
<script src="plugins/persiannumber/persianumber.min.js"></script>


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
                "processing": true,
                "serverSide": true,
                "ajax":{
                    url :"ajax-db.php?form=customer-list", // json datasource
                    error: function(){  // error handling
                        $(".example1-error").html("");
                        $("#example1").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                        $("#example1_processing").css("display","none");

                    }
                },
                "stateSave" : true,
                "scrollX": true,
                "bLengthChange": false,
                "bInfo": false,
                "oLanguage": {
                    "sSearch": "جستجوی مشتریان ",
                    "sProcessing": "در حال دریافت اطلاعات ...",
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
    <?php break; case "sale-report-service.php": ?>
    <!---------------------------------------- sale-report-service.php ----------------------------------------------------------------------->

    <!-- DataTables -->
    <script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="bower_components/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="bower_components/jszip/dist/jszip.min.js"></script>
    <!-- numberformat -->
    <script src="bower_components/teamdf/jquery-number/jquery.number.min.js"></script>
    <!-- persian-datepicker -->
    <script src="bower_components/persian-date/dist/persian-date.js"></script>
    <script src="bower_components/persian-datepicker/dist/js/persian-datepicker.min.js"></script>

    <!-- page script -->
    <script>
        $(document).ready(function(){

            $('.satisfaction').on('change', function() {
                var value = $('option:selected', this).val();
                var s_id = $(this).attr('s_id');

                $.ajax({url: "ajax-db.php?"+
                    "form=update_satisfaction" +
                    "&s_id=" + s_id +
                   "&value=" + value +
                    "", success: function(result){
                        $("#showr" + s_id).text(result);
                        $("#showr" + s_id).fadeIn(2000);
                        $("#showr" + s_id).fadeOut(2000);
                    }});

            });
        });


            $(".desc-btn").click(function(){
                var s_id = $(this).attr('s_id');
                var description = $('#desc' + s_id).val();

                $.ajax({url: "ajax-db.php?"+
                    "form=update_satisfaction_description" +
                    "&s_id=" + s_id +
                    "&description=" + description +
                    "", success: function(result){
                        $("#showr-d" + s_id).text(result);
                        $("#showr-d" + s_id).fadeIn(2000);
                        $("#showr-d" + s_id).fadeOut(2000);
                    }});
            });


        $(function () {
            $('#example1').DataTable({
                "stateSave" : true,
                //"searching": false,
                "bLengthChange": true,
                "lengthMenu": [[2, 5, 10, 15, 20, 100], [2, 5, 10, 15, 20, 100]],
                "oLanguage": {
                    "sSearch": "جستجوی مشتریان ",
                    "sLengthMenu": "تعداد ردیف مورد نمایش _MENU_",
                    "sInfo": "نمایش _TOTAL_ مورد (_START_ تا _END_)",
                    "sInfoFiltered": "فیلتر شده از مجموع _MAX_ خدمت مورد ارائه",
                    "sZeroRecords": "فاکتوری برای نمایش وجود ندارد",
                    "oPaginate": {
                        "sNext": "صفحه بعد",
                        "sPrevious": "صفحه قبل"
                    },
                },

                "footerCallback": function ( row, data, start, end, display ) {
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    // Total over all pages
                    total = api.column(6).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );

                    // Total over this page
                    pageTotal = api.column( 6, { page: 'current'} ).data().reduce( function (a, b) {return intVal(a) + intVal(b);}, 0 );
                    pageTotal = $.number(pageTotal);

                    // Update footer
                    $('#totalcost').text(pageTotal);
                },

                dom: 'Blfrtip',
                buttons: [
                    { extend: 'print', text: 'پرینت' },
                    { extend: 'print', text: 'کپی' },
                    { extend: 'excel', text: 'خروجی اکسل' },
                    { extend: 'colvis', text: 'انتخاب ستون ها', columns: ':gt(1)'}
                ]
            })

            //Advenced Search / Search As Each Field
            //General Search
            $("#search-general").keyup(function(){
                $('#example1').dataTable().api().search($(this).val(), true, false).draw();
            });

             //Customer Search
            $("#search-customer").keyup(function(){
                $('#example1').dataTable().api().columns(0).search($(this).val(), true, false).draw();
            });

            //Partner Search
             $("#search-partner").keyup(function(){
                $('#example1').dataTable().api().columns(5).search($(this).val(), true, false).draw();
            });

            //Date Search
            $("#search-date").keyup(function(){
                val = $(this).val();
                regExSearch = '^' + val +'$';
                if(val !=='') {
                    $('#example1').dataTable().api().columns(11).search(regExSearch, true, false).draw();
                }else{
                    $('#example1').dataTable().api().columns(11).search('', true, false).draw();
                }
            });

            function search_date(){
                val = $("#search-date").val();
                regExSearch = '^' + val +'$';
                $('#example1').dataTable().api().columns(11).search(regExSearch, true, false).draw();
            };



            //Persian Date Picker Lunch Search By Date
            $(".pdpicker").pDatepicker({
                observer: true,
                format: 'YYYY/M/D',
                initialValue: false,
                autoClose: true,
                calendar:{
                    persian: {
                        locale: 'en'
                    }},
                altField: '.observer-example-alt',
                toolbox:{
                    "enabled": false,
                },
                onSelect: function(){
                    search_date();
                }
            });



            //ResetAll Filter Input
                $('#example1').dataTable().api().search($(this).val(), true, false).draw();
                $('#example1').dataTable().api().columns(0).search('', true, false).draw();
                $('#example1').dataTable().api().columns(5).search('', true, false).draw();
                $('#example1').dataTable().api().columns(11).search('', true, false).draw();

        })
    </script>
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php break; case "customer.php": ?>
    <!---------------------------------------- customer.php ----------------------------------------------------------------------->
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
                "bLengthChange": false,
                "bInfo": false,
                "oLanguage": {
                    "sSearch": "جستجو",
                    "oPaginate": {
                        "sNext": "صفحه بعد",
                        "sPrevious": "صفحه قبل"
                    },
                }
            })
        })

        $(document).ready(function(){

            $("#submit_dep").click(function(){
                var deposit = $('#deposit').val();
                $.ajax({url: "ajax-db.php?"+
                    "form=update_deposit" +
                    "&cid=" + cid +
                    "&deposit=" + deposit +
                    "", success: function(result){
                        $("#showr").text(result);
                        $("#showr").fadeIn(2000);
                        $("#showr").fadeOut(2000);
                    }});
            });

             $("#submit_pubcredit").click(function(){
                var pub_credit = $('#pub_credit').val();
                $.ajax({url: "ajax-db.php?"+
                    "form=update_pubcredit" +
                    "&cid=" + cid +
                    "&pubcredit=" + pub_credit +
                    "", success: function(result){
                        $("#showr").text(result);
                        $("#showr").fadeIn(2000);
                        $("#showr").fadeOut(2000);
                    }});
            });
        });
    </script>
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php break; case "sale-report-invoice.php": ?>
    <!---------------------------------------- sale-report-invoice.php ----------------------------------------------------------------------->

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

        $(".remove").click(function() {

            var invoice_id = $(this).attr('invoice_id');

            if (confirm("آیا از حذف فاکتور" + invoice_id + " مطمئن هستید؟ \n تذکر : فاکتور مورد نظر پس از حذف امکان بازیابی نخواهد داشت. ")) {

            $.ajax({
                url: "ajax-db.php?" +
                "form=remove_invoice" +
                "&invoice_id=" + invoice_id +
                "", success: function (result) {

                    console.log(result);
                    $("#" + invoice_id).fadeOut(500);

                }
            });

        }
        });
    </script>
    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <?php break; case "define-service.php": ?>
    <!---------------------------------------- define-service.php ----------------------------------------------------------------------->
    <script>
        $(document).ready(function(){
            $("#submit").click(function(){
                var name = $("#name").val();
                var price = $("#price").val();
                var credit_in_first_use = $("#credit_in_first_use").val();
                var period_use = $("#period_use").val();
                    var pu_1 = $("#pu_1").val();
                    var pu_2 = $("#pu_2").val();
                    var pu_3 = $("#pu_3").val();
                    var pu_4 = $("#pu_4").val();
                    var pu_5 = $("#pu_5").val();
                var pu_t = pu_1 +"," + pu_2 +","+ pu_3 +","+ pu_4 +","+ pu_5 ;
                $.ajax({url: "ajax-db.php?"+
                    "form=addservice" +
                    "&name=" + name +
                    "&price=" + price +
                    "&credit_in_first_use=" + credit_in_first_use +
                    "&period_use=" + period_use +
                    "&pu_t=" + pu_t +
                    "", success: function(result){

                        $('tbody').append('<tr>' +
                            '<td><input value="'+ name +'"></td>' +
                            '<td><input style="width: 80px;" value="'+ price +'"></td>' +
                            '<td><input style="width: 40px;" value="'+ credit_in_first_use +'"></td>' +
                            '<td><input style="width: 40px;" value="'+ period_use +'"></td>' +
                            '<td><input style="width: 40px;" value="'+ pu_1 +'"></td>' +
                            '<td><input style="width: 40px;" value="'+ pu_2 +'"></td>' +
                            '<td><input style="width: 40px;" value="'+ pu_3 +'"></td>' +
                            '<td><input style="width: 40px;" value="'+ pu_4 +'"></td>' +
                            '<td><input style="width: 40px;" value="'+ pu_5 +'"></td>' +
                            '</tr>'
                        );

                        $("#showr").text(result);

                        //Reset Value Of Inputs
                        $("#name").val('');
                        $("#price").val('');
                        $("#credit_in_first_use").val('');
                        $("#period_use").val('');
                        $("#pu_1").val('');
                        $("#pu_2").val('');
                        $("#pu_3").val('');
                        $("#pu_4").val('');
                        $("#pu_5").val('');
                        $("#showr").fadeIn(5000);
                        $("#showr").fadeOut(5000);

                    }});
            });


            $('.update').click(function () {
                var s_id = $(this).attr('s_id');
                var s_idsharp = '#' + s_id;
                var name = $(s_idsharp).find('#name').val();
                var price = $(s_idsharp).find('#price').val();
                var credit_in_first_use = $(s_idsharp).find('#credit_in_first_use').val();
                var period_use = $(s_idsharp).find('#period_use').val();
                var pu_1 = $(s_idsharp).find("#pu_1").val();
                var pu_2 = $(s_idsharp).find("#pu_2").val();
                var pu_3 = $(s_idsharp).find("#pu_3").val();
                var pu_4 = $(s_idsharp).find("#pu_4").val();
                var pu_5 = $(s_idsharp).find("#pu_5").val();
                var pu_t = pu_1 +"," + pu_2 +","+ pu_3 +","+ pu_4 +","+ pu_5 ;

                $.ajax({
                    url: "ajax-db.php?" +
                    "form=update_service" +
                    "&s_id=" + s_id +
                    "&name=" + name +
                    "&price=" + price +
                    "&credit_in_first_use=" + credit_in_first_use +
                    "&period_use=" + period_use +
                    "&pu_t=" + pu_t +
                    "", success: function (result) {
                        $("#showr").text(result);
                        $("#showr").fadeIn(1000);
                        $("#showr").fadeOut(1000);
                    }
                });
            });

            $('.remove').click(function () {
                var result = confirm("آیا از حذف این خدمت اطمینان دارید؟");
                if (result) {
                    var s_id = $(this).attr('s_id');
                    var s_idsharp = '#' + s_id;

                    $(s_idsharp).css('display', 'none');





                    $.ajax({
                        url: "ajax-db.php?" +
                        "form=remove_service" +
                        "&s_id=" + s_id +
                        "", success: function (result) {
                            $("#showr").text(result);
                            $("#showr").fadeIn(1000);
                            $("#showr").fadeOut(1000);
                        }
                    });

                }
            });
        });
    </script>
    <?php break; case "define-partner.php": ?>
    <!---------------------------------------- define-partner.php ----------------------------------------------------------------------->
    <!-- persian-datepicker -->
    <script src="bower_components/persian-date/dist/persian-date.js"></script>
    <script src="bower_components/persian-datepicker/dist/js/persian-datepicker.min.js"></script>
    <script>
        $(document).ready(function(){

            //Persian Date Picker Lunch For BirthDay Test Input
            $(".pdpicker").pDatepicker({
                observer: true,
                format: 'YYYY/MM/DD',
                altField: '.observer-example-alt',
                toolbox:{
                    "enabled": false,
                }
            });


            $("#submit").click(function(){
                var name = $("#name").val();
                var mobile = $("#mobile").val();
                var start_coop = $("#start_coop").val();
                var percent_coop = $("#percent_coop").val();

                $.ajax({url: "ajax-db.php?"+
                    "form=addpartner" +
                    "&name=" + name +
                    "&mobile=" + mobile +
                    "&start_coop=" + start_coop +
                    "&percent_coop=" + percent_coop +
                    "", success: function(result){

                        $('tbody').append('<tr>' +
                            '<td>'+ name +'</td>' +
                            '<td>'+ mobile +'</td>' +
                            '<td>'+ start_coop +'</td>' +
                            '<td>'+ percent_coop +'</td>' +
                            '</tr>'
                        );

                        $("#showr").text(result);

                        //Reset Value Of Inputs
                        $("#name").val('');
                        $("#mobile").val('');
                        $("#start_coop").val('');
                        $("#percent_coop").val('');
                        $("#showr").fadeIn(5000);
                        $("#showr").fadeOut(5000);

                    }});
            });
        });
    </script>
    <?php break; case "define-groups.php": ?>
    <!---------------------------------------- define-groups.php ----------------------------------------------------------------------->
    <script>
        $(document).ready(function(){

            $("#submit").click(function(){

                //names
                var n1 = $('#n1').val();
                var n2 = $('#n2').val();
                var n3 = $('#n3').val();
                var n4 = $('#n4').val();

                //percents
                var p1 = Number($('#p1').val());
                var p2 = Number($('#p2').val());
                var p3 = Number($('#p3').val());
                var p4 = Number($('#p4').val());

                //upto
                var u1 = Number($('#u1').val());
                var u2 = Number($('#u2').val());
                var u3 = Number($('#u3').val());
                var u4 = Number($('#u4').val());

                if(p1 < p2 & p2 < p3 & p3 < p4 & u1 < u2 & u2 < u3 & u3 < u4){
                    $.ajax({url: "ajax-db.php?"+
                        "form=update_groups" +
                        "&n1=" + n1 +
                        "&n2=" + n2 +
                        "&n3=" + n3 +
                        "&n4=" + n4 +
                        "&p1=" + p1 +
                        "&p2=" + p2 +
                        "&p3=" + p3 +
                        "&p4=" + p4 +
                        "&u1=" + u1 +
                        "&u2=" + u2 +
                        "&u3=" + u3 +
                        "&u4=" + u4 +
                        "", success: function(result){

                            $("#showr").text(result);
                            $("#showr").fadeIn(5000);
                            $("#showr").fadeOut(5000);

                        }});
                }else{
                    alert('ترتیب اعداد را درست وارد کنید!');
                }
            });
        });
    </script>
    <?php break; case "invoice.php": ?>
    <!---------------------------------------- invoice.php ----------------------------------------------------------------------->
    <script src="plugins/jquery-qrcode/jquery.qrcode.min.js"></script>
    <script src="bower_components/persian-date/dist/persian-date.js" type="text/javascript"></script>
    <!-- Select2 -->
    <script src="bower_components/select2/dist/js/select2.full.min.js"></script>
    <script>
        $(document).ready(function() {

            //Select2 For Some Element
            $('.service').select2();
            $('.partner').select2();

            //Value Of Total "Payment"
            var payment = 0;

            //Value Of Total "Credit"
            var credt_pay = 0;

            //Value In Each Payment Row!
            var cost = 0;
            var service_id = 0;
            var partner_id = 0;
            var credit = 0;
            var pay = 0;
            var credituse = 0;
            var fpercent = 0;
            var firstuse = false;

            //Reset (Empty and Set to defult) Value inpute for Add New Sevice.
            reset_value();

            //Show Deposit
            $(".deposit").text(deposit);

            //Show Credit Public
            $(".credit_pub").text(credit_pub);


            //Get Cost From Services Attribute , Set Pay And Cost input from it
            $('.service').on('change', function() {
                cost = $('option:selected', this).attr('cost');
                service_id = $('option:selected', this).attr('id');
                fpercent = $('option:selected', this).attr('fpercent');
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
                if ($('#c_check').is(':checked')) {
                    newc_check = '<input type="checkbox" disabled="disabled" checked>';
                    var c_check = true;
                }
                var newcredituse = $(".credituse").text();
                var newpay = $(".pay").text();


                if (newpartnet !== null & newservice !== null & newcost.length > 0) {

                    //Calculate FistUse Credit
                    var addcredit = '';
                    if( $.inArray(service_id, taken_services) != -1){
                        addcredit = '';
                        firstuse = false;
                    }else{
                        if( $.inArray(service_id, taken_services_now) != -1) {
                            addcredit = '';
                            firstuse = false;
                        }else{
                            addcredit = 'اولین استفاده : +' + ((newpay * fpercent) / 100);
                            taken_services_now.push(service_id);
                            firstuse = true;
                        }
                    }

                    row_id ++;

                    //Generate Html tr / td Table row For new Service Row.
                    $("#services_list").append("<tr class='service_row' id='row" + row_id + "'>" +
                        "<td>" + newservice + "</td>" +
                        "<td>" + newpartnet + "</td>" +
                        "<td>" + newcost + "</td>" +
                        "<td>" + newcredit + "<br><span style='font-size: 10px;'>" + addcredit + "</span></td>" +
                        "<td>" + newc_check + "</td>" +
                        "<td class='credt_pay'>" + newcredituse + "</td>" +
                        "<td class='payment'>" + newpay + "</td>" +
                        "<td><button class='print' pservice='"+ newservice +"' ppartner='"+ newpartnet +"' ppayment='"+ newpay +"'>چاپ</button>" + "</td>" +
                        "<td><button class='remove' rowid='#row"+ row_id +"' sid='"+ service_id +"' pid='"+ partner_id +"'  cuse='"+ newcredituse +"'  firstuse='"+ firstuse +"'  payment='"+ newpay +"' >حذف</button></td></tr>");

                    //Generate Html tr / td Table row For Print Total Services.
                    $("#tp_service").append("<tr id='row" + row_id + "p'>" +
                        "<td>" + newservice + "</td>" +
                        "<td>" + newpartnet + "</td>" +
                        "<td>" + newpay + "</td></tr>");

                    //Reset (Empty and Set to defult) Value inpute for Add New Sevice.
                    reset_value();

                    //Reduce Credit Of Customer For Partnet
                    if (c_check) {
                        partners_c[partner_id] -= credituse;
                    }

                    //Sum With Total and Credit
                    payment += Number(newpay);
                    credt_pay += Number(newcredituse);

                    //Each Service Only One time Can be Select
                    $(".service").find('#' + service_id).prop('disabled', true);

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

                //Each Service Only One time Can be Select / When Remove Enable Again
                $(".service").find('#' + $(this).attr('sid')).prop('disabled', false);

                //Remove First Credit
                var sid = $(this).attr('sid');
                taken_services_now = taken_services_now.filter(function(item) {
                    return item != sid;
                });

                $($(this).attr('rowid')).remove();
                $(".total").text($(".total").text() - $(this).attr('payment'));
                $(".credt_payment").text($(".credt_payment").text() - $(this).attr('cuse'));

                payment -= Number($(this).attr('payment'));
                credt_pay -= Number($(this).attr('cuse'));

                console.log($($(this).attr('rowid')));
                //Remove Row From Invoice Print
                var rm_print_row = $(this).attr('rowid') + 'p';
                $(rm_print_row).remove();
                //Revert Credit Of Customer For Partnet
                partners_c[$(this).attr('pid')] += Number($(this).attr('cuse'));
                totalservices();
                reset_value();

            });

            //Partner Print Invoice Button / Add Row To Partner Print Invoice
            $("table").on("click", ".print", function(){
                $("#pservice").text($(this).attr('pservice'));
                $("#ppartner").text($(this).attr('ppartner'));
                $("#ppayment").text($(this).attr('ppayment'));
                $(".date_time").text(new persianDate().format());
                $(".partner_print").addClass("section-to-print");
                $(".total_print").removeClass("section-to-print");
                window.print();
            });


            //Total Print Invoice /
            $(".total_print_submit").click(function() {

                $("#tptotal").text($(".total_services").text());
                $("#tpcredit_use").text($(".credt_payment").text());
                //$("#tpdeposit").text($(".deposit").text());
                $("#tppayment").text($(".total").text());
                $(".date_time").text(new persianDate().format());
                $(".total_print").addClass("section-to-print");
                $(".partner_print").removeClass("section-to-print");
                window.print();
            });


            //Calculate Public Credit in Payment
            $("#use_credit_pub").click(function() {

                if ($('#use_credit_pub').is(':checked')) {
                    var ct = ((totalservices() * percent) / 100);
                    ct -= credt_pay;

                    //limit Of Use Credit
                    if(credit_pub <= ct){
                        ct = credit_pub;
                    }

                    $(".credit_pub").text(credit_pub - ct);
                    $(".credt_payment").text(credt_pay + ct);
                    $(".total").text(payment - ct);

                    $("#add").prop('disabled', true);
                }else {
                    $(".credit_pub").text(credit_pub);
                    $(".credt_payment").text(credt_pay);
                    $(".total").text(payment);

                    $("#add").prop('disabled', false);
                }
            });

            //Calculate Deposit in Payment
            $("#use_deposit").click(function() {
                if ($('#use_deposit').is(':checked')) {
                    if (deposit <= $(".total").text()) {
                        $(".total").text($(".total").text() - deposit);
                        $(".deposit").text('0');
                    } else {
                        $(".deposit").text(deposit - $(".total").text());
                        $(".total").text('0');
                    }
                    $("#use_credit_pub").attr("disabled", true);
                    $("#add").prop('disabled', true);
                }else {
                    $(".total").text(payment);
                    $(".deposit").text(deposit);
                    $("#use_credit_pub").attr("disabled", false);
                    $("#add").prop('disabled', false);
                }
            });

        });


        $("#submit").click(function(){
            if($(".total_services").text() > 0){

                var t_services = $(".total_services").text();
                var t_payment = $(".total").text();
                var diposit_use = deposit - $(".deposit").text();
                var pcredit_use = credit_pub - $(".credit_pub").text();
                var partner_credit_use = $(".credt_payment").text() - pcredit_use;

                var all_s_name = '';
                var all_s_partner = '';
                var all_s_price = '';
                var all_s_credit_partner = '';
                var all_s_credit_cbox = '';
                var all_s_credit_use = '';
                var all_s_payment = '';

                $(".service_row").each(function() {

                    all_s_name += $(this).find('td:nth-child(1)').text() + ',';
                    all_s_partner += $(this).find('td:nth-child(2)').text() + ',';
                    all_s_price += $(this).find('td:nth-child(3)').text() + ',';
                    //   all_s_credit_partner += $(this).find('td:nth-child(4)').text() + ',';
                    //  all_s_credit_cbox += $(this).find('td:nth-child(5)').text() + ',';
                    all_s_credit_use += $(this).find('td:nth-child(6)').text() + ',';
                    all_s_payment += $(this).find('td:nth-child(7)').text() + ',';
                });

                var submit_url = './invoice-submit.php/?' +
                    'cid=' + cid +
                    '&t_services=' + t_services +
                    '&inv_id=' + invoice_id +
                    '&partner_credit_use=' + partner_credit_use +
                    '&t_payment=' + t_payment +
                    '&diposit_use=' + diposit_use +
                    '&pcredit_use=' + pcredit_use +
                    '&allsname=' + all_s_name.replace(/^,|,$/g,'') +
                    '&allspartner=' + all_s_partner.replace(/^,|,$/g,'') +
                    '&allsprice=' + all_s_price.replace(/^,|,$/g,'') +
                    //  '&allscreditpartner=' + all_s_credit_partner.replace(/^,|,$/g,'') +
                    //  '&allscreditcbox=' + all_s_credit_cbox.replace(/^,|,$/g,'') +
                    '&allscredituse=' + all_s_credit_use.replace(/^,|,$/g,'') +
                    '&allspayment=' + all_s_payment.replace(/^,|,$/g,'')
                ;

                window.open(submit_url, '_self');
            }else{
                $('#modal-danger').modal();
            }
        });



        //Calculate Total Service Value
        function totalservices(){
            $(".total_services").text(Number($(".total").text()) + Number($(".credt_payment").text()));
            return $(".total_services").text();
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
            $('#use_deposit').prop('checked', false);
            $('#use_credit_pub').prop('checked', false);
        }

        //QrCode Content / Load In Incoice Print / Set in Admin Panel
        $('#qrcode').qrcode({width: 100,height: 100,text: "size doesn't matter"});
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