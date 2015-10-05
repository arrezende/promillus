<?php get_header();?><?php setPostViews(get_the_ID());       ?>
<!-- page-index -->
<div class="container section">
    <div class="col-12">
        <h2 class="posts title"><?php the_title(); ?></h2>
        <?php if (function_exists('breadcrumb')) breadcrumb();?>
    </div>
</div>
<div class="container section ">
    <section class="posts col-8">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
            
            <article class="box-post">
                <a href="<?php the_permalink()?>"><?php the_post_thumbnail() ?></a>
                <div class="post_content">
                    <?php the_content(); ?>
                </div>
                <br>
            
        <div class="meta-info">
            <div class="border-bottom"> 
                <div class="post_date">
                    <i class="fa fa-calendar"></i>
                    <time><?php the_date(); ?></time> 
                </div>
            </div>
            <div class="section border-bottom">
                <div class="col-6 post_category">
                    <i class="fa fa-bookmark"></i>
                    <?php the_category(', '); ?> 
                </div>
                <div class="col-6">
                    <i class="fa fa-tag"></i>
                    <?php the_tags(' '); ?>
                </div>
            </div>
            <div class="section border-bottom">
                <!--div class="post_comment col-4">
                    <i class="fa fa-comments"></i>
                    <?php //comments_popup_link('Seja o primeiro a comentar!', '(1) Comentário', '(%) Comentários'); ?>
                </div-->
                <div class="post_views col-4" title="Number of view.">
                    <i class="fa fa-eye"></i> <?php echo getPostViews(get_the_ID()); ?>
                </div>
                <!--div class="post_like col-4">
                    <a class="not_voting " title="Only registered users can vote!" date-type="like">
                        <i class="fa fa-thumbs-up"></i>
                        <span class="voting_count">0</span>
                    </a>
                </div-->
            </div>
        </div>
        </article>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php comments_template(); ?>
    </section>
    <?php get_sidebar();?>
</div>
<?php get_footer();?> 