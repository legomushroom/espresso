<div class="vw-post-box vw-post-style-medium vw-post-style-medium-3 <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>

	<?php vw_itemprop_meta( 'datePublished', get_the_time('c') ); ?>

	<div class="vw-post-box-inner">
		
		<?php vw_the_category(); ?>

		<h2 class="vw-post-box-title" <?php vw_itemprop('headline'); ?>>
		<!-- <h3 class="vw-post-box-title" <?php vw_itemprop('headline'); ?>> -->
			<a href="<?php the_permalink(); ?>" class="" <?php vw_itemprop('url'); ?>>
				<?php the_title(); ?>
			</a>
		</h2>

		<?php if ( has_post_thumbnail() ) : ?>
		<a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_POST_MEDIUM ); ?>
			<?php vw_the_post_format_icon(); ?>
			<?php vw_the_review_summary_bar(); ?>
		</a>
		<?php endif; ?>
				
	</div>
	
</div>