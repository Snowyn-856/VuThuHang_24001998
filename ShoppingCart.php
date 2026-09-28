<?php
require_once "CartItem.php";
Class ShoppingCart{
    public $quantity = 0;
    public $items = [];
    public function addItem($item){
        if ($item->price <= 0) {
            echo "Không thể thêm sản phẩm '{$item->name}' vì giá <= 0.<br>";
            return;
        }
        if ($item->quantity <= 0) {
            echo "Không thể thêm sản phẩm '{$item->name}' vì số lượng <= 0.<br>";
            return;
        }
        $this->items[$this->quantity++] = $item;
    }
    public function removeItem($name){
        $found = false;
        foreach ($this->items as $key=>$item){
            if ($item->name === $name){
                unset($this->items[$key]);
                $found = true;
                $this->quantity--;
                break;
            }
        }
        $this->items = array_values($this->items); // reset index
        if (!$found) {
            echo "Sản phẩm '{$name}' không tồn tại trong giỏ hàng.<br>";
        }
    }
    public function calculateTotal(){
        $total = 0;
        foreach($this->items as $it){
            $total += $it->getTotal();
        }
        return $total;
    }
    public function displayCart(){
        if (empty($this->items)) {
            echo "Giỏ hàng hiện đang trống.<br>";
            return;
        }
        foreach($this->items as $it){
            echo "Ten san pham: ".$it->name.", don gia = ".$it->price.", so luong = ".$it->quantity.", thanh tien = ".$it->getTotal().".<br>";
        }
    }
}
?>