<?php
include_once '../lib/Database.php';
include_once '../helpers/Format.php';

class Category {

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function catInsert($catName) {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        if (empty($catName)) {
            $msg = "O campos para a categoria não ficar ser em branco";
            return $msg;
        } else {
            $query = "INSERT INTO tbl_category(catName) VALUES ('$catName')";
            $catinsert = $this->db->insert($query);
            if ($catinsert) {
                $msg ="<span class='success'>Categoria inserida com sucesso</span>";
                return $msg;
            } else {
               $msg ="<span class='error'>Categoria não foi inserida</span>";
               return $msg;
            }
        }
    }

    public function getAllCat() {
        $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getCatById($id) {
        $query = "SELECT * FROM tbl_category WHERE catId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function catUpdate($catName, $id) {
        $catName = $this->fm->validation($catName);
        $catName = mysqli_real_escape_string($this->db->link, $catName);
        $id = mysqli_real_escape_string($this->db->link, $id);
        if (empty($catName)) {
            $msg = "<span class='error'>O campo da Categoria não pode ficar em branco</span>";
            return $msg;
        } else {
            $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId ='$id'";
            $update_row = $this->db->update($query);
            if ($update_row) {
                $msg = "<span class='success'>Nome da Categoria foi atualizado com sucesso</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Nome da Categoria não foi atualizado</span>";
                return $msg;
            }
        }
    }

    public function delCatById($id) {
        $query = "DELETE FROM tbl_category WHERE catId = '$id'";
        $deldata = $this->db->delete($query);
        if ($deldata) {
            $msg = "<span class='success'>A Categoria foi removida com sucesso</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>A Categoria não foi removida</span>";
            return $msg;
        }

    }

}

?>
