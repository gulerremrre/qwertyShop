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
                    <li class="nav-item"><a class="nav-link active" href="tableklanten.php"><i class="fas fa-table"></i><span>Table</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../klanten/klantenToevoegen.php">Toevoegen</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Updaten</a></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Alle Klanten</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">klanten info</p>
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
                                        $sql = "SELECT * FROM tblklanten";
                                        $stmt = $mysqli->prepare($sql);
                                        $stmt->execute();

                                        $stmt->bind_result($klantnr, $klantvoornaam, $klantachternaam, $telefoon, $postcodeid, $email, $wachtwoord, $adres);


                                        echo "<table class='table table-striped table-light my-0 table-bordered'>";
                                        echo "<thead>";
                                        echo "<tr>";
                                        echo "<th>Voornaam</th>";
                                        echo "<th>Achternaam</th>";
                                        echo "<th>Adres</th>";
                                        echo "<th>Postcode</th>";
                                        echo "<th>telefoon</th>";
                                        echo "<th>Email</th>";
                                        echo "<th>Wachtwoord</th>";
                                        echo "<th>Update</th>";
                                        echo "</tr>";
                                        echo "</thead>";
                                        while($stmt->fetch())
                                        {
                                            $update =$klantnr;
                                            echo "<tbody>";
                                            echo "<tr>";
                                            echo "<td>" . $klantvoornaam . "</td>";
                                            echo "<td>" . $klantachternaam . "</td>";
                                            echo "<td>" . $adres . "</td>";
                                            echo "<td>" . $telefoon . "</td>";
                                            echo "<td>" . $postcodeid . "</td>";
                                            echo "<td>" . $email . "</td>";
                                            echo "<td>" . $wachtwoord . "</td>";
                                            echo "<td>";
                                            ?>
                                            <form name="form2" method="post" action="updateKlant.php?actie=verander&klantid=<?php echo $update ; ?> ">
                                                <input type="submit" class="btn btn-success" name="update" id="update" value="Update">
                                            </form>
                                            <?php
                                            echo "</td>";
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
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">klanten info</p>
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
                                    $sql = "SELECT * FROM tblpostcode";
                                    $stmt = $mysqli->prepare($sql);
                                    $stmt->execute();

                                    $stmt->bind_result($postcodeid, $postcodenaam, $stadsnaam);


                                    echo "<table class='table table-striped table-light my-0 table-bordered'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>PostcodeID</th>";
                                    echo "<th>Postcodenaam</th>";
                                    echo "<th>Stadsnaam</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    while($stmt->fetch())
                                    {
                                        echo "<tbody>";
                                        echo "<tr>";
                                        echo "<td>" . $postcodeid . "</td>";
                                        echo "<td>" . $postcodenaam . "</td>";
                                        echo "<td>" . $stadsnaam . "</td>";
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
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright ©qwertyshop 2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>
</body>

</html>