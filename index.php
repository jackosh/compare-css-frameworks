<?php
    define("PATH_ROOT", "./");
    define("PATH_TEMPLATE", PATH_ROOT . "views/");
    define("PATH_IMG", PATH_ROOT . "images/");
    $vConfig['layout'] = 'ksw';
    $vConfig['portal']['lang'][ 0 ] = ['de'];
    $arr_semContent['portal']['login_welcome'] = 'Bitte geben Sie Ihren Benutzernamen und Ihr Passwort ein.<br>Beachten Sie bitte dabei die Groß-/Kleinschreibung.<br><br>Sollten Sie Ihr Passwort vergessen haben, klicken Sie bitte rechts auf: "Passwort vergessen". Dann wird Ihnen umgehend ein Passwort zugeschickt.';
    $arr_semContent['portal']['login_input04'] = 'Anmelden';
    $arr_semContent['portal']['reg_03'] = 'Passwort vergessen'; 
    $arr_semContent['day'][1] = 'Montag';
    $arr_semContent['day'][2] = 'Dienstag';
    $arr_semContent['day'][3] = 'Mittwoch';
    $arr_semContent['day'][4] = 'Donnerstag';
    $arr_semContent['day'][5] = 'Freitag';
    $arr_semContent['day'][6] = 'Samstag';
    $arr_semContent['day'][7] = 'Sonntag';

    $title_extra_big_class = '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='stylesheet' type='text/css' href='./css/ksw/semportal.css'>
    <link rel='stylesheet' type='text/css' href='./css/ksw/jobmanagement.css'>
    <link rel='stylesheet' type='text/css' href='./css/ksw/new.css'>
    <!-- Compiled and minified CSS -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>
<body>
    <div id="main-wrapper" class="container p-0 bg-white" style="border: 1px solid green;">
        <div id="header">
            <h1 class="page_title_header"><span style="color: red; font-size: 4.7rem;">Q</span>NET</h1>

            <div id="header_top">
                <?php echo $arr_semContent['day'][ date ( 'N' ) ] . ', ' . date ( 'd.m.Y, H:i' ); ?>
            </div>
        </div>

        <div class="container-xl">
            <div class="row">
                <div class="col col-8">
                    <?php include('views/login.php'); ?>
                </div>
                <div class="col col-4">
                    <?php // Navigation
                        echo $main_navigation;
                    ?>
                </div>

            </div>
        </div>
    </div> <!-- end main wrapper -->
    <script>
    </script>
    <!-- Compiled and minified JavaScript -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>