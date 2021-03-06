<?php get_header(); ?>
<div class="header-blank" style="margin-bottom: 0%; background-image: url(<?php the_post_thumbnail_url();?>)">
	<?php the_meta(); ?>
</div>
<div class="content section-inner">
											        
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<div id="post-<?php the_ID(); ?>" <?php post_class('single single-post'); ?>>
			
			<div class="post-container">
				
				<?php $post_format = get_post_format(); ?>
				
				<!-- feature image -->
				
				<div class="post-inner">
					<div class="post-info">
						<h1 class="post-title"><?php the_title(); ?></h1>
						<p class="post-date"><?php the_time(get_option('date_format')); ?></p>
					</div>
					    
				    <div class="post-content">
				    
				    	<?php the_content(); ?>
				    
				    </div> <!-- /post-content -->
				    
				    <div class="clear"></div>
				    
				    <?php 
				    	$args = array(
							'before'           => '<div class="page-links"><span class="title">' . __( 'Pages:','hitchcock' ) . '</span>',
							'after'            => '<div class="clear"></div></div>',
							'link_before'      => '<span>',
							'link_after'       => '</span>',
							'separator'        => '',
							'pagelink'         => '%',
							'echo'             => 1
						);
			    	
			    		wp_link_pages($args); 
					?>
					
					<div class="post-meta">
				
						<?php if (has_category()) : ?>
							<p class="categories">
								<?php _e('In','hitchcock'); ?> <?php the_category(', '); ?>
							</p>
						<?php endif; ?>
						<?php if (has_tag()) : ?>
							<p class="tags">
								<?php the_tags('', ' '); ?>
							</p>
						<?php endif; ?>
						
						<?php edit_post_link('Edit Post', '<p class="post-edit">', '</p>'); ?>
	
					</div> <!-- /post-meta -->
					
					<?php
						$prev_post = get_previous_post();
						$next_post = get_next_post();
					?>
					
					<div class="post-navigation">
						
						<?php
						if (!empty( $prev_post )): ?>
							
							<a class="post-nav-prev" title="<?php echo esc_attr( get_the_title($prev_post) ); ?>" href="<?php echo get_permalink( $prev_post->ID ); ?>">					
								<p><?php _e('Next','hitchcock'); ?><span class="hide"> <?php _e('Post','hitchcock'); ?></span></p>
								<span class="fa fw fa-angle-right"></span>
							</a>
					
						<?php endif; ?>
					
						<?php
						if (!empty( $next_post )): ?>
						
							<a class="post-nav-next" title="<?php echo esc_attr( get_the_title($next_post) ); ?>" href="<?php echo get_permalink( $next_post->ID ); ?>">
								<span class="fa fw fa-angle-left"></span>
								<p><?php _e('Previous','hitchcock'); ?><span class="hide"> <?php _e('Post','hitchcock'); ?></span></p>
							</a>
						<?php endif; ?>
						
						<div class="clear"></div>
					
					</div> <!-- /post-navigation -->
				
				</div> <!-- /post-inner -->
				
				<?php comments_template( '', true ); ?>
			
			</div> <!-- /post-container -->
			
		</div> <!-- /post -->
		
	</div> <!-- /content -->
	
	<!-- <?php //hitchcock_related_posts(); ?> -->
		
   	<?php endwhile; else: ?>

		<p><?php _e("We couldn't find any posts that matched your query. Please try again.", "hitchcock"); ?></p>
	
	<?php endif; ?>    

</div> <!-- /content -->
		
<?php get_footer(); ?>