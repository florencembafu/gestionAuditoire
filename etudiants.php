<?php include "connexion.php"; ?>

<h3>Ajouter un étudiant</h3>

<form method="POST">
    Nom: <input type="text" name="nom"><br>
    Prénom: <input type="text" name="prenom"><br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<?php
if(isset($_POST['ajouter'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $conn->query("INSERT INTO etudiants (nom, prenom) VALUES ('$nom','$prenom')");
}
?>

<h3>Liste des étudiants</h3>

<?php
$result = $conn->query("SELECT * FROM etudiants");

while($row = $result->fetch_assoc()){
    echo $row['id']." - ".$row['nom']." ".$row['prenom']."<br>";
}
?>
