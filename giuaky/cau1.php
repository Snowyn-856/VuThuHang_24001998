<?php
$name = "Nguyễn Văn An";
$score = 8.5;
function getRank($score){
    if ($score < 0 || $score > 10 ){
        return "Điểm không hợp lệ";
    }
    if ($score >= 8) {
        return "Giỏi";
    }
    if ($score >= 6.5){
        return "Khá";
    }
    if ($score >= 5){
        return "Trung bình";
    }
    return "Yếu";
}
echo "Tên học sinh: " . $name .", điểm = " .$score .", xếp hạng: ".getRank($score) . "<br>" ;
?>
