<?php
class User extends Db
{
    public function getAllUser()
    {
        $sql = self::$connection->prepare("SELECT * FROM `users`");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getUserNameByID($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `id`=?");
        $sql->bind_param("i", $user_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}
