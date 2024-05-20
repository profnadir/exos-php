<?php 

class Article
{
    private $reference;
    private $nom;
    private $prix;
    private $quantiteEnStock;
    private $quantiteCommande;

    public function __construct(
        $reference,
        $nom,
        $prix,
        $quantiteEnStock,
        $quantiteCommande
    ) {
        $this->reference = $reference;
        $this->nom = $nom;
        $this->prix = $prix;
        $this->quantiteEnStock = $quantiteEnStock;
        $this->quantiteCommande = $quantiteCommande;
    }

    public function getReference()
    {
        return $this->reference;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function getNom()
    {
        return $this->nom;
    }

    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    public function getQuantiteEnStock()
    {
        return $this->quantiteEnStock;
    }

    public function setQuantiteEnStock($quantiteEnStock)
    {
        $this->quantiteEnStock = $quantiteEnStock;
    }

    public function getQuantiteCommande()
    {
        return $this->quantiteCommande;
    }

    public function setQuantiteCommande($quantiteCommande)
    {
        $this->quantiteCommande = $quantiteCommande;
    }

    public function verifierStock(){
        //retourn true si qte commande < qte stock
        return $this->quantiteCommande < $this->quantiteEnStock;

/*         if($this->quantiteCommande < $this->quantiteEnStock){
            return true;
        }else{
            return false;
        } */
    }

    public function calculPrix(){
        if($this->verifierStock()){
            return $this->quantiteCommande * $this->prix;
        }
        else{
            return 0;
        }
    }

    public function __toString()
    {
        if($this->verifierStock()){
            $txt = "Vous avez commandé l'article : ".$this->nom." <br>";
            $txt .= "Quantité : ".$this->quantiteCommande." <br>";
            $txt .= "Prix total : ".$this->calculPrix()."<br>";

            return $txt;
            
        }else{
            $txt = "Vous avez commandé l'article : ".$this->nom." <br>";
            $txt .= "Quantité : ".$this->quantiteCommande." <br>";
            $txt .= "Article épuisé <br>";

            return $txt;
        }
    }

}


?>