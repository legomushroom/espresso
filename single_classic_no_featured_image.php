<?php get_header(); ?>

<div class="vw-page-wrapper clearfix <?php vw_the_sidebar_position_class(); ?>">
	<div class="container">
		<div class="row">

			<div class="vw-page-content" role="main" itemprop="articleBody">

				<?php if ( have_posts() ) : ?>

					<?php do_action( 'vw_action_before_single_post' ); ?>

					<?php while ( have_posts() ) : the_post(); ?>
						<article <?php post_class( 'vw-main-post' ); ?> data-url="<?php echo get_permalink(get_the_ID()); ?>" data-name="<?php echo get_the_title(); ?>" data-author-name="<?php echo get_the_author(); ?>" data-author-link="<?php get_author_posts_url(get_the_author_meta( 'ID' )); ?>">

							<?php vw_the_breadcrumb(); ?>

							<?php vw_the_category(); ?>
							
							<h1 class="entry-title">
							  <a href="<?php echo get_permalink($post->ID); ?>"><?php the_title(); ?></a>
							</h1>
							
							<?php vw_the_subtitle(); ?>

							<span class="author vcard hidden"><span class="fn"><?php echo esc_attr( get_the_author() ); ?></span></span>
							<span class="updated hidden"><?php echo esc_attr( get_the_date( 'Y-m-d' ) ); ?></span>
							
							<?php vw_the_post_meta_large() ?>
							
							<?php // vw_the_post_share_box(); ?>

							<?php if ( vw_get_paged() == 1 ) : ?>

								<?php vw_the_embeded_media(); ?>
								
							<?php endif; ?>

							<div class="vw-post-content clearfix">
								<?php echo vw_get_the_sticky_content(); ?>
								<?php the_content(); ?>	
							</div>

							<?php vw_the_link_pages(); ?>

							<?php the_tags( '<div class="vw-tag-links"><span class="vw-tag-links-title">'.__( 'filed under:', 'envirra' ).'</span>', '', '</div>' ); ?>

							<?php echo getShareButtons('is-under-post'); ?>

						</article><!-- #post-## -->

					<?php endwhile; ?>

					<?php do_action( 'vw_action_after_single_post' ); ?>

					<?php vw_the_post_footer_sections(); ?>

					<?php include 'bundle-progress.php' ?>

				<?php endif; ?>

			</div>

			<?php get_sidebar(); ?>
		
		</div>
	</div>

</div>

<?php get_footer(); ?>