<?php get_header();?><?php setPostViews(get_the_ID());       ?>
<!-- page-index -->
<div class="container section">
    <div class="col-12">
        <h1 class="posts title"><?php the_title(); ?></h1>
        <?php if (function_exists('breadcrumb')) breadcrumb();?>
    </div>
</div>
<div class="container section ">
    <section class="posts col-12">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            <article class="box-post">
                <a href="<?php the_permalink()?>"><?php the_post_thumbnail() ?></a>
                <div class="post_content">
                    <?php the_content(); ?>
                </div>
                <br>
        </article>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
    
</div>
<?php get_footer();?> 