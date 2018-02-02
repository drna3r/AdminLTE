<?php
//page Information :
$page_title = 'صفحه اختصاصی مشتری';
$page_description = 'صفحه مدیریت و مشاهده اطلاعات مشتری';

$cid = $_GET["id"];
//Include Config.php
include_once 'config.php';


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Set Charset UTF-8
$conn->set_charset("utf8");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT firstname, lastname, mobile, birthdate, adress, deposit, credit_public FROM customer_list WHERE id=$cid";
$customer_list = $conn->query($sql);

if ($customer_list->num_rows > 0) {
    // output data of each row
    while ($row = $customer_list->fetch_assoc()) {

        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
        $mobile = $row["mobile"];
        $birthdate = $row["birthdate"];
        $adress = $row["adress"];
        $deposit = $row["deposit"];
        $credit_public = $row["credit_public"];
    }
} else {
    echo "0 results";
}

$conn->close();

$page_title .= '/ '.$firstname.' '.$lastname;
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
                    <h3 class="box-title">اطلاعات</h3>
                    <hr>


                    <div class="row" style="direction: rtl;text-align: right;">
                        <div class="col-md-9">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>شماره فاکتور</th>
                                    <th>کد فروش</th>
                                    <th>نام خدمت</th>
                                    <th>نام همکار</th>
                                    <th>قیمت</th>
                                    <th>اعتبار مصرفی</th>
                                    <th>مبلغ پرداختی</th>
                                    <th>تاریخ</th>
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

                                $sql = "SELECT id, invoice_id, name, partner, price, credit_use, payment FROM invoice_service_list WHERE cid=$cid";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {

                                        $invoice_id = $row['invoice_id'];
                                        $invoice_list = "SELECT cid, date, time FROM invoice_list WHERE id = $invoice_id";
                                        $invoice_list = $conn->query($invoice_list);
                                        $invoice_list = $invoice_list->fetch_assoc();
                                        $date = $invoice_list['date'];
                                        $time = $invoice_list['time'];

                                        $customer_name = "SELECT firstname, lastname FROM customer_list WHERE id = $cid";
                                        $customer_name = $conn->query($customer_name);
                                        $customer_name = $customer_name->fetch_assoc();
                                        $customer_name = $customer_name['firstname'] .' '. $customer_name['lastname'];
                                        ?>

                                        <tr>
                                            <td><?php echo $invoice_id; ?></td>
                                            <td><?php echo $row["id"]; ?></td>
                                            <td><?php echo $row["name"]; ?></td>
                                            <td><?php echo $row["partner"]; ?></td>
                                            <td><?php echo $row["price"]; ?></td>
                                            <td><?php echo $row["credit_use"]; ?></td>
                                            <td><?php echo $row["payment"]; ?></td>
                                            <td><?php echo $date; ?></td>
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
                        <div class="col-md-3">
                            <p> کد مشتری : <?php echo $cid; ?></p>
                            <p> نام و نام خانوادگی : <?php echo $firstname.' '.$lastname; ?></p>
                            <p> موبایل : <?php echo $mobile; ?></p>
                            <p> تاریخ تولد : <?php echo $birthdate; ?></p>
                            <p> نحوه آشنایی : <?php ?></p>
                            <p> آدرس : <?php echo $adress; ?></p>
                            <p> اعتبار عمومی : <input id="pub_credit" type="text" value="<?php echo $credit_public; ?>" placeholder="0" style="width: 60px;"><button id="submit_pubcredit">بروزرسانی</button></p>
                            <p> بیعانه : <input id="deposit" type="text" value="<?php echo $deposit; ?>" placeholder="0" style="width: 60px;"><button id="submit_dep">بروزرسانی</button></p>
                            <span id="showr"></span>
                        </div>
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
    <script>
        var cid = <?php echo $cid; ?>;
    </script>
<?php include_once 'footer.php'; ?>

    <!-- Control Sidebar -->
<?php include_once 'control-sidebar.php'; ?>

    <!-- REQUIRED JS SCRIPTS -->
<?php include_once 'foot.php'; ?>