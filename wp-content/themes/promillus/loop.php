<section>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article class="box-post">
            
            <a href="<?php the_permalink()?>"><?php the_post_thumbnail() ?></a>
            
           
            
            <?php the_content();?>
            <!--a class="mk-readmore" href="<?php //the_permalink()?>"><i class="icon-arrow-right2"></i>Leia Mais</a-->
        </article>
        <?php endwhile; ?>
        
    <?php endif; ?>
</section>