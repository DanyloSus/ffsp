<?php
require_once 'actions/db.php';
require_once "./classes/requestParams.php";

session_start();

$name = new RequestParams(array_merge($_GET, $_SESSION));

print_r($name->all());

if (!$name->has("username")) {
    header('Location: /login.php');
}

// Prepare a SELECT statement
$stmt = $pdo->prepare('SELECT * FROM posts');

// Execute the statement
$stmt->execute();

// Fetch the results
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postParams = new RequestParams($_POST);
    setcookie($postParams->get('name') ?? "", $postParams->get('value') ?? "", time() + 3600, '/', '', false, true);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
</head>

<body>
    <header>
        <form action="actions/destroy.php" method="post"><button type="submit">
                <?= $name->get("username") ?>
            </button></form>
    </header>
    <?php foreach ($posts as $post): ?>
        <div>
            <h2>
                <?= $post['title'] ?>
            </h2>
            <p>
                <?= $post['body'] ?>
            </p>
            <p>
                <?= $post['created_at'] ?>
            </p>
        </div>
    <?php endforeach; ?>
    <form method="post">
        <label for="name">Name of cookie</label>
        <input type="text" name="name" id="name">
        <label for="value">Value</label>
        <input type="text" name="value" id="value">
        <button type="submit">Submit</button>
    </form>
</body>

</html>