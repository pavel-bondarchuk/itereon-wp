<?php
/**
 * This function is for custom functions which helps to speed up development
 *
 * @contribute alex.osmichenko@gmail.com
 *
 * @package itereon
 */
if ( ! function_exists( 'create_link' ) ):
	/**
	 *
	 * @param bool $link
	 * @param string $class
	 * @param string $id
	 * @param bool $attr
	 *
	 * @return bool
	 */
	function create_link( $link = false, $class = '', $id = '', $attr = false ) {
		if ( $link ) {
			$attr_str = '';
			if ( $attr && is_array( $attr ) ) {
				foreach ( $attr as $k => $v ) {
					$attr_str .= $k . '="';
					if ( is_array( $v ) ) {
						foreach ( $v as $prop => $val ) {
							$attr_str .= $prop . ':' . $val . ';';
						}
					} else {
						$attr_str .= $v;
					}
					$attr_str .= '" ';
				}
			}
			echo '<a href="' . esc_url( $link['url'] ) . '" class="' . esc_attr( $class ) . '" id="' . esc_attr( $id ) . '" target="' . esc_attr( $link['target'] ) . '" ' . $attr_str . '>' . esc_html( $link['title'] ) . '</a>';
		}

		return false;
	}
endif;
