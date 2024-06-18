<?php

// log the user out, the following will be a function logout()
// $_SESSION = [];
// session_destroy();

// $params = session_get_cookie_params();
// setcookie(
//     'PHPSESSID',
//     '',
//     time() - 3600,
//     $params['path'],
//     $params['domain'],
//     $params['secure'],
//     $params['httponly']
// );
logout();

header('location: /');
exit();