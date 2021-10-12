<?php


function csvToArray($filename, $delimiter, $header, $donnees)
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
}

function arrayToCsv($filename = '', $delimiter = '', &$donnees = [], $header = array())
    //rempli les fiches
    {
        $fp = fopen($filename, "w");
        fputcsv($fp, $header, $delimiter, "\t");
        foreach ($donnees as $row) {
            fputcsv($fp, $row, $delimiter, "\t");
        }
        fclose($fp);
    }

