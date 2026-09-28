<?php
Class Movie{
    public $id;
    public $title;
    public $price;
    public $totalSeats;
    public $availableSeats;
    public function __construct($id, $title, $price, $totalSeats)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->totalSeats = $totalSeats;
        $this->availableSeats = $totalSeats;
    }
    public function bookTicket($quantity){
        if ($quantity <= 0 || $quantity > $this->availableSeats){
            echo "Sô vé đặt không hợp lệ! <br>";
            return;
        }
        $this->availableSeats -= $quantity;
        echo "Đặt vé xem phim ". $this->title. " thành công!<br>";
    }
    public function cancelTicket($quantity){
        if ($quantity <= 0 || $quantity > $this->getSoldSeats()){
            echo "Sô vé trả không hợp lệ!<br>";
            return;
        }
        $this->availableSeats += $quantity;
        echo "Trả vé xem phim ".$this->title. " thành công!<br>";
    }
    public function getSoldSeats(){
        return $this->totalSeats - $this->availableSeats;
    }
    public function getRevenue(){
        return $this->getSoldSeats() * $this->price;
    }
    public function displayInfo(){
        echo "Mã phim: ". $this->id. ", tên phim: ". $this->title. ", giá vé = ". $this->price. ", tổng số ghế: ". $this->totalSeats. ", số ghế còn lại: ". $this->availableSeats. ", số vé đã bán: ". $this->getSoldSeats(). ", doanh thu: ". $this->getRevenue(). ".<br>";
    }
}
?>