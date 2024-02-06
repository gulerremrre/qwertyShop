<!-- updaten code door Raïf -->
<?php $Error = ''; ?>
<?php

$selectedgenre = "";
if (isset($_GET['artikelid'])) {
    $update = $_GET['artikelid'];
}

if (isset($_POST["Verander"])) {
    $update = $_POST["productid"];
}
$mysqli = new MySqli("localhost", "root", "", "computershopphp");

if (mysqli_connect_errno()) {
    trigger_error('fout bij verbinding:' . $mysqli->error);
}

$sql = "SELECT * FROM tblartikels WHERE artikelnr = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $update);
$stmt->execute();
$stmt->bind_result($artikelnr, $artikelnaam, $prijs, $korting, $genreid, $omschrijving, $merk);
$stmt->fetch();

$stmt->close();


?>
<?php
if (isset($_POST["Verander"])) {
    echo ("hier");
    if ((isset($_POST['productid'])) && (isset($_POST['productnaam'])) && ($_POST['productnaam'] != "")) {
        $Error = "";


        $sql = "UPDATE tblartikels SET artikelnaam = ?,prijs = ?, korting = ?, genreid = ?, omschrijving = ?, merk = ? WHERE artikelnr = ?";
        if ($stmt = $mysqli->prepare($sql)) {

            $artikelnr = $_POST["productid"];
            $artikelnaam = $_POST["productnaam"];
            $korting = $_POST["productkorting"];
            $prijs = $_POST["Prijs"];
            $merk = $_POST["merk"];
            $genreid = $_POST["Genre"];
            $Omschrijving = $_POST["Omschrijving"];
            $stmt->bind_param('sidsssi', $artikelnaam, $prijs, $korting, $genreid, $Omschrijving, $merk, $artikelnr);

            if ($stmt->execute()) {
                header("location:alleProducten.php");
            } else {
                echo '<p class="text-danger">Error: ' . $stmt->error . '</p>';
            }
            $stmt->close();
        }
    } else {
        $Error = '<p class="text-danger">vul in alle velden.</p>';
    }
}
?>
<!-- updaten code door raïf -->



<!DOCTYPE html>
<html lang="en">

<head>



    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>update</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../../assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="../../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../../assets/css/lightbox.css">
    <link rel="stylesheet" href="../../assets/css/update.css">
</head>

<body>

<!-- nav -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="../../index.html">Home</a></li>
                        <li class="scroll-to-section"><a href="../../gamingpc.html">Pc's</a></li>
                        <li class="scroll-to-section"><a href="../../gaminglaptop.html">Laptops</a></li>

                        <li class="submenu">
                            <a href="javascript:">components</a>
                            <ul>
                                <li><a href="../../cpu.html">CPU</a></li>
                                <li><a href="../../gpu.html">GPU</a></li>
                                <li><a href="../../products.html">SSD</a></li>
                            </ul>
                        </li>
                        <li class="submenu">
                            <a href="javascript:">Pages</a>
                        </li>
                        <li class="scroll-to-section"><a href="../../login.html">login</a></li>
                        <li class="scroll-to-section"><a href="../adminMain.html">Admin</a></li>
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- nav -->

<!-- form -->

<div class="container pt-3 mt-5">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2 class="mt-5">Veranderen</h2>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-info rounded p-3 admin">
                <div class="form-group">
                    <label for="productid">ArtikelNR:</label>
                    <input type="text" class="form-control" id="productid" name="productid" required value="<?php echo $artikelnr; ?>">
                </div>
                <div class="form-group">
                    <label for="productnaam">ArtikelNaam:</label>
                    <input type="text" class="form-control" id="productnaam" name="productnaam" required value="<?php echo $artikelnaam; ?>">

                </div>
                <div class="form-group">
                    <label for="productkorting">Korting:</label>
                    <input type="text" class="form-control" id="productkorting" name="productkorting" required value="<?php echo $korting; ?>">

                </div>
                <div class="form-group">
                    <label for="Prijs">Prijs:</label>
                    <input type="text" class="form-control" id="Prijs" name="Prijs" required value="<?php echo $prijs; ?>">

                </div>
                <div class="form-group">
                    <label for="merk">Merk:</label>
                    <select name="merk" id="merk" class="form-control">
                        <option value="" selected><?php echo $merk; ?></option>
                        <?php
                        $sql = "SELECT merk FROM tblmerk ";

                        if ($stmt = $mysqli->prepare($sql)) {
                            if (!$stmt->execute()) {
                                echo 'Het uitvoeren van de query is mislukt: ' . $stmt->error . ' in query: ' . $sql;
                            } else {
                                $stmt->bind_result($merk);
                                while ($stmt->fetch()) {

                                    echo '<option>' . $merk .  '</option>';
                                }
                            }
                            $stmt->close();
                        } else {
                            echo 'Er zit een fout in de query: ' . $mysqli->error;
                        }

                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="Omschrijving">Omschrijving:</label>
                    <input type="text" class="form-control" id="Omschrijving" name="Omschrijving" value="<?php echo $omschrijving; ?>">

                </div>
                <div class="form-group">
                    <label for="Genre">Genre:</label>
                    <select name="Genre" id="Genre" class="form-control">
                        <option value="" selected><?php echo $genreid; ?></option>
                        <?php
                        $sql = "SELECT genre FROM tblgenre";

                        if ($stmt = $mysqli->prepare($sql)) {
                            if (!$stmt->execute()) {
                                echo 'Het uitvoeren van de query is mislukt: ' . $stmt->error . ' in query: ' . $sql;
                            } else {
                                $stmt->bind_result($genreid);
                                while ($stmt->fetch()) {
                                    echo '<option>' . $genreid .  '</option>';
                                }
                            }
                            $stmt->close();
                        } else {
                            echo 'Er zit een fout in de query: ' . $mysqli->error;
                        }
                        ?>

                    </select>

                </div>
                <button type="submit" name="Verander" id="Verander" class="btn btn-primary">Verander</button>
                <label> <?php echo $Error; ?></label>

            </form>

        </div>


    </div>

</div>




<!-- jQuery -->
<script src="../../assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="../../assets/js/popper.js"></script>
<script src="../../assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="../../assets/js/owl-carousel.js"></script>
<script src="../../assets/js/accordions.js"></script>
<script src="../../assets/js/datepicker.js"></script>
<script src="../../assets/js/scrollreveal.min.js"></script>
<script src="../../assets/js/waypoints.min.js"></script>
<script src="../../assets/js/jquery.counterup.min.js"></script>
<script src="../../assets/js/imgfix.min.js"></script>
<script src="../../assets/js/slick.js"></script>
<script src="../../assets/js/lightbox.js"></script>
<script src="../../assets/js/isotope.js"></script>

<!-- Global Init -->
<script src="../../assets/js/custom.js"></script>


</body>

</html>