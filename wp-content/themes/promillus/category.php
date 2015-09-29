<?php get_header();?>
<!-- page-category -->
<script>
	jQuery(function ($) {

	var $container = $('.cat-grid'); //The ID for the list with all the blog posts
	$container.isotope({ //Isotope options, 'item' matches the class in the PHP
		itemSelector : '.item', 
  		layoutMode : 'masonry'
	});

	//Add the class selected to the item that is clicked, and remove from the others
	var $optionSets = $('#filters'),
	$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){
	var $this = $(this);
	// don't proceed if already selected
	if ( $this.hasClass('selected') ) {
	  return false;
	}
	var $optionSet = $this.parents('#filters');
	$optionSets.find('.selected').removeClass('selected');
	$this.addClass('selected');

	//When an item is clicked, sort the items.
	 var selector = $(this).attr('data-filter');
	$container.isotope({ filter: selector });

	return false;
	});

});
</script>
<div class="container section">
		<div class="col-12">
		<h1 class="posts title"><?php single_cat_title( '', true ); ?></h1>
		<ul class="cat-grid">
			<?php if (have_posts()) : ?>
        	<?php while (have_posts()) : the_post(); ?>
			<li class="col-4 <?php echo $termsString; ?> item">
				<div class=""> 
					<figure class="thumbnail thumbnail__portfolio"> 
						<?php the_post_thumbnail(); ?>
						<span class="zoom-icon"></span>
					</figure>  
					<div class="container caption"> 
						<h2 class="title-destaque"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p class="txt-destaque"><?php echo get_the_box_excerpt('146');?></p>
						<a href="<?php the_permalink(); ?>" class="saiba-mais">Saiba Mais!</a>
					</div> 

				</div>  
			</li>  
	
	<?php endwhile; endif; ?>
		</ul>
       
		</div>   
</div>
<?php get_footer();?> 