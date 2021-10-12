<?php
require('functions.php');
require('constantes.php');

// $tab = [];

$filename = FILE_TEST;

if(!is_file($filename)){
    $handle = fopen($filename, "w");
    fclose($handle);
    readline("le fichier \"$filename\" vient dêtre créé ...");
}

$delimiter = ";";
$header = null;
// $row = null;
$donnees = [];

//appelle le fiche
$tabEnCour = [];



$choisx = 'o';
while ($choisx != 'n' && !is_numeric($choisx))
    while (preg_match('/(o)/', $choisx)) {
        $tabEnCour["prenom"] = readline("entre votre prenom:");
        $tabEnCour["nom"] = readline("entre votre nom :");
        $tabEnCour["age"] = readline("entre votre age:");
        $tabEnCour["numeroSecrite"] = readline("entre votre numeroSecrite:");
        $tabEnCour["email"] = readline("entre votre email:");

        $choisx = readline('voulez vous contuni:o/n');
        $donnees[] = $tabEnCour;
    }


// print_r($donnees);
//rempli les fiche
// $tab = [];
// $filename = "teste.csv";
// $delimiter = ";";


csvToArray($filename,$delimiter,$header, $donnees);
/*while(($car=fgetcsv($filename,1000,";"))!=false)
{
    $tab[]=$car;
}*/

// print_r($donnees);
//fiche
// $tableau = [];
// for ($i = 0; $i < count($tableau); $i++) {
//     $tab = $tableau[$i];
//     echo ("$tab[nom] ,$tab[prenom] , $tab[age]  , $tab[numeroSecrite] ,$tab[email]\n");

//     //afficher un seul fois
//     for ($n = 0; $n < count($tab); $n++) {
//         echo ("$tab[nom] ,$tab[prenom] , $tab[age] , $tab[numeroSecrite] , $tab[email] \n");
//         //affricher 3 fois
//     }
// };
// foreach ($tableau as $tab) {
//     foreach ($tab as $key => $val) {
//         echo ("$key =>  $val \n");
//     }
// }
$header = ["nom", "prenom", "age", "numeroSecrite", "email"];
    

//tjs declraction de fonction apres fonction 
arrayToCsv($filename, $delimiter, $donnees, $header);
