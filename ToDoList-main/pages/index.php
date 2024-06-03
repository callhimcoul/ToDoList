<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
<header>
    <?php
    include '../nav/navbar.php';
    ?>
</header>
<div class="todo-container">
    <input type="text" id="new-task" placeholder="Add a new task..." />
    <button onclick="addTask()">Add Task</button>
    <ul id="task-list"></ul>
</div>
<script src="../script/script.js"></script>
</body>
</html>

