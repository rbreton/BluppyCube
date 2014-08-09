<?php
/**
 * @author  bretonr <bretonr@gmail.com>
 * @copyright Copyright (c)2013 – bretonr
 * Le fichier de configuration s'occupe de:
 * - centraliser les paramètres du site comme la connexion à la BD
 * - définir un gestionnaire d'erreurs
 * - définir des fonctions utilitaires pour le déboguage et pour la sécurité (échapper les données client)
*/
    define('CHEMIN_LOG', "error_log.txt");

    // personne responsable des bogues (gestion des erreurs)
    define('CONTACT', "bretonr@gmail.com");
    
    // Spécifie le fuseau horaire pour l'utilisation de la fonction date
    date_default_timezone_set('America/New_York');
    
    // Défini le gestionnaire d'erreurs:
    set_error_handler ('gerer_erreurs');

    // Rapporte toutes les Errors, warnings et notices
    error_reporting(E_ALL | E_STRICT);
 
    // Affiche les erreurs à l'utilisateur ou pas
    ini_set('display_errors', true); 

    // @todo Adapter les variables de connexion des 2 environnements
    $bd_server = "localhost";
    $bd_username = "root";
    $bd_password = "";
    $bd_name = "bluppycube_db";
    
    //Racine pour les liens, feuille de style, javascript, etc.
    $slugRacine = "/";
 
    $objMySQLi = new mysqli($bd_server,$bd_username,$bd_password,$bd_name);
    // les lignes suivantes forcent mysql à servir les données en utf8 (pour afficher les accents correctement)
    $objMySQLi->query("SET CHARACTER SET utf8");
    $objMySQLi->query("SET NAMES utf8");

    
    /**
     * Gère les erreurs
     *
     * @param $e_number  le niveau d'erreur, sous la forme d'un entier. 
     * @param $e_message le message d'erreur, sous forme de chaîne
     * @param $e_file    le nom du fichier dans lequel l'erreur a été identifiée. 
     * @param $e_line    le numéro de ligne à laquelle l'erreur a été identifiée
     * @param $e_vars    optionnel, contient un tableau avec toutes les variables qui
     *                   existaient lorsque l'erreur a été déclenchée.
     * @return void
     */
    function gerer_erreurs($e_number, $e_message, $e_file, $e_line, $e_vars) 
    {
        // Construit le message d'erreur
        $message = date('n-j-Y H:i:s') . ' ' ;
        
        $message .= get_error_name($e_number);

        $message .= " '$e_file' ligne $e_line : $e_message  <br />\n";
        
        // Envoi un courriel au responsable
        // error_log ($message, 1, CONTACT);
        
        // Enregistre dans le journal d'erreurs si nous sommes en production
        error_log ($message, 3, CHEMIN_LOG);
        // Affiche l'erreur à l'écran
        echo '<p class="error">' . $message . '</p>';
    }

    /** 
    * Retourne le nom de l'erreur en fonction de son identifiant numérique
    * @param  $intLevel   identifiant numérique de l'erreur
    * @return string  chaîne contenant le nom de l'erreur
    */    
    function get_error_name($intLevel)
    {
        $strName = 'INCONNU      ';
        switch ($intLevel) {
            case E_ERROR:
                 $strName = 'ERREUR       ';
                break;
            case E_WARNING:
                 $strName = 'ALERTE       ';
                break;
            case E_NOTICE:
                 $strName = 'AVERTISSEMENT';
                break;
        }
        return $strName;
    }
    
   