<?php
//page Information :
$page_title = 'گزارش فروش بر حسب فاکتور';
$page_description = 'نمایش لیست کلیه فاکتور های صادر شده';

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
                            <th>شماره فاکتور</th>
                            <th> مشتری</th>
                            <th>مبلغ فاکتور</th>
                            <th>کسر بیعانه</th>
                            <th>کسر اعتبار عمومی</th>
                            <th>کسر اعتبار نزد همکاران</th>
                            <th>مبلغ پرداختی</th>
                            <th>تاریخ</th>
                            <th>ساعت</th>
                            <th>حذف</th>
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

                        $sql = "SELECT id, date, time, cid, pubcredit_use, deposit_use, total_service, partner_credit_use, total_payment FROM invoice_list";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while ($row = $result->fetch_assoc()) {
                                $cid = $row["cid"];
                                $customer_name = "SELECT firstname, lastname FROM customer_list WHERE id = $cid";
                                $customer_name = $conn->query($customer_name);
                                $customer_name = $customer_name->fetch_assoc();
                                $customer_name = $customer_name['firstname'] .' '. $customer_name['lastname'];
                                ?>

                                <tr id="<?php echo $row["id"]; ?>">
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $row["total_service"]; ?></td>
                                    <td><?php echo $row["deposit_use"]; ?></td>
                                    <td><?php echo $row["pubcredit_use"]; ?></td>
                                    <td><?php echo $row["partner_credit_use"]; ?></td>
                                    <td><?php echo $row["total_payment"]; ?></td>
                                    <td><?php echo $row["date"]; ?></td>
                                    <td><?php echo $row["time"]; ?></td>
                                    <td style="text-align: center;"><button invoice_id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs remove">حذف</button></td></td>
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