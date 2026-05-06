<?php include "connexion.php"; ?>

<h3>Marquer présence</h3>

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

    Statut:
    <select name="statut">
        <option value="present">Présent</option>
        <option value="absent">Absent</option>
    </select><br>

    <button type="submit" name="ajouter">Valider</button>
</form>

<?php
if(isset($_POST['ajouter'])){
    $etudiant = $_POST['etudiant'];
    $statut = $_POST['statut'];
    $date = date("Y-m-d");

    $conn->query("INSERT INTO presences (id_etudiant,date_presence,statut)
                  VALUES ('$etudiant','$date','$statut')");
}
?>

<h3>Liste des présences</h3>

<?php
$sql = "SELECT etudiants.nom, presences.date_presence, presences.statut
        FROM presences
        JOIN etudiants ON presences.id_etudiant = etudiants.id";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    echo $row['nom']." - ".$row['date_presence']." - ".$row['statut']."<br>";
}
?>