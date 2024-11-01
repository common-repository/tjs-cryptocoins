<?php 
	/*
		Plugin Name: TJS CryptoCoins
		Plugin URI: http://www.tschmidt.nl
		Description: Receive Bitcoins or Gulden donations with this QR Code widget.
		Version: 0.1
		Author URI: http://www.tschmidt.nl/
		License: GPLv2 or later
		License URI: http://www.gnu.org/licenses/gpl-2.0.html
		Text Domain: tjs-cryptocoin
		Domain Path: /lang
	*/
	require 'inc/tjs-gulden-widget.php';
	require 'inc/tjs-bitcoin-widget.php';

	function tjs_cryptocoin_qr_register_scripts() {
		wp_register_style( 'tjs-cryptocoin-qr', plugins_url( 'css/tjs-cryptocoin-qr.css', __FILE__ ) );
		wp_enqueue_style( 'tjs-cryptocoin-qr' );

		wp_enqueue_script( 'jquery-qr', plugins_url( 'js/jquery-qrcode-0.14.0.min.js', __FILE__ ));
		wp_enqueue_script( 'tjs-cryptocoin-qr', plugins_url( 'js/tjs-cryptocoin-qr.js', __FILE__ ));
	}
	add_action( 'wp_enqueue_scripts', 'tjs_cryptocoin_qr_register_scripts' );
	
	function tjs_cryptocoin_qr_install(){
		flush_rewrite_rules();
	}
	register_activation_hook(__FILE__, 'tjs_cryptocoin_qr_install');

	function tjs_cryptocoin_qr_deactivation(){
		flush_rewrite_rules();
	}
	register_deactivation_hook(__FILE__, 'tjs_cryptocoin_qr_deactivation');

?>