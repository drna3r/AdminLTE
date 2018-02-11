<?php
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

                        $projectinfo = "SELECT * FROM projectinfo";
                        $projectinfo = $conn->query($projectinfo);
                        $projectinfo = $projectinfo->fetch_all();
                        $project_name = $projectinfo[0][2];
                        $project_logo = $projectinfo[2][2];

                        $conn->close();

                        ?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel" style="text-align: center;">
            <span style="color: #fff;"><?php echo $project_name; ?></span>
            </div>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">منو اصلی</li>
            <!-- Optionally, you can add icons to the links -->
            <li><a href="./new-customer.php"><i class="fa fa-id-card"></i> <span>مشتری جدید</span></a></li>
            <li><a href="./customer-list.php"><i class="fa fa-user-circle "></i> <span>لیست مشتریان</span></a></li>
            <li class="treeview menu-open">
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span>گزارش فروش</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="./sale-report-service.php"><i class="fa fa-circle-o"></i> بر اساس خدمت</a></li>
                    <li><a href="./sale-report-invoice.php"><i class="fa fa-circle-o"></i> بر اساس فاکتور</a></li>
                </ul>
            </li>
            <li class="treeview menu-open">
                <a href="#">
                    <i class="fa fa-bar-chart"></i>
                    <span>پنل مدیریت</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu" style="display: block;">
                    <li><a href="./define-service.php"><i class="fa fa-circle-o"></i>خدمات</a></li>
                    <li><a href="./define-partner.php"><i class="fa fa-circle-o"></i>همکاران</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>