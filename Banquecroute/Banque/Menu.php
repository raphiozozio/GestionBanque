<?php

//require('functions.php');
require('constants.php');
$choix=0;


while ($choix!= 8){
    echo("\n");
    echo("1 :Créer une agence\n");
    echo("2 :Créer un client\n");
    echo("3 :Créer un compte bancaire\n");
    echo("4 :Recherche de compte (numéro de compte)\n");
    echo("5 :Recherche de client (Nom, Numéro de compte, identifiant de client)\n");
    echo("6 :Afficher la liste des comptes d’un client (identifiant client)\n");
    echo("7 :Imprimer les infos client (identifiant client)\n");
    echo("8 :Quitter le programme\n");
    $choix=readline("faites votre choix : ");
    switch($choix){
    case 1 : 
            $filename = FILE_AGENCE;
            // $header=["nomAgence","adresseAgence","codeAgence"];
            $delimiter=";";
            $donnees = array();
         //CSV to TABLEAU ___________________________________________________________________
            
         
         $filename = fopen(FILE_AGENCE, 'a+');
         $octet=filesize(FILE_AGENCE);
         if ($octet==0){
             
             $donnees[]=["nomAgence","adresseAgence","codeAgence"];
         }
         echo("$octet\n");
         
         print_r($donnees);
         
            while (($row = fgetcsv($filename, 1000, $delimiter)) !== FALSE) {
                if (!$header)
                    $header = $row;
                 else
                    $donnees[] = array_combine($header, $row);
            }
            print_r($donnees);
            echo("tableau avant ecriture\n");
            fclose($filename);
            $header=array();
                
                         
        
             
         //________________________________________________________________________________
         echo ("Vous creez une agence");
         echo ("\n");
         $nomAgence = readline("Entrez le nom de l'agence ALPHANUMERIQUE : ");
         $adresseAgence = readline("Entrez l'adresse de l'agence ALPHANUMERIQUE: ");
         $codeAgence = readline("entrez le code de l'agence CHIFFRE :");
         //Ajoute derniere entree au TABLEAU _________________________________________________
         
         $donnees[]=[
            "nomAgence"=> $nomAgence,
            "adresseAgence"=> $adresseAgence,
            "codeAgence" => $codeAgence];
            print_r($donnees);
            echo("tableau apres j'ajout des données");

         // __________________________________________________________________________________
         //TABLEAU to CSV
         $handle = fopen(FILE_AGENCE, 'w+');

         foreach ($donnees as $fields) {
         fputcsv($handle, $fields,$delimiter);
         }
         fclose($handle);
         $donnees = array();
         
         $header=array();
         $choix=0;

        
    break;
    case 2 :
        echo("Vous cree un cliet client");
        $idClient = readline("Entrer votre identifiant Client NUMERIQUE: ");
        $nom = readline("Entrer votre nom ALPHANUMERIQUE: ");
        $prenom = readline("Entrer votre prénom ALPHANUMERIQUE: ");
        $dateDeNaissance = readline("entrer votre de date naissance JJMMAAAA: ");
        $email = readline("entrer votre adresse mail MACHIN@TRUC.BIDUL : ");
        $choix=0;
    break;
    case 3 : 
        echo ("Vous creez un Compte");
        echo("\n");
        $numeroDeCompte = readline("Entrer votre numéro de compte NUMERIQUE : ");
        $solde = readline("Saisissez le solde du compte NUMERIQUE : ");
        $decouvertAutorise = readline("Souhaitez un découvert: O/N? ");
        echo("\n");
        echo("1 :un compte courant\n");
        echo("2 :un livret A\n");
        echo("3 :un PEL\n");
        $typeDeCompte=readline("Choisissez le type de compte ");
        switch($typeDeCompte){
            case 1 :
                echo ("vous cree le compte courant $numeroDeCompte avec $solde €");
                echo("\n");
                $compteCourant = TRUE;
                $livretA = FALSE;
                $planEpargneLogement = FALSE;
                $choix=0;
            break;
            case 2 :
                echo ("vous cree le livret A $numeroDeCompte avec $solde €");
                echo("\n");
                $compteCourant = FALSE;
                $livretA = TRUE;
                $planEpargneLogement = FALSE;
                $choix=0;
            break;
            case 3:
                echo ("vous cree le PEL $numeroDeCompte avec $solde €");
                echo("\n");
                $compteCourant = FALSE;
                $livretA = FALSE;
                $planEpargneLogement = TRUE;
                $choix=0;
            break;}

        

    break;
    case 4 :
        echo("yes client");
    break; 
    case 5 : 
        echo ("yes agence");
    break;
    case 6 :
        echo("yes client");
    break;           
    case 7 : 
        echo ("yes agence");
    break;
    }};




?>