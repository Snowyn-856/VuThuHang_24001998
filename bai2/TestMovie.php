<?php
require_once "Movie.php";
function findMovieById($movies, $id) {
    if (empty($movies)) {
        echo "Danh sách phim rỗng.<br>";
        return null;
    }
    foreach ($movies as $movie) {
        if ($movie->id == $id) {
            return $movie;
        }
    }
    echo "Không tìm thấy phim có ID = ". $id. ".<br>";
    return null;
}
function getTotalRevenue($movies) {
    if (empty($movies)) {
        echo "Danh sách phim rỗng.<br>";
        return 0;
    }
    $total = 0;
    foreach ($movies as $movie) {
        $total += $movie->getRevenue();
    }
    return $total;
}
function getBestSellingMovie($movies) {
    if (empty($movies)) {
        echo "Danh sách phim rỗng.<br>";
        return null;
    }
    $best = $movies[0];
    foreach ($movies as $movie) {
        if ($movie->getSoldSeats() > $best->getSoldSeats()) {
            $best = $movie;
        }
    }
    return $best;
}

# 1. Tạo danh sách các object Movie
$movies = [
    new Movie(1, "Avengers", 100000, 100),
    new Movie(2, "Avatar", 120000, 80),
    new Movie(3, "Batman", 90000, 120)
];

# 2. Đặt vé cho phim Avengers
$avengers = findMovieById($movies, 1);
if ($avengers) $avengers->bookTicket(30);

# 3. Đặt vé cho phim Avatar
$avatar = findMovieById($movies, 2);
if ($avatar) $avatar->bookTicket(20);

# 4. Hủy một số vé đã đặt của phim Avengers
if ($avengers) $avengers->cancelTicket(10);

# 5. Hiển thị thông tin của tất cả các phim
echo "Thông tin các phim: <br>";
foreach ($movies as $movie) {
    $movie->displayInfo();
}

# 6. Tính tổng doanh thu của tất cả các phim
echo "Tổng doanh thu: " . getTotalRevenue($movies) . "<br>";

# 7. Tìm và hiển thị phim có số vé bán ra nhiều nhất
$bestMovie = getBestSellingMovie($movies);
if ($bestMovie) {
    echo "Phim bán chạy nhất:<br>";
    $bestMovie->displayInfo();
}
?>
