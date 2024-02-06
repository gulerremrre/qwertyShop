<!-- updaten code door Raïf -->
<?php $Error = ''; ?>
<?php

$selectedgenre = "";
if (isset($_GET['klantid']))
{
    $update = $_GET['klantid'];
}

if (isset($_POST["Verander"])) 
{
    $update = isset($_POST["klantid"]) ? $_POST["klantid"] : null;
}
$mysqli = new MySqli("localhost", "root", "", "computershopphp");

if (mysqli_connect_errno()) 
{
    trigger_error('fout bij verbinding:' . $mysqli->error);
}

$sql = "SELECT * FROM tblklanten WHERE klantnr = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $update);
$stmt->execute();
$stmt->bind_result($klantnr, $klantvoornaam, $klantachternaam, $telefoon, $postcodeid, $email, $wachtwoord, $adres);
$stmt->fetch();

$stmt->close();


?>
<?php
if (isset($_POST["Verander"]))
{
    echo ("hier");
    if ((isset($_POST['klantnr'])) && (isset($_POST['voornaam'])) && ($_POST['voornaam'] != "")) {
        $Error = "";


        $sql = "UPDATE tblklanten SET klantvoornaam = ?, klantachternaam = ?, telefoon = ?, postcodeID = ?, email = ?, wachtwoord = ?, adres = ? WHERE klantnr = ?";
        if ($stmt = $mysqli->prepare($sql))
        {

            $klantnr = $_POST["klantnr"];
            $klantvoornaam = $_POST["voornaam"];
            $klantachternaam = $_POST["achternaam"];
            $telefoon = $_POST["telefoon"];
            $postcodeid = $_POST["postcodeid"];
            $email = $_POST["email"];
            $wachtwoord = $_POST["wachtwoord"];
            $adres = $_POST["adres"];
            $stmt->bind_param('sssssssi',$klantvoornaam,$klantachternaam, $telefoon, $postcodeid, $email, $wachtwoord, $adres, $klantnr);
            if ($stmt->execute()) {
                header("location:alleKlanten.php");
            }
            else
            {
                echo '<p class="text-danger">Error: ' . $stmt->error . '</p>';
            }

            $stmt->close();
        } 
        
    }
    else
    {
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

    <title>UpdateKlanten</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../../assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="../../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../../assets/css/lightbox.css">
    <link rel="stylesheet" href="../../assets/css/alleproducten.css">
    <script src="veranderenCheck.js"></script>

    <style>
        .fout {
            color: #F00;
        }
    </style>
</head>

<body>


    <!-- nav -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="../../index.html" >Home</a></li>
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
    <!-- form -->

    <div class="container pt-3 mt-5">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <h2 class="mt-5">Veranderen</h2>
                <form method="post" name="formverander" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-info rounded p-3 admin">
                    <div class="form-group">
                        <label for="klantnr">KlantNR:</label>
                        <input type="text" class="form-control" id="klantnr" name="klantnr" required value="<?php echo $klantnr; ?>">

                    </div>
                    <div class="form-group">
                        <label for="voornaam">Voornaam:</label>
                        <input type="text" class="form-control" id="voornaam" name="voornaam"  required value="<?php echo $klantvoornaam; ?>">
                        <label id="klantvoornaamongeldig" class="fout"></label>
                    </div>
                    <div class="form-group">
                        <label for="achternaam">Achternaam:</label>
                        <input type="text" class="form-control" id="achternaam" name="achternaam" required  value="<?php echo $klantachternaam; ?>">
                        <label id="klantachternaamongeldig" class="fout"></label>
                    </div>
                    <div class="form-group">
                        <label for="telefoon">Telefoon:</label>
                        <input type="text" class="form-control" id="telefoon" name="telefoon" required  value="<?php echo $telefoon; ?>">
                        <label id="telefoonongeldig" class="fout"></label>

                    </div>
                    <div class="form-group">
                        <label for="postcodeid">PostcodeID:</label>
                        <input type="text" class="form-control" id="postcodeid" name="postcodeid" required value="<?php echo $postcodeid; ?>">
                        <label id="postcodeongeldig" class="fout"></label>
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail:</label>
                        <input type="email" class="form-control" id="email" name="email" required value="<?php echo $email; ?>">
                        <label id="emailongeldig" class="fout"></label>

                    </div>
                    <div class="form-group">
                        <label for="wachtwoord">Wachtwoord:</label>
                        <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" required value="<?php echo $wachtwoord; ?>">
                        <label id="wachtwoordongeldig" class="fout"></label>
                    </div>
                    <div class="form-group">
                        <label for="adres">Adres:</label>
                        <input type="text" class="form-control" id="adres"  name="adres" required value="<?php echo $adres ?>">
                        <label id="adresongeldig" class="fout"></label>
                    </div>
                    <input type="submit" name="Verander" id="Verander" class="btn btn-primary" value="verander" onclick="wijzig()" />

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