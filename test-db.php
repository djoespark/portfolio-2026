<?php
$host = 'gateway01.eu-central-1.prod.aws.tidbcloud.com';
$db   = 'test';
$user = 'R94D8A6hRbM5XLN.root';
$pass = 'TON_MOT_DE_PASSE';
$port = 4000;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $user, $pass);
    echo "✅ CONNEXION RÉUSSIE ! Le problème vient de la config Laravel.";
} catch (PDOException $e) {
    echo "❌ ÉCHEC DE CONNEXION : " . $e->getMessage();
}