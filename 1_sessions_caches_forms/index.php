<?php
// SOME SETTINGS

require('autoload.php');

session_start();

if (isset($_POST['action']) AND $_POST['action'] === 'login') {
    if (!isset($_POST['email']) OR !isset($_POST['password'])) {
        $_SESSION['error_message'] = 'Login and password are required!';
        header('Location: login.php');
    }

    // Try instantiate DB
    try {
        $DB = Db::getInstance();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    // Check login/password
    $user = $DB->query(
        'SELECT * from 01_users WHERE email = :email and password = :password',
        [
            ':email' => $_POST['email'],
            ':password' => hash('sha256', $_POST['password'])
        ]
    );
    if ($user) {
        $user = $user[0];
    } else {
        $_SESSION['error_message'] = 'Login and/or password are incorrect!';
        header('Location: login.php');
    }

    // Set log into cookie
    $_SESSION['is_logged_in'] = true;
    $_SESSION['user'] = $user;


    // Check suspicious actions
    if ($user['is_suspicious']) {
        $_SESSION['error_message'] = 'Your account may have been hacked. Please change your password!!!';
        header('Location: change_password.php');
    }

}

if (!isset($_SESSION['is_logged_in'])) {
    header('Location: login.php');
}

header('Location: user.php');