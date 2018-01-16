<?php
//page Information :
$page_title = 'مشتری جدید';
$page_description = 'صفحه اضافه کردن مشتری جدید';

//Include Config.php
<?php include_once 'config.php'; ?>
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
                        <form role="form" action="/action_page.php">
                            <div class="col-md-4 form-group">
                                <label style="float: right;">شماره موبایل</label>
                                <input class="form-control" name="ttttttttttttt" placeholder="09000000000"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;"> نام خانوادگی</label>
                                <input class="form-control" name="ttttttttttttt" placeholder="نام خانوادگی مشتری جدید"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;">نام</label>
                                <input class="form-control" name="ttttttttttttt" placeholder="نام مشتری جدید"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;">آدرس</label>
                                <input class="form-control" name="ttttttttttttt" placeholder="خیابان کوچه و ..."
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;">نحوه آشنایی</label>
                                <input class="form-control" name="ttttttttttttt" placeholder="نحوه آشنایی"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="col-md-4 form-group">
                                <label style="float: right;">تاریخ تولد</label>
                                <input class="form-control" name="ttttttttttttt" placeholder="تاریخ تولد"
                                       style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;"
                                       type="text">
                            </div>
                            <div class="box-footer form-group">
                                <button type="submit" class="btn btn-primary">ثبت</button>
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