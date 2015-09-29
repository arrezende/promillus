<?php global $data;?>
<?php get_header();?>
<!-- page-home -->
	<div class="container ">
		<!--loop -->
		<?php include "loop-destaque.php" ?>
		<!--section class="section spacer">
			<div class="col-5">
				<h2 class="title-destaque">A IMPORTÂNCIA DO LEITE MATERNO - LENDAS E FATOS NA AMAMENTAÇÃO</h2>
			</div>
			<div class="col-3">
				<p class="txt-destaque">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
				<a href="#" class="saiba-mais">Saiba Mais</a>
			</div>
			<div class="col-4">
				<img src="http://lorempixel.com/400/200/sports/Dummy-Text" />
			</div>			
		</section-->
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
									<?php $parentscategory ="";
									foreach((get_the_category()) as $category) {
									if ($category->category_parent == 0) {
									$parentscategory .= ' <a href="' . get_category_link($category->cat_ID) . '" title="' . $category->name . '">' . $category->name . '</a>, ';
									}
						     
									}
									echo substr($parentscategory,0,-2); ?>
									
									
									</span>
									<?php the_post_thumbnail('mini-banner'); ?>
									<p class="txt-destaque"><?php echo get_the_box_excerpt('160');?></p>
									<a href="<?php the_permalink(); ?>" class="saiba-mais">Saiba Mais!</a>
								</li>
						
						<?php endwhile; ?>
						
				</ul>
			</div>
			<div class="col-4">
				<?php 
				$args = array('posts_per_page' => 10);                   
				$tagsLoop = new WP_Query($args);
				while($tagsLoop->have_posts() ) : $tagsLoop->the_post();
					 the_tags( '<ul class="tags"><li>', '</li><li>', '</li></ul>' );
				endwhile;
				?>
			</div>
		</section>
	</div>

<?php get_footer();?>