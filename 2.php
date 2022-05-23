<?php
header('Content-Type: text/xml');
header('Cache-Control: no-cache, must-revalidate');
include "conn.php";
echo '<?xml version="1.0" encoding = "UTF-8"?>';
echo "<root>";
if (isset($_GET["category"])) {
    $statement = $db->prepare("SELECT items.name, price, quantity, quality FROM items inner join Categories on FID_Category = ID_Categories WHERE Categories.name=?");
    $statement->execute([$_GET["category"]]);
    while ($data = $statement->fetch()) {
        $name = $data['name'];
        $price = $data['price'];
        $quantity = $data['quantity'];
        $quality = $data['quality'];
        echo "<row><name>$name</name><price>$price</price><quantity>$quantity</quantity><quality>$quality</quality></row>";
    }
    echo "</root>";
}
?>