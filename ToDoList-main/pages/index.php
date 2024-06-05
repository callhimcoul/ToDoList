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
    <?php
    include '../nav/navbar.php';
    ?>
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
                <input type="text" id="new-task" placeholder="Add a new task..." class="form-control" />
                <button class="btn btn-primary mt-2" onclick="addTask()">Add Task</button>
                <ul id="task-list" class="list-group mt-3"></ul>
            </div>
        </div>
    </div>
</div>

<!-- Calendar Modal -->
<div class="modal fade" id="calendarModal" tabindex="-1" aria-labelledby="calendarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="calendarModalLabel">Calendar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../script/tasks.js"></script>
</body>
</html>
