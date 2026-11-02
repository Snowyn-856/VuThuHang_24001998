<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Todo App</title>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <style>
        .done {
            text-decoration: line-through;
            color: gray;
        }
    </style>
</head>
<body>
<div id="app">
    <h2>Quản lý công việc cá nhân</h2>
    <input
        type="text"
        v-model.trim="newTask"
        @keyup.enter="addTask"
        placeholder="Nhập công việc..."
    >
    <button @click="addTask">
        Thêm
    </button>
    <hr>
    <label>
        Lọc:
        <select v-model="filter">
            <option value="all">Tất cả</option>
            <option value="active">Chưa hoàn thành</option>
            <option value="done">Đã hoàn thành</option>
        </select>
    </label>
    <p>
        Tổng công việc: {{ totalTasks }}
    </p>
    <p>
        Chưa hoàn thành: {{ unfinishedTasks }}
    </p>
    <ul v-if="filteredTasks.length">
        <li
            v-for="task in filteredTasks"
            :key="task.id"
        >
            <input
                type="checkbox"
                v-model="task.completed"
            >
            <span :class="{done: task.completed}">
                {{ task.name }}
            </span>
            <button @click="deleteTask(task.id)">
                Xóa
            </button>
        </li>
    </ul>
    <p v-else>
        Không có công việc nào.
    </p>
    <button
        v-if="tasks.some(t => t.completed)"
        @click="removeCompleted"
    >
        Xóa các việc đã hoàn thành
    </button>
</div>
<script>
const { createApp } = Vue
createApp({
    data() {
        return {
            newTask: "",
            filter: "all",
            tasks: []
        }
    },
    computed: {
        filteredTasks() {
            if (this.filter === "active") {
                return this.tasks.filter(t => !t.completed)
            }
            if (this.filter === "done") {
                return this.tasks.filter(t => t.completed)
            }
            return this.tasks
        },
        totalTasks() {
            return this.tasks.length
        },
        unfinishedTasks() {
            return this.tasks.filter(
                t => !t.completed
            ).length
        }
    },
    methods: {
        addTask() {
            if (!this.newTask.trim()) return
            this.tasks.push({
                id: Date.now(),
                name: this.newTask,
                completed: false
            })
            this.newTask = ""
        },
        deleteTask(id) {
            this.tasks = this.tasks.filter(
                task => task.id !== id
            )
        },
        removeCompleted() {
            this.tasks = this.tasks.filter(
                task => !task.completed
            )
        }
    }
}).mount("#app")
</script>
</body>
</html>