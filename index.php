<?php
include "conn.php";
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>lb1</title>
    <script>
var ajax = new XMLHttpRequest();

function _1() {
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax.responseText);
                document.getElementById("result").innerHTML = ajax.response;
            }
        }
    }
    var vendor = document.getElementById("vendor").value;
    ajax.open("get", "1.php?vendor=" + vendor);
    ajax.send();
}

 function _2() {
    var category = document.getElementById("category").value;
    ajax.open("get","2.php?category=" + category);
    ajax.onreadystatechange = function() {
        if (ajax.readyState === 4) {
            if (ajax.status === 200) {
                console.dir(ajax);
                let rows = ajax.responseXML.firstChild.children;
                let result = "<ol>";
                for(var i = 0; i < rows.length; i++){
                result += "<tr>";
                    result += "<li>" + rows[i].children[0].firstChild.nodeValue + ", цена: " +
                    rows[i].children[1].firstChild.nodeValue + ", количество: " +
                    rows[i].children[2].firstChild.nodeValue + "</li>";
                }
                result += "</ol>";
                document.getElementById("result").innerHTML = result;
            }
        }
    }   
    ajax.send();
 }

function _3() {
    ajax.onreadystatechange = function(){
    var rows = JSON.parse(ajax.responseText);
    if (ajax.readyState === 4) {
        if (ajax.status === 200) {
            console.dir(ajax);
            let result = "<ol>";
            for (var i = 0; i < rows.length; i++) {
                result += "<li>Назва: " + rows[i].name + ", ціна: " + rows[i].price + ", якість: "+ rows[i].quality +", кількість: " + rows[i].quantity + "</li>";
            }
            resilt = result + "</ol>";
            document.getElementById("result").innerHTML = result;
        }
    }
    };
    var min_price = document.getElementById("min_price").value;
    var max_price = document.getElementById("max_price").value;
    ajax.open("get", "3.php?min_price=" + min_price + "&max_price=" + max_price);
    ajax.send();
}
    </script>
</head>

<body>
    <input placeholder="Производитель:" type="text" name="vendor" id="vendor">
    <input type="submit" value="Поиск" onclick="_1()"><br>
<br>
    <input placeholder="Категория:"type="text" name="category" id="category">
    <input type="submit" value="Поиск" onclick="_2()"><br> 
<br>
    <input placeholder="Минимальная цена:" type="text" name="min_price" id="min_price">
    <input placeholder="Максимальная цена:" type="text" name="max_price" id="max_price">
    <input type="submit" value="Поиск" onclick="_3()" ><br>

<p id = "result"></p>
</body>
</html>

