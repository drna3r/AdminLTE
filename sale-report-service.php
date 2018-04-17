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
                    <div>جستجوی پیشرفته :</div>
                    <div class="row" style="border: 1px solid gray;padding: 10px 10px;margin: 10px 10px;">
                        <div class="col-md-1 form-group">
                            <label style="float: right;">سال</label>
                            <input id="search-date-y" class="search-date form-control" placeholder="سال"  style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                           cursor: auto;text-align: right;" type="text">
                        </div>
                         <div class="col-md-1 form-group">
                            <label style="float: right;">ماه</label>
                            <input id="search-date-m" class="search-date form-control" placeholder="ماه"  style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;" type="text">
                        </div>
                         <div class="col-md-1 form-group">
                            <label style="float: right;">روز</label>
                            <input id="search-date-d" class="search-date form-control" placeholder="روز"  style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;" type="text">
                        </div>
                         <div class="col-md-2 form-group">
                            <label style="float: right;">نام همکار</label>
                            <input id="search-partner" class="form-control" placeholder="نام همکار"  style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;" type="text">
                        </div>
                        <div class="col-md-2 form-group">
                            <label style="float: right;">نام خدمت</label>
                            <input id="search-service" class="form-control" placeholder="نام خدمت"  style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;" type="text">
                        </div>
                        <div class="col-md-2 form-group">
                            <label style="float: right;">نام مشتری</label>
                            <input id="search-customer" class="form-control" placeholder="نام مشتری"  style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;" type="text">
                        </div>
                        <div class="col-md-3 form-group">
                            <label style="float: right;">جستجوی عمومی</label>
                            <input id="search-general" class="form-control" placeholder="جستجوی عمومی"  style="
                               background-repeat: no-repeat; background-attachment: scroll;
                               background-size: 16px 18px; background-position: 98% 50%;
                               cursor: auto;text-align: right;" type="text">
                        </div>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th> مشتری</th>
                            <th>موبایل</th>
                            <th>شماره فاکتور</th>
                            <th>کد فروش</th>
                            <th>نام خدمت</th>
                            <th>نام همکار</th>
                            <th>قیمت</th>
                            <th>درصد همکار</th>
                            <th>اعتبار استفاده شده</th>
                            <th>مبلغ پرداختی</th>
                            <td>رضایت مشتری</td>
                             <td>توضیحات</td>
                            <th>تاریخ</th>
                            <th>ساعت</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td id="totalpercent" style="background: #000;color: #fff;">0</td>
                            <td></td>
                            <td id="totalcost" style="background: #000;color: #fff;">0</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tr>
                        </tfoot>
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

                        $sql = "SELECT * FROM invoice_service_list";
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

                                $customer = "SELECT firstname, lastname, mobile FROM customer_list WHERE id = $cid";
                                $customer = $conn->query($customer);
                                $customer = $customer->fetch_assoc();
                                $customer_name = $customer['firstname'] .' '. $customer['lastname'];
                                $customer_mobile = $customer['mobile'];

                                $partner_name = $row["partner"];
                                $partner_percent = "SELECT percent_coop FROM partners_list WHERE name = '$partner_name'";
                                $partner_percent = $conn->query($partner_percent);
                                $partner_percent = $partner_percent->fetch_assoc();
                                $partner_percent = $partner_percent['percent_coop'];
                                ?>

                                <tr>
                                    <td><?php echo $customer_name; ?></td>
                                    <td><?php echo $customer_mobile; ?></td>
                                    <td><?php echo $invoice_id; ?></td>
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["name"]; ?></td>
                                    <td><?php echo $row["partner"]; ?></td>
                                    <td><?php echo $row["price"]; ?></td>
                                    <td><?php echo ($row["price"] * $partner_percent) / 100; ?></td>
                                    <td><?php echo $row["credit_use"]; ?></td>
                                    <td><?php echo $row["payment"]; ?></td>
                                    <?php
                                    $vs_0 = $vs_1 = $vs_2 = $vs_3 = $vs_4 = '';
                                    switch ($row["satisfaction"]) {
                                            case 1:$vs_1 = 'selected';break;
                                            case 2:$vs_2 = 'selected';break;
                                            case 3:$vs_3 = 'selected';break;
                                            case 4:$vs_4 = 'selected';break;
                                        default:
                                            $vs_0 = 'selected';
                                    }
                                    ?>
                                    <td>
                                        <select class="satisfaction" s_id="<?php echo $row["id"]; ?>" autocomplete="off">
                                            <option value="0" <?php echo $vs_0; ?> >بی پاسخ</option>
                                            <option value="1" <?php echo $vs_1; ?> >کاملا راضی</option>
                                            <option value="2" <?php echo $vs_2; ?> >نسبتا راضی</option>
                                            <option value="3" <?php echo $vs_3; ?> >ناراضی</option>
                                            <option value="4" <?php echo $vs_4; ?> >بسیار ناراضی</option>
                                        </select>
                                        <span id="showr<?php echo $row["id"]; ?>"></span>
                                    </td>
                                    <td>
                                        <input id="desc<?php echo $row["id"]; ?>" type="text" style="max-width: 100px;" placeholder="توضیحات..." autocomplete="off" value="<?php echo $row["description"]; ?>">
                                            <button class="desc-btn fa fa-arrow-left" s_id="<?php echo $row["id"]; ?>" style="width: 30%;padding-right: 4px;cursor: pointer;"></button>
                                        <span id="showr-d<?php echo $row["id"]; ?>"></span>
                                        </td>
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