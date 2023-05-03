<?php
class article{
    public ?int $id = null;
    public ?string $nom = null;
    public ?string $texte = null;
    function __construct(int $id ,string $nom,string $texte)
    {
        $this->id=$id;
        $this->nom=$nom;
        $this->texte=$texte;
    }
    function getid(): int{
        return $this->id;
    }
    function getnom(): string{
        return $this->nom;
    }
   
    function gettexte(): string{
        return $this->texte;
    }

    function setid(int $id): void{
        $this->id=$id;
    }
    
    function setnom(string $nom): void{
        $this->nom=$nom;
    }
    function settexte(string $texte): void{
        $this->texte=$texte;
    }
}
?>
