<?php
$pagename = basename(strtok($_SERVER['REQUEST_URI'], '?'));

?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>لویاکس | <?php echo $page_title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <!-------------------------------
    CSS Files!
    Manage Whit DepenLoader File In future !
     -------------------------------->

    <?php
    //Get Name Of Page And Echo Spesific CSS
    switch ($pagename) { case "new-customer.php": ?>
        <!---------------------------------------- new-customer.php ----------------------------------------------------------------------->
        <!-- daterange picker -->
        <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="plugins/iCheck/all.css">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
        <!-- Select2 -->
        <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
        <!-- persian-datepicker -->
        <link rel="stylesheet" href="bower_components/persian-datepicker/dist/css/persian-datepicker.css"/>
        <!-- CSS Customize Page -->
        <style>
            /*Persian datePicker Font*/
            .datepicker-plot-area{
                font: 12px IRAN-Sans,Tahoma;
            }
            /* Modals*/
            .example-modal .modal {
                position: relative;
                top: auto;
                bottom: auto;
                right: auto;
                left: auto;
                display: block;
                z-index: 1;
            }

            .example-modal .modal {
                background: transparent !important;
            }
        </style>
    <?php break; case "customer-list.php": ?>
        <!---------------------------------------- customer-list.php ----------------------------------------------------------------------->
        <!-- DataTables -->
        <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
        <link rel="stylesheet" href="bower_components/datatables.net-buttons-dt/css/buttons.dataTables.min.css">
    <?php break; case "admin-panel.php": ?>
        <!---------------------------------------- admin-panel.php ----------------------------------------------------------------------->
        <style>
            th{
                text-align: right;
                direction: rtl;
            }
        </style>
    <?php break; case "invoice.php": ?>
        <!---------------------------------------- invoice.php ----------------------------------------------------------------------->
        <!-- Select2 -->
        <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
        <style>

            @media print
            {
                @page
                {
                    size: auto;
                    margin: 0mm;
                    size: portrait;
                }


                body * {
                    visibility: hidden;
                }
                .section-to-print, .section-to-print * {
                    visibility: visible;
                }
                .section-to-print {
                    direction: rtl;
                    text-align: center;
                    position: absolute;
                    width: 4.8cm;
                    left: 0;
                    top: 0 !important;
                }

                .content-wrapper{
                    height: 3000px;
                }
            }

            *{
                direction:rtl;
                text-align:right;
            }

            .partner_print, .total_print{
                direction: rtl;
                text-align: center;
                position: absolute;
                width: 4.8cm;
                left: 0px;
                top: -1000px;
                background: #fff;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            td, th {
                border: 1px solid #dddddd;
                text-align: right;
                padding: 8px;
            }

            tr:nth-child(even) {
                background-color: #dddddd;
            }

            tr:hover {
                outline:2px dotted gray;
            }

        </style>
    <?php break; default: ?>
        <!---------------------------------------- WHITHOUT SPESIFIC CSS ----------------------------------------------------------------------->
    <?php } ?>

    <!-------------------------------
    End - Css Files!
     -------------------------------->




    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">