<?php
//page Information :
$page_title = 'گزارش فروش بر حسب خدمت';
$page_description = 'نمایش لیست کلیه خدمات فروخته شده';

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
                            <th> مشتری</th>
                            <th>شماره فاکتور</th>
                            <th>کد فروش</th>
                            <th>نام خدمت</th>
                            <th>نام همکار</th>
                            <th>قیمت</th>
                            <th>اعتبار استفاده شده</th>
                            <th>مبلغ پرداختی</th>
                            <th>تاریخ</th>
                            <th>ساعت</th>
                        </tr>
                        </thead>
                        <tbody>


                        <?php
                        // Create connection
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        //Set Charset UTF-8
                        $conn->set_charset("utf8");

                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT id, invoice_id, name, partner, price, credit_use, payment FROM invoice_service_list";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {

                                $invoice_id = $row['invoice_id'];
                                $invoice_list = "SELECT cid, date, time FROM invoice_list WHERE id = $invoice_id";
                                $invoice_list = $conn->query($invoice_list);
                                $invoice_list = $invoice_list->fetch_assoc();
                                $cid = $invoice_list['cid'];
                                $date = $invoice_list['date'];
                                $time = $invoice_list['time'];

                                $customer_name = "SELECT firstname, lastname FROM customer_list WHERE id = $cid";
                                $customer_name = $conn->query($customer_name);
                                $customer_name = $customer_name->fetch_assoc();
                                $customer_name = $customer_name['firstname'] .' '. $customer_name['lastname'];
                                ?>

                                <tr>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $invoice_id; ?></td>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["partner"]; ?></td>
                                    <td><?php echo $row["price"]; ?></td>
                                    <td><?php echo $row["credit_use"]; ?></td>
                                    <td><?php echo $row["payment"]; ?></td>
                                    <td><?php echo $date; ?></td>
                                    <td><?php echo $time; ?></td>
                                </tr>

                                <?php
                            }
                        } else {
                            echo "0 results";
                        }

                        $conn->close();

                        ?>




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