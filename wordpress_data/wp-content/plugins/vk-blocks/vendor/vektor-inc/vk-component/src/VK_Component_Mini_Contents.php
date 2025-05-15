<?php
/**
 * VK Component Mini Contents
 * 
 * @package VektorInc\VK_Component
 */

namespace VektorInc\VK_Component;

class VK_Component_Mini_Contents {

	public static function init() {

		// 古い（Composer版じゃない）VK_Component_Mini_Contents がある場合は処理しない.
		if ( class_exists( 'VK_Component_Mini_Contents' ) ) {
			return;
		}

		// 古い（Composer版じゃない）VK_Component_Mini_Contents が使用されている場所でも動作するようにエイリアスを作成.
		class_alias( '\VektorInc\VK_Component\VK_Component_Mini_Contents', '\VK_Component_Mini_Contents' );

		// テキストドメインの読み込み.
		if ( did_action( 'init' ) ) {
			self::load_text_domain();
		} else {
			add_action( 'init', array( __CLASS__, 'load_text_domain' ) );
		}
	}

	public static function load_text_domain() {
		// We're not using load_plugin_textdomain() or its siblings because figuring out where
		// the library is located (plugin, mu-plugin, theme, custom wp-content paths) is messy.
		$domain = 'vk-components';
		$locale = apply_filters(
			'plugin_locale',
			( is_admin() && function_exists( 'get_user_locale' ) ) ? get_user_locale() : get_locale(),
			$domain
		);

		$mo_file = $locale . '.mo';
		$path    = realpath( __DIR__ . '/languages' );
		if ( $path && file_exists( $path ) ) {
			load_textdomain( $domain, $path . '/' . $mo_file );
		}
	}

	public static function get_options( $options ) {
		$default = array(
			'outer_id'       => '',
			'outer_class'    => '',
			'text_color'     => '#333',
			'text_align'     => false,
			'shadow_use'     => false,
			'shadow_color'   => '',
			'title_text'     => '',
			'title_tag'      => 'h3',
			'title_class'    => '',
			'caption_text'   => '',
			'caption_tag'    => 'div',
			'caption_class'  => '',
			'btn_text'       => '',
			'btn_url'        => '',
			'btn_class'      => 'btn btn-primary',
			'btn_target'     => '',
			'btn_ghost'      => true,
			'btn_color_text' => '#000',
			'btn_color_bg'   => '#c00',
		);
		$options = wp_parse_args( $options, $default );
		return $options;
	}

	public static function get_view( $options ) {
		$options = self::get_options( $options );

		$html  = '';
		$style = '';

		$font_style         = '';
		$mini_content_style = '';
		if ( $options['text_align'] ) {
			$mini_content_style = ' style="text-align:' . esc_attr( $options['text_align'] ) . '"';
			$font_style        .= 'text-align:' . esc_attr( $options['text_align'] ) . ';';
		}

		$html .= '<div class="' . esc_attr( $options['outer_class'] ) . '"' . $mini_content_style . '>';

		if ( $options['text_color'] ) {
			$font_style .= 'color:' . $options['text_color'] . ';';
		}
		if ( $options['shadow_use'] ) {

			if ( $options['shadow_color'] ) {
				$font_style .= 'text-shadow:0 0 2px ' . $options['shadow_color'];
			} else {
				$font_style .= 'text-shadow:0 0 2px #000';
			}
		}
		if ( $font_style ) {
			$font_style = ' style="' . esc_attr( $font_style ) . '"';
		}

		// If Text Title exist.
		if ( $options['title_text'] ) {
			if ( $options['title_class'] ) {
				$title_class = ' class="' . esc_attr( $options['title_class'] ) . '"';
			}
			$html .= '<' . esc_html( $options['title_tag'] ) . $title_class . $font_style . '>';
			$html .= nl2br( wp_kses_post( $options['title_text'] ) );
			$html .= '</' . esc_html( $options['title_tag'] ) . '>';
		}

		// If Text caption exist.
		if ( $options['caption_text'] ) {
			if ( $options['caption_class'] ) {
				$caption_class = ' class="' . esc_attr( $options['caption_class'] ) . '"';
			}
			$html .= '<' . esc_html( $options['caption_tag'] ) . $caption_class . $font_style . '>';
			$html .= nl2br( wp_kses_post( $options['caption_text'] ) );
			$html .= '</' . esc_html( $options['caption_tag'] ) . '>';

		}

		// If Button exist
		if ( $options['btn_url'] && $options['btn_text'] ) {

			$html .= VK_Component_Button::get_view( $options );

		} // If Button exist

		$html .= '</div>';

		return $html;
	}

	public static function the_view( $options ) {
			echo self::get_view( $options );
	}
}

