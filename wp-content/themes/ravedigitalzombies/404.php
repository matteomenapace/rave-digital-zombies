<?php get_header(); ?>

<div id="content" class="clearfix row">
    <div id="main" class="col-sm-9 clearfix" role="main">
        <article id="post-not-found" class="clearfix">
            <div class="main-container">
                <!-- col-sm-10  -->
                <header>
                    <h1 class="page-title"><?php _e("404: Page  Not Found","wpbootstrap"); ?></h1>
                    <p>
                        <?php _e( "This is embarassing. We can't find what you were looking for.", "wpbootstrap"); ?>
                    </p>
                    <button type="button" class="btn btn-primary green-button">Click here to go back home</button>
                </header>
                <!-- end article header -->
        </article>
        <!-- end article -->
        </div>
        <!-- end #main -->
        <div class="col-sm-3 sidebar ">
            <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
        </div>
    </div>
</div>
<!-- end #content -->

<?php get_footer(); ?>