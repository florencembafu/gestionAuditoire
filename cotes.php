<?php include "connexion.php"; ?>

<h3>Ajouter une cote</h3>

<form method="POST">
    Étudiant:
    <select name="etudiant">
        <?php
        $etudiants = $conn->query("SELECT * FROM etudiants");
        while($e = $etudiants->fetch_assoc()){
            echo "<option value='".$e['id']."'>".$e['nom']."</option>";
        }
        ?>
    </select><br>

    Cours:
    <select name="cours">
        <?php
        $cours = $conn->query("SELECT * FROM cours");
        while($c = $cours->fetch_assoc()){
            echo "<option value='".$c['id']."'>".$c['nom_cours']."</option>";
        }
        ?>
    </select><br>

    Note: <input type="number" name="note"><br>

    <button type="submit" name="ajouter">Ajouter</button>
</form>

<?php
if(isset($_POST['ajouter'])){
    $etudiant = $_POST['etudiant'];
    $cours = $_POST['cours'];
    $note = $_POST['note'];

    $conn->query("INSERT INTO cotes (id_etudiant,id_cours,note)
                  VALUES ('$etudiant','$cours','$note')");
}
?>

<h3>Liste des cotes</h3>

<?php
$sql = "SELECT etudiants.nom, cours.nom_cours, cotes.note
        FROM cotes
        JOIN etudiants ON cotes.id_etudiant = etudiants.id
        JOIN cours ON cotes.id_cours = cours.id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo $row['nom']." - ".$row['nom_cours']." : ".$row['note']."<br>";
}
?>