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

							<div class="jumbotron" style="background-image: url('<?php echo $featured_src[0]; ?>'); background-repeat: no-repeat; background-position: 0 0;">
				
								<div class="page-header">
									<h1><?php bloginfo('title'); ?><small><?php echo get_post_meta($post->ID, 'custom_tagline' , true);?></small></h1>
								</div>				
								
							</div>
						
						</header>
						
						<section class="row post_content">
						
							<div class="col-sm-8">
						
								<?php the_content(); ?>
								
							</div>
							
							<?php get_sidebar('sidebar2'); // sidebar 2 ?>
													
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
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

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
		$('.quiz_section').each(function(index)
		{

			var $question = $(this), 
				$title = $question.find('.mlw_qmn_question'),
				$content

			// console.log($question)	
			console.log($title)	

			// cut the title	
			$title.detach()

			// wrap the content in a modal
			$content = $($question.html()).wrap('<div class="modal fade"></div>')

			$question.empty().append($title).append($content)

		})




		/*var $modal = $('#modal'),
			$modalTitle = $('#modalTitle'),
			$modalBody = $('#modalBody'),
			$question


		$('.quiz_section .mlw_qmn_question').click(function(event)
		{
			console.log(event.target.innerText)

			// change the modal title to reflect the question
			var questionTitle = event.target.innerText
			$modalTitle.html(questionTitle)

			$modal.modal()

			// event.target.parent()

			// wrap the event target (question title HTML) in a jQuery object
			var $questionTitle = $(event.target)

			// grab the title's parent and assign it to the $question variable
			$question = $questionTitle.parent()

			// cut&paste the content of $question into $modalBody
			var question = $question.html()
			$question.html('') // cut
			$modalBody.html(question) // paste	
			

			// console.log($question.parent())
		})

		$modal.on('hide.bs.modal', function (e) 
		{
			console.log('modal hide!')

  			// cut&paste the modal body's content into the question box
  			var modalContent = $modalBody.html()
  			$question.html(modalContent)

		})*/

		

	})

</script>

<?php get_footer(); ?>