<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
</head>
<body class="dark-theme">

<header>
    <?php include '../nav/navbar.php'; ?>
</header>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <h2 class="text-light">Task Categories</h2>
            <ul class="list-group" id="category-list">
                <li class="list-group-item active" onclick="changeCategory('all')">All</li>
                <li class="list-group-item" onclick="changeCategory('business')">Business</li>
                <li class="list-group-item" onclick="changeCategory('private')">Private</li>
            </ul>
        </div>
        <div class="col-md-8">
            <div class="todo-container">
                <h1>My Tasks</h1>
                <div class="row g-2 align-items-end mb-3">
                    <div class="col">
                        <label for="new-task" class="form-label">Task Name</label>
                        <input type="text" id="new-task" placeholder="Name of the task..." class="form-control" />
                    </div>
                    <div class="col">
                        <label for="new-date" class="form-label">Task Date</label>
                        <input type="date" id="new-date" class="form-control" />
                    </div>
                    <div class="col">
                        <label for="new-category" class="form-label">Category</label>
                        <select id="new-category" class="form-select">
                            <option value="" disabled selected>Select category...</option>
                            <option value="business">Business</option>
                            <option value="private">Private</option>
                        </select>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-primary" onclick="addTask()">Add Task</button>
                    </div>
                </div>
                <ul id="task-list" class="list-group mt-3"></ul>
            </div>
        </div>
    </div>
</div>

<!-- Calendar Modal -->
<?php include 'calender.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../script/tasks.js"></script>
</body>
</html>
