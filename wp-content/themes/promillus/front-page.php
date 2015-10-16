<?php global $data;?>
<?php get_header();?>
<!-- page-home -->
	<div class="container ">
		<!--loop -->
		<?php include "loop-destaque.php" ?>
		
	</div>
	<div class="container no-padding-top">
		<section class="section">
			<div class="col-8">
				<ul class="section">
					<?php 
						$newsArgs = array('ignore_sticky_posts' => true, 'posts_per_page' => 4, 'meta_query' => array(array('key' => '_thumbnail_id')) );                   
						                        
						      $newsLoop = new WP_Query( $newsArgs );                  
						                     $contador = 1;
						      while ( $newsLoop->have_posts() ) : $newsLoop->the_post();?>
				
						      	<li class="col-3">
									<span class="cap blue"><?php echo '0'.$contador++ . '.'; ?></span><br><span class="cap-title blue">
									<?php /*$parentscategory ="";
									foreach((get_the_category()) as $category) {
									if ($category->category_parent == 0) {
									$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
									}
						     
									}
									echo substr($parentscategory,0,-2); */?>
									<a href="<?php the_permalink()?>"><?php the_title()?></a>
									
									
									
									</span>
									<?php the_post_thumbnail('mini-banner'); ?>
									<p class="txt-destaque"><?php echo get_the_box_excerpt('160');?></p>
									<a href="<?php the_permalink(); ?>" class="saiba-mais">Saiba Mais!</a>
								</li>
						
						<?php endwhile; ?>
						
				</ul>
			</div>
			<div class="col-4"><?php
				$tags = get_tags();
$html = '<ul class="tags">';
foreach ( $tags as $tag ) {
	$tag_link = get_tag_link( $tag->term_id );
			
	$html .= "<li><a href='{$tag_link}' title='{$tag->name}' class='{$tag->slug}'>";
	$html .= "{$tag->name}</a></li>";
}
$html .= '</ul>';
echo $html;?>
				<?php 
				/*$args = array('posts_per_page' => 10);                   
				$tagsLoop = new WP_Query($args);
				echo '<ul class="tags">';
				while($tagsLoop->have_posts() ) : $tagsLoop->the_post();
					
					 the_tags( '<li>', '</li><li>', '</li>' );
				endwhile;
				echo '</ul">';*/
				?>
			</div>
		</section>
	</div>

<?php get_footer();?>