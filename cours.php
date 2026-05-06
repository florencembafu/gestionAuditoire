<?php include "connexion.php"; ?>

<h3>Ajouter un cours</h3>

<form method="POST">
    Nom du cours: <input type="text" name="cours"><br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<?php
if(isset($_POST['ajouter'])){
    $cours = $_POST['cours'];
    $conn->query("INSERT INTO cours (nom_cours) VALUES ('$cours')");
}
?>

<h3>Liste des cours</h3>

<?php
$result = $conn->query("SELECT * FROM cours");

while($row = $result->fetch_assoc()){
    echo $row['id']." - ".$row['nom_cours']."<br>";
}
?>