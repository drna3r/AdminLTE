<?php
//page Information :
$page_title = 'مشتری جدید';
$page_description = 'صفحه اضافه کردن مشتری جدید';

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

            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">ورود اطلاعات</h3>
                    <hr>
                    <div class="box-body">
                        <form role="form" action="./new-customer-action.php">
                            <div class="col-md-4 form-group">
                                <label style="float: right;">شماره موبایل</label>
                                <input class="form-control" name="mobile" placeholder="09000000000" tabindex="3"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;"> نام خانوادگی</label>
                                <input class="form-control" name="lastname" placeholder="نام خانوادگی مشتری جدید" tabindex="2"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;">نام</label>
                                <input class="form-control" name="firstname" placeholder="نام مشتری جدید" tabindex="1"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text" autofocus>
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;" >آدرس</label>
                                <input class="form-control" name="adress" placeholder="خیابان کوچه و ..." tabindex="6"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;">نحوه آشنایی</label>
                                <input class="form-control" name="introduction" placeholder="نحوه آشنایی" tabindex="5"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;">تاریخ تولد</label>
                                <input class="form-control" name="birthdate" placeholder="تاریخ تولد" tabindex="4"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="box-footer form-group">
                                <button type="submit" class="btn btn-primary" tabindex="7">ثبت</button>
                            </div>

                        </form>
                    </div>

                </div>
                <!-- /.box-header -->

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