<div class="vw-post-box vw-post-style-medium vw-post-style-medium-4 vw-post-style-medium--issues <?php vw_the_post_format_class(); ?>" <?php vw_itemtype('Article'); ?>>
  <?php if ( has_post_thumbnail() ) : ?>
  <a class="vw-post-box-thumbnail" href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark" data-mfp-src="<?php echo esc_url( vw_get_embed_video_url() ); ?>">
    <?php the_post_thumbnail( VW_CONST_THUMBNAIL_SIZE_ISSUE ); ?>
    <?php vw_the_post_format_icon(); ?>
    <?php vw_the_review_summary_bar(); ?>
  </a>
  <?php endif; ?>

  <div class="vw-post-box-inner">

    <h2 class="vw-post-box-title">
      <a href="<?php the_permalink(); ?>" class="" <?php vw_itemprop('url'); ?>>
        <?php the_title(); ?>
      </a>
    </h2>
    
  </div>
  
</div>