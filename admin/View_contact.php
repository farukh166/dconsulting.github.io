<?php
include "../connection/connect.php";

//clear session start notice......
error_reporting(E_ALL ^ E_NOTICE);

// session_start();
if (!isset($_SESSION)) {
    session_start();
}

$user = $_SESSION['username'];
if ($user == true) {
    $query = "select * from tb_contact";
    $result = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($result);
    $count = count($row);
} else {
    header('location:admin_login.php');
}
?>


<?php
include "partical-layout/head.php";

include "partical-layout/nav.php";
?>

<!-- Page content holder -->
<div class="page-content p-5" id="content">
    <!-- Toggle button -->
    <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

    <!-- Demo content -->

    <div class="container mb-4">
        <div class="row">
            <div class="col-md-12">
                <div class="a-head">
                    <h1>Contact Table</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="separator pt-0 pb-0"></div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="container">
                <div class="table-responsive table-responsive-sm table-responsive-md">
                    <table class="table table-bordered table-hover" id="myTable">
                        <thead class="bg-p">
                            <tr>
                                <th>S No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Comment</th>
                            </tr>
                        </thead>

                        <?php

                        if ($count > 0) {
                            $i = 0;
                            do {
                                $i = $i + 1;
                        ?>

                                <tbody>
                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['Name'] ?></td>
                                        <td><?php echo $row['Phone'] ?></td>
                                        <td><?php echo $row['Email'] ?></td>
                                        <td><?php echo $row['Comment'] ?></td>
                                    </tr>
                                </tbody>

                        <?php

                            } while ($row = mysqli_fetch_array($result));
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include "partical-layout/foot.php";
?>

