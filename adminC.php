<?php
include_once("C:/xampp/htdocs/user/config.php");
include_once("C:/xampp/htdocs/user/Model/admin.php");
class adminC
{
    function selectConn(){
        $sql="select * from client where token='ON'";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}

    function afficheradmin(){
        $sql="select * from client";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}
function searchById($id) {
    $db = config::getConnexion();
    // Requête SQL pour récupérer les informations du client correspondant à l'identifiant
    $query = $db->prepare("SELECT * FROM client WHERE id = ?");
    $query->execute([$id]);
    
    // Récupération des résultats de la requête
    $result = $query->fetch(PDO::FETCH_ASSOC);
    
    // Retourne les informations du client ou null si aucun client n'a été trouvé
    return $result ? $result : null;
}
function searchLogin($email,$mdp){
    $sql="select * from client where email='$email' AND mdp='$mdp'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste->fetchAll(PDO::FETCH_ASSOC);}
catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
public function ajouteradmin($admin) {
    $sql = "insert into client(nom,email,numtel,adresse,mdp,role) values(:nom,:email,:numtel,:adresse,:mdp,:role)";
    $sql2 = "insert into client2(id,nom,email,numtel,adresse,mdp,date_inscr,role) values(:id,:nom,:email,:numtel,:adresse,:mdp,:date_inscr,:role)";
    $db = config::getConnexion();
    try {
        $date_inscr = date('Y-m-d H:i:s'); // Récupérer la date et l'heure actuelles
        $params = [
            ':nom' => $admin->getNom(),
            ':email' => $admin->getEmail(),
            ':numtel' => $admin->getNumtel(),
            ':adresse' => $admin->getAdresse(),
            ':mdp' => $admin->getMdp(),
            ':role' => $admin->getRole(), // Ajouter le paramètre de rôle
        ];
        $query = $db->prepare($sql);
        $query->execute($params);
        $id = $db->lastInsertId(); // récupérer l'ID généré automatiquement
        $params[':id'] = $id; // ajouter l'ID à la liste des paramètres
        $params[':date_inscr'] = $date_inscr;
        $query2 = $db->prepare($sql2);
        $query2->execute($params);

    } catch(Exception $e) {
        echo 'Erreur: '.$e->getMessage();
    }
}

function afficheradminTrie(string $selon){
    $sql="select * from client2 order by ".$selon."";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
}

catch(Exception $e){
    echo 'Erreur: '.$e->getMessage();
}
}
function setConn($email, $mdp)
{
    $sql = "select * from client where email='$email' AND mdp='$mdp'";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        foreach ($liste as $row) {
            $_SESSION['e'] = $row['email'];
            $_SESSION['id'] = $row['id'];
        }
    } catch (Exception $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}

public function setDisconn()
{
    $sql="update client set token='OFF' where token='ON'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}

public function afficheradminRech(string $rech1,string $selon)
{
    $sql="select * from client where $selon like '".$rech1."%'";
    
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        return $liste;
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}
function modifieradmin($id,$admin) {
    $sql="UPDATE client SET nom=:nom,numtel=:numtel,email=:email,mdp=:mdp,adresse=:adresse WHERE id=:id";
    $sql2="UPDATE client2 SET nom=:nom,numtel=:numtel,email=:email,mdp=:mdp,adresse=:adresse,date_modif=:date_modif WHERE id=:id";
    $db = config::getConnexion();
    try {
        $date_modif = date('Y-m-d H:i:s'); // Récupérer la date et l'heure actuelles
        $params = [
            ':nom' => $admin->getNom(),
            ':email' => $admin->getEmail(),
            ':numtel' => $admin->getNumtel(),
            ':adresse' => $admin->getAdresse(),
            ':mdp' => $admin->getMdp(),
            ':id' => $id,
        ];
        $query = $db->prepare($sql);
        $query->execute($params);
        $params[':date_modif'] = $date_modif;
        $query2 = $db->prepare($sql2);
        $query2->execute($params);

    } catch(Exception $e) {
        die('Erreur: '.$e->getMessage());
    }
}




public function afficheradminDetail(int $rech1)
    {
        $sql="select * from client where id=".$rech1."";
        
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
public function supprimeradmin($id)
{
    $sql = "DELETE FROM client WHERE id=".$id."";
    $sql2 = "DELETE FROM client2 WHERE id=".$id."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    $query2 =$db->prepare($sql2);
    try {
        $query->execute();
        $query2->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
}

?>