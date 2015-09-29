<section class="section spacer">
	<?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php $sticky=get_option('sticky_posts') ;
		$lastposts = get_posts('p='.$sticky[0]);
		foreach($lastposts as $post) {
		    setup_postdata($post);
		 ?>
		 
		 <?php  }?>
		 
		 
		 
			<div class="col-5">
				<h2 class="title-destaque"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div>
			<div class="col-3">
				<p class="txt-destaque"><?php echo get_the_excerpt();?></p>
				<a href="<?php the_permalink(); ?>" class="saiba-mais">Saiba Mais!</a>
			</div>
			<div class="col-4">
				<?php if ( is_active_sidebar( 'mini-banner-home' ) ) : ?>
				<?php dynamic_sidebar( 'mini-banner-home' ); ?>
				<?php endif; ?>
				<!--img src="http://lorempixel.com/300/200/sports/Dummy-Text" style="width:100%;"/-->
			</div>
		<?php endwhile; ?>   
    <?php endif; ?>
</section>
		
		
		