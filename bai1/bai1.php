<?php

require_once "Student.php";

#cau 1
$students = [
    [
        "name" => "Nguyen Van An",
        "age" => 20,
        "score" => 8.5
    ],
    [
        "name" => "Tran Thi Binh",
        "age" => 21,
        "score" => 6.5
    ],
    [
        "name" => "Le Van Cuong",
        "age" => 19,
        "score" => 4.5
    ],
    [
        "name" => "Pham Thi Dung",
        "age" => 20,
        "score" => 7.5
    ]
];
$count = 0;
$sum = 0;
foreach($students as $st){
    echo $st["name"] . " - " . $st["age"] . " - " . $st["score"] . "<br>";
    $count ++;
    $sum += $st["score"];
}
echo "Diem trung binh = " . $sum/$count;

echo "<br><br><br>";

#cau 2
function calculateAverageScore($student){
    $c = 0;
    $sum = 0;
    foreach($student as $st){
        $c++;
        $sum += $st["score"];
    }
    return $sum / $c;
}
function getRank($score){
    if ($score >= 8) {
        return "Gioi";
    }
    if ($score >= 6.5){
        return "Kha";
    }
    if ($score >= 5){
        return "Trung binh";
    }
    return "Yeu";
}
function displayStudent($student){
    foreach($student as $st){
    echo $st["name"] . " - " . $st["age"] . " - " . $st["score"] . " - " . getRank($st["score"]) . "<br>" ;
    }
}

displayStudent($students);
echo "Diem trung binh tinh bang ham: " . calculateAverageScore($students);

echo "<br><br><br>";

#cau 3
function findBestStudent($student){
    $max = 0;
    $bestStudent = "";
    foreach($student as $st){
        if ($st["score"] > $max){
            $max = $st["score"];
            $bestStudent = $st["name"];
        }
    }
    return $bestStudent;
}
function findWorstStudent($student){
    $min = 100;
    $worstStudent = "";
    foreach($student as $st){
        if ($st["score"] < $min){
            $min = $st["score"];
            $worstStudent = $st["name"];
        }
    }
    return $worstStudent;
}
function countPassedStudent($student){
    $count = 0;
    foreach($student as $st){
        if ($st["score"] >= 5){
            $count++;
        }
    }
    return $count;
}

echo "<p>Giỏi nhất: " . findBestStudent($students) . "</p>";
echo "<p>Kém nhất: " . findWorstStudent($students) . "</p>";
echo "<p>Số sinh viên qua môn: " . countPassedStudent($students) . "</p>";

function findStudentByName($student, $name_to_find){
    foreach($student as $st){
        if ($st["name"] == $name_to_find){
            return $st["name"] . " - " . $st["age"] . " - " . $st["score"];
        }
    }
    return "Khong tim thay hoc sinh";
}
?>
<form method="post">
    <label for="name">Nhap ten:</label>
    <input type="text" id="name" name="name">
    <button type="submit">Tim</button>
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    echo "<p>Kết quả tìm kiếm: " . findStudentByName($students, $name) . "</p>";
}

echo "<br><br><br>";

#cau 4
$student1 = new Student("Nguyen Van An", 20, 8.5);
$student2 = new Student("Tran Thi Binh", 21, 6.5);
$student3 = new Student("Le Van Cuong", 19, 4.5);
$student4 = new Student("Pham Thi Dung", 20, 7.5);

$studentObj = [$student1, $student2, $student3, $student4];

function displayStudentObj($studentObj){
    foreach($studentObj as $st){
        echo $st->display();
    }
}
displayStudentObj($studentObj);

function findBestStudentObj($student){
    $max = 0;
    $bestStudent = "";
    foreach($student as $st){
        if ($st->score > $max){
            $max = $st->score;
            $bestStudent = $st->name;
        }
    }
    return $bestStudent;
}
echo "Hoc sinh goi nhat: " . findBestStudentObj($studentObj) ."<br>";

function countPassedStudentObj($student){
    $count = 0;
    foreach($student as $st){
        if ($st->isPassed()){
            $count++;
        }
    }
    return $count;
}
echo "So hoc sinh qua mon: ". countPassedStudentObj($studentObj) . "<br>";

function calculateAverageScoreObj($student){
    $c = 0;
    $sum = 0;
    foreach($student as $st){
        $c++;
        $sum += $st->score;
    }
    return $sum / $c;
}
echo "Diem trung binh = " . calculateAverageScoreObj($studentObj);
?>
