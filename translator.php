<?php

// Si le tableau $_POST n'est pas vide => si des données ont été envoyées depuis le formulaire
if (! empty($_POST)) {
    var_dump($_POST);
    var_dump($_POST['word'], $_POST['direction']);
    
    $dictionary = [
        'dog' => 'chien',
        'cat' => 'chat',
        'sun' => 'soleil',
        'goat' => 'chèvre',
        'snake' => 'serpent',
        'monkey' => 'singe',
        'sea' => 'mer',
        'moon' => 'lune',
        'flower' => 'fleur',
        'sheep' => 'mouton',
        'ship' => 'bateau',
        'bird' => 'oiseau',
        'sky' => 'ciel'
    ];
    
    /* 
     * 1. Déterminer le sens de traduction (est-ce que l'on traduit vers le français ou vers l'anglais)
     * 2. Récupérer le mot saisi dans le formulaire
     * 3. Vérifier que le mot existe dans le dictionnaire
     * 4. Trouver la traduction dans le sens choisi
     */
    
    // if ($_POST['direction'] === 'toFrench') {
    //     // Traduction anglais -> français
    //     echo $dictionary[$_POST['word']];
    // } elseif ($_POST['direction'] === 'toEnglish') {
    //     // Traduction français -> anglais
    // }
    
    // On transforme le mot saisi dans le formulaire
    // on le met en minuscules
    $word = strtolower($_POST['word']);
    
    switch ($_POST['direction']) {
        case 'toFrench':
            // Traduction anglais -> français
            
            // if (isset($dictionary[$_POST['word']])) {
            //     echo $dictionary[$_POST['word']];
            // }
            
            // Si la clé existe dans le tableau => Le mot a bien été trouvé dans le dictionnaire
            if (array_key_exists($word, $dictionary)) {
                $translation = $dictionary[$word];
            } else {
                // Le mot n'a pas été trouvé
                $translation = null;
            }
            break;
        case 'toEnglish':
            // Traduction français -> anglais
            
            // Récupérer la clé du tableau $dictionary à partir de la valeur
            // qui a été saisie dans le formulaire($_POST['word'])
            $translation = array_search($word, $dictionary);
            
            if ($translation === false) {
                // Le mot n'a pas été trouvé
                $translation = null;
            }
            break;
    }
}

// Afficher le résultat de la traduction dans l'index.php dans un var_dump
// Si la traduction n'existe pas (= le mot ne se trouve pas dans le dictionnaire), on récupérera la valeur null

require 'translator.phtml';