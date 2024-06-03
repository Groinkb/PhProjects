<?php
$action = (int)readline('entrez votre action : (1: attaquer, 2: défendre, 3:passer mon tour)');
// le switch c'est pour éviter les répitions d'if 
switch ($action) {
    case 1:
        echo 'J\'attaque ! ';
        break;
    case 2:
        echo 'Je défends';
        break;
    case 3:
        echo 'Je ne fais rien';
        break;
    default:
        echo 'Commande inconnue';    
}

//First commentary

if ($action ===1){
    echo 'J\'attaque !';
} elseif ($action ===2) {
    echo 'Je défends';
}
elseif ($action ===3){
    echo 'Je ne fais rien';
} else{
    echo 'Commande inconnue';
}
