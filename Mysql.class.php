<?php
class Mysql{
    private $config;
    private  $conn;
    private $resource;

    function __construct($config)
    {
        $this->config=$config;
        $this->connect($this->config);
    }
    function  connect(){
        $this->conn=mysqli_connect($this->config['host'],$this->config['user'],$this->config['password']);
        mysqli_select_db($this->conn,$this->config['dbname']);
        mysqli_query($this->conn,'set names'.$this->config['charset']);
    }
    function query($sql){
        $this->resource=mysqli_query($this->conn,$sql);
    }
    function selectAll($sql){
        $arr=array();
        $this->query($sql);
        while($row=mysqli_fetch_assoc($this->resource)){
            $arr[]=$row;
        }
        return $arr;
    }

}


?>

