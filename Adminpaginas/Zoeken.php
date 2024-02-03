<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Hexashop - Product Listing Page</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
    <link rel="stylesheet" href="assets/css/zoeken.css">
</head>

<body>
<!-- nav -->
<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="index.html" >Home</a></li>
                            <li class="scroll-to-section"><a href="gamingpc.html">Pc's</a></li>
                            <li class="scroll-to-section"><a href="gaminglaptop.html">Laptops</a></li>

                            <li class="submenu">
                                <a href="javascript:">components</a>
                                <ul>
                                    <li><a href="cpu.html">CPU</a></li>
                                    <li><a href="gpu.html">GPU</a></li>
                                    <li><a href="products.html">SSD</a></li>
                                </ul>
                            </li>
                            <li class="submenu">
                                <a href="javascript:">Pages</a>
                            </li>
                            <li class="scroll-to-section"><a href="login.html">login</a></li>
                            <li class="scroll-to-section"><a href="alleProducten.php">Admin</a></li>
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

<div class="container mt-5 pt-5" >
    <div class="row">
        <div class="col-md-8 mx-auto">
            <h2>Zoeken</h2>
            <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>" name="searchForm" class="bg-info border rounded p-3">
                <div class="form-group">
                    <label for="searchCategory">Selecteer zoekcategorie:</label>
                    <select class="form-control" id="searchCategory" name="searchCategory">
                        <option value="artikelnr">Artikelnummer</option>
                        <option value="artikelnaam">Artikelnaam</option>
                        <option value="prijs">Prijs</option>
                        <option value="korting">Korting</option>
                        <option value="genreid">GenreID</option>
                        <option value="omschrijving">Omschrijving</option>
                        <option value="merk">Merk</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="searchValue">Voer zoekterm in:</label>
                    <input type="text" class="form-control" id="searchValue" name="searchValue" list="search" placeholder="geef een zoekwaarde in" required>
                </div>
                <input type="submit" name="Zoek" id="Zoek" value="Zoek" class="btn btn-primary">
            </form>
        </div>
    </div>
                <?php
                    $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
                    if(isset($_GET['Zoek']))
                    {
                        if((isset($_GET['searchValue'])) && ($_GET['searchValue'] != ""))
                        {
                            $zoekWaarde = "%" . $_GET['searchValue'] . "%";
                            $zoekcategorie = $_GET['searchCategory'];

                            $sql = "SELECT * FROM tblartikels WHERE $zoekcategorie LIKE ?";
                            $stmt = $mysqli->prepare($sql);
                            $stmt->bind_param("s", $zoekWaarde);
                            $stmt->execute();
                            $stmt->bind_result($artikelnr, $artikelnaam, $prijs, $korting, $genreid, $omschrijving, $merk);
                            
                            echo "<div class='row'>";
                            echo '<div class="col-md-8 table-responsive mx-auto">';
                            echo '<h2>Resultaten</h2>';
                            echo '<br><table class="table table-responsive table-dark table-striped">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th scope="col">ArtikelNR</th>';
                            echo '<th scope="col">ArtikelNaam</th>';
                            echo '<th scope="col">Prijs</th>';
                            echo '<th scope="col">Korting</th>';
                            echo '<th scope="col">Genre</th>';
                            echo '<th scope="col">Omschrijving</th>';
                            echo '<th scope="col">Merk</th>';
                            echo '</tr>';
                            echo '</thead>';
    
                            while ($stmt->fetch()) {
                                echo "<tr>";
                                echo "<td>";
                                echo $artikelnr;
                                echo "</td>";
                                echo "<td>";
                                echo $artikelnaam;
                                echo "</td>";
                                echo "<td>";
                                echo $prijs;
                                echo "</td>";
                                echo "<td>";
                                echo $korting;
                                echo "</td>";
                                echo "<td>";
                                echo $genreid;
                                echo "</td>";
                                echo "<td>";
                                echo $omschrijving;
                                echo "</td>";
                                echo "<td>";
                                echo $merk;
                                echo "</td>";
                                echo "</tr>";
                            }
    
                            echo "</table>";
                            echo "</div>";
                            echo "</div>";
    
                            $stmt->close();
                        }
                        else
                        {
                            echo "<span class='text-danger'>geen zoekwaarde ingegeven</span>";
                        }
                    }
                    
                ?>
 
<!-- verwijder code door Rayan -->

 <!-- jQuery -->
 <script src="assets/js/jquery-2.1.0.min.js"></script>

<!-- Bootstrap -->
<script src="assets/js/popper.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<!-- Plugins -->
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/accordions.js"></script>
<script src="assets/js/datepicker.js"></script>
<script src="assets/js/scrollreveal.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/imgfix.min.js"></script> 
<script src="assets/js/slick.js"></script> 
<script src="assets/js/lightbox.js"></script> 
<script src="assets/js/isotope.js"></script> 

<!-- Global Init -->
<script src="assets/js/custom.js"></script>


</body>
</html>