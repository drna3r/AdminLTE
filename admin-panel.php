<?php
//page Information :
$page_title = 'پنل مدیریت';
$page_description = 'پنل مدیریت : تنظیمات اصلی نرم افزار';

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


    <!-- SELECT2 EXAMPLE -->

    <!-- /.box -->

    <div class="row" style="margin-right: 15px;margin-left: 15px;padding-top: 15px;">
        <div class="col-md-6">

            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">تعریف خدمت</h3>
                </div>
                <div class="box-body">


                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 20px;"></th>
                            <th style="width: 20px;">عنوان</th>
                            <th style="width: 50px;">قیمت</th>
                            <th style="width: 20px;">اعتبار اولین استفاده</th>
                            <th style="width: 20px;">دوره استفاده از خدمت</th>
                        </tr>
                        <tr>
                            <td><button>-</button></td>
                            <td>رنگ کردن مو</td>
                            <td>4000</td>
                             <td>رنگ کردن مو</td>
                            <td>4000</td>
                        </tr>
                        <tr>
                            <td><button>+</button></td>
                            <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                            <td><input style="width: 100%;" type="text" placeholder="هزینه خدمت"></td>
                             <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                            <td><input style="width: 100%;" type="text" placeholder="هزینه خدمت"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary" style="margin: 10px;float: left">ثبت</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-info">
                <div class="box-header">
                    <h3 class="box-title">تعریف همکار</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 20px;"></th>
                            <th>نام همکار</th>
                            <th>درصد</th>
                        </tr>
                        <tr>
                            <td><button>-</button></td>
                            <td>منا شمس</td>
                            <td>40%</td>
                        </tr>
                        <tr>
                            <td><button>+</button></td>
                            <td><input type="text" placeholder="نام همکار"></td>
                            <td><input type="text" placeholder="درصد همکار"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary" style="margin: 10px;float: left">ثبت</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">تعریف گروه</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th style="width: 20px;"></th>
                            <th>نام همکار</th>
                            <th>درصد</th>
                        </tr>
                        <tr>
                            <td><button>-</button></td>
                            <td>منا شمس</td>
                            <td>40%</td>
                        </tr>
                        <tr>
                            <td><button>+</button></td>
                            <td><input type="text" placeholder="نام همکار"></td>
                            <td><input type="text" placeholder="درصد همکار"></td>
                        </tr>
                        </tbody>
                    </table>
                    <button class="btn btn-primary" style="margin: 10px;float: left">ثبت</button>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>
        <!-- /.col (left) -->
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">تنظیمات باشگاه مشتریان</h3>
                </div>
                <div class="box-body">
                    <!-- Date -->
                    <div class="form-group">
                        <label>تعیین درصد استفاده از اعتبار:</label>

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-percent "></i>
                            </div>
                            <input class="form-control pull-right" id="datepicker" type="text">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Date range -->
                    <div class="form-group">
                        <label>Date range:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input class="form-control pull-right" id="reservation" type="text">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>Date and time range:</label>

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <input class="form-control pull-right" id="reservationtime" type="text">
                        </div>
                        <!-- /.input group -->
                    </div>
                    <!-- /.form group -->

                    <!-- Date and time range -->
                    <div class="form-group">
                        <label>Date range button:</label>

                        <div class="input-group">
                            <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                    <span>
                      <i class="fa fa-calendar"></i> Date range picker
                    </span>
                                <i class="fa fa-caret-down"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.form group -->

                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

            <!-- iCheck -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">iCheck - Checkbox &amp; Radio Inputs</h3>
                </div>
                <div class="box-body">
                    <!-- Minimal style -->

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <div class="icheckbox_minimal-blue checked" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="minimal" checked="" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="icheckbox_minimal-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="minimal" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="icheckbox_minimal-blue disabled" style="position: relative;" aria-checked="false" aria-disabled="true"><input class="minimal" disabled="" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            Minimal skin checkbox
                        </label>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                        <label class="">
                            <div class="iradio_minimal-blue checked" style="position: relative;" aria-checked="false" aria-disabled="false"><input name="r1" class="minimal" checked="" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label class="">
                            <div class="iradio_minimal-blue" style="position: relative;" aria-checked="false" aria-disabled="false"><input name="r1" class="minimal" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="iradio_minimal-blue disabled" style="position: relative;" aria-checked="false" aria-disabled="true"><input name="r1" class="minimal" disabled="" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            Minimal skin radio
                        </label>
                    </div>

                    <!-- Minimal red style -->

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <div class="icheckbox_minimal-red checked" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="minimal-red" checked="" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="icheckbox_minimal-red" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="minimal-red" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="icheckbox_minimal-red disabled" style="position: relative;" aria-checked="false" aria-disabled="true"><input class="minimal-red" disabled="" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            Minimal red skin checkbox
                        </label>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                        <label>
                            <div class="iradio_minimal-red checked" style="position: relative;" aria-checked="false" aria-disabled="false"><input name="r2" class="minimal-red" checked="" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="iradio_minimal-red" style="position: relative;" aria-checked="false" aria-disabled="false"><input name="r2" class="minimal-red" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="iradio_minimal-red disabled" style="position: relative;" aria-checked="false" aria-disabled="true"><input name="r2" class="minimal-red" disabled="" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            Minimal red skin radio
                        </label>
                    </div>

                    <!-- Minimal red style -->

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <div class="icheckbox_flat-green checked" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red" checked="" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="icheckbox_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input class="flat-red" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="icheckbox_flat-green disabled" style="position: relative;" aria-checked="false" aria-disabled="true"><input class="flat-red" disabled="" style="position: absolute; opacity: 0;" type="checkbox"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            Flat green skin checkbox
                        </label>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                        <label>
                            <div class="iradio_flat-green checked" style="position: relative;" aria-checked="false" aria-disabled="false"><input name="r3" class="flat-red" checked="" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="iradio_flat-green" style="position: relative;" aria-checked="false" aria-disabled="false"><input name="r3" class="flat-red" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                        </label>
                        <label>
                            <div class="iradio_flat-green disabled" style="position: relative;" aria-checked="false" aria-disabled="true"><input name="r3" class="flat-red" disabled="" style="position: absolute; opacity: 0;" type="radio"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; border: 0px none; opacity: 0;"></ins></div>
                            Flat green skin radio
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Many more skins available. <a href="http://fronteed.com/iCheck/">Documentation</a>
                </div>
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col (right) -->
    </div>
    <!-- /.row -->


    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<?php include_once 'footer.php'; ?>

<!-- Control Sidebar -->
<?php include_once 'control-sidebar.php'; ?>

<!-- REQUIRED JS SCRIPTS -->
<?php include_once 'foot.php'; ?>
