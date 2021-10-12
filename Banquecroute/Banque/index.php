<?php
require('functions.php');
require('constants.php');
$filename = FILE_BANQUE;
$nomAgence = "CDA_ROUBAIX_BANQUE";
$adresseAgence = "19 rue des Écoles, 59100 Roubaix";
$numeroDeCompte = readline("Entrer votre numéro de compte");
$codeAgence = 01;
$idClient = readline("Entrer votre identifiant: ");
$nom = readline("Entrer votre nom: ");
$prenom = readline("Entrer votre prénom: ");
$dateDeNaissance = readline("entrer votre de date naissance: ");
$email = readline("entrer votre adresse mail: ");
$solde = "votre solde est de ";
$decouvertAutorise = readline("Souhaitez un découvert: O/N? ");
$compteCourant = "Vous bénéficiez d'un compte courant.";
$livretA = "Vous avez un livret A.";
$planEpargneLogement = "Vous avez un PEL.";
$delimiter= ";";
$header= null;


if (!is_file($filename)) {
    $handle = fopen($filename, 'w');
    fclose($handle);
}

readline("le fichier \"$filename\" vient d'être créé, appuyer sur entrer pour le remplir...");

csvToArray($filename, $delimiter,$tabBanq, $header);

$tabBanq = [
    "nomAgence" => $nomAgence,
    "adresseAgence" => $adresseAgence,
    "compteBancaire" => [
        "numeroDeCompte" => $numeroDeCompte,
        "codeAgence" => $codeAgence,
        "client" => [
            "idClient" => $idClient,
            "nom" => $nom,
            "prenom" => $prenom,
            "dateDeNaissance" => $dateDeNaissance,
            "email" => $email,
            "solde" => $solde,
            "decouvertAutorise" => $decouvertAutorise,
            "typeDeCompte" => [
                "compteCourant" => $compteCourant,
                "livretA" => $livretA,
                "planEpargneLogement" => $planEpargneLogement,
            ]
        ]
    ]
];



//foreach ($tabBanq as $line) {
//    print_r($line);
//    foreach($line as $array){
//       foreach($array as $result){
//         print_r($result) ;// arrayToCsv($f,$result,";");
//       }
//    }
//}

//$header=["nomAgence"];
//arrayToCsv($filename, $delimiter, $tabBanq, $header);
echo '<pre>';
print_r($tabBanq);
echo '</pre>';
