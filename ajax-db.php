<?php
include_once 'config.php';
$form = $_GET["form"];

switch ($form) {
    /*--------------------------------------------- Form : addpartner ---------------------------------------------*/
    case "addpartner":

        $name = $_GET["name"];
        $mobile = $_GET["mobile"];
        $start_coop = $_GET["start_coop"];
        $percent_coop = $_GET["percent_coop"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO partners_list (name, mobile, start_coop, percent_coop)
VALUES ('$name', '$mobile', '$start_coop', '$percent_coop')";

        if ($conn->query($sql) === TRUE) {
            echo "همکار جدید اضافه شد!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        break;

        /*--------------------------------------------- Form : update_deposit ---------------------------------------------*/
    case "update_deposit":
        $cid = $_GET["cid"];
        $deposit = $_GET["deposit"];
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE customer_list SET deposit = '$deposit' WHERE id = $cid";
        if ($conn->query($sql) === TRUE) {echo "مبلغ بیعانه بروز شد!";} else {echo "Error: " . $sql . "<br>" . $conn->error;}

        $conn->close();
        break;

        /*--------------------------------------------- Form : update_pubcredit ---------------------------------------------*/
    case "update_pubcredit":
        $cid = $_GET["cid"];
        $pubcredit = $_GET["pubcredit"];
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE customer_list SET credit_public = '$pubcredit' WHERE id = $cid";
        if ($conn->query($sql) === TRUE) {echo "اعتبار عمومی بروز شد! ";} else {echo "Error: " . $sql . "<br>" . $conn->error;}

        $conn->close();
        break;

        /*-----------Defult------------*/
    default:
        echo "...noting!";
}