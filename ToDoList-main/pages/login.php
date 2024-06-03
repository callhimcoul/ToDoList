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
<div class="LoginLayout">
    <h2>Login</h2>
    <form name="login" method="post">
        <div class="form-group">
            <label for="email">E-Mail:</label>
            <input type="email" name="email" title="email" id="email" required>
        </div>
        <div class="form-group">
            <label for="password">Passwort:</label>
            <input type="password" name="password" title="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</div>
<script src="../script/script.js"></script>
</body>
</html>
