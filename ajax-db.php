<?php
include_once 'config.php';
$form = $_GET["form"];

switch ($form) {

    /*--------------------------------------------- Form : customer-list ---------------------------------------------*/
    case "customer-list":

        $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
//Set Charset UTF-8
        $conn->set_charset("utf8");

        /* Database connection end */


// storing  request (ie, get/post) global array to a variable
        $requestData= $_REQUEST;


        $columns = array(
// datatable column index  => database column name
            0 =>'id',
            1 => 'firstname',
            2 => 'lastname',
            3 => 'mobile',
            4 => 'birthdate',
            5 => 'introduction',
            6 => 'last_visit',
            7 => 'visit_count',
            8 => 'credit_partner',
            9 => 'credit_public',
            10 => 'group_id',
            11 => 'cash',
            12 => 'deposit',
            13 => 'id'
        );

// getting total number records without any search
        $sql = "SELECT * ";
        $sql.=" FROM customer_list";
        $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
        $totalData = mysqli_num_rows($query);
        $totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.


        $sql = "SELECT * ";
        $sql.=" FROM customer_list WHERE 1=1";
        if( !empty($requestData['search']['value']) ) {   // if there is a search parameter, $requestData['search']['value'] contains search parameter
            $sql.=" AND ( firstname LIKE '".$requestData['search']['value']."%' ";
            $sql.=" OR lastname LIKE '".$requestData['search']['value']."%' ";
            $sql.=" OR mobile LIKE '".$requestData['search']['value']."%' )";
        }
        $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");
        $totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
        $sql.=" ORDER BY ". $columns[$requestData['order'][0]['column']]."   ".$requestData['order'][0]['dir']."  LIMIT ".$requestData['start']." ,".$requestData['length']."   ";
        /* $requestData['order'][0]['column'] contains colmun index, $requestData['order'][0]['dir'] contains order such as asc/desc  */
        $query=mysqli_query($conn, $sql) or die("employee-grid-data.php: get employees");

        $data = array();
        while( $row=mysqli_fetch_array($query) ) {  // preparing an array
            $nestedData=array();

            $nestedData[] = '<td style="border-right: 1px solid #bcbcbc;text-align: center;"><a href="./customer.php?id='.$row["id"].'">'.$row["id"].'</a></td>';
            $nestedData[] = $row["firstname"];
            $nestedData[] = $row["lastname"];
            $nestedData[] = $row["mobile"];
            $nestedData[] = $row["birthdate"];
            $nestedData[] = $row["introduction"];
            $nestedData[] = $row["last_visit"];
            $nestedData[] = $row["visit_count"];
            $nestedData[] = $row["credit_partner"];
            $nestedData[] = $row["credit_public"];
            $nestedData[] = $row["group_id"];
            $nestedData[] = $row["cash"];
            $nestedData[] = $row["deposit"];
            $nestedData[] = '<td style="border-right: 1px solid #bcbcbc;text-align: center;"><a href="./invoice.php?id='.$row["id"].'"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></td>';

            $data[] = $nestedData;
        }



        $json_data = array(
            "draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw.
            "recordsTotal"    => intval( $totalData ),  // total number of records
            "recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
            "data"            => $data   // total data array
        );

        echo json_encode($json_data);  // send data as json format

        break;

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

        /*--------------------------------------------- Form : update_groups ---------------------------------------------*/
    case "update_groups":

        $n1=$_GET["n1"];
        $n2=$_GET["n2"];
        $n3=$_GET["n3"];
        $n4=$_GET["n4"];
        $p1=$_GET["p1"];
        $p2=$_GET["p2"];
        $p3=$_GET["p3"];
        $p4=$_GET["p4"];
        $u1=$_GET["u1"];
        $u2=$_GET["u2"];
        $u3=$_GET["u3"];
        $u4=$_GET["u4"];



        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE group_list SET description = '$value' WHERE id = $s_id";
        if ($conn->query($sql) === TRUE) {echo " بروز شد!";} else {echo "Error: " . $sql . "<br>" . $conn->error;}

        $conn->close();
        break;

        /*-----------Defult------------*/
    default:
        echo "...noting!";
}