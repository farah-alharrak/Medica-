<?php
    $prixConsultation = 300;
    $totale = null;
    if(isset($_POST["calculate"])){
        $salaires = $_POST["salaires"];
        $divers = $_POST["divers"];
        $eauElec = $_POST["EauElec"];
        $month = $_POST["month"]!="" ? (int)explode('-',$_POST["month"])[1] : (int)date('m');
        $connect = new PDO('mysql:host=localhost;dbname=medica', 'root', '');
        $query = "SELECT COUNT(*) FROM rdv WHERE EXTRACT(month FROM date_debut) = :mnt ";
        $statement = $connect->prepare($query);
        $statement->bindParam(':mnt', $month);
        $statement->execute();
    
        $nombreConsultations = Array(); 
        $nombreConsultations = $statement->fetch();
        $totaleCons =  $nombreConsultations[0] * $prixConsultation;
        $totale = $totaleCons - $salaires - $divers - $eauElec;
    }    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/template.css" />
    <link rel="stylesheet" href="../assets/css/calendar.css" />
    <link rel="stylesheet" href="../assets/css/compta.css" />
    <title>medica | secretaire</title>
</head>

<body>
    <?php include '../includes/sidebar.php'; ?>
    <div class="container">
        <form class="compta" action="compta.php" method="post">
            <h1><i class="fas fa-calculator"></i> Compta</h1>
            <?php if($totale == null) { ?>
            <div class="inputs">
                <div class="form-grp">
                    <input type="number" placeholder="salaires" name="salaires" required>
                    <input type="number" placeholder='divers' name="divers" required>
                </div>
                <div class="form-grp wide-grp">
                    <input type="number" class='wide' placeholder="Dépenses d'eau et d'électricité" name="EauElec"
                        required>
                </div>
                <div>
                    <input class='file' type="month" name="month">
                    <button class="btn btn-primary" name="calculate">Calculate</button>
                </div>
            </div>
        </form>
        <?php } else if($totale>0) { ?>
        <h1 class="bg-success rounded afficher"><?php echo $totale; ?> DH</h1>
        <button class="btn btn-primary reset">Reset</button>
        <?php } else { ?>
        <div class="">
            <h1 class="bg-danger rounded afficher"><?php echo $totale; ?> DH</h1>
        </div>
        <button class="btn btn-primary reset">Reset</button>
        <?php } ?>
    </div>
    <script>
    document.querySelectorAll('.reset').forEach(element => {
        element.addEventListener('click', () => {
            location.reload();
        })
    })
    </script>
</body>

</html>


<!-- les salaires -->
<!-- lma w do -->
<!-- divers depenses -->
<!-- un mois -->
<!-- submit -->