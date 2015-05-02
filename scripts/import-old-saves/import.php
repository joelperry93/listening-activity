<?php 
namespace App\Scripts;

define('SAVES_DIR', dirname(__FILE__).'/saves');


function getJSONFiles() 
{
    $saveFiles = scandir(SAVES_DIR);
    $jsonFiles = [];

    foreach ($saveFiles as $file) 
    {
        if (strpos($file, '.json')) 
        {
            $jsonFiles[] = $file;
        }    
    }

    return $jsonFiles;
}

function loadSaves() 
{
    $saves = [];

    foreach (getJSONFiles() as $file) 
    {
        $date = explode('.', $file)[0];
        $saves[$date] = json_decode(file_get_contents(SAVES_DIR.'/'.$file));
    }
    
    return $saves;
}

var_dump(loadSaves());