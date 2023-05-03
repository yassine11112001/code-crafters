<?php
class admin{
    private ?int $id = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?int $numtel = null;
    private ?string $mdp = null;
    private ?string $date_inscr = null;
    private ?string $date_modif = null;
    private ?string $role;
    function __construct(string $nom,string $email,int $numtel,string $adresse,string $mdp,string $role = 'client')
    {
        
        $this->nom=$nom;
        $this->email=$email;
        $this->numtel=$numtel;
        $this->adresse=$adresse;
        $this->mdp=$mdp;
        $this->date_inscr=date('Y-m-d H:i:s');
        $this->date_modif=date('Y-m-d H:i:s');
        $this->role=$role; // Initialiser le champ de rôle
    }

    function getId(): int{
        return $this->id;
    }
    function getNom(): string{
        return $this->nom;
    }
   
    function getEmail(): string{
        return $this->email;
    }
    
    function getNumtel(): string{
        return $this->numtel;
    }
    function getAdresse(): string{
        return $this->adresse;
    }
    function getMdp(): string{
        return $this->mdp;
    }
    function getDateInscr(): string{
        return $this->date_inscr;
    }
    function getDateModf(): string{
        return $this->date_modif;
    }
    function getRole(): string{
        return $this->role;
    }


    public function setId($id)
    {
        $this->id = $id;
    }
    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setEmail(string $email): void{
        $this->email=$email;
    }
    function setNumtel(int $numtel): void{
        $this->numtel=$numtel;
    }
   
}
?>