<?php
$conn = new mysqli("localhost", "root", "", "auditoire");

if ($conn->connect_error) {
    die("Erreur : " . $conn->connect_error);
}
?>
