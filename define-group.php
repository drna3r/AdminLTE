<?php
//page Information :
$page_title = 'تعریف گروه';
$page_description = 'صفحه تعریف گروه ها';

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
                    <h3 class="box-title">تعریف گروه ها</h3>
                    <hr>
                    <div class="box-body">


                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 20px;">ردیف</th>
                                <th style="width: 20px;">نام گروه</th>
                                <th style="width: 20px;">درصد افزایش اعتبار</th>
                                <th style="width: 20px;">سقف ارتقا گروه</th>
                            </tr>
                            <tr>
                                <td>گروه یک</td>
                                <td>برنزی</td>
                                <td>5%</td>
                                <td>300.000 تومان</td>
                            </tr>
                            <tr>
                                <td>گروه دو</td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                            </tr>
                            <tr>
                                <td>گروه سه</td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                            </tr>
                            <tr>
                                <td>گروه چهار</td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                                <td><input style="width: 100%;" type="text" placeholder="عنوان خدمت"></td>
                            </tr>
                            </tbody>
                        </table>
                        <button class="btn btn-primary" style="margin: 10px;float: left">ثبت</button>
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