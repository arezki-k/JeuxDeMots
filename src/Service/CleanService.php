<?php
namespace App\Service;


class CleanService{
    
}
function convertToAnsi($mot){
    return mb_convert_encoding($mot, "Windows-1252", "UTF-8");
}
