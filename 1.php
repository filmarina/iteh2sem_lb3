<?php
include "conn.php";
if (isset($_GET["vendor"])) { // есть ли в массиве ПОСТ значение производителя (посылался ли запрос)
    $statement = $db->prepare("SELECT items.name, price, quantity, quality FROM items inner join vendors on FID_Vender = ID_Vendors WHERE Vendors.name=?"); // подготовленный запрос
    $statement->execute([$_GET["vendor"]]);

    while ($data = $statement->fetch()) { // из запроса выбираются данные
        echo " <br> Название: {$data['name']} ~~~ Цена: {$data['price']} ~~~ Количество: {$data['quantity']} ~~~ Качество: {$data['quality']} ";}
}
?>