<?php 

$homeworkDone = false; 

if ($homeworkDone)
{
    echo "Bob à fait ses devoir";
}
else
{
    echo "Bob n'à fait ses devoir";
}

echo "<br>";

//////////////////////////////////

$code = 1;

switch ($code)
{
    case 0:
        echo "Le feu est rouge<br>";
        break;
    
    case 1:
        echo "Le feu est vert<br>";
        break;
    
    case 2:
        echo "Le feu est orange<br>";
        break;
    
    default:
        echo "c'est le bordel !<br>";
}

echo "<br>";

//////////////////////////////////

// OK ou KO
$php = "OK";
$ng = "KO";
$node = "OK";

// Je suis un dev Front (Angular)
// Je suis un dev Back (PHP ou Node)
// Je suis un dev Fullstack (Angular et PHP et Node)
// Je ne suis pas un dev.

if ($php == "OK" && $node == "OK" && $ng == "OK")
{
    echo "Je suis un dev Fullstack (Angular et PHP et Node)";
}
else if ($php == "OK" || $node == "OK")
{
    echo "Je suis un dev Back (PHP ou Node)";
}
else if ($ng == "OK")
{
    echo "Je suis un dev Front (Angular)";
}
else 
{
    echo "Je ne suis pas un dev.";
}

echo "<br>";

switch(true)
{
    case ($php == "OK" && $node == "OK" && $ng == "OK"):
        echo "Je suis un dev Fullstack (Angular et PHP et Node)";
        break;

    case ($php == "OK" || $node == "OK"):
        echo "Je suis un dev Back (PHP ou Node)";
        break;

    case ($ng == "OK");
        echo "Je suis un dev Front (Angular)";
        break;

    default:
        echo "Je ne suis pas un dev.";
}