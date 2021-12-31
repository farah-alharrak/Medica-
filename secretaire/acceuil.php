<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["role"] != 'secretaire'){
            header("location: ../login.php");
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
    <link rel="stylesheet" href="../css/template.css" />
    <link rel="stylesheet" href="../css/calendar.css" />
    <title>medica | secretaire</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="../js/calendar.js"></script>
    <style>
    .main #calendar {
        height: 90%;
        width: 100%;
        margin-top: 25px;
        background: #e0f5ff;
        box-shadow: -3px 2px 46px -16px rgba(0, 0, 0, 0.75);
        -webkit-box-shadow: -3px 2px 46px -16px rgba(0, 0, 0, 0.75);
        -moz-box-shadow: -3px 2px 46px -16px rgba(0, 0, 0, 0.75);
        background-image: linear-gradient(to top, #fff1eb 0%, #ace0f9 100%);
        border-radius: 10px;
    }
    </style>
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
        <div class="navCal container" id="cal">
            <div id="calendar"></div>
        </div>
    </div>
    </div>
</body>

</html>