<?php
//page Information :
$page_title = 'لیست مشتریان';
$page_description = 'نمایش لیست مشتریان';

//Include Config.php
include_once 'config.php';
?>
    <!-- <head> -->
<?php include_once 'head.php'; ?>

    <!-- Main Header -->
<?php include_once 'header.php'; ?>

    <!-- Left side column. contains the logo and sidebar -->
<?php include_once 'main-sidebar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo $page_title; ?>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><?php echo $page_title; ?></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>کد</th>
                             <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>موبایل</th>
                            <th>تاریخ تولد</th>
                            <th>نحوه آشنایی</th>
                            <th>آخرین مراجعه</th>
                            <th>دفعات مراجعه</th>
                            <th>اعتبار اختصاصی</th>
                            <th>اعتبار عمومی</th>
                            <th>گروه</th>
                            <th>جمع کل پرداخت</th>
                            <th>بیعانه</th>
                            <th style="border-right: 1px solid #bcbcbc;">صدور فاکتور</th>
                        </tr>
                        </thead>
                        <tbody>



                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
<?php include_once 'footer.php'; ?>

    <!-- Control Sidebar -->
<?php include_once 'control-sidebar.php'; ?>

    <!-- REQUIRED JS SCRIPTS -->
<?php include_once 'foot.php'; ?>