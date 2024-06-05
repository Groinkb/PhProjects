<?php
function bonjour($nom = 'Jean Marc'){
    return 'Bonjour' . $nom . "\n";
}

$salutation = bonjour();
echo $salutation;