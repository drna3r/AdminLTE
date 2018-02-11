<?php
include_once 'config.php';
$form = $_GET["form"];

switch ($form) {

    /*--------------------------------------------- Form : addservice ---------------------------------------------*/
    case "addservice":

        $name = $_GET["name"];
        $price = $_GET["price"];
        $credit_in_first_use = $_GET["credit_in_first_use"];
        $period_use = $_GET["period_use"];
        $pu_t = $_GET["pu_t"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO services_list (name, price, credit_in_first_use, period_use, pu_t)
VALUES ('$name', '$price', '$credit_in_first_use', '$period_use', '$pu_t')";

        if ($conn->query($sql) === TRUE) {
            echo "خدمت جدید اضافه شد!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        break;


    /*--------------------------------------------- Form : update_service ---------------------------------------------*/
    case "update_service":

        $s_id = $_GET["s_id"];
        $name = $_GET["name"];
        $price = $_GET["price"];
        $credit_in_first_use = $_GET["credit_in_first_use"];
        $period_use = $_GET["period_use"];
        $pu_t = $_GET["pu_t"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE services_list (name, price, credit_in_first_use, period_use, pu_t)
VALUES ('$name', '$price', '$credit_in_first_use', '$period_use', '$pu_t')";

        $sql = "UPDATE services_list SET name = '$name', price = '$price' , credit_in_first_use = '$credit_in_first_use' , price = '$price' WHERE id = $s_id";
        if ($conn->query($sql) === TRUE) {
            echo "خدمت مورد نظر ویرایش شد!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        break;

    /*--------------------------------------------- Form : remove_service ---------------------------------------------*/
    case "remove_service":

        $s_id = $_GET["s_id"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "DELETE FROM services_list WHERE id = $s_id";

        if ($conn->query($sql) === TRUE) {
            echo "خدمت مورد نظر حذف شد!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        break;


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
        /*--------------------------------------------- Form : update_satisfaction ---------------------------------------------*/
    case "update_satisfaction":
        $s_id = $_GET["s_id"];
        $value = $_GET["value"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE invoice_service_list SET satisfaction = '$value' WHERE id = $s_id";
        if ($conn->query($sql) === TRUE) {echo " بروز شد!";} else {echo "Error: " . $sql . "<br>" . $conn->error;}

        $conn->close();
        break;

        /*--------------------------------------------- Form : update_satisfaction_description ---------------------------------------------*/
    case "update_satisfaction_description":
        $s_id = $_GET["s_id"];
        $description = $_GET["description"];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE invoice_service_list SET description = '$description' WHERE id = $s_id";
        if ($conn->query($sql) === TRUE) {echo " بروز شد!";} else {echo "Error: " . $sql . "<br>" . $conn->error;}

        $conn->close();
        break;


        /*-----------Defult------------*/
    default:
        echo "...noting!";
}