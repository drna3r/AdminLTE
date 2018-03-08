<?php
//Include Config.php
include_once 'config.php';

//Include jdf.php - Jalali Date Library Alternative Date() Function In Php
include_once './plugins/jdate/jdf.php';

$cid = $_GET["cid"];
$date = jdate('Y/n/j','','','','en');
$time = jdate('H:i:s','','','','en');

//Variable Total In Invoice
$t_services = $_GET["t_services"];
$partner_credit_use = $_GET["partner_credit_use"];
$t_payment = $_GET["t_payment"];
$diposit_use = $_GET["diposit_use"];
$pcredit_use = $_GET["pcredit_use"];

//Variable Services Row
$invoice_id = $_GET["inv_id"];
$allsname = explode(",",$_GET["allsname"]);
$allspartner = explode(",",$_GET["allspartner"]);
$allsprice = explode(",",$_GET["allsprice"]);
$allscredituse = explode(",",$_GET["allscredituse"]);
$allspayment = explode(",",$_GET["allspayment"]);


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Set Charset UTF-8
$conn->set_charset("utf8");
// Check connection
if ($conn->connect_error) {die("Connection failed: " . $conn->connect_error);}


$sql = "INSERT INTO invoice_list (cid, date, time, pubcredit_use, deposit_use, total_service, partner_credit_use, total_payment)
VALUES ('$cid', '$date', '$time', '$pcredit_use', '$diposit_use', '$t_services', '$partner_credit_use', '$t_payment')";

if ($conn->query($sql) === TRUE) {} else {echo "Error: " . $sql . "<br>" . $conn->error;}

$i = 0;
foreach ($allsname as $name) {

$sql = "INSERT INTO invoice_service_list (invoice_id, cid, name, partner, price, credit_use, payment)
VALUES ('$invoice_id', '$cid', '$name', '$allspartner[$i]', '$allsprice[$i]', '$allscredituse[$i]', '$allspayment[$i]')";

if ($conn->query($sql) === TRUE) {} else {echo "Error: " . $sql . "<br>" . $conn->error;}
$i ++;
}


$sql = "UPDATE customer_list SET credit_public = credit_public - $pcredit_use, deposit = deposit - $diposit_use, visit_count = visit_count + 1, last_visit = '$date', cash = cash + $t_payment  WHERE id = $cid";
if ($conn->query($sql) === TRUE) {} else {echo "Error: " . $sql . "<br>" . $conn->error;}

$conn->close();


echo "<script>window.location = '../customer-list.php';</script>";