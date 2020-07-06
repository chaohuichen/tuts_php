<?php

session_start();
// $_SESSION['name'] = 'peter';
if ($_SERVER['QUERY_STRING'] == 'noname') {
    unset($_SESSION['name']);
    session_unset();
}

$name = $_SESSION['name'] ?? 'GUEST';

//get cookie

$gender = $_COOKIE['gender'] ?? 'Unknown';

?>

<head>
    <title>Ninja Pizaa</title>
    <!-- Compiled and minified CSS -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style type="text/css">
        .brand {
            background: #cbb09c !important
        }

        .brand-text {
            color: #cbb09c !important;
            display: 'flex';
            font-size: 30px;
            justify-content: center;
            align-self: center;
        }

        .brand-text-info {
            color: #cbb09c !important;
            display: 'flex';
            font-size: 20px;
            justify-content: center;
            align-self: center;
        }

        form {
            max-width: 460px;
            margin: 20px auto;
            padding: 20px
        }

        .pizza {
            width: 100px;
            margin: 40px auto -30px;
            display: block;
            position: relative;
            top: -30px;
        }
    </style>
</head>

<body class='grey lighten-4'>
    <nav class="white z-depth-0">
        <div class="container">
            <a href="index.php" class='brand-log brand-text'>Ninjia Pizza</a>
            <ul id='nav-mobile' class='right hide-on-small-and-down'>
                <li class='grey-text'> hello <?php echo htmlspecialchars($name) ?></li>
                <li class='grey-text'> (<?php echo htmlspecialchars($gender) ?>)</li>
                <li><a href="add.php" class='btn brand z-depth-0'>Add a Pizza</a></>
            </ul>
        </div>
    </nav>