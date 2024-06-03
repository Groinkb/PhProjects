<?php
$eleve = [
    'nom' => 'Doe', 
    'Prenom' => 'Marc', 
    'notes' => [10, 20, 15],
];
echo $eleve['Prenom'];
$eleve['notes'][3] = 16;
echo $eleve['notes'];
print_r($eleve['notes']);
?> 


