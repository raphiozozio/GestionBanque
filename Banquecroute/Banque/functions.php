<?php

function arrayToCsv($filename = '', $delimiter = '', &$donnees, $header = array())
{
    $fp = fopen($filename, 'w');
    fputcsv($fp, $header, $delimiter, "\t");
    foreach ($donnees as $row) {
        fputcsv($fp, $row, $delimiter, "\t");
    }
    fclose($fp);
};//fonction permettant de resortir les données enregistrées dans le tableau par l'utilisateur
//arraytocsv sert a SAUVER le TABLEAU vers un CSV (Raph)

function csvToArray($filename = '', $delimiter = '', &$donnees,$header = array())
{
    if (($handle = fopen($filename, 'r')) !== FALSE) {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE) {
            if (!$header)
                $header = $row;
             else
                $donnees[] = array_combine($header, $row);
        }
        fclose($handle);
        
    }
}// fonction permettant d'entrer des données dans un tableau
//csvtoarray sert a OUVRIR LE CSV vers un TABLEAU (Raph)
