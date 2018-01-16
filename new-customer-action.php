
<?php
//page Information :
$page_title = 'مشتری جدید';
$page_description = 'صفحه اضافه کردن مشتری جدید';

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

        <?php
        $firstname = $_GET['firstname'];
        $lastname = $_GET['lastname'];
        $mobile = $_GET['mobile'];
        $birthdate = $_GET['birthdate'];
        $adress = $_GET['adress'];
        $introduction = $_GET['introduction'];

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        //Set Charset UTF-8
        $conn->set_charset("utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "INSERT INTO customer_list (firstname, lastname, mobile, birthdate, adress, introduction)
VALUES ('$firstname', '$lastname', '$mobile', '$birthdate', '$adress', '$introduction')";

        if ($conn->query($sql) === TRUE) {
            echo "مشتری جدید به لیست مشتریان اضافه شد.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Main Footer -->
<?php include_once 'footer.php';?>

<!-- Control Sidebar -->
<?php include_once 'control-sidebar.php'; ?>

<!-- REQUIRED JS SCRIPTS -->
<?php include_once 'foot.php'; ?>