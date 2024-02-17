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
                    <li class="nav-item"><a class="nav-link active" href="../klanten/tableklanten.php"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="productenToevoegen.php">Toevoegen</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Updaten</a></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Alle Artikels</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Artikels info</p>
                        </div>
                        <div class="card-body">
                            <div class="row row-cols-1">
                                <div class="col-auto col-md-auto col-xl-auto text-nowrap"><input class="bg-primary-subtle border-0 small" type="text" placeholder="Search for ..." title="e"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <?php
                                    $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
                                    if(mysqli_connect_errno())
                                    {
                                        trigger_error('Fout bij verbinding:' .$mysqli->error);
                                    }
                                    else {
                                        $sql = "SELECT * FROM tblartikels";
                                        $stmt = $mysqli->prepare($sql);
                                        $stmt->execute();

                                        $stmt->bind_result($productid, $productnaam, $prijs, $korting, $genre, $merk, $omschrijving);


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
                                            echo "<td>" . $merk . "</td>";
                                            echo "<td>" . $omschrijving . "</td>";
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
                                  ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-xl-5"">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="text-primary m-0 fw-bold">Merk info</p>
                                </div>
                                <div class="card-body">
                                    <div class="row row-cols-1">
                                        <div class="col-auto col-md-auto col-xl-auto text-nowrap"><input class="bg-primary-subtle border-0 small" type="text" placeholder="Search for ..." title="e"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable2" role="grid" aria-describedby="dataTable_info">
                                        <?php
                                        $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
                                        if(mysqli_connect_errno())
                                        {
                                            trigger_error('Fout bij verbinding:' .$mysqli->error);
                                        }
                                        else {
                                            $sql = "SELECT * FROM tblmerk";
                                            $stmt = $mysqli->prepare($sql);
                                            $stmt->execute();

                                            $stmt->bind_result($merkid, $merknaam);


                                            echo "<table class='table table-striped table-light my-0 table-bordered'>";
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>MerkID</th>";
                                            echo "<th>Merk naam</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            while($stmt->fetch())
                                            {
                                                echo "<tbody>";
                                                echo "<tr>";
                                                echo "<td>" . $merkid . "</td>";
                                                echo "<td>" . $merknaam. "</td>";
                                                echo "</tr>";
                                                echo "</tbody>";
                                            }
                                            echo "<tbody>";

                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5">
                        <div class="card shadow">
                            <div class="card-header py-3">
                                <p class="text-primary m-0 fw-bold">Merk info</p>
                            </div>
                            <div class="card-body">
                                <div class="row row-cols-1">
                                    <div class="col-auto col-md-auto col-xl-auto text-nowrap"><input class="bg-primary-subtle border-0 small" type="text" placeholder="Search for ..." title="e"><button class="btn btn-primary py-0" type="button"><i class="fas fa-search"></i></button></div>
                                </div>
                                <div class="table-responsive table mt-2" id="dataTable3" role="grid" aria-describedby="dataTable_info">
                                    <?php
                                    $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
                                    if(mysqli_connect_errno())
                                    {
                                        trigger_error('Fout bij verbinding:' .$mysqli->error);
                                    }
                                    else {
                                        $sql = "SELECT * FROM tblgenre";
                                        $stmt = $mysqli->prepare($sql);
                                        $stmt->execute();

                                        $stmt->bind_result($genreid, $genrenaam);


                                        echo "<table class='table table-striped table-light my-0 table-bordered'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>genreID</th>";
                                        echo "<th>genre naam</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        while($stmt->fetch())
                                        {
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>" . $genreid . "</td>";
                                            echo "<td>" . $genrenaam. "</td>";
                                            echo "</tr>";
                                            echo "</tbody>";
                                        }
                                        echo "<tbody>";

                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                    </table>
                                </div>
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