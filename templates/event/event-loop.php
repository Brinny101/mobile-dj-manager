<?php
/**
 * This template is used to display the current users (Client) list of events.
 *
 * @version 		1.0
 * @author			Mike Howard
 * @since			1.3
 * @content_tag		client
 * @content_tag		event
 * @shortcodes		Supported
 *
 * Do not customise this file!
 * If you wish to make changes, copy this file to your theme directory /theme/mdjm-templates/event/event-loop.php
 */
global $mdjm_event;
?>
<?php do_action( 'mdjm_pre_event_loop' ); ?>
<div id="post-<?php echo esc_attr( $mdjm_event->ID ); ?>" class="<?php echo esc_attr( $mdjm_event->post_status ); ?>">
	<table class="mdjm-event-overview">
		<tr>
			<th class="mdjm-event-heading">{event_name}<br />
				{event_date}
			</th>
            <th class="mdjm-event-heading right-align"><?php esc_html_e( 'ID:', 'mobile-dj-manager' ); ?> {contract_id}<br />
				<?php esc_html_e( 'Status:', 'mobile-dj-manager' ); ?> {event_status}<br />
				<span class="mdjm-edit"><?php printf( __( '<a href="%s">Manage %s</a>', 'mobile-dj-manager' ), '{event_url}', mdjm_get_label_singular() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
            </th>
		</tr>
		<tr>
			<td><span class="mdjm-event-label"><?php esc_html_e( 'Time', 'mobile-dj-manager' ); ?></span><br />
				{start_time} - {end_time}<br />
				<span class="mdjm-event-label"><?php esc_html_e( 'Duration', 'mobile-dj-manager' ); ?></span><br />
                {event_duration}
			</td>
            <td rowspan="3" class="top-align"><span class="mdjm-event-label"><?php esc_html_e( 'Venue', 'mobile-dj-manager' ); ?></span><br />
				{venue}
                <br />
                {venue_full_address}
			</td>
		</tr>
        <tr>
        	<td><span class="mdjm-event-label"><?php printf( esc_html__( '%s Type', 'mobile-dj-manager' ), esc_html( mdjm_get_label_singular() ) ); ?></span><br />
				{event_type}
			</td>
        </tr>
        <tr>
        	<td><span class="mdjm-event-label"><?php esc_html_e( 'Cost Summary', 'mobile-dj-manager' ); ?></span><br />
				<?php esc_html_e( 'Total Cost:', 'mobile-dj-manager' ); ?> {total_cost}<br />
                {deposit_label}: {deposit} ({deposit_status})<br />
                {balance_label} <?php esc_html_e( 'Remaining', 'mobile-dj-manager' ); ?>: {balance}
			</td>
        </tr>

        <?php
		/**
		 * Display event action buttons
		 */
		?>

        <?php $buttons = mdjm_get_event_action_buttons( $mdjm_event->ID, true ); ?>
        <?php $cells   = 2; // Number of cells ?>
		<?php $i       = 1; // Counter for the current cell ?>

        <?php do_action( 'mdjm_pre_event_loop_action_buttons' ); ?>

		<?php foreach( $buttons as $button ) : ?>

			<?php if( $i == 1 ) : ?>
            	<tr>
            <?php endif; ?><!-- endif( $i == 1 ) -->

            		<td class="action-button"><?php printf( '<a class="mdjm-action-button mdjm-action-button-%s" href="%s">' . esc_html( $button['label'] ) . '</a>', esc_html( mdjm_get_option( 'action_button_colour', 'blue' ) ), esc_url( $button['url'] ) ); ?></td>

			<?php if( $i == $cells ) : ?>
                </tr>
                <?php $i = 0; ?>
            <?php endif; ?><!-- endif( $i == $cells ) -->

            <?php $i++; ?>

		<?php endforeach; ?><!-- endforeach( $buttons as $button ) -->

        <?php // Write out empty cells to complete the table row ?>
		<?php if( $i != 1 ) : ?>

            <?php while( $i <= $cells ) : ?>
                <td>&nbsp;</td>
                <?php $i++; ?>
                <?php if( $i == $cells ) : ?> </tr> <?php endif; ?>
            <?php endwhile; ?><!-- endwhile( $i <= $cells ) -->
            </tr>
        <?php endif; ?><!-- endif( $i < $cells ) -->
        <?php do_action( 'mdjm_post_event_loop_action_buttons' ); ?>
	</table>
</div>
<?php do_action( 'mdjm_post_event_loop' ); ?>
