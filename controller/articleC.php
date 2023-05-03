<?php
include_once '../config.php';
require_once '../config.php';
require_once '../model/article1.php';
class articleC
{
    
    function ajouterarticle($article)
    {
        $sql = "INSERT INTO article (id, nom, texte)
            VALUES (:id, :nom, :texte)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $article->getid(),
                'nom' => $article->getNom(),
                'texte' => $article->getTexte()
            ]);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function afficherarticle()
    {
        $sql = "SELECT * FROM article";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $query->execute();
            $liste = $query->fetchAll(PDO::FETCH_OBJ);
            return $liste;
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM article WHERE id=".$id."";
        $db = config::getConnexion();
        $query =$db->prepare($sql);

        try {
            $query->execute();
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function afficherTrie($sortby) {
        $sql = "SELECT * FROM article ORDER BY $sortby ASC";
        $db = config::getConnexion();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    
    public function chercherarticle($term)
    {
        $query = "SELECT * FROM article WHERE Nom LIKE '%$term%'";
        $db = config::getConnexion();
        $stmt = $db->prepare($query);
        $stmt->execute();
        $articles = array();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $article = new article(
                $row['id'],
                $row['Nom'],
                $row['Texte']
            );
            array_push($articles, $article);
        }
        return $articles;
    }
}
