<?php
 class Category extends Db {
    public function getAllCate(){
        $sql = self::$connection->prepare("SELECT * FROM `categories`");
        $sql -> execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getCateNameByID($cate_id){
        $sql = self::$connection->prepare("SELECT * FROM `categories` WHERE `id`=?");
        $sql->bind_param("i",$cate_id);
        $sql -> execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
 }