<?php
//page Information :
$page_title = 'تعریف خدمت';
$page_description = 'صفحه تعریف خدمات';

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
                    <h3 class="box-title">تعریف خدمات</h3>
                    <hr>
                    <div class="box-body">


                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th style="text-align: center;">عنوان</th>
                                <th style="text-align: center;">قیمت</th>
                                <th style="text-align: center;">اولین استفاده</th>
                                <th style="text-align: center;">دوره استفاده</th>
                                <th style="text-align: center;"> دوره اول</th>
                                <th style="text-align: center;"> دوره دوم</th>
                                <th style="text-align: center;"> دوره سوم</th>
                                <th style="text-align: center;"> دوره چهارم</th>
                                <th style="text-align: center;"> دوره پنجم</th>
                                <th style="text-align: center;"></th>
                                <th style="text-align: center;"></th>
                            </tr>
                            <tr>
                                <td><input id="name" name="name" style="width: 100%;" type="text" placeholder="نام خدمت"></td>
                                <td><input id="price" name="price" style="width: 60%;" type="text" placeholder="عدد قیمت"><span style="width: 40%;"> تومان</span></td>
                                <td><span style="width: 20%;">%</span><input id="credit_in_first_use" name="credit_in_first_use" style="width: 80%;" type="text" placeholder="عددِ درصد"></td>
                                <td><input id="period_use" name="period_use" style="width: 70%;" type="text" placeholder="عددِ روز"><span style="width: 20%;"> روز</span></td>
                                <td><span style="width: 20%;">%</span><input id="pu_1" style="width: 80%;" type="text" placeholder="عددِ درصد"></td>
                                <td><span style="width: 20%;">%</span><input id="pu_2" style="width: 80%;" type="text" placeholder="عددِ درصد"></td>
                                <td><span style="width: 20%;">%</span><input id="pu_3" style="width: 80%;" type="text" placeholder="عددِ درصد"></td>
                                <td><span style="width: 20%;">%</span><input id="pu_4" style="width: 80%;" type="text" placeholder="عددِ درصد"></td>
                                <td><span style="width: 20%;">%</span><input id="pu_5" style="width: 80%;" type="text" placeholder="عددِ درصد"></td>
                                <td><button id="submit" class="btn btn-primary">افزودن</button></td>
                                <td></td>
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

                            $sql = "SELECT * FROM services_list";
                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                echo '<tr id="'.$row['id'].'">';
                                echo '<td><input id="name" value="'. $row['name'] .'"></td>';
                                echo '<td><input id="price" style="width: 80px;" value="'. $row['price'] .'"></td>';
                                echo '<td><input id="credit_in_first_use" style="width: 40px;" value="'. $row['credit_in_first_use'] .'"></td>';
                                echo '<td><input id="period_use" style="width: 40px;" value="'. $row['period_use'] .'"></td>';
                                $i = 1;
                                foreach (explode(',',$row['pu_t']) as $pu) {
                                    echo '<td><input id="pu_'.$i.'" style="width: 40px;" value="'. $pu .'"></td>';
                                    $i++;
                                }
                                echo '<td><button s_id="'.$row['id'].'" class="btn btn-primary update">ویرایش</button></td>';
                                echo '<td><button s_id="'.$row['id'].'" class="btn btn-danger remove">حذف</button></td></tr>';
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