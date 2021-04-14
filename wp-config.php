<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'roott' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'root' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'TUk#8]y>4c]!,xtj/P/q?thjzTuwVej29DX(21=):<1 `?p4]$#pmZGnN)`K?$)b' );
define( 'SECURE_AUTH_KEY',  'f!~3ezG`[sJ9xcJVB??kID9p)kVL_;vkzBz@DZZoz5Y1.TFj8#Ktk._}lM]M~8?0' );
define( 'LOGGED_IN_KEY',    'YptzBz}3nA|l<Zi+T<_zw_xWA=;I*!<l2@;Gs.u$BQ$PX<j/D]Rg+B*A1C-M<G5.' );
define( 'NONCE_KEY',        'hQ P!Lux`*KW.{uY6cg,L}uYn[&m5_`|rN).6gZlNkj2j:*Y)lrj~,yHY?>glM]M' );
define( 'AUTH_SALT',        'j_dQg{,?%kb&tbA3}K_{PW`69EIXL^2kV3f8C&yR!|Z:|lFbJ6zjqk:&^oZoC0+f' );
define( 'SECURE_AUTH_SALT', 'za6hA&A9+FXM3L[;%mo%A=~U~8&K.^.We8c?qg,v@B+|b~R1q;a?S p:zCG&5tmQ' );
define( 'LOGGED_IN_SALT',   '}i8XiD80zV>5NO7U;x,E_GM6FOiae9VfTR&%6cAwNvJ?&]uAdzl+%~Vhxm$x,mR!' );
define( 'NONCE_SALT',       '(A|NTTzL,rvGyg)NL22?)i`9A}q~O>l9$vM{yQd#Bmcgn)E})--`@XL>W_(ZCgS`' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
