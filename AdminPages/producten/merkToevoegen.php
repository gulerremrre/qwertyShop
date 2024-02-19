<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Merk</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>



<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>QwertyShop</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light navbar-collapse" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="tableproducten.php"><i class="fas fa-table"></i><span>Tabel producten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="productenToevoegen.php">producten toevoegen</a></li>
                    <li class="nav-item"><a class="nav-link" href="zoekProduct.php">producten zoeken</a></li>
                    <li class="nav-item"><a class="nav-link" href="genreToevoegen.php">genre toevoegen</a></li>


                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-expand bg-white shadow mb-4 topbar static-top navbar-light">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"></div>
                        </form>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown d-sm-none no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><i class="fas fa-search"></i></a>
                                <div class="dropdown-menu dropdown-menu-end p-3 animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="me-auto navbar-search w-100">
                                        <div class="input-group"><input class="bg-light form-control border-0 small" type="text" placeholder="Search for ...">
                                            <div class="input-group-append"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                        </div>
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item"><a class="nav-link link-dark" href="../../index.html">Home</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="../../gamingpc.html">Pc's</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="../../gaminglaptop.html">Laptop</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="#">Components</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="#">Pages</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="../../login.html">Login</a></li>
                            <li class="nav-item"><a class="nav-link link-dark" href="../main/Main.html">Admin</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Merk toevoegen</h3>
                    <div class="row mb-3">
                        <div class="col-lg-8 col-xl-12">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">



                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Merk toevoegen</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                <div class="mb-3">
                                                    <label class="form-label" for="merkid"><strong>Merk:</strong></label>
                                                    <input class="form-control" type="text" id="merkinput" name="merkinput" required>
                                                </div>
                                                <a href="merkToevoegen.php">
                                                    <div class="mb-3"><input class="btn btn-primary" id="merksubmit" name="merksubmit" type="submit" value="Merk toevoegen"></div>
                                                </a>
                                            </form>
                                        </div>
                                        <?php

                                        $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
                                        if ((isset($_POST["merksubmit"]))) {
                                            $sql = "INSERT INTO tblmerk (merk) VALUES (?)";
                                            $stmt = $mysqli->prepare($sql);
                                            $stmt->bind_param('s', $merk);
                                            $merk = $_POST['merkinput'];
                                            if ($stmt->execute()) {
                                                echo "Merk is toegevoegd";
                                            } else {
                                                echo "Merk is niet toegevoegd";
                                            }
                                            $stmt->close();
                                        }
                                        ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © QWERTYSHOP 2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>


</body>

</html>