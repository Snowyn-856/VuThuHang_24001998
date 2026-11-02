<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 1</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <style>
        .gioi { color: green; font-weight: bold; }
        .kha { color: blue; font-weight: bold; }
        .tb { color: orange; font-weight: bold; }
        .yeu { color: red; font-weight: bold; }
        img{
            width:150px;
            border-radius:10px;
        }
    </style>
</head>
<body>
<div id="app">
    <h2>Thông tin sinh viên</h2>
    <img :src="student.avatar" :alt="student.name">
    <p>MSSV: {{ student.id }}</p>
    <p v-text="'Họ tên: ' + student.name"></p>
    <p>Lớp: {{ student.class }}</p>
    <p>Điểm TB: {{ student.avg }}</p>
    <p :class="rankClass">
        Xếp loại: {{ rank }}
    </p>
    <p v-show="student.isStudying">
        Đang học
    </p>
    <p v-show="!student.isStudying">
        Đã nghỉ
    </p>
    <button @click="student.isStudying = !student.isStudying">
        Đổi trạng thái
    </button>
</div>
<script>
const { createApp } = Vue
createApp({
    data() {
        return {
            student: {
                id: "SV001",
                name: "Nguyễn Văn A",
                class: "CNTT K22",
                avatar: "https://th.bing.com/th/id/OIP.IyFtY7sO64Ox0k3pclI6nwHaEK?r=0&o=7rm=3&rs=1&pid=ImgDetMain&o=7&rm=3",
                avg: 8.5,
                isStudying: true
            }
        }
    },
    computed: {
        rank() {
            const d = this.student.avg
            if (d >= 8) return "Giỏi"
            if (d >= 6.5) return "Khá"
            if (d >= 5) return "Trung bình"
            return "Chưa đạt"
        },
        rankClass() {
            const d = this.student.avg
            if (d >= 8) return "gioi"
            if (d >= 6.5) return "kha"
            if (d >= 5) return "tb"
            return "yeu"
        }
    }
}).mount("#app")
</script>
</body>
</html>