<?php
//page Information :
$page_title = 'تعریف همکار';
$page_description = 'صفحه تعریف همکاران';

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
                    <h3 class="box-title">تعریف همکاران</h3>
                    <hr>
                    <div class="box-body">


                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="width: 20px;">نام</th>
                                <th style="width: 20px;">شماره موبایل</th>
                               <th style="width: 20px;">تاریخ شروع همکاری</th>
                               <th style="width: 20px;">درصد همکار</th>
                              <th style="width: 20px;"></th>

                            </tr>
                            <tr>
                                <td><input id="name" style="width: 100%;" type="text" placeholder="نام همکار"></td>
                                <td><input id="mobile" style="width: 100%;" type="text" placeholder="09000000000"></td>
                                <td><input id="start_coop" style="width: 100%;" class="pdpicker" type="text" placeholder="تاریخ شروع همکاری" readonly="readonly"></td>
                                <td><input id="percent_coop" style="width: 100%;" type="text" placeholder="عدد درصد"></td>
                                <td><button id="submit" style="width: 100%;" class="btn btn-primary" style="margin: 10px;float: left">ثبت</button></td>
                            </tr>
                            <?php

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }

                            //Set Charset UTF-8
                            $conn->set_charset("utf8");

                            $sql = "SELECT * FROM partners_list";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' .$row['name']. '</td>';
                                echo '<td>' .$row['mobile']. '</td>';
                                echo '<td>' .$row['start_coop']. '</td>';
                                echo '<td>' .$row['percent_coop']. '</td>';
                                echo '</tr>';
                            }

                            $conn->close();
                            ?>
                            </tbody>
                        </table>
                        <span id="showr"></span>
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