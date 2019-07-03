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
define( 'DB_NAME', 'wordpress' );

/** Utilisateur de la base de données MySQL. */
define( 'DB_USER', 'mama' );

/** Mot de passe de la base de données MySQL. */
define( 'DB_PASSWORD', 'Abdoulayediallo' );

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
define( 'AUTH_KEY',         'U],L!UWrZ-4Z.hs%4W4K%(lN}#fwXWO{|`o_72od,0ceJIzv}j_&H 4 1u|8+(]q' );
define( 'SECURE_AUTH_KEY',  '|ypNKDO81F0U7`E=B%ML=fbS$d-:Ek0L|$*}Z,;8~|{{fXh+wjT(L~vBVlUf~h3h' );
define( 'LOGGED_IN_KEY',    '6G?0x:W:P|<$oiDwLG_o1#*>+5a0=fpgHBI9o{bp#rW]!VQN9GLLvGQp5+d=MIs3' );
define( 'NONCE_KEY',        'X@iFnV=AFG_UuBB!fOge ,z/C-A{NUC|5_Enqp?3aC<bL[bUUAiR%OCC8bpHD~|`' );
define( 'AUTH_SALT',        '!nVh,y$ 4z?42oUyf~:su84c=4juy}EI|L`XDnB1B9~t/q*`>Q8l<Ke$D;ES/V~|' );
define( 'SECURE_AUTH_SALT', '>EPXcde~.F P-@GyDy{2{@QW=8iuoL@xLhDjB9<[,504%l5#i4M+xq+NHT)4v0O=' );
define( 'LOGGED_IN_SALT',   ';v/D[xv6!j*XokUZz<}^YmVc>~7juiI%|MJ*R><jo6Qq}VlG%iclw?&9I@78Rsob' );
define( 'NONCE_SALT',       'Hu4NU0f,blo]EZK1y6U6Y#. ]B|v&eJ6/tIliIN014b*cT7*[+iy.*eC0gw7l<^T' );
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
