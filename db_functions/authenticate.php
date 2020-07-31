<?php
session_start();
require_once('sql_connection.php');

// If login values exist.
if (!isset($_POST['username'], $_POST['password'])) {
    $_SESSION['message'] = 'Tunnus tai salasana väärin.';
    die;
}

// Prepare the SQL to prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, password FROM user WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password);
        $stmt->fetch();
        // Account exists, verify the password.
        if (password_verify($_POST['password'], $password)) {
            // Verification success. User has logged in.
            // Create session variables so we know the user is logged in.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['id'] = $id;
        } else {
            $_SESSION['message'] = 'Väärä tunnus tai salasana!';
        }
    } else {
        $_SESSION['message'] = 'Väärä tunnus tai salasana!';
    }

	$stmt->close();
}

if(isset($_GET['goto'])) {
    header('Location: ' . htmlspecialchars($_GET['goto']));
}
else {
    header('Location: ../index.php');
}
die;
?>