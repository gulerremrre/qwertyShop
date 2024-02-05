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

    <link rel="stylesheet" href="../../assets/css/toeovegen.css">

    

    <style>
        .fout {
            color: #F00;
        }
    </style>

    <script type="text/javascript">

        function wijzig(){

            let ok =true;

            if(document.getElementById("productnaamtoe").value === "")
            {
                document.getElementById("productongeldig").innerHTML = "geef een productnaam in";
                ok = false
            }
            else
            {
                document.getElementById("productongeldig").innerHTML = "";
            }


            if(isNaN(document.getElementById("prijstoe").value))
            {
                document.getElementById("prijsongeldig").innerHTML = "Alleen cijfers invullen.";
                ok=false;

            }
            else
            {
                document.getElementById("prijsongeldig").innerHTML = "";

            }

            if(isNaN(document.getElementById("productkortingtoe").value))
            {
                document.getElementById("kortingongeldig").innerHTML = "Alleen cijfers invullen.";
                ok=false;

            }
            else
            {
                document.getElementById("kortingongeldig").innerHTML = "";

            }

            if(document.getElementById("merktoe").value === "" || document.getElementById("merktoe").value === "Select Merk" )
            {
                document.getElementById("merkongeldig").innerHTML = "geef een merk in aub";
                ok = false;
            }
            else
            {
                document.getElementById("merkongeldig").innerHTML = "";
            }

            if(document.getElementById("omschrijvingtoe").value === "")
            {
                document.getElementById("omschrijvingongeldig").innerHTML = "geef een omschrijving in";
                ok = false
            }
            else
            {
                document.getElementById("omschrijvingongeldig").innerHTML = "";
            }

            if(document.getElementById("genretoe").value === "" || document.getElementById("genretoe").value === "Select Genre")
            {
                document.getElementById("genreongeldig").innerHTML = "geef een genre in";
                ok = false;
            }
            else
            {
                document.getElementById("genreongeldig").innerHTML = "";
            }

            if(ok === true)
            {
                document.formtoevoegen.submit();
            }

        }
 
    </script>

<?php
        print_r($_POST);
        $mysqli = new MySQLi("localhost", "root", "", "computershopphp");
         $Error = "";

        if ((isset($_POST['productnaamtoe'])) && ($_POST['productnaamtoe']) != "")
        {
             
            $sql = "INSERT INTO tblartikels (artikelnaam, prijs, korting, genreid, omschrijving, merk) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $mysqli->prepare($sql);
        
            $stmt->bind_param('sdisss', $artikelNaam, $prijs, $korting, $genreid, $omschrijving, $merk);
            $artikelNaam = $_POST['productnaamtoe'];
            $korting = $_POST['productkortingtoe'];
            $prijs = $_POST["prijstoe"];
            $merk = $_POST['merktoe'];
            $omschrijving = $_POST['omschrijvingtoe'];
            $genreid = $_POST['genretoe'];


            if ($stmt->execute())
            {
                    header("location:alleProducten.php");
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


<!-- form -->
   
   <div class="container mt-5 ">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <br>
            <h2 class="mt-5">Toevoegen</h2>
            <br>
            <form name="formtoevoegen" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="bg-info bg-info  rounded p-3">
                <div class="form-group">
                    <label for="productnaamtoe">ArtikelNaam:</label>
                    <input type="text" class="form-control" id="productnaamtoe" required name="productnaamtoe">
                    <label id="productongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="prijstoe">Prijs:</label>
                    <input type="text" class="form-control" id="prijstoe" required name="prijstoe">
                    <label id="prijsongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="productkortingtoe">Korting:</label>
                    <input type="text" class="form-control" id="productkortingtoe" name="productkortingtoe">
                    <label id="kortingongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="merktoe">Merk:</label>
                    <select name="merktoe" id="merktoe" class="form-control">
                            <option value="" selected>Select Merk</option>
                            <?php
                            $sql = "SELECT merk FROM tblmerk ";

                            if ($stmt = $mysqli->prepare($sql))
                            {
                                if (!$stmt->execute())
                                {
                                    echo 'Het uitvoeren van de query is mislukt: ' . $stmt->error . ' in query: ' . $sql;
                                } else {
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
                    </select>
                    <label id="merkongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="omschrijvingtoe">Omschrijving:</label>
                    <input type="text" class="form-control" id="omschrijvingtoe" name="omschrijvingtoe">
                    <label id="omschrijvingongeldig" class="fout"></label>
                </div>
                <div class="form-group">
                    <label for="genretoe">Genre:</label>
                    <select name="genretoe" id="genretoe" class="form-control">
                            <option value="" selected>Select Genre</option>
                            <?php
                                $sql = "SELECT genre FROM tblgenre";

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
                        
                    </select>
                    <label id="genreongeldig" class="fout"></label>
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