<?php 

$nav = include "input.php";

function navBuilder($input,$parent=null,$output=[])
{
    // Amuses toi !!
    // condition
    if ($parent == null)
    {
        // ajoute a $output
    }
    else 
    {
        return navBuilder($input, $parent, $output);
    }

    // return
    return $output;
}

navBuilder($nav);

