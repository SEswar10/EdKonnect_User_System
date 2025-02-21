<?php
require 'vendor/autoload.php';  // Load JWT Library
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$secret_key = "your_secret_key";  // Change this to a strong key

function createJWT($user_id) {
    global $secret_key;
    $payload = [
        "user_id" => $user_id,
        "iat" => time(),
        "exp" => time() + (60 * 60)
    ];
    return JWT::encode($payload, $secret_key, 'HS256');
}

function verifyJWT($token) {
    global $secret_key;
    try {
        return JWT::decode($token, new Key($secret_key, 'HS256'));
    } catch (Exception $e) {
        return false;
    }
}
?>
