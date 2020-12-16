<?php

// On force l'affichage des messages d'erreurs
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$title = "Décomposition des URL";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <h1><?= $title ?></h1>

    <img src="url.png">

    <pre>https://www.monsite.com/sports/hockey/matches.html</pre>
    <pre>https://www.monsite.com/sports/hockey/matches.php?param1=value1&param2=value2</pre>
    <pre>https://www.monsite.com/sports/hockey/matches.php#param1=value1&param2=value2</pre>
    <pre>https://www.monsite.com/sports/hockey/matches.php?param1=value1&param2=value2#param1=value1&param2=value2</pre>
    <pre>https://www.monsite.com/sports/hockey/matches.php#top</pre>


    <nav>
        <a href="#schema">schema</a>
        <a href="#protocol">protocol</a>
        <a href="#domain">domain</a>
        <a href="#root">root</a>
        <a href="#path">path</a>
        <a href="#server_param">server_param</a>
        <a href="#client_param">client_param</a>
    </nav>

    <p>Le nom de domaine possède jusqu'à 63 caractères MAX</p>
    <p>l'URL ne peut pas dépasser 255 caractères.</p>

    <h2 id="schema">Schema</h2>

    <dl>
        <dt>http</dt>
        <dd>HyperText Transfert Protocol</dd>

        <dt>https</dt>
        <dd>HyperText Transfert Protocol Secured</dd>

        <dt>ftp</dt>
        <dd>File Transfert Protocol</dd>

        <dt>magnet</dt>
        <dd>Protocol pour transfert P2P</dd>
    </dl>


    <hr>

    <h2 id="protocol">Protocol</h2>

    <dl>
        <dt>http://</dt>
        <dd>HyperText Transfert Protocol</dd>

        <dt>https://</dt>
        <dd>HyperText Transfert Protocol Secured</dd>

        <dt>ftp://</dt>
        <dd>File Transfert Protocol</dd>

        <dt>magnet://</dt>
        <dd>Protocol pour transfert P2P</dd>
    </dl>


    <hr>

    <h2 id="domain">Nom de domaine</h2>

    <dl>
        <dt>Nom de domaine</dt>
        <dd>www.monsite.com</dd>

        <dt>TLD : Top Level Domain</dt>
        <dd>.com</dd>
        <dd>Defini le registrar</dd>

        <dt>Domaine</dt>
        <dd>monsite</dd>
        <dd>Defini l'alias du serveur</dd>

        <dt>Sous Domaine</dt>
        <dd>www</dd>
        <dd>Sous application de "monsite"</dd>
    </dl>

    <p>Voir <a href="https://www.youtube.com/watch?v=dcIrB8qRCbA">https://www.youtube.com/watch?v=dcIrB8qRCbA</a></p> pour comprendre la résolution DNS



    <hr>

    <h2 id="root">Racine de l'application</h2>

    <dl>
        <dt>/</dt>
        <dd>Défini la racine de l'application "www" qui se trouve sur le serveur "monsite.com"</dd>
    </dl>


    <hr>

    <h2 id="path">Répertoires et fichiers</h2>

    <dl>
        <dt>path</dt>
        <dd>sports/hockey</dd>

        <dt>nom de fichier</dt>
        <dd>matches.html</dd>

        <dt>fichier</dt>
        <dd>matches</dd>

        <dt>extension du fichier</dt>
        <dd>.html</dd>
    </dl>

    <hr>



    <h2 id="server_param">Passage de paramètres pour le serveur</h2>

    <dl>
        <dt>?</dt>
        <dd>Transmission de paramètres pour le serveur</dd>

        <dt>param1=value1</dt>
        <dd>Paire clé / Valeur</dd>

        <dt>param1</dt>
        <dd>Nom du paramètre</dd>

        <dt>value1</dt>
        <dd>Valeur associer au paramètre</dd>

        <dt>=</dt>
        <dd>Symbole d'affectation de la valeur au paramètre</dd>

        <dt>&</dt>
        <dd>Séparateur de paramètres</dd>
    </dl>

    <hr>



    <h2 id="client_param">Passage de paramètres pour le client</h2>

    <dl>
        <dt>#</dt>
        <dd>Transmission de paramètres pour le client</dd>

        <dt>param1=value1</dt>
        <dd>Paire clé / Valeur</dd>

        <dt>param1</dt>
        <dd>Nom du paramètre</dd>

        <dt>value1</dt>
        <dd>Valeur associer au paramètre</dd>

        <dt>=</dt>
        <dd>Symbole d'affectation de la valeur au paramètre</dd>

        <dt>&</dt>
        <dd>Séparateur de paramètres</dd>
    </dl>

    <hr>
    
    <a href="/">Retour</a>
</body>
</html>