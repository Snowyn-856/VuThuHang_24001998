<?php
class Student{
    public $name;
    public $score;
    public $age;

    public function __construct($name, $age, $score){
        $this->name = $name;
        $this->age = $age;
        $this->score = $score;
    }
    
    public function getRank(){
        if ($this->score >= 8) {
            return "Gioi";
        }
        if ($this->score >= 6.5){
            return "Kha";
        }
        if ($this->score >= 5){
            return "Trung binh";
        }
        return "Yeu";
    }

    public function isPassed(){
        if ($this->score >= 5){
            return True;
        }
        return False;
    }

    public function display(){
        return $this->name . " - " . $this->age . " - " . $this->score . " - " . $this->getRank() . "<br>";
    }
}
?>
