<?php

// 1 

$categories = [

   0 =>      [
            "code" => "coo0",
            "nom" => "categorie0",
            "produits" => [
                  0 => [
                    "nom" => "produit1",
                    "reference" => "ref1",
                    "prix" => 3000,
                    "quantite" => 5 
                  ],
                  1 => [
                    "nom" => "produit2",
                    "reference" => "ref2",
                    "prix" => 2000,
                    "quantite" => 3 
                  ]
            ]
         ],
   1 =>      [
            "code" => "coo1",
            "nom" => "categorie1",
            "produits" => []
         ]
];


//1: Affichage de tout les categories qui n'ont pas de produits

 function afficheCategorieSansProduit(array $categories): void{
    foreach ($categories as  $categorie) {
        if (empty($categorie["produits"])) {
            echo $categorie["nom"] . "\n";
        }
    }
 }
 afficheCategorieSansProduit($categories);




 //2:

 function saisieChaine(string $message): string {
     return readline($message);  
 }

 function champObligatoire(string $value,string $message): bool{
    if (empty($value)) {
        echo $message."\n";
        return  false;
    }
        return true;
 }

 function rechercheCategorieParCle(array $categories, string $key, string $value): int|bool {
    foreach ($categories as $index  => $categorie ) {
        if (($categorie[$key]) === $value) {
            return $index ;
        }
    } 
    return false;
 }

function saisieChampObligatoireEtUnique(array $categories, string $messageSaisie, string $messageErreur, string $cle): string {

    do {

        $valeur = saisieChaine($messageSaisie);

        if (!champObligatoire($valeur, $messageErreur)) {
            continue;
        }

        if (rechercheCategorieParCle($categories, $cle, $valeur) !== false) {

            echo ucfirst($cle) . " déjà existant.\n";
            continue;

        }

        return $valeur;

    } while (true);

}

function afficherCategoriesSansProduit(array $categories): void
{
    foreach ($categories as $categorie) {

        if (empty($categorie["produits"])) {

            echo $categorie["nom"] . "\n";

        }

    }
}



 


?>