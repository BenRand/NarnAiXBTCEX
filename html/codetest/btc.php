<?php
/**
* Created by PhpStorm.
* User: sebastianusami
* Date: 1/6/14
* Time: 4:01 PM
*/
?>

<html>
<head>
<?php

//require("/Users/sebastianusami/Dropbox/Coding/The_Farm/www/coinbase-php/lib/Coinbase.php");
require_once("../../model/Coinbase.php");
//require_once("www/coinbase-php/lib/Coinbase.php");
//require_once("coinbase-php/lib/Coinbase.php");
?>
</head>


<body>


<?php
$coinbase = new Coinbase('9cf839fa926890230865b54bfe787f57cfdb49b6c3ad45eca775037ff7a5c206');
echo $balance = $coinbase->getBalance();
echo "Balance is " . $balance . " BTC";
echo "<br> Buy Price " . $coinbase->getBuyPrice('1');
?>

</body>

</html>