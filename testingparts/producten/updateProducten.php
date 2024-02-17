<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Profile - Brand</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
</head>

    <?php
        $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
        if (isset($_GET['artikelid']))
        {
            $update = $_GET['artikelid'];
        }

        $sql = "SELECT * FROM tblartikels WHERE artikelnr = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('i', $update);
        $stmt->execute();
        $stmt->bind_result($artikelnr, $artikelnaam_update, $prijs_update, $korting_update, $genreid_update, $omschrijving_update, $merk_update);
        $stmt->fetch();
        $stmt->close();
    ?>


    <?php


    if ((isset($_POST["voegtoe"])))
    {

        $sql = "UPDATE tblartikels SET artikelnaam = ?,prijs = ?, korting = ?, genreid = ?, omschrijving = ?, merk = ? WHERE artikelnr = ?";
        $stmt = $mysqli->prepare($sql);

        $productid = $_POST['productid'];
        $artikelNaam = $_POST['artikelnaam'];
        $korting = $_POST['korting'];
        $prijs = $_POST["prijs"];
        $merk = $_POST['merk'];
        $omschrijving = $_POST['omschrijving'];
        $genreid = $_POST['genre'];

        $stmt->bind_param('sdisssi', $artikelNaam, $prijs, $korting, $genreid, $omschrijving, $merk, $productid);
        if ($stmt->execute())
        {
            header("location:tableproducten.php");
        }
        else
        {
            echo '<p class="text-danger">Error: ' . $stmt->error . '</p>';
        }


        $stmt->close();

    }
    ?>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0 navbar-dark">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"></div>
                    <div class="sidebar-brand-text mx-3"><span>QwertyShop</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light navbar-collapse" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="tableproducten.php"><span>Alle Producten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="productenToevoegen.php">Toevoegen Producten</a></li>
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
                    <h3 class="text-dark mb-4">Update Product</h3>
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
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Product Toevoegen</p>
                                        </div>
                                        <div class="card-body">
                                            <form name="formtoevoegen" id="formtoevoegen" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <input type="hidden" name="productid" value="<?php echo $update; ?>">
                                                            <label class="form-label" for="artikelnaam"><strong>ArtikelNaam:</strong></label>
                                                            <input class="form-control" id="artikelnaam" type="text" name="artikelnaam" value="<?php echo $artikelnaam_update; ?>">
                                                            <label id="productongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="prijs"><strong>Prijs:</strong></label>
                                                            <input class="form-control" id="prijs" type="text" name="prijs" value="<?php echo $prijs_update; ?>">
                                                            <label id="prijsongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="korting"><strong>Korting:</strong></label>
                                                            <input class="form-control" id="korting" type="text" name="korting" value="<?php echo $korting_update; ?>">
                                                            <label id="kortingongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="omschrijving"><strong>Omschrijving:</strong></label>
                                                            <input class="form-control" type="text" id="omschrijving" name="omschrijving" value="<?php echo $omschrijving_update; ?>">
                                                            <label id="omschrijvingongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="merk"><strong>Merk:</strong></label>
                                                            <select class="form-select" id="merk" name="merk">
                                                                <optgroup label="Select Merk">
                                                                    <?php
                                                                    $sql = "SELECT merk FROM tblmerk ORDER BY merk ASC ";
                                                                    if ($stmt = $mysqli->prepare($sql))
                                                                    {
                                                                        if (!$stmt->execute())
                                                                        {
                                                                            echo 'Het uitvoeren van de query is mislukt: ' . $stmt->error . ' in query: ' . $sql;
                                                                        }
                                                                        else
                                                                        {
                                                                            $stmt->bind_result($merk);
                                                                            while ($stmt->fetch())
                                                                            {

                                                                                echo '<option>' . $merk .  '</option>';
                                                                            }
                                                                        }
                                                                        $stmt->close();
                                                                    }
                                                                    else
                                                                    {
                                                                        echo 'Er zit een fout in de query: ' . $mysqli->error;
                                                                    }
                                                                    ?>
                                                                </optgroup>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="genre"><strong>Genre:</strong></label>
                                                            <select class="form-select" id="genre" name="genre">
                                                                <optgroup label="Select Genre">
                                                                    <?php
                                                                        $sql = "SELECT genre FROM tblgenre ORDER BY genre ASC";

                                                                        if ($stmt = $mysqli->prepare($sql))
                                                                        {
                                                                            if (!$stmt->execute())
                                                                            {
                                                                                echo 'Het uitvoeren van de query is mislukt: ' . $stmt->error . ' in query: ' . $sql;
                                                                            }
                                                                            else
                                                                            {
                                                                                $stmt->bind_result($genre2);
                                                                                while ($stmt->fetch())
                                                                                {
                                                                                    echo '<option value="' . $genre2 . '">' . $genre2 .  '</option>';
                                                                                }
                                                                            }
                                                                            $stmt->close();
                                                                        }
                                                                        else
                                                                        {
                                                                            echo 'Er zit een fout in de query: ' . $mysqli->error;
                                                                        }
                                                                    ?>
                                                                </optgroup>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" name="voegtoe" id="voegtoe" value="voegtoe" class="btn btn-primary" onclick="wijzig(event)">
                                            </form>
                                        </div>
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

    <script>
        function wijzig(event)
        {
            let ok =true;

            if(document.getElementById("artikelnaam").value === "")
            {
                document.getElementById("productongeldig").innerHTML = "geef een productnaam in";
                ok = false
            }
            else
            {
                document.getElementById("productongeldig").innerHTML = "";
            }


            if(isNaN(document.getElementById("prijs").value) || document.getElementById("prijs").value === "")
            {
                document.getElementById("prijsongeldig").innerHTML = "Alleen cijfers invullen.";
                ok=false;

            }
            else
            {
                document.getElementById("prijsongeldig").innerHTML = "";

            }

            if(isNaN(document.getElementById("korting").value) || document.getElementById("korting").value === "" )
            {
                document.getElementById("kortingongeldig").innerHTML = "Alleen cijfers invullen.";
                ok=false;

            }
            else
            {
                document.getElementById("kortingongeldig").innerHTML = "";

            }

            if(document.getElementById("omschrijving").value === "")
            {
                document.getElementById("omschrijvingongeldig").innerHTML = "geef een omschrijving in";
                ok = false
            }
            else
            {
                document.getElementById("omschrijvingongeldig").innerHTML = "";
            }

            if(ok === true)
            {
                document.formtoevoegen.submit();
            }
            else
            {
                event.preventDefault();
            }

        }
    </script>
</body>

</html>