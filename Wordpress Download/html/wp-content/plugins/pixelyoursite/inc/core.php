<?php
/**
 * Free version related functions.
 */

if( !function_exists( 'pys_get_woo_ajax_addtocart_params' ) ) {

	function pys_get_woo_ajax_addtocart_params( $product_id ) {

		$params                 = array();
		$params['content_type'] = 'product';
		$params['content_ids']  = '[' . pys_get_product_content_id( $product_id ) . ']';

		return $params;

	}

}

if( !function_exists( 'pys_get_post_tags' ) ) {

	/**
	 * Return array of product tags.
	 * PRO only.
	 */
	function pys_get_post_tags( $post_id ) {

		return array(); // PRO feature

	}

}

if( !function_exists( 'pys_get_woo_code' ) ) {

	/**
	 * Build WooCommerce related events code.
	 * Function adds evaluated event params to global array.
	 */
	function pys_get_woo_code() {
		global $post, $woocommerce;

		// set defaults params
		$params = array();
		$params['content_type'] = 'product';

		// ViewContent Event
		if( pys_get_option( 'woo', 'on_view_content' ) && is_product() ) {

			$params['content_ids']  = '[' . pys_get_product_content_id( $post->ID ) . ']';

			pys_add_event( 'ViewContent', $params );

			return;

		}

		// AddToCart Cart Page Event
		if ( pys_get_option( 'woo', 'on_cart_page' ) && is_cart() ) {

			$ids = array();  // cart items ids or sku

			foreach( $woocommerce->cart->cart_contents as $cart_item_key => $item ) {

				$product_id = pys_get_product_id( $item );
				$value      = pys_get_product_content_id( $product_id );
				$ids[]      = $value;

			}

			$params['content_ids'] = '[' . implode( ',', $ids ) . ']';

			pys_add_event( 'AddToCart', $params );

			return;

		}

		// Checkout Page Event
		if ( pys_get_option( 'woo', 'on_checkout_page' ) && is_checkout() && ! is_wc_endpoint_url() ) {

			$params = pys_get_woo_checkout_params( false );

			pys_add_event( 'InitiateCheckout', $params );

			return;

		}

		// Purchase Event
		if ( pys_get_option( 'woo', 'on_thank_you_page' ) && is_wc_endpoint_url( 'order-received' ) ) {

			$order_id = wc_get_order_id_by_order_key( $_REQUEST['key'] );
			$order    = new WC_Order( $order_id );
			$items    = $order->get_items( 'line_item' );

			$ids = array();     // order items ids or sku

			foreach( $items as $item ) {

				$product_id = pys_get_product_id( $item );
				$value      = pys_get_product_content_id( $product_id );
				$ids[]      = $value;

			}

			$params['content_ids'] = '[' . implode( ',', $ids ) . ']';

			pys_add_event( 'Purchase', $params );

			return;

		}

	}

}

if( !function_exists( 'pys_add_code_to_woo_cart_link' ) ) {

	/**
	 * Adds data-pixelcode attribute to "add to cart" buttons in the WooCommerce loop.
	 */
	function pys_add_code_to_woo_cart_link( $tag, $product ) {
		global $pys_woo_ajax_events;

		if ( $product->product_type == 'variable' || $product->product_type == 'grouped' ) {
			return $tag;
		}

		$event_id = uniqid();

		// common params
		$params                 = array();
		$params['content_type'] = 'product';
		$params['content_ids']  = '[' . pys_get_product_content_id( $product->post->ID ) . ']';

		if ( $product->product_type == 'simple' && pys_get_option( 'woo', 'on_add_to_cart_btn' ) ) {

			// do not add code if AJAX is disabled. event will be processed by another function
			$is_ajax = get_option( 'woocommerce_enable_ajax_add_to_cart' ) == 'yes' ? true : false;
			if ( ! $is_ajax ) {
				return $tag;
			}

			$tag = pys_insert_attribute( 'data-pys-event-id', $event_id, $tag, true );

			$pys_woo_ajax_events[ $event_id ] = array(
				'name'   => 'AddToCart',
				'params' => $params
			);

		}

		return $tag;

	}

}

if( !function_exists( 'pys_get_additional_matching_code' ) ) {

	/**
	 * Adds extra params to pixel init code. On Free always returns empty string.
	 * PRO only.
	 *
	 * @see: https://www.facebook.com/help/ipad-app/606443329504150
	 * @see: https://developers.facebook.com/ads/blog/post/2016/05/31/advanced-matching-pixel/
	 * @see: https://github.com/woothemes/woocommerce/blob/master/includes/abstracts/abstract-wc-order.php
	 *
	 * @return string
	 */
	function pys_get_additional_matching_code() {

		return ''; // PRO feature

	}

}

if( !function_exists( 'pys_get_additional_woo_params' ) ) {

	/**
	 * Adds additional post parameters like `content_name` and `category_name`.
	 * PRO only.
	 *
	 * @param $post WP_Post|int
	 * @param $params array reference to $params array
	 */
	function pys_get_additional_woo_params( $post, &$params ) {

		// PRO only

	}

}