<?php
/**
 * La configuration de base de votre installation WordPress.
 *
 * Ce fichier contient les réglages de configuration suivants : réglages MySQL,
 * préfixe de table, clés secrètes, langue utilisée, et ABSPATH.
 * Vous pouvez en savoir plus à leur sujet en allant sur
 * {@link http://codex.wordpress.org/fr:Modifier_wp-config.php Modifier
 * wp-config.php}. C’est votre hébergeur qui doit vous donner vos
 * codes MySQL.
 *
 * Ce fichier est utilisé par le script de création de wp-config.php pendant
 * le processus d’installation. Vous n’avez pas à utiliser le site web, vous
 * pouvez simplement renommer ce fichier en "wp-config.php" et remplir les
 * valeurs.
 *
 * @package WordPress
 */

// ** Réglages MySQL - Votre hébergeur doit vous fournir ces informations. ** //
/** Nom de la base de données de WordPress. */
define( 'DB_NAME', 'beinhouse' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'thiemokho' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', '-Penda92' );

/** Adresse de l’hébergement MySQL. */
define( 'DB_HOST', 'localhost' );

/** Jeu de caractères à utiliser par la base de données lors de la création des tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Type de collation de la base de données.
  * N’y touchez que si vous savez ce que vous faites.
  */
define('DB_COLLATE', '');

/**#@+
 * Clés uniques d’authentification et salage.
 *
 * Remplacez les valeurs par défaut par des phrases uniques !
 * Vous pouvez générer des phrases aléatoires en utilisant
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ le service de clefs secrètes de WordPress.org}.
 * Vous pouvez modifier ces phrases à n’importe quel moment, afin d’invalider tous les cookies existants.
 * Cela forcera également tous les utilisateurs à se reconnecter.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '>=gIOabVtNAxr%.H?4-rf0s|q`hQDV~YRk3HHF._F4LskXJUC9NE<oyaP:oW}6]e' );
define( 'SECURE_AUTH_KEY',  'FouBQu0)bO{d1`]kC^S,(uS3}07`@,x6Hz$c+P&EHki=>Am|QtLd!xE9Kyl>{sA[' );
define( 'LOGGED_IN_KEY',    '22(MF&z7WbVfQ.nswy/0/bd1<clQaC(Pjr>|prGnli4dVQXLHluVv bj}oN^~nE&' );
define( 'NONCE_KEY',        '?h7!Wf {$ #M3$WSMg(.v*WS6y49j+b8,,f6cEk:NJ%fgjApQwgfj)>&Zr6WE%FZ' );
define( 'AUTH_SALT',        'DDsb27!6p-uX1{8<sx<bNb64|$sQ9Z{KD~lXDD^g&F8+q(#YqP7j{}(rACEvfq<v' );
define( 'SECURE_AUTH_SALT', 'x[E ]zVA4Qog%!|0%V ^WF5J`Aw=gpZ_PmDf_JJwiW0,$Hiv0i!(S1re%y#A.eXp' );
define( 'LOGGED_IN_SALT',   'r:8,Jj6z>#vvm6R4R{}_V(rtFQEadur;CJD)DD&?XeCs-&6;,g)=CJBG6dZ?<L#5' );
define( 'NONCE_SALT',       'ZmuBUw>2Qb%^GI@xLM:c@v%=0V_Y!i^H[g&[cyw:afmo~v?+G[iTgL@5QU, Ov5:' );
/**#@-*/

/**
 * Préfixe de base de données pour les tables de WordPress.
 *
 * Vous pouvez installer plusieurs WordPress sur une seule base de données
 * si vous leur donnez chacune un préfixe unique.
 * N’utilisez que des chiffres, des lettres non-accentuées, et des caractères soulignés !
 */
$table_prefix = 'wp_';

/**
 * Pour les développeurs : le mode déboguage de WordPress.
 *
 * En passant la valeur suivante à "true", vous activez l’affichage des
 * notifications d’erreurs pendant vos essais.
 * Il est fortemment recommandé que les développeurs d’extensions et
 * de thèmes se servent de WP_DEBUG dans leur environnement de
 * développement.
 *
 * Pour plus d’information sur les autres constantes qui peuvent être utilisées
 * pour le déboguage, rendez-vous sur le Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* C’est tout, ne touchez pas à ce qui suit ! Bonne publication. */

/** Chemin absolu vers le dossier de WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Réglage des variables de WordPress et de ses fichiers inclus. */
require_once(ABSPATH . 'wp-settings.php');
define('FS_METHOD', 'direct');
