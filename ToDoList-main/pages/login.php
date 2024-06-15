<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../pages/loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.js"></script>
</head>
<body class="dark-theme">
<header>
    <?php
    include '../nav/navbar.php';
    ?>
</header>
<div class="login-container">
    <div class="login-box">
        <h2>Login</h2>
        <form name="login" method="post">
            <div class="form-group">
                <label for="email">E-Mail:</label>
                <input type="email" name="email" title="email" id="email" required class="form-control" placeholder="E-Mail eingeben">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" name="password" title="password" id="password" required class="form-control" placeholder="Passwort eingeben">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<!-- Calendar Modal -->
<?php include 'calender.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="../script/tasks.js"></script>
</body>
</html>
