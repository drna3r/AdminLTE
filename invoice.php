<?php
//page Information :
$page_title = 'صدور فاکتور';
$page_description = 'صفحه صدور فاکتور جدید برای مشتری';
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

$sql = "SELECT firstname, lastname FROM customer_list WHERE id=$cid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {

        $firstname = $row["firstname"];
        $lastname = $row["lastname"];
    }
} else {
    echo "0 results";
}

$conn->close();
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
                <h3 class="box-title"><?php echo $firstname.' '.$lastname; ?></h3>
                <br>
                <div class="modal modal-danger fade" id="modal-danger">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">خطا !</h4>
                            </div>
                            <div class="modal-body">
                                <p>لطفا همه ی گزینه ها را پر کنید!</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">بستن</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                <div class="box-body">

                    <div style="float:right;width:100%;">
                        <table>
                            <tbody>
                            <tr>
                                <th>اعتبار عمومی</ht>
                                <th>مبلغ بیعانه</ht>
                                <th>جمع کل خدمات</ht>
                                <th>اعتبار استفاده شده</ht>
                                <th>جمع کل پرداخت</ht>
                                 <th>ثبت فاکتور</ht>
                            </tr>
                            <tr>
                                <td><span class="credit_pub">0</span> (استفاده :<input id="use_credit_pub" type="checkbox">) </td>
                                <td><span class="deposit">0</span> (استفاده :<input id="use_deposit" type="checkbox">) </td>
                                <td class="total_services">0</td>
                                <td class="credt_payment">0</td>
                                <td class="total">0</td>
                                <td><button>ثبت فاکتور</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <br><br>
                    <br><br>
                    <br><br>
                    <table>
                        <tbody id="services_list">
                        <tr>
                            <td>خدمت</td>
                            <td>همکار</td>
                            <td>هزینه خدمت</td>
                            <td>اعتبار نزد همکار</td>
                            <td>استفاده از اعتبار</td>
                            <td>اعتبار قابل استفاده</td>
                            <td>مبلغ قابل پرداخت</td>
                            <td style="visibility: hidden;"><button>حذف</button></td>
                            <td style="visibility: hidden;"><button>چاپ</button></td>
                        </tr>

                        <tr>
                            <th>
                                <select class="service">
                                    <option value="" disabled selected>انتخاب خدمت</option>
                                    <option cost="20000" >رنگ کردن مو</option>
                                    <option cost="50000" >کوتاه کردن مو</option>
                                    <option cost="10000" >لاک زدن</option>
                                    <option cost="20000" >سشوار کشیدن</option>
                                </select>
                            </th>
                            <th>
                                <select class="partner" >
                                    <option value="" disabled selected>انتخاب همکار</option>
                                    <option id="1" >لیلا رسولی</option>
                                    <option id="2" >نجمه منیری</option>
                                    <option id="3" >منا شمس</option>
                                </select>
                            </th>
                            <th>
                                <input type="text" class="cost" placeholder="مبلغ خدمت">
                            </th>
                            <th>
                                <span class="credit">0</span>
                            </th>
                            <th>
                                <input id="c_check" type="checkbox" name="creditpublic">
                            </th>
                            <th>
                                <span type="text" class="credituse" >0</span>
                            </th>
                            <th>
                                <span type="text" class="pay" >0</span>
                            </th>
                            <th><button id="add">افزودن</button></th>
                            <th></th>
                        </tr>
                        </tbody>
                    </table>




                    <br>



                </div>

            </div>
            <!-- /.box-header -->

            <!-- /.box-body -->

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Print Section : Partner invoice Print-->
<div class="partner_print">
    <span>#8798787</span>
    <br>
    <img style="width:100%;" src="./dist/img/logo.png">
    <br>
   <span>خانم <?php echo $firstname.' '.$lastname; ?></span>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <span style="padding-right: 10px;">1396/10/30</span><span style="padding-left: 10px;">23:52:30</span>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <span>خدمت : </span><span id="pservice"></span>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <span>همکار : </span><span id="ppartner"></span>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <div style="width: 100%;background: gray !important;"><span>پرداخت نقدی : </span><span id="ppayment"></span><span> تومان </span></div>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <div id="qrcode" style="text-align: center;"></div>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <span>.</span></span>
</div>


<!-- Print Section : Cutomer invoice Print-->
<div class="total_print">
    <span>#8798787</span>
    <br>
    <img style="width:100%;" src="./dist/img/logo.png">
    <br>
    <span>خانم <?php echo $firstname.' '.$lastname; ?></span>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <span style="padding-right: 10px;">1396/10/30</span><span style="padding-left: 10px;">23:52:30</span>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">


    <table style="font-size: 12px;">
        <tbody id="tp_service">
        <tr style="background: gray !important;">
            <th>خدمت</th>
            <th>همکار</th>
            <th>پرداخت</th>
        </tr>
        </tbody>
    </table>
    <hr style="border-top: 1px solid #000;margin: 10px 0 3px 0">
    <hr style="border-top: 1px solid #000;margin: 2px 0 3px 0">
    <table style="font-size: 12px;">
        <tbody>
        <tr>
            <td style="background: gray !important;">
                مجموع فاکتور
            </td>
             <td>
                 120000
            </td>
        </tr>
          <tr>
            <td style="background: gray !important;">
                اعتبار اختصاصی استفاده شده
            </td>
             <td>
                 30000
            </td>
        </tr>
          <tr>
            <td style="background: gray !important;">
                اعتبار عمومی استفاده شده
            </td>
             <td>
                 10000
            </td>
        </tr>
          <tr>
            <td style="background: gray !important;">
                بیعانه
            </td>
             <td>
                 40000
            </td>
        </tr>
          <tr>
            <td style="background: gray !important;">
                مبلغ پرداختی
            </td>
             <td>
                 50000
            </td>
        </tr>
          <tr>
            <td style="background: gray !important;">
                مجموع اعتبار کسب شده
            </td>
             <td>
                 9000
            </td>
        </tr>
        </tbody>
    </table>


    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <div id="qrcode" style="text-align: center;"></div>
    <hr style="border-top: 1px solid #000;margin: 3px 0 3px 0">
    <span>تمام</span></span>
</div>







<!-- Main Footer -->
<?php include_once 'footer.php'; ?>

<!-- Control Sidebar -->
<?php include_once 'control-sidebar.php'; ?>

<!-- REQUIRED JS SCRIPTS -->
<?php include_once 'foot.php'; ?>
