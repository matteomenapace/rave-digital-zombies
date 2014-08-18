<?php
/*
Template Name: Homepage with Quiz
*/
?>

<?php get_header(); ?>

<div id="content" class="clearfix row">
    <div id="main" class="col-sm-12 clearfix" role="main">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
            <header>

    <?php 
        $post_thumbnail_id = get_post_thumbnail_id();
        $featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'wpbs-featured-home' );
    ?>
            </header>
						
            <section class="row post_content">

                <div class="col-sm-12 main-content">
<?php the_content(); ?>
                </div>

            </section> <!-- end article header -->
						
            <footer>
			
            <p class="clearfix"><?php the_tags('<span class="tags">' . __("Tags","wpbootstrap") . ': ', ', ', '</span>'); ?></p>
            
            </footer> <!-- end article footer -->
					
        </article> <!-- end article -->
					
					<?php 
						// No comments on homepage
						//comments_template();
					?>
					
					<?php endwhile; ?>	
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>

    </div> <!-- end #main -->

    <div class="col-sm-3 sidebar">
       
       <img class="logo" src="http://placehold.it/330x100/AA9C8F/ffffff&text=Logo+goes+here">
        <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
    </div><!--/span-->

</div> <!-- end #content -->

<!-- loads welcome modal on page load -->
<script type="text/javascript">
jQuery(document).ready(function($)
	{
        $(window).load(function(){
        $('#welcome').modal('show');
    });
    })
</script>

<!-- welcome modal -->
<button class="btn btn-primary" data-toggle="modal" data-target="#welcome">Welcome</button>

<div class="modal fade" id="welcome" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="container"><h1>Welcome</h1>
      <p>asdfijf diohfg wf
      </p>
      </div>
    </div>
  </div>
</div>
<!-- end welcome modal -->





<!-- Button trigger modal -->
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="modalTitle">Modal title</h4>
      </div>
      <div class="modal-body" id="modalBody">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		// we select all the .quiz_section elements, minus the beginning and end bits
		$('.quiz_section:not(.quiz_begin):not(.quiz_end)').each(function(index)
		{
			var $question = $(this), 
				$originalTitle = $question.find('.mlw_qmn_question'),
				$originalContent,
				$newTitle,
				// $newContent,
				$modal = $('<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><div class="modal-image-dark"></div><h4 class="modal-title">Modal title</h4></div><div class="modal-body"></div><div class="modal-footer"><button type="button" class="btn btn-default btn-close" data-dismiss="modal">Done</button></div></div></div></div>'),
				newTitle = ''

			// add a unique class to the question element
				// maybe this is not needed..	
			$question.addClass('question col-sm-4 box')

			// extract the newTitle
			newTitle = $originalTitle.html() 	

			// console.log($question)	
			// console.log($originalTitle.html())	

			// build the new title
			$newTitle = $('<div class="title" data-toggle="modal" data-target="#modal' + index + '"></div>').html(newTitle)

			// cut the original title	
			$originalTitle.detach()

			// wrap what's left of the the content in the modal
			$modal.find('.modal-body').html($question.html())

			// set the modal id
			$modal.attr('id', 'modal' + index)

			// set the modal title (as the question's title)
			$modal.find('.modal-title').html(newTitle)

			// empty the question box and append new title and modal
			$question.empty().append($newTitle).append($modal)
		})
	})

</script>

<?php get_footer(); ?>