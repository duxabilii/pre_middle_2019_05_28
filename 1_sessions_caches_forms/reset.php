<?php
// SOME SETTINGS

use Classes\Db;

require('vendor/autoload.php');

define("CORRECT_LOGIN", 'test@example.com');
define("CORRECT_PASS", 'test123');

session_start();

if (isset($_POST['action']) AND $_POST['action'] === 'reset') {
    if (!isset($_POST['password']) OR empty($_POST['password'])) {
        $_SESSION['error_message'] = 'Password is required field!';
        header('Location: change_password.php');
    }

    // Try instantiate DB
    try {
        $DB = Db::getInstance();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $result = $DB->query(
        'UPDATE `01_users` SET `password` = :password, `is_suspicious` = 0 WHERE `id` = :user_id',
        [
            ':user_id' => $_SESSION['user']['id'],
            ':password' => hash('sha256', $_POST['password']),
        ]);
    $_SESSION['user']['is_suspicious'] = 0;
    unset($_SESSION['error_message']);

}
header('Location: user.php');