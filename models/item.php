<?php
class Item extends Db
{
    public function getAllItem()
    {
        $sql = self::$connection->prepare("SELECT * FROM `items`");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getNewItem($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items` ORDER BY `created_at` DESC LIMIT ?,? ");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    public function getFeaturedItem($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items`
        WHERE `featured`=1
        ORDER BY `created_at` DESC
        LIMIT ?,? ");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function searchAll($keyword)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items`
        WHERE `content` LIKE ? ");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function search($keyword, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `items`
        WHERE `content` LIKE ?
        LIMIT ?,? ");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function popularNews($start, $count)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items`
        ORDER BY `views` DESC
        LIMIT ?,? ");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getAllItemsByCate($cate_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `items`
        WHERE `category` = ? ");
        $sql->bind_param("i", $cate_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getItemsByCate($cate_id, $page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `items`
        WHERE `category` = ? 
         LIMIT ?,? ");
        $sql->bind_param("iii", $cate_id, $start, $count);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    function paginate($url, $total, $count)
    {
        $totalLinks = ceil($total / $count);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<a href='$url&page=$j'  style='color: #333; border: 1px solid #ddd; padding: 8px 16px; margin: 0 5px; text-decoration: none; border-radius: 5px; transition: background-color 0.3s;'> $j </a>";
        }
        return $link;
    }
}
