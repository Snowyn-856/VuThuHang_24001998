<?php
Class CartItem{
    public $name = "";
    public $price;
    public $quantity = 0;
    public function __construct($name, $price, $quantity){
        $this->name = $name;
        $this->price = $price;
        $this->quantity = $quantity;
    }
    public function getTotal(){
        return $this->price * $this->quantity;
    }
}
?>