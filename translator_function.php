<?php

/**
 * Renvoie la traduction d'un mot spécifié, dans le sens spécifié
 *
 * @param string $word Le mot que l'on veut traduire
 * @param string $direction Le sens dans lequel je veux traduire (toFrench ou toEnglish)
 * @return string|null Le mot traduit s'il existe dans le dictionnaire ou bien null
 */
function translate(string $word, string $direction): ?string
{
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

    // On transforme le mot saisi dans le formulaire
    // on le met en minuscules
    $word = strtolower($word);
    
    switch ($direction) {
        case 'toFrench':
            
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
    
    return $translation;
}

// Si le tableau $_POST n'est pas vide => si des données ont été envoyées depuis le formulaire
if (! empty($_POST)) {
    $translation = translate($_POST['word'], $_POST['direction']);
}

// Afficher le résultat de la traduction dans l'index.php dans un var_dump
// Si la traduction n'existe pas (= le mot ne se trouve pas dans le dictionnaire), on récupérera la valeur null

require 'translator.phtml';