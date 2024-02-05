<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>alleklanten</title>


    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="../../assets/css/font-awesome.css">

    <link rel="stylesheet" href="../../assets/css/templatemo-hexashop.css">

    <link rel="stylesheet" href="../../assets/css/owl-carousel.css">

    <link rel="stylesheet" href="../../assets/css/lightbox.css">
    <link rel="stylesheet" href="../../assets/css/zoeken.css">
</head>
<body>



    <!-- verwijder code door Rayan -->

        <?php
            if ((isset($_GET['actie']) && $_GET['actie'] == 'wis') && (isset($_GET['klantid'])))
            {
                $mysqli = new MySQli ("localhost", "root", "", "computershopphp");

                if(mysqli_connect_errno())
                {
                    trigger_error('fout bij verbinding:' .$mysqli->error);
                }


                $sql =
                    "DELETE 
                        from tblklanten
                        WHERE klantnr = ?";

                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('i',$klantnrd);
                $klantnrd = $_GET["klantid"];
                $stmt->execute();
                $stmt->close();
                echo "<span class='text-success'>product is gewist</span>";
            }
        ?>


        <?php

            $mysqli = new MySQLi ("localhost", "root", "", "computershopphp");
            
            if (mysqli_connect_errno())
            {
                trigger_error('Fout bij verbinding:' .$mysqli->error);
            }
            else
            {
                $sql = "SELECT * FROM tblklanten";
                $stmt = $mysqli->prepare($sql);
                $stmt->execute();

                $stmt->bind_result($klantnr, $klantvoornaam, $klantachternaam, $telefoon, $postcodeID, $email, $wachtwoord);
                echo '<div class="container pt-5 mt-5">';
                echo '<div class="card admin">';
                echo '<div class="card-body card-responsive">';
                echo "<h2 class='card-header'> alle Klanten <a href='toevoegenKlanten.php'><input type='submit' class='btn btn-primary' value='Zoek'></a> <a href=''><input type='submit' class='btn btn-info' value='Toevoegen'></a></h2>";
                echo '<div class="card-text">';
                echo '<br><table  class="table table-bordered table-dark table-striped table-responsive">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col" >klantNr </th>';
                echo '<th scope="col" >Voornaam</th>';
                echo '<th scope="col" >Achternaam</th>';
                echo '<th scope="col" >Telefoon</th>';
                echo '<th scope="col" >PostcodeID</th>';
                echo '<th scope="col" >E-mail</th>';
                echo '<th scope="col" >wachtwoord</th>';
                echo '<th scope="col" >Wissen</th>';
                echo '<th scope="col" >Update</th>';

                echo '</thead>';

                while($stmt->fetch())
                {
                    $update = $klantnr;
                    $teverwijderen = $klantnr;
                    echo "<tr>";
                    echo "<td>";
                    echo $klantnr;
                    echo "</td>";
                    echo "<td>";
                    echo $klantvoornaam;
                    echo "</td>";
                    echo "<td>";
                    echo $klantachternaam;
                    echo "</td>";
                    echo "<td>";
                    echo $telefoon;
                    echo "</td>";
                    echo "<td>";
                    echo $postcodeID;
                    echo "</td>";
                    echo "<td>";
                    echo $email;
                    echo "</td>";
                    echo "<td>";
                    echo $wachtwoord;
                    echo "</td>";
                    echo "<td>";
                    ?>
                        <form name="form1" method="post" action="<?php echo$_SERVER['PHP_SELF']?>?actie=wis&klantid=<?php echo $teverwijderen ; ?> ">
                            <input type="submit" class="btn btn-danger" name="wis" id="wis" value="Wis">
                        </form>
                    <?php
                        echo "</td>";
                        echo "<td>";
                    ?>
                        <form name="form2" method="post" action="veranderKlanten.php?actie=verander&klantid=<?php echo $update ; ?> ">
                            <input type="submit" class="btn btn-success" name="update" id="update" value="Update">
                        </form>
                    <?php
                        echo "</td>";
                        echo "</tr>";
                }
                echo "</table>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";

                $stmt->close();
            }
            
            
        ?>



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