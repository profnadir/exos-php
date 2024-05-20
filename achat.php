<?php 

if(isset($_POST['submit'])){

    $valide = true;
    $tab = [];

    if(!empty($_POST['prix'])){
        $prix = $_POST['prix'];
    }else{
        $valide= false;
        $tab['prix'] = "Le champs prix est vide";
        //echo "Le champs prix est vide";
    }

    if(!empty($_POST['quantite_stock'])){
        $quantite_stock = $_POST['quantite_stock'];
    }else{
        $valide= false;
        $tab['quantite_stock'] = "Le champs quantite_stock est vide";
        //echo "Le champs quantite stock est vide";
    }

    if(!empty($_POST['quantite_commande'])){
        $quantite_commande = $_POST['quantite_commande'];
    }else{
        $valide= false;
        $tab['quantite_commande'] = "Le champs quantite_commande est vide";
        //echo "Le champs quantite commande est vide";
    }

    if(count($tab)==0){
        echo "les champs sont valides";

        $article = $_POST['article'];
        $prix = $_POST['prix'];
        $quantite_stock = $_POST['quantite_stock'];
        $quantite_commande = $_POST['quantite_commande'];

        require('Article.php');
        $article = new Article(rand(10,1000),$article, $prix, $quantite_stock, $quantite_commande);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="artilc">Article</label>
        <select name="article" id="article">
            <option value="tv">TV</option>
            <option value="ecran">Ecran</option>
            <option value="clavier">Clavier</option>
            <option value="souris">Souris</option>
            <option value="usb">Usb</option>
        </select>
        <br>
        <label for="prix">Prix</label>
        <input type="number" name="prix">
        <span><?php echo isset($tab['prix']) ? $tab['prix'] : ""; ?></span>
        <br>
        <label for="quantite_stock">Quantite Stock</label>
        <input type="number" name="quantite_stock">
        <span><?php echo isset($tab['quantite_stock']) ? $tab['quantite_stock'] : ""; ?></span>
        <br>
        <label for="quantite_commande">Quantite Commandé</label>
        <input type="number" name="quantite_commande">
        <span><?php echo isset($tab['quantite_commande']) ? $tab['quantite_commande'] : ""; ?></span>
        <br>
        <input type="submit" name="submit">
        <hr>
        <p>
            <?php  if(isset($article)) { echo $article; } ?>
        </p>
    </form>
</body>
</html>