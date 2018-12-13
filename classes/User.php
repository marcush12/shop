<?php
$filepath = realpath(dirname(__FILE__));//realpath é o endereço do diretório onde está este arquivo
include_once ($filepath.'/../lib/Database.php');
include_once ($filepath.'/../helpers/Format.php');

class User {

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }
}
?>
