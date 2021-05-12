<?php

if (! empty($_POST)) {
    
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
    
    if ($_POST['direction'] === 'toEnglish') {
        $dictionary = array_flip($dictionary);
    }
    
    $word = strtolower($_POST['word']);
    
    // Récupérer une valeur à partir de la clé
    if (array_key_exists($word, $dictionary)) {
        $translation = $dictionary[$word];
    } else {
        // Le mot n'a pas été trouvé
        $translation = null;
    }
}

// Afficher le résultat de la traduction dans l'index.php dans un var_dump
// Si la traduction n'existe pas (= le mot ne se trouve pas dans le dictionnaire), on récupérera la valeur null

require 'translator.phtml';