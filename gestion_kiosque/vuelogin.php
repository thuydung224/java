<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
// Access-Control-Allow-Origin
include_once 'connexion.php' ;
$bdd = connectgestion_kiosque() ;
$query = $bdd->prepare('INSERT INTO quantite_commande (id_article, id_commande, qte_commande)
VALUES (:id_article, :id_commande, :qte)
ON DUPLICATE KEY
UPDATE qte_commande = :qte');

define("USERNAME", 'root');
define("PASSWORD", 'root');

$usr = $_POST['username'];
$pwd = $_POST['password'];

if (($usr == USERNAME) and ($pwd == PASSWORD)) {
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
    $payload = json_encode(['user_id' => 123]);
    $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
    $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
    $signature = hash_hmac('sha256', $base64UrlHeader . "." . $base64UrlPayload, 'abC123!', true);
    $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
    $jwt = $base64UrlHeader . "." . $base64UrlPayload . "." . $base64UrlSignature;
    echo '{' . $usr . ',' . $jwt . '}';
} else {
    echo 'wrong password or username';
}
?>