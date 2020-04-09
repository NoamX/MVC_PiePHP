<?php

namespace Core;

/*
Le constructeur de votre Entity doit :
• Prendre en paramètre un tableau associatif contenant les attributs d’un model (ici : titre, content,
author).
OU
• Prendre en paramètre un tableau associatif contenant une entrée dont la clé est « id » et la valeur l’id
de l’enregistrement géré par l’entité. Le retour du read de l’ORM doit remplacer le tableau associatif.
PUIS
• Créer pour chaque attribut fourni dans le tableau associatif un attribut public dont le nom sera fourni
par la clé et la valeur fourni par la valeur de l’entrée du tableau.
*/

class Entity
{
    public function __construct()
    {
    }
}
/*
Usage dans le cadre de registerAction :
$params = $this->request->getQueryParams();
$user = new UserModel($params);
if (!$user->id) {
    $user->save();
    self::$_render = "Votre compte a ete cree . " . PHP_EOL ;
}
*/
