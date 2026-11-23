
<?php
if (session_status() === PHP_SESSION_NONE) {
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === 'admin' && $password === 'admin123') {

        session_regenerate_id(true);

        $_SESSION['login'] = true;
        $_SESSION['username'] = $username;

        header("Location: index.php?page=dashboard");
exit;

    } else {
        $error = "Username atau password salah!";
    }
}
?>

<section class="content">
    <h2>Login Admin</h2>

    <?php if ($error != '') { ?>
        <p style="color:red;">
            <?php echo htmlspecialchars($error); ?>
        </p>
    <?php } ?>

    <form method="POST">

        <p>
            <label>Username</label><br>
            <input type="text" name="username" required>
        </p>

        <p>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </p>

        <button type="submit">Login</button>

    </form>
</section>
