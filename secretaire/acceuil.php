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
    <link rel="stylesheet" href="../css/acceuil.css" />
    <link rel="stylesheet" href="../css/calendar.css" />
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="../js/calendar.js"></script>
    <style>
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
                    <a href="#"><i class="fas fa-home"></i> home</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-user-plus"></i> ajouter patient</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-list"></i> liste des patients</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-calculator"></i> comptabilite</a>
                </li>
            </ul>
            <div class="user-info">
                <div class="user">
                    <img src="../img/user.png" alt="user" />
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