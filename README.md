Mini-Calculatrice CLI en PHP
Cette application est une mini-calculatrice en ligne de commande (CLI) qui effectue des opérations logiques binaires sur deux entiers positifs.
Installation

Clonez le dépôt.
Exécutez composer build pour installer les dépendances.

Utilisation
Exécutez la commande suivante :
php bin/calc.php <A> <B>

Où <A> et <B> sont des entiers positifs.
Exemple
php bin/calc.php 5 3

Sortie attendue :
Entrée A : 5 (101)
Entrée B : 3 (011)
A ET B : 1 (001)
A OU B : 7 (111)
A XOR B : 6 (110)
NON A : -6 (…11111010)

Option JSON
Ajoutez --json pour obtenir la sortie au format JSON :
php bin/calc.php 5 3 --json

Scripts Composer

composer build : Installe les dépendances en mode production.
composer validate : Valide le fichier composer.json.
composer save : Exécute la calculatrice avec les entrées de samples/input.txt et sauvegarde la sortie JSON dans samples/output.json.

Échantillons

samples/input.txt : Contient un exemple d'entrées (ex. : 5 3).
samples/output.json : Contient la sortie JSON correspondante.
