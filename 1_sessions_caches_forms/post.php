<?php
// SOME SETTINGS

use Classes\Db;

require('vendor/autoload.php');

define("CORRECT_LOGIN", 'test@example.com');
define("CORRECT_PASS", 'test123');

session_start();
if (!isset($_SESSION['is_logged_in'])) {
    header('Location: login.php');
}
if ($_SESSION['user']['is_suspicious']) {
    $_SESSION['error_message'] = 'Your account may have been hacked. Please change your password!!!';
    header('Location: change_password.php');
}


if (isset($_POST['action']) AND $_POST['action'] === 'post') {
    if (!isset($_POST['message']) OR empty($_POST['message'])) {
        $_SESSION['error_message'] = 'Message is required field!';
        header('Location: user.php');
    }

    // Try instantiate DB
    try {
        $DB = Db::getInstance();
    } catch (Exception $e) {
        die($e->getMessage());
    }

    $result = $DB->query(
        'INSERT INTO `01_messages`(`text`, `user_id`) VALUES (:text, :user_id)',
        [
            ':text' => $_POST['message'],
            ':user_id' => $_SESSION['user']['id']
        ]);

    $is_suspicious = \Classes\CleanInput::check($_POST['message']);

    if ($is_suspicious) {
        $DB->query(
            'UPDATE `01_users` SET `is_suspicious` = 1 WHERE `id` = :user_id',
            [
                ':user_id' => $_SESSION['user']['id']
            ]
        );
        $_SESSION['user']['is_suspicious'] = 1;
        $_SESSION['error_message'] = 'Your account may have been hacked. Please change your password!!!';
    }
    $_SESSION['error_message'] = 'Your message posted';
}
header('Location: user.php');