<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đặt vé xem phim</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body>
<div id="app">
    <h2>Đặt vé xem phim</h2>
    <form @submit.prevent="submitForm">
        <p>
            Họ tên:
            <input type="text" v-model.trim="name">
        </p>
        <p>
            Suất chiếu:
            <select v-model="showtime">
                <option value="">-- Chọn suất --</option>
                <option>09:00</option>
                <option>14:00</option>
                <option>19:00</option>
            </select>
        </p>
        <p>Loại vé:</p>
        <label>
            <input type="radio" value="70000" v-model="ticketPrice">
            Vé thường (70.000đ)
        </label>
        <label>
            <input type="radio" value="100000" v-model="ticketPrice">
            Vé VIP (100.000đ)
        </label>
        <p>
            Số lượng:
            <input
                type="number"
                min="1"
                max="10"
                v-model.number="quantity"
            >
        </p>
        <label>
            <input type="checkbox" v-model="combo">
            Combo bắp nước (+45.000đ)
        </label>
        <h3>Tổng tiền: {{ total.toLocaleString() }} đ</h3>
        <button type="button" @click="resetForm">
            Đặt lại
        </button>
        <button type="submit" :disabled="!isValid">
            Đặt vé
        </button>
    </form>
    <div v-if="message">
        <hr>
        <h3>{{ message }}</h3>
    </div>
</div>
<script>
const { createApp } = Vue
createApp({
    data() {
        return {
            name: "",
            showtime: "",
            ticketPrice: 70000,
            quantity: 1,
            combo: false,
            message: ""
        }
    },
    computed: {
        total() {
            return this.ticketPrice * this.quantity +
                (this.combo ? 45000 : 0)
        },
        isValid() {
            return this.name.trim() !== "" &&
                   this.quantity >= 1 && this.quantity <= 10
        }
    },
    methods: {
        resetForm() {
            this.name = ""
            this.showtime = ""
            this.ticketPrice = 70000
            this.quantity = 1
            this.combo = false
            this.message = ""
        },
        submitForm() {
            this.message =
                `Đặt vé thành công cho ${this.name}.
                Tổng tiền: ${this.total.toLocaleString()} đ`
        }
    }
}).mount("#app")
</script>
</body>
</html>