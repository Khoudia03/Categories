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


// 2 

 foreach ($categories as  $categorie ) {
    if (count($categorie["produits"]) == 0) {
         echo $categorie["nom"]."\n";
    }
 };




  // 3: Enregister une nuovelle categorie

$codeValide = true;
    
do { 
        
        $code = readline("saisir le code : ");
        if (empty($code)) {
            echo "le code est obligatoire \n";
             $codeValide = false;
        }else{
            foreach ($categories as  $categorie) {
               if (($categorie["code"]) === $code) {
                $codeValide = false;
                echo "Le code existe deja! Veuillez choisir un autre \n"; 
              }
            }  
        }
        
} while (!$codeValide);

    
$nomValide = true;

do { 

        $nom = readline("saisir le nom : ");
        if (empty($nom)) {
            echo "le nom est obligatoire \n";
             $nomValide= false;
        }else{
            foreach ($categories as  $categorie ) {
               if (($categorie["nom"]) === $nom) {
                $nomValide = false;
                echo "Le nom existe deja! Veullez choisir un autre \n"; 
               }
            }  
        }
} while (!$nomValide);



$categorie  =   [
        "code" => $code,
        "nom" => $nom,
        "produits" => []
    ];

$categories[] = $categorie;




 // 4: Ajout d'un produit à une categorie

    $categorieExiste =  false;
    $code = readline("saisir le code :");
        foreach ($categories as $index => $categorie ) {
               if (($categorie["code"]) === $code) {
                    $categorieExiste = true;
                    break;
                }
        } 



    if ($categorieExiste) {
      
        $nomValid = true;
        do { 
            
            $nom = readline("saisir le nom de la categorie : ");
            if (empty($nom)) {
                echo "Le nom est obligatoire \n";
                $nomValid= false;
            }else{
                foreach ($categories as  $categorie ) {
                    if (($categorie["nom"]) === $nom) {
                        $nomValid = false;
                        echo "Le nom existe deja! Veuillez choisir un autre \n"; 
                    }
                }  
            }
        } while (!$nomValid);   


        $refValid = true;
        do { 
            
            $reference = readline("saisir la reference : ");
            if (empty($reference)) {
                echo "la reference est obligatoire \n";
                $refValid = false;
            }else{
                foreach ($categories as  $categorie ) {
                    if (($categorie["reference"]) === $reference) {
                        $refValid = false;
                        echo "La reference existe deja! Veuillez choisir une autre \n"; 
                    }
                }  
            }
        } while (!$refValid);  

        do {
            $prix = (int)readline("saisir le prix : ");
        } while ($prix > 0);
        
        
        do {
            $quantite = (int)readline("saisir la quantite : ");
        } while ($quantite > 0);
          

        $produit =   [
            "nom" => $nom,
            "reference" => $reference,
            "prix" => $prix,
            "quantité" => $quantite
        ] ;

        $categories[$index]["produits"][] = $produit;
    }else {

        echo " Désolé , la categorie n'existe pas...\n";
    };

?>