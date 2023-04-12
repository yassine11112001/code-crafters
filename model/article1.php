<?php
class article{
    private ?int $num = null;
    private ?string $nom = null;
    private ?string $texte = null;
    function __construct(int $num ,string $nom,string $texte)
    {
        $this->num=$num;
        $this->nom=$nom;
        $this->texte=$texte;
    }
    function getnum(): int{
        return $this->num;
    }
    function getnom(): string{
        return $this->nom;
    }
   
    function gettexte(): string{
        return $this->texte;
    }

    function setnum(string $num): void{
        $this->num=$num;
    }
    
    function setnom(string $nom): void{
        $this->nom=$email;
    }
    function settexte(string $texte): void{
        $this->texte=$texte;
    }
   
}
?>