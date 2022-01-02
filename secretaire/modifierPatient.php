<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["role"] != 'secretaire'){
        header("location: ../login.php");
    }
    $connect = new PDO('mysql:host=localhost;dbname=medica', 'root', '');
    $id = (int) $_GET['id'];
    $query = "select * FROM fichepatient where id = :id";
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':id', $id);
    if($stmt->execute()){
        $resultat = $stmt->fetch();  
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nom = trim($_POST["nom"]);
        $prenom = trim($_POST["prenom"]);
        $date_naissance = trim($_POST["date_naissance"]);
        $CIN = trim($_POST["CIN"]);
        $numtelephone = trim($_POST["numtelephone"]);
        $assurance = trim($_POST["assurance"]);
        $sexe = trim($_POST["gender"]);
        $email = trim($_POST["email"]);
        $adresse = trim($_POST["adresse"]);
        $sql = "UPDATE fichepatient set nom = :nom ,prenom = :prenom, date_naissance=:date_naissance ,CIN = :CIN ,numtelephone = :numtelephone,assurance = :assurance,sexe = :sexe,email = :email WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':date_naissance', $date_naissance);
        $stmt->bindParam(':CIN', $CIN);
        $stmt->bindParam(':numtelephone', $numtelephone);
        $stmt->bindParam(':assurance', $assurance);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':adresse', $adresse);

        if($stmt->execute()){
            header('location : listepatients.php');  
        } else {
            print_r($connect->errorInfo());
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="../css/template.css">
    <link rel="stylesheet" href="../css/ajouterPatients.css">
    <title>ajouter patient</title>
</head>

<body>
    <div class="main">
        <aside class="sidebar">
            <h1>
                Med<span><img src="../img/logo.svg" alt=" " /></span>ica
            </h1>
            <ul class='linksMet'>
                <li>
                    <a href="/"><i class="fas fa-home"></i> home</a>
                </li>
                <li>
                    <a href="./ajouterPatients.php"><i class="fas fa-user-plus"></i> ajouter patient</a>
                </li>
                <li>
                    <a href="./listepatients.php"><i class="fas fa-list"></i> liste des patients</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-calculator"></i> comptabilite</a>
                </li>
            </ul>
            <div class="user-info">
                <div class="user">
                    <img src="../img/receptionist.png" alt="user" />
                    <p>secretaire</p>
                </div>
                <ul class="links">
                    <li><a href="../logout.php"><i class="fas fa-sign-out-alt"></i>logout</a></li>
                    <li><a href="#"><i class="fas fa-key"></i>Reset</a></li>
                </ul>
            </div>
        </aside>
        <div class="container">
            <div class="register">
                <div class="row">
                    <div class="col-md-9 mx-auto register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Nouveau Patient</h3>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="row register-form">

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Nom *" name="nom"
                                                    required value="<?php echo $resultat['nom']; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="CIN *" name="CIN"
                                                    required value="<?php echo $resultat['CIN']; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control"
                                                    placeholder="Numéro de téléphone *" name="numtelephone"
                                                    value="<?php echo $resultat['numtelephone']; ?>" required />
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Email *"
                                                    name="email" required value="<?php echo $resultat['email']; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <div class="sexe">
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="male" checked>
                                                        <span> Homme </span>
                                                    </label>
                                                    <label class="radio inline">
                                                        <input type="radio" name="gender" value="female">
                                                        <span> Femme </span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Prénom *"
                                                    name="prenom" required value="<?php echo $resultat['prenom']; ?>" />
                                            </div>
                                            <div class="md-form md-outline input-with-post-icon datepicker form-group">
                                                <input placeholder="Select date" type="date" id="example"
                                                    name='date_naissance' class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Assurance *"
                                                    name="assurance" required
                                                    value="<?php echo $resultat['assurance']; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Adresse *"
                                                    name="adresse" required
                                                    value="<?php echo $resultat['adresse']; ?>" />
                                            </div>
                                            <input type="submit" class="btnRegister" value="Modifier" />
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</body>

</html>