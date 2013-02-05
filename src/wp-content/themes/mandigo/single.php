<?php get_header(); ?>

	<div id="content" class="widecolumn">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="navigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>

		<div class="post" id="post-<?php the_ID(); ?>">
                                <div class="postinfo">
			        	<div class="calborder">
			        	<div class="cal">
                                                <span class="cald<?php echo (get_option('mandigo_dates') ? ' cald2' : '') ?>"><?php the_time((get_option('mandigo_dates') ? 'M' : 'd')) ?></span>
                                                <span class="calm"><?php the_time((get_option('mandigo_dates') ? 'd' : 'm')) ?></span>
                                                <span class="caly"><?php the_time('Y') ?></span>
                                        </div>
                                        </div>
                                        <h2><a href="<?php echo get_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
                                        <small><?php _e('Posted by','mandigo');?>: <?php the_author() ?>, <?php _e('in','mandigo');?> <?php the_category(', ') ?></small>
                                </div>

			<div class="entry">
				<?php the_content('<p class="serif">'. __('Read the rest of this entry','mandigo').' &raquo;</p>'); ?>

				<?php link_pages('<p><strong>'. __('Pages','mandigo').':</strong> ', '</p>', 'number'); ?>

				<p class="postmetadata alt">
					<small>
						<?php _e('This entry was posted','mandigo');?>
						<?php /* This is commented, because it requires a little adjusting sometimes.
							You'll need to download this plugin, and follow the instructions:
							http://binarybonsai.com/archives/2004/08/17/time-since-plugin/ */
							/* $entry_datetime = abs(strtotime($post->post_date) - (60*120)); echo time_since($entry_datetime); echo ' ago'; */ ?> 
						<?php _e('on','mandigo');?> <?php the_time('l, F jS, Y') ?> at <?php the_time() ?>
						<?php _e('and is filed under','mandigo');?> <?php the_category(', ') ?>.
						<?php _e('You can follow any responses to this entry through the','mandigo');?> <?php comments_rss_link('RSS 2.0'); ?> <?php _e('feed.','mandigo');?>

						<?php if (('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Both Comments and Pings are open ?>
							<?php _e('You can','mandigo');?> <a href="#respond"><?php _e('leave a response','mandigo');?></a>, or <a href="<?php trackback_url(true); ?>" rel="trackback">trackback</a> <?php _e('from your own site.','mandigo');?>

						<?php } elseif (!('open' == $post-> comment_status) && ('open' == $post->ping_status)) {
							// Only Pings are Open ?>
							<?php _e('Responses are currently closed, but you can','mandigo');?> <a href="<?php trackback_url(true); ?> " rel="trackback">trackback</a> <?php _e('from your own site.','mandigo');?>

						<?php } elseif (('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Comments are open, Pings are not ?>
							<?php _e('You can skip to the end and leave a response. Pinging is currently not allowed.','mandigo');?>

						<?php } elseif (!('open' == $post-> comment_status) && !('open' == $post->ping_status)) {
							// Neither Comments, nor Pings are open ?>
							<?php _e('Both comments and pings are currently closed.','mandigo');?>

						<?php } edit_post_link( __('Edit this entry.','mandigo') ,'',''); ?>

					</small>
				</p>

			</div>
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p><?php _e('Sorry, no posts matched your criteria.','mandigo');?></p>

<?php endif; ?>

	</div>

<?php get_footer(); ?>