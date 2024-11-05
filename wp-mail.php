<?php
/**
 * Gets the email message from the user's mailbox to add as
 * a WordPress post. Mailbox connection information must be
 * configured under Settings > Writing
 *
 * @package WordPress
 */

/** Make sure that the WordPress bootstrap has run before continuing. */
require __DIR__ . '/wp-load.php';

/** This filter is documented in wp-admin/options.php */
if ( ! apply_filters( 'enable_post_by_email_configuration', true ) ) {
	wp_die( __( 'This action has been disabled by the administrator.' ), 403 );
}

$mailserver_url = get_option( 'mailserver_url' );

if ( 'mail.example.com' === $mailserver_url || empty( $mailserver_url ) ) {
	wp_die( __( 'This action has been disabled by the administrator.' ), 403 );
}

/**
 * Fires to allow a plugin to do a complete takeover of Post by Email.
 *
 * @since 2.9.0
 */
do_action( 'wp-mail.php' ); // phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores

/** Get the POP3 class with which to access the mailbox. */
require_once ABSPATH . WPINC . '/class-pop3.php';

/** Only check at this interval for new messages. */
if ( ! defined( 'WP_MAIL_INTERVAL' ) ) {
	define( 'WP_MAIL_INTERVAL', 5 * MINUTE_IN_SECONDS );
}

$last_checked = get_transient( 'mailserver_last_checked' );

if ( $last_checked ) {
	wp_die( __( 'Slow down cowboy, no need to check for new mails so often!' ) );
}

set_transient( 'mailserver_last_checked', true, WP_MAIL_INTERVAL );

$time_difference = get_option( 'gmt_offset' ) * HOUR_IN_SECONDS;

$phone_delim = '::';

$pop3 = new POP3();

if ( ! $pop3->connect( get_option( 'mailserver_url' ), get_option( 'mailserver_port' ) ) || ! $pop3->user( get_option( 'mailserver_login' ) ) ) {
	wp_die( esc_html( $pop3->ERROR ) );
}

$count = $pop3->pass( get_option( 'mailserver_pass' ) );

if ( false === $count ) {
	wp_die( esc_html( $pop3->ERROR ) );
}

if ( 0 === $count ) {
	$pop3->quit();
	wp_die( __( 'There does not seem to be any new mail.' ) );
}

// Always run as an unauthenticated user.
wp_set_current_user( 0 );

// Contenedor principal
echo '<div class="container mt-5">';
echo '<h1 class="text-center">Mensajes de Correo</h1>';
echo '<div class="row">';

for ( $i = 1; $i <= $count; $i++ ) {
	$message = $pop3->get( $i );
	$content = '';
	$subject = '';
	$post_author = 1;
	$author_found = false;

	foreach ( $message as $line ) {
		// Procesamiento del mensaje
		// ... (aquí va el resto de tu lógica existente)

		if ( preg_match( '/Subject: /i', $line ) ) {
			$subject = trim( $line );
			$subject = substr( $subject, 9, strlen( $subject ) - 9 );
		}
	}

	// Tarjeta Bootstrap para cada mensaje
	echo '<div class="col-md-4">';
	echo '<div class="card mb-4 shadow-sm">';
	echo '<div class="card-body">';
	echo '<h5 class="card-title">' . esc_html( $subject ) . '</h5>';
	echo '<p class="card-text">' . esc_html( $content ) . '</p>';
	echo '<p class="card-text"><small class="text-muted">Autor: ' . esc_html( $post_author ) . '</small></p>';
	echo '</div>';
	echo '</div>';
	echo '</div>'; // fin de la columna
}

echo '</div>'; // fin de la fila
echo '</div>'; // fin del contenedor

$pop3->quit();
?>
