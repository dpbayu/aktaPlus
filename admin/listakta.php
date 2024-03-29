<!-- PHP Start -->
<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location: ../index.php");
    exit;
}
require "function.php";
$aktas = query("SELECT * FROM akta ORDER BY id DESC");
$page = 'akta';
?>
<!-- PHP End -->

<!DOCTYPE html>
<html lang="en">

<!-- Head Start -->
<?php require "partials/head.php" ?>
<!-- Head End -->

<body>
    <div class="container-scroller">
        <!-- Navbar Start -->
        <?php require "partials/navbar.php" ?>
        <!-- Navbar End -->
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar Start -->
            <?php require "partials/sidebar.php" ?>
            <!-- Sidebar End -->
            <div class="main-panel">
                <!-- Content Start -->
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">
                            <span class="page-title-icon bg-gradient-primary text-white me-2">
                                <i class="mdi mdi-database"></i>
                            </span>List Akta
                        </h3>
                    </div>
                    <div class="d-flex mb-3">
                        <a href="report.php?reportakta=true" class="btn btn-gradient-dark">Report Akta</a>
                    </div>
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                if (isset($_GET['message'])) {
                                    $msg = $_GET['message'];
                                    echo '
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>'.$msg.'</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>';
                                }
                                ?>
                                <h4 class="card-title">Table Akta</h4>
                                <table class="table table-hover pt-3 mb-3" id="example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No Akta</th>
                                            <th>Date</th>
                                            <th>Type Akta</th>
                                            <th>Seller</th>
                                            <th>Buyer</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach($aktas as $akta) : ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $akta["no_akta"] ?></td>
                                            <td><?= date("j F Y, l", strtotime($akta['created_at'])) ?></td>
                                            <td><?= $akta["type_akta"] ?></td>
                                            <td><?= $akta["seller"] ?></td>
                                            <td><?= $akta["buyer"] ?></td>
                                            <td><?= $akta["address"] ?></td>
                                            <td>
                                                <a href="editakta.php?id=<?= $akta['id'] ?>"
                                                    class="btn btn-inverse-success btn-rounded btn-icon"
                                                    style="padding-top: 12px;">
                                                    <i class="mdi mdi-tooltip-edit"></i>
                                                </a>
                                                <a href="detailakta.php?id=<?= $akta['id'] ?>"
                                                    class="btn btn-inverse-info btn-rounded btn-icon"
                                                    style="padding-top: 12px;">
                                                    <i class="mdi mdi-printer"></i>
                                                </a>
                                                <a href="viewpdf.php?id=<?= $akta['id'] ?>"
                                                    class="btn btn-inverse-primary btn-rounded btn-icon"
                                                    style="padding-top: 12px;">
                                                    <i class="mdi mdi-briefcase-download"></i>
                                                </a>
                                                <a onclick="return confirm('Are you sure delete this data ?')"
                                                    href="deleteakta.php?id=<?= $akta['id'] ?>"
                                                    class="btn btn-inverse-danger btn-rounded btn-icon"
                                                    style="padding-top: 12px;">
                                                    <i class="mdi mdi-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content End -->
                <!-- Footer Start -->
                <?php require "partials/footer.php" ?>
                <!-- Footer End -->
            </div>
        </div>
    </div>
</body>

</html>