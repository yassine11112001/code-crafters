<?php
include_once("C:/xampp/htdocs/projet/config.php");
include_once("C:/xampp/htdocs/projet/Model/article1.php");
class articleC
{
    function selectConn(){
        $sql="select * from article where token='ON'";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}

    function afficherarticle(){
        $sql="select * from article";
        $db = config::getConnexion();
        try{
            $liste = $db->query($sql);
            return $liste;
    }
    catch(Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }
}

public function ajouterarticle($article){
    $sql="insert into article(num,nom,texte) values(:num,:nom,:texte)";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute([
        'num'=>$article->getnom(),
        'nom'=>$article->getnum(),
        'texte'=>$article->gettexte(),
        ]);
        
    }
        catch(Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
}

function modifierarticle($num,$article) {
    $sql="UPDATE  article set num=:num,nom=:nom,texte=:texte where num=".$num."";
    $db = config::getConnexion();
    try{
        $query = $db->prepare($sql);
    
        $query->execute([
            'nom' => $article->getnom(),
            'num' => $article->getnum(),
            'texte' => $article->gettexte(),
        ]);			
    }
    catch (Exception $e){
        echo 'Erreur: '.$e->getMessage();
    }		
  }

public function supprimerarticle($id)
{
    $sql = "DELETE FROM article WHERE num=".$num."";
    $db = config::getConnexion();
    $query =$db->prepare($sql);
    
    try {
        $query->execute();
    }
    catch(Exception $e){
        die('Erreur: '.$e->getMessage());

    }
}
}

?>