<?php
require_once "ShoppingCart.php";
$shop = new ShoppingCart();
$item1 = new CartItem("But bi", 5.5, 2);
$item2 = new CartItem("Cuc tay", 15.7, 1);
$item3 = new CartItem("But chi", 3.4, 5);
$item4 = new CartItem("Giay ghi nho", 23.6, 1);

$shop->addItem($item1);
$shop->addItem($item2);
$shop->addItem($item3);
$shop->addItem($item4);

$shop->displayCart();

echo "Tong tien gio hang = ".$shop->calculateTotal().". <br>";

$shop->removeItem("Cuc tay");
$shop->displayCart();
?>
