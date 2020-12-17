<?php 

$fruits = [
    [
        'name' => "Pommes",
        'colors' => [
            "Vert",
            "Jaune",
            "Rouge"
        ]
    ],
    [
        'name' => "Bananes",
        'colors' => [
            "Jaune",
            "Vert"
        ]
    ],
    [
        'name' => "Orange",
        'colors' => [
            "Orange"
        ]
    ],
];

// Modifier le type de document
header('content-type: application/json');

echo json_encode( $fruits );