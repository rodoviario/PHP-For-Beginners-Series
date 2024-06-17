<?php

use Core\App;
use Core\Validator;
use Core\Database;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
$errors = [];
if (!Validator::email($email)) {
    $errors['email'] = 'Please provide an email address';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'Please provide a password of at least 7 chars';
}

if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

$db = App::resolve(Database::class);
// check if the account already exists
$user = $db->query('select * from users where email = :email', [
    'email' => $email
])->find();

if ($user) {
    // then someone with that emal already exists and has an account
    // if yes, redirect to a login page, o al menos por ahora al root
    header('location: /');
} else {
    // If not, ssave one to the database, and them log the user in, and redirect
    $db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    // mark that the user has logged in
    // perhaps also signal that in general someone is logged in (optional)
    // $_SESSION['logged_in'] = true;
    $_SESSION['user'] = [
        'email' => $email
    ];
    // normalmente acá se iría a un dashboard del user, pero no tenemos aún
    header('location: /');
    exit();
}

