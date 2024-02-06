<?php $Error = ''; ?>

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
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../../assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="../../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../../assets/css/lightbox.css">

    <link rel="stylesheet" href="../../assets/css/update.css">

    <script src="WijzigenCheck.js"></script>

    <style>
        .fout {
            color: #F00;
        }
    </style>
</head>


<?php
        print_r($_POST);
        $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
         $Error = "";

        if ((isset($_POST['klantvoornaamtoe'])) && ($_POST['klantvoornaamtoe']) != "")
        {
             
            $sql = "INSERT INTO tblklanten (klantvoornaam, klantachternaam, telefoon, postcodeID, email, wachtwoord, adres) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
        
            $stmt->bind_param('ssssss', $voornaam, $achternaam, $telefoon, $postcodeid, $email, $wachtwoord, $adres);
            $voornaam = $_POST['klantvoornaamtoe'];
            $achternaam = $_POST['klantachternaam'];
            $telefoon = $_POST["telefoon"];
            $postcodeid = $_POST['postcode'];
            $email = $_POST['email'];
            $wachtwoord = $_POST['wachtwoord'];
            $adres = $_POST['adres'];


            if ($stmt->execute())
            {
                    header("location:alleKlanten.php");
            } 
            else 
            {
                    echo '<p class="text-danger">Error: ' . $stmt->error . '</p>';
            }
        

            $stmt->close();

        } 
        else 
        {
                $Error = '<p class="text-danger">Vul alle velden in.</p>';
                echo $Error;
        }
        
    ?>

<body>
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
   
   <div class="container mt-5 ">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <br>
            <h2 class="mt-5">Toevoegen</h2>
            <br>
            <form name="formtoevoegen" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-info bg-info  rounded p-3">
                <div class="form-group">
                    <label for="klantvoornaamtoe">voornaam:</label>
                    <input type="text" class="form-control" id="klantvoornaamtoe" required name="klantvoornaamtoe">
                    <label id="klantvoornaamongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="klantachternaam">achternaam:</label>
                    <input type="text" class="form-control" id="klantachternaam" required name="klantachternaam">
                    <label id="klantachternaamongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="telefoon">telefoon:</label>
                    <input type="text" class="form-control" id="telefoon" required name="telefoon">
                    <label id="telefoonongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="postcode">PostcodeID:</label>
                    <input type="text" class="form-control" id="postcode" required name="postcode">
                    <label id="postcodeongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" required name="email">
                    <label id="emailongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="wachtwoord">Wachtwoord:</label>
                    <input type="password" class="form-control" id="wachtwoord" required name="wachtwoord">
                    <label id="wachtwoordongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="adres">Adres:</label>
                    <input type="text" class="form-control" id="adres" required name="adres">
                    <label id="adresongeldig" class="fout"></label>
                </div>


                    <input type="button" name="voegtoe" id="voegToe" value="voegtoe" class="btn btn-secondary" onclick="wijzig()">
            </form>
            <br>
        </div>
    </div>

<!-- form -->


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