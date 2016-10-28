<?php

/**
 * Show Std Event edit modal content.
 */
if( !function_exists( 'pys_edit_std_event' ) ) {

	add_action( 'wp_ajax_pys_edit_std_event', 'pys_edit_std_event' );
	function pys_edit_std_event() {

		$id     = isset( $_REQUEST['id'] ) == true ? $_REQUEST['id'] : uniqid();
		$events = (array) get_option( 'pixel_your_site_std_events' );

		if ( array_key_exists( $id, $events ) ) {

			$event = $events[ $id ];

		} else {

			$event = array(
				'eventtype'        => null,
				'pageurl'          => null,
				'value'            => null,
				'currency'         => null,
				'content_name'     => null,
				'content_ids'      => null,
				'content_type'     => null,
				'content_category' => null,
				'num_items'        => null,
				'search_string'    => null,
				'status'           => null,
				'code'             => null,
				'custom_name'      => null
			);

		}

		// change `eventtype`
		if ( ! empty( $event['custom_name'] ) ) {
			$event['eventtype'] = 'CustomEvent';
		}

		// collect custom params
		$custom_params = pys_get_custom_params( $event );

		$table_class = $event['eventtype'];

		$is_custom_currency = isset( $event['custom_currency'] ) ? $event['custom_currency'] : false;

		?>

		<form action="" method="post" id="std-event-form">
			<input type="hidden" name="action" value="add_std_event">
			<input type="hidden" name="std_event[id]" value="<?php echo $id; ?>">

			<table class="layout <?php echo $table_class; ?>">
				<tr>
					<td class="legend"><p class="label">URL:</p></td>
					<td>
						<input type="text" name="std_event[pageurl]" value="<?php echo $event['pageurl']; ?>" id="std-url">
						<span class="help">Event will trigger when this URL is visited.<br>If you add * at the end of the URL string, it will match all URLs starting with the this string.</span>
					</td>
				</tr>

				<tr>
					<td class="legend"><p class="label">Event type:</p></td>
					<td>
						<select name="std_event[eventtype]" autocomplete="off" id="std-event-type">
							<?php pys_event_types_select_options( $event['eventtype'] ); ?>
						</select>
					</td>
				</tr>

				<tr class="ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible">
					<td class="legend"><p class="label">Value:</p></td>
					<td>
						<input type="text" name="std_event[value]" value="<?php echo $event['value']; ?>">
						<span class="help">Mandatory for purchase event only.</span>
					</td>
				</tr>

				<tr class="ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible">
					<td class="legend"><p class="label">Currency:</p></td>
					<td>
						<select name="std_event[currency]" id="currency" class="<?php echo $is_custom_currency ? 'custom-currency' : null; ?>" >
							<option disabled <?php selected( false, $is_custom_currency && $event['currency'] ); ?> >Select Currency</option>
							<?php pys_currency_options( $event['currency'] ); ?>
							<option disabled></option>
							<option value="pys_custom_currency" <?php selected( true, $is_custom_currency ); ?> >Custom Currency</option>
						</select>
						<input type="text" name="std_event[custom_currency]" value="<?php echo $is_custom_currency ? $event['currency'] : null; ?>" placeholder="Enter custom currency code" class="custom-currency-visible">
						<span class="help">Mandatory for purchase event only.</span>
					</td>
				</tr>

				<tr class="ViewContent-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible Purchase-visible Lead-visible CompleteRegistration-visible">
					<td class="legend"><p class="label">content_name:</p></td>
					<td>
						<input type="text" name="std_event[content_name]"
						       value="<?php echo $event['content_name']; ?>">
						<span class="help">Name of the page/product i.e 'Really Fast Running Shoes'.</span>
					</td>
				</tr>

				<tr class="ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible">
					<td class="legend"><p class="label">content_ids:</p></td>
					<td>
						<input type="text" name="std_event[content_ids]"
						       value="<?php echo $event['content_ids']; ?>">
						<span class="help">Product ids/SKUs associated with the event.</span>
					</td>
				</tr>

				<tr class="ViewContent-visible AddToCart-visible InitiateCheckout-visible Purchase-visible">
					<td class="legend"><p class="label">content_type:</p></td>
					<td>
						<input type="text" name="std_event[content_type]"
						       value="<?php echo $event['content_type']; ?>">
						<span class="help">The type of content. i.e product or product_group.</span>
					</td>
				</tr>

				<tr class="Search-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Lead-visible">
					<td class="legend"><p class="label">content_category:</p></td>
					<td>
						<input type="text" name="std_event[content_category]"
						       value="<?php echo $event['content_category']; ?>">
						<span class="help">Category of the page/product.</span>
					</td>
				</tr>

				<tr class="InitiateCheckout-visible Purchase-visible">
					<td class="legend"><p class="label">num_items:</p></td>
					<td>
						<input type="text" name="std_event[num_items]" value="<?php echo $event['num_items']; ?>">
						<span class="help">The number of items in the cart. i.e '3'.</span>
					</td>
				</tr>

				<tr class="Purchase-visible">
					<td class="legend"><p class="label">order_id:</p></td>
					<td>
						<input type="text" name="std_event[order_id]" value="<?php echo $event['order_id']; ?>">
						<span class="help">The unique order id of the successful purchase. i.e 19.</span>
					</td>
				</tr>

				<tr class="Search-visible">
					<td class="legend"><p class="label">search_string:</p></td>
					<td>
						<input type="text" name="std_event[search_string]"
						       value="<?php echo $event['search_string']; ?>">
						<span class="help">The string entered by the user for the search. i.e 'Shoes'.</span>
					</td>
				</tr>

				<tr class="CompleteRegistration-visible">
					<td class="legend"><p class="label">status:</p></td>
					<td>
						<input type="text" name="std_event[status]" value="<?php echo $event['status']; ?>">
						<span class="help">The status of the registration. i.e completed.</span>
					</td>
				</tr>

				<tr class="CustomCode-visible">
					<td class="legend"><p class="label" style="line-height: inherit;">Custom event code (advanced users
							only):</p></td>
					<td>
						<textarea name="std_event[code]" rows="5"
						          style="width:100%;"><?php echo stripslashes( $event['code'] ); ?></textarea>
						<span class="help">The code inserted in the field MUST be complete, including <code>fbq('track',
								'AddToCart', { … });</code></span>
					</td>
				</tr>

				<tr class="CustomEvent-visible tall">
					<td class="legend"><p class="label">Event name:</p></td>
					<td>
						<input type="text" name="std_event[custom_name]" value="<?php echo $event['custom_name']; ?>">
					</td>
				</tr>

				<?php foreach( $custom_params as $param => $value ) : ?>

					<?php $param_id = uniqid() . $param; ?>

				<tr class="class-<?php echo $param_id; ?> ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible CustomEvent-visible">
					<td class="legend"><p class="label">Param name:</p></td>
					<td><input type="text" name="std_event[custom_names][<?php echo $param; ?>]" value="<?php echo $param; ?>"></td>
				</tr>

				<tr class="class-<?php echo $param_id; ?> ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible CustomEvent-visible">
					<td class="legend"><p class="label">Param value:</p></td>
					<td><input type="text" name="std_event[custom_values][<?php echo $param; ?>]" value="<?php echo $value; ?>"></td>
				</tr>

				<tr class="class-<?php echo $param_id; ?> tall ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible CustomEvent-visible">
					<td></td>
					<td><a href="#" class="remove-param" data-id="<?php echo $param_id; ?>">Remove param</a></td>
				</tr>

				<?php endforeach; ?>

				<tr id="marker"></tr>

				<tr class="ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible CustomEvent-visible">
					<td class="legend"></td>
					<td>
						<a href="#" class="button button-add-row button-primary action">Add Param</a>
					</td>
				</tr>

			</table>

			<div class="actions-row">
				<a href="#" class="button button-close action">Cancel</a>
				<a href="#" class="button button-save button-primary action disabled"><?php echo isset( $_REQUEST['id'] ) == true ? 'Save' : 'Add'; ?></a>
			</div>

		</form>

		<script>
			jQuery(function ($) {

				function makeid() {
					var id = "";
					var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

					for (var i = 0; i < 10; i++)
						id += possible.charAt(Math.floor(Math.random() * possible.length));

					return id;
				}

				validate();

				/* Standard event fields show/hide on event type change. */
				$('#std-event-type').on('change', function () {
					var wrapper = $(this).closest('table');

					wrapper.removeClass();	// clear all classes
					wrapper.addClass('layout');
					wrapper.addClass(this.value);

					validate();

				});

				// Show/hide custom currency field
				$('select#currency').on('change', function(){

					if( $(this).val() == 'pys_custom_currency' ) {
						$(this).addClass('custom-currency');
					} else {
						$(this).removeClass('custom-currency');
					}

				});

				/* Close modal window */
				$('.button-close').on('click', function (e) {
					e.preventDefault();
					tb_remove();
				});

				/* Save / Add event */
				$('.button-save').on('click', function (e) {
					e.preventDefault();

					if( validate() == false ) {
						return;
					}

					$('#std-event-form').addClass('disabled');
					$(this).text('Saving...');

					var data = $('#std-event-form').serialize();
					data = data + '&action=pys_update_std_event';

					$.ajax({
						url: '<?php echo admin_url('admin-ajax.php'); ?>',
						type: 'post',
						dataType: 'json',
						data: data
					})
						.done(function (data) {

							$("input[name='active_tab']").val('posts-events');
							$('.pys-content > form').submit();
							//location.reload(true);

						});

				});

				/* Add new param/value group */
				var marker = $('#marker');
				$('.button-add-row').on('click', function(e) {
					e.preventDefault();

					var id = makeid();

					var html  = '<tr class="class-'+id+' ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible CustomEvent-visible">';
						html +=     '<td class="legend"><p class="label">Param name:</p></td>';
						html +=     '<td><input type="text" name="std_event[custom_names]['+id+']" value=""></td>';
						html += '</tr>';

						html += '<tr class="class-'+id+' ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible CustomEvent-visible">';
						html +=     '<td class="legend"><p class="label">Param value:</p></td>';
						html +=     '<td><input type="text" name="std_event[custom_values]['+id+']" value=""></td>';
						html += '</tr>';

						html += '<tr class="class-'+id+' tall ViewContent-visible Search-visible AddToCart-visible AddToWishlist-visible InitiateCheckout-visible AddPaymentInfo-visible Purchase-visible Lead-visible CompleteRegistration-visible CustomEvent-visible">';
						html +=     '<td></td>';
						html +=     '<td><a href="#" class="remove-param" data-id="'+id+'">Remove param</a></td>';
						html += '</tr>';


					$(html).insertBefore(marker);

				});

				// Remove custom params row
				$(document).on('click', '.remove-param', function(e){
					e.preventDefault();

					var id = $(this).data('id');
					$('tr.class-'+id).remove();

				});

				// Form validation
				$('form').submit(function(e) {

					if( validate() == false ) {
						e.preventDefault();
					}

				});

				$('#std-url').on( 'change, keyup', function(e){
					validate();
				});

				function validate() {

					var pageURL = $('#std-url').val(),
						eventType = $('#std-event-type').val(),
						btnSave = $('.button-save'),
						isValid = true;

					if( eventType == null || pageURL.length == 0 ) {
						isValid = false;
					}

					if( isValid ) {
						btnSave.removeClass('disabled');
					} else {
						btnSave.addClass('disabled');
					}

					return isValid;

				}

			});
		</script>

		<?php
		exit();
	}

}

/**
 * Update or Add Std Event.
 */
if( !function_exists( 'pys_update_std_event' ) ) {

	add_action( 'wp_ajax_pys_update_std_event', 'pys_update_std_event' );
	function pys_update_std_event() {

		//@todo: merge with dynamic events function and move to common code

		$events    = (array) get_option( 'pixel_your_site_std_events' );
		$event = $_REQUEST['std_event'];

		$id = $event['id'];
		unset( $event['action'] );
		unset( $event['id'] );

		if( isset( $event['custom_currency'] ) && ! empty( $event['custom_currency'] ) ) {

			$event['currency']        = strtoupper( $event['custom_currency'] );
			$event['custom_currency'] = true;

		}

		if( $event['eventtype'] == 'CustomEvent' ) {

			$custom_name = $event['custom_name'];
			$custom_name = preg_replace( '/[^A-Za-z0-9\_]/u', '', $custom_name );

			$event['eventtype'] = trim( $custom_name );

		}

		if( isset( $event['custom_names'] ) && is_array( $event['custom_names'] ) ) {

			foreach ( $event['custom_names'] as $key => $value ) {

				$key_name = $value;
				$key_name = preg_replace( '/[^A-Za-z0-9\_]/u', '', $key_name );

				$event[ $key_name ] = $event['custom_values'][ $key ];

			}

		}

		unset( $event['custom_names'] );
		unset( $event['custom_values'] );

		$events[ $id ] = $event;
		update_option( 'pixel_your_site_std_events', $events );

		echo json_encode( 'success' );

		exit();
	}

}

/**
 * Delete Std Event(s).
 */
if( !function_exists( 'pys_delete_std_event' ) ) {

	add_action( 'wp_ajax_pys_delete_std_event', 'pys_delete_std_event' );
	function pys_delete_std_event() {

		//@todo: merge with dynamic events function and move to common code

		$events = (array) get_option( 'pixel_your_site_std_events' );
		$ids    = $_REQUEST['ids'];

		// remove requested ids
		foreach ( $ids as $id ) {

			unset( $events[ $id ] );

		}

		update_option( 'pixel_your_site_std_events', $events );

		echo json_encode( 'success' );
		exit();
	}

}