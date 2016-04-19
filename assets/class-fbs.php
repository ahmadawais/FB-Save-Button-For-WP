<?php
/**
 * WP_FBS class
 *
 * Class for working of this plugin.
 *
 * @since 	1.0.0
 * @package FBS
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WP_FBS.
 *
 * Class for FB save button.
 *
 * @since 1.0.0
 */

if ( ! class_exists( 'WP_FBS' ) ) :

class WP_FBS {
	/**
	 * Settings.
	 *
	 * @var 	array
	 * @since 	1.0.0
	 */
	private $fbs_settings;

	/**
	 * Is Posts.
	 *
	 * @var 	string
	 * @since 	1.0.0
	 */
	private $is_posts;

	/**
	 * Is Pages.
	 *
	 * @var 	string
	 * @since 	1.0.0
	 */
	private $is_pages;

	/**
	 * Size.
	 *
	 * @var 	string
	 * @since 	1.0.0
	 */
	private $size;

	/**
	 * Is Before.
	 *
	 * @var 	string
	 * @since 	1.0.0
	 */
	private $is_before;

	/**
	 * Is After.
	 *
	 * @var 	string
	 * @since 	1.0.0
	 */
	private $is_after;

	/**
	 * Content hodler.
	 *
	 * @var 	mixed
	 * @since 	1.0.0
	 */
	private $fbs_content;

	/**
	 * Constructor.
	 *
	 * @since  1.0.0
	 */
	public function __construct() {
		// Initialize settings.
		$this->fbs_settings = get_option( 'fbs_settings' );
		$this->fbs_settings = isset( $this->fbs_settings ) && is_array( $this->fbs_settings ) ? $this->fbs_settings : false;

		// Get is_posts.
		$this->is_posts     = $this->fbs_settings['fbs_is_posts'];
		$this->is_posts     = isset( $this->is_posts ) ? $this->is_posts : 'off';

		// Get is_pages.
		$this->is_pages     = $this->fbs_settings['fbs_is_pages'];
		$this->is_pages     = isset( $this->is_pages ) ? $this->is_pages : 'off';

		// Get size.
		$this->size         = $this->fbs_settings['fbs_size'];
		$this->size         = isset( $this->size ) ? $this->size : 'small';

		// Get is_before.
		$this->is_before    = $this->fbs_settings['fbs_is_before'];
		$this->is_before    = isset( $this->is_before ) ? $this->is_before : 'off';

		// Get is_after.
		$this->is_after     = $this->fbs_settings['fbs_is_after'];
		$this->is_after     = isset( $this->is_after ) ? $this->is_after : 'off';
	}

	/**
	 * Enqueue Script.
	 *
	 * @since 1.0.0
	 */
	public function fb_sdk() {
		if ( 'on' == $this->is_posts || 'on' == $this->is_pages || shortcode_exists( 'fbs' ) ) {
		?>
			<style>
				.fbs_margin{margin-top: 1em;margin-bottom: 1em}
			</style>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=119899291446416";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>
		<?php
		} // if ended.
	} // fb_sdk() ended.


	/**
	 * Add Fb Save Button.
	 *
	 * @since 1.0.0
	 */
	public function add_fb_save_button( $content ) {
		// For posts.
		if ( 'on' == $this->is_posts && is_single() ) {
			// Only Before.
			if ( 'on' == $this->is_before && 'off' == $this->is_after ) {
				$this->fbs_content  = '<div id="fb-root"></div>';
				$this->fbs_content .= '<div class="fb-save fbs_margin" data-uri="' . get_permalink() . '" data-size="' . $this->size . '"></div>';
				$this->fbs_content .= $content;
				return $this->fbs_content;
			}

			// Only After.
			if ( 'on' == $this->is_after && 'off' == $this->is_before ) {
				$this->fbs_content  = $content;
				$this->fbs_content .= '<div id="fb-root"></div>';
				$this->fbs_content .= '<div class="fb-save fbs_margin" data-uri="' . get_permalink() . '" data-size="' . $this->size . '"></div>';
				return $this->fbs_content;
			}

			// Both before && after.
			if ( 'on' == $this->is_before && 'on' == $this->is_after ) {
				$this->fbs_content  = '<div id="fb-root"></div>';
				$this->fbs_content .= '<div class="fb-save fbs_margin" data-uri="' . get_permalink() . '" data-size="' . $this->size . '"></div>';
				$this->fbs_content .= $content;
				$this->fbs_content .= '<div id="fb-root"></div>';
				$this->fbs_content .= '<div class="fb-save fbs_margin" data-uri="' . get_permalink() . '" data-size="' . $this->size . '"></div>';
				return $this->fbs_content;
			}
		} // for posts ended.


		// For page.
		if ( 'on' == $this->is_pages && is_page() ) {
			// Only Before.
			if ( 'on' == $this->is_before && 'off' == $this->is_after ) {
				$this->fbs_content  = '<div id="fb-root"></div>';
				$this->fbs_content .= '<div class="fb-save fbs_margin" data-uri="' . get_permalink() . '" data-size="' . $this->size . '"></div>';
				$this->fbs_content .= $content;
				return $this->fbs_content;
			}

			// Only After.
			if ( 'on' == $this->is_after && 'off' == $this->is_before ) {
				$this->fbs_content  = $content;
				$this->fbs_content .= '<div id="fb-root"></div>';
				$this->fbs_content .= '<div class="fb-save fbs_margin" data-uri="' . get_permalink() . '" data-size="' . $this->size . '"></div>';
				return $this->fbs_content;
			}

			// Both before && after.
			if ( 'on' == $this->is_before && 'on' == $this->is_after ) {
				$this->fbs_content  = '<div id="fb-root"></div>';
				$this->fbs_content .= '<div class="fb-save fbs_margin" data-uri="' . get_permalink() . '" data-size="' . $this->size . '"></div>';
				$this->fbs_content .= $content;
				$this->fbs_content .= '<div id="fb-root"></div>';
				$this->fbs_content .= '<div class="fb-save fbs_margin" data-uri="' . get_permalink() . '" data-size="' . $this->size . '"></div>';
				return $this->fbs_content;
			}
		} // for pages ended.

		// If nothing then return the content.
		return $content;

	} // add_fb_save_button() ended.


	/**
	 * [fbs] Shortcode.
	 *
	 * @since 1.0.0
	 */
	public function shortcode() {
		/**
		 * Shortcode: `[fbs]`.
		 *
		 * @since 1.0.0
		 */
		add_shortcode( 'fbs', function ( $atts ) {
			// Attributes default.
			$args = shortcode_atts( array(
			        'link' => get_bloginfo( 'wpurl' ),
			        'size' => 'small',
			    ), $atts );

			return "<div id='fb-root'></div><div class='fb-save fbs_margin' data-uri='" . $args['link'] . "' data-size='" . $args['size'] . "'></div>";
		} );// annonymous function and action ended.

	}


} // Class WP_FBS ended.

endif;
