<?php
$products = [
    [
        "product" => "Bút bi",
        "cost" => 5.2
    ],
    [
        "product" => "Bút chì",
        "cost" => 12.3
    ],
    [
        "product" => "Giấy nhớ",
        "cost" => 67.4
    ],
    [
        "product" => "Hộp bút",
        "cost" => 59
    ],
    [
        "product" => "Cục tẩy",
        "cost" => 7.4
    ]
];
function calculateTotal($products){
    $total = 0;
    foreach($products as $p) {
        $total += $p["cost"];
    }
    return $total;
}
function findMaxPrice($products){
    $max = 0;
    foreach($products as $p){
        if ($p["cost"] > $max){
            $max = $p["cost"];
        }
    }
    return $max;
}
function display($pr){
    foreach($pr as $p){
    echo $p["product"] . " - " . $p["cost"] . "<br>" ;
    }
}
display($products);
echo "Tổng giá trị tất cả sản phẩm = ". calculateTotal($products).".<br>";
echo "Giá cao nhất = ". findMaxPrice($products).".<br>";
?>