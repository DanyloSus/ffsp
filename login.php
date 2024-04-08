<?php
require_once "./classes/requestParams.php";

// Start session
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postParams = new RequestParams($_POST);
    $_SESSION['username'] = htmlspecialchars($postParams->get('name') ?? "");
    header("Location: /page.php");
}

print_r($_SESSION ?? "");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php Login</title>
</head>

<body>
    <form method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name">
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        <button type="submit">Submit</button>
    </form>
</body>

</html>