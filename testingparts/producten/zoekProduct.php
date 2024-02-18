<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Table - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-text mx-3"><span>QWERTYSHOP</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="../klanten/tableklanten.php"><i class="fas fa-table"></i><span>Tabel Producten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="productenToevoegen.php">Product toevoegen</a></li>
                    <li class="nav-item"><a class="nav-link" href="zoekProduct.php">Product zoeken</a></li>
                </ul>
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
                            <li class="nav-item"><a class="nav-link link-dark" href="#">Home</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="#">Pc's</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="#">Laptop</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="#">Components</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="#">Pages</a></li>
                            <li class="nav-item text-dark"><a class="nav-link link-dark" href="#">Login</a></li>
                            <li class="nav-item"><a class="nav-link link-dark" href="#">Admin</a></li>
                        </ul>
                    </div>
                </nav>
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">zoek product</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Artikels info</p>
                        </div>
                        <div class="card-body">
                            <div class="row row-cols-1">
                                    <form method="get" name="searchForm" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <label for="search">Zoek product:</label>
                                        <input type="text" name="searchValue" id="searchValue" class="form-control">

                                        <label for="searchColumn">Zoek op:</label>
                                        <select class="form-select" name="searchCategory" id="searchCategory">
                                            <option value="artikelnr">Productid</option>
                                            <option value="artikelnaam">Productnaam</option>
                                            <option value="korting">Korting</option>
                                            <option value="genreid">Genre</option>
                                            <option value="merk">Merk</option>
                                            <option value="omschrijving">omschrijving</option>
                                        </select>
                                        <br>
                                        <input type="submit" class="btn btn-primary" name="zoek" value="Zoek" id="zoek">
                                    </form>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <?php
                                    $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
                                    if(mysqli_connect_errno())
                                    {
                                        trigger_error('Fout bij verbinding:' .$mysqli->error);
                                    }
                                    else
                                    {
                                        if(isset($_GET['zoek']))
                                        {
                                            $zoekwaarde = "%" . $_GET['searchValue'] . "%";
                                            $zoekcategorie = $_GET['searchCategory'];

                                            $sql = "SELECT * FROM tblartikels WHERE $zoekcategorie LIKE ?";
                                            $stmt = $mysqli->prepare($sql);
                                            $stmt->bind_param('s', $zoekwaarde);
                                            $stmt->execute();
                                            $stmt->bind_result($productid, $productnaam,$prijs, $korting, $genre, $merk, $omschrijving);

                                            echo "<table class='table table-striped table-light my-0 table-bordered'>";
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>ProductID</th>";
                                            echo "<th>Productnaam</th>";
                                            echo "<th>Prijs</th>";
                                            echo "<th>Korting</th>";
                                            echo "<th>Genre</th>";
                                            echo "<th>Merk</th>";
                                            echo "<th>Omschrijving</th>";
                                            echo "<th> Update</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            while($stmt->fetch())
                                            {
                                                $update = $productid;
                                                echo "<tbody>";
                                                echo "<tr>";
                                                echo "<td>" . $productid . "</td>";
                                                echo "<td>" . $productnaam . "</td>";
                                                echo "<td>" . $prijs . "</td>";
                                                echo "<td>" .$korting . "</td>";
                                                echo "<td>" . $genre . "</td>";
                                                echo "<td>" . $omschrijving . "</td>";
                                                echo "<td>" . $merk  . "</td>";
                                                echo "<td>"
                                                ?>
                                                <form name="form2" method="post" action="updateProducten.php?actie=verander&artikelid=<?php echo $update ; ?> ">
                                                    <input type="submit" class="btn btn-success" name="update" id="update" value="Update">
                                                </form>
                                                <?php
                                                echo "</td>";
                                                echo "</tr>";
                                                echo "</tbody>";
                                            }
                                            echo "<tbody>";
                                        }

                                    }
                                  ?>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>