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
    $Error = "";

    if ((isset($_POST["voegtoe"])))
    {

        $sql = "INSERT INTO tblklanten (klantvoornaam, klantachternaam, telefoon, postcodeid, email, wachtwoord, adres) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);


        if ($stmt === false) {
            die('prepare() failed: ' . htmlspecialchars($mysqli->error));
        }
        $klantvoornaam = $_POST['klantvoornaam'];
        $klantachternaam = $_POST['klantachternaam'];
        $telefoon = $_POST["telefoon"];
        $postcodeid = $_POST['postcode'];
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $adres = $_POST['adres'];
        $stmt->bind_param('sssssss', $klantvoornaam, $klantachternaam, $telefoon, $postcodeid, $email, $wachtwoord, $adres);

        if ($stmt->execute())
        {
            header("location:tableklanten.php");
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
                    <li class="nav-item"><a class="nav-link active" href="tableklanten.php"><span>Alle Klanten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="#"><span>Update Klanten</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="klantenToevoegen.php">Toevoegen Klanten</a></li>
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
                    <h3 class="text-dark mb-4">Klanten toevoegen</h3>
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
                                            <p class="text-primary m-0 fw-bold">Klanten Toevoegen</p>
                                        </div>
                                        <div class="card-body">
                                            <form name="formtoevoegen" id="formtoevoegen" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="klantvoornaam"><strong>klantvoornaam:</strong></label>
                                                            <input class="form-control" id="klantvoornaam" type="text" name="klantvoornaam" placeholder="voornaam">
                                                            <label id="voornaamongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="klantachternaam"><strong>klantachternaam:</strong></label>
                                                            <input class="form-control" id="klantachternaam" type="text" name="klantachternaam" placeholder="achternaam">
                                                            <label id="achternaamongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="telefoon"><strong>telefoon:</strong></label>
                                                            <input class="form-control" id="telefoon" type="text" name="telefoon" placeholder="04...">
                                                            <label id="telefoonongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="postcode"><strong>Postcode:</strong></label>
                                                            <select class="form-select" id="postcode" name="postcode">
                                                                <optgroup label="Select Postcode">
                                                                    <?php
                                                                    $sql = "SELECT postcode FROM tblpostcode ORDER BY postcode ASC ";
                                                                    if ($stmt = $mysqli->prepare($sql))
                                                                    {
                                                                        if (!$stmt->execute())
                                                                        {
                                                                            echo 'Het uitvoeren van de query is mislukt: ' . $stmt->error . ' in query: ' . $sql;
                                                                        }
                                                                        else
                                                                        {
                                                                            $stmt->bind_result($postcode);
                                                                            while ($stmt->fetch())
                                                                            {

                                                                                echo '<option>' . $postcode .  '</option>';
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
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="email"><strong>email:</strong></label>
                                                            <input class="form-control" type="text" id="email" name="email" placeholder="example@gmail.com">
                                                            <label id="emailongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="wachtwoord"><strong>wachtwoord:</strong></label>
                                                            <input class="form-control" type="password" id="wachtwoord" name="wachtwoord" placeholder="wachtwoord">
                                                            <label id="wachtwoordongeldig" class="text-danger"></label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <label class="form-label" for="adres"><strong>adres:</strong></label>
                                                            <input class="form-control" type="text" id="adres" name="adres" placeholder="adres">
                                                            <label id="adresongeldig" class="text-danger"></label>
                                                        </div>
                                                        <input type="submit" name="voegtoe" id="voegToe" value="voegtoe" class="btn btn-primary" onclick="wijzig(event)">
                                                    </div>
                                                </div>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">Postcode toevoegen</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                               <div class="row">
                                                   <div class="col">
                                                       <div class="mb-3">
                                                           <label class="form-label" for="postcodeinput"><strong>Postcode:</strong></label>
                                                           <input class="form-control" type="text" id="postcodeinput" name="postcodeinput" required>
                                                       </div>
                                                       <div class="col">
                                                           <div class="mb-3">
                                                            <label class="form-label" for="stadsinput"><strong>stadsnaam:</strong></label>
                                                            <input class="form-control" type="text" id="stadsinput" name="stadsinput" required>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                                <div class="mb-3"><input class="btn btn-primary" id="postcodesubmit" name="postcodesubmit" type="submit" value="Postcode Toevoegen"></div>
                                            </form>
                                        </div>
                                        <?php
                                        if ((isset($_POST["postcodesubmit"])))
                                        {
                                            $sql = "INSERT INTO tblpostcode (postcode, stadsnaam) VALUES (?, ?)";
                                            $stmt = $mysqli->prepare($sql);
                                            $postcode = $_POST['postcodeinput'];
                                            $stadsnaam = $_POST['stadsinput'];
                                            $stmt->bind_param('is', $postcode, $stadsnaam );
                                            if ($stmt->execute())
                                            {
                                                echo "Postcode is toegevoegd";
                                            }
                                            else
                                            {
                                                echo "Postcode is niet toegevoegd";
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

        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/theme.js"></script>

    <script>
        function wijzig(event)
        {
            let ok =true;

            if(document.getElementById("klantvoornaam").value === "")
            {
                document.getElementById("voornaamongeldig").innerHTML = "geef een voornaam in";
                ok = false
            }
            else
            {
                document.getElementById("voornaamongeldig").innerHTML = "";
            }


            if(document.getElementById("klantachternaam").value === "")
            {
                document.getElementById("achternaamongeldig").innerHTML = "geef een achternaam invullen.";
                ok=false;

            }
            else
            {
                document.getElementById("achternaamongeldig").innerHTML = "";

            }

            if(isNaN(document.getElementById("telefoon").value) || document.getElementById("telefoon").value === "" )
            {
                document.getElementById("telefoonongeldig").innerHTML = "Alleen cijfers invullen.";
                ok=false;

            }
            else
            {
                document.getElementById("telefoonongeldig").innerHTML = "";

            }

            if(document.getElementById("email").value === "")
            {
                document.getElementById("emailongeldig").innerHTML = "geef een email in";
                ok = false
            }
            else
            {
                document.getElementById("emailongeldig").innerHTML = "";
            }

            if(document.getElementById("wachtwoord").value === "")
            {
                document.getElementById("wachtwoordongeldig").innerHTML = "geef een wachtwoord in";
                ok = false
            }
            else
            {
                document.getElementById("wachtwoordongeldig").innerHTML = "";
            }


            if(document.getElementById("adres").value === "")
            {
                document.getElementById("adresongeldig").innerHTML = "geef een adres in";
                ok = false
            }
            else
            {
                document.getElementById("adresongeldig").innerHTML = "";
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