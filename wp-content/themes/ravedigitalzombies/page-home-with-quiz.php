<?php
/*
Template Name: Home with Quiz
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
<!-- loads the post content ?php the_content(); ?> -->
<!-- static content with style -->

<!---->
<div class="main-container col-sm-10 row">
    <div class="row">
        <div class="col-lg-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Enter group name">
                <span class="input-group-btn">
        <button class="btn btn-default" type="button">Go!</button>
      </span>
            </div>
            <!-- /input-group -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
</div>


<br>
<br>
<br><br>
<!-- questions -->
<div class="main-container col-sm-10 row">
   

<div class="quiz_section slide{{question.number}} question box col-md-6">
    <div class="title" data-toggle="modal" data-target="#modal{{0}}">

        On which floors are the toilets?
        <span class="badge">1/10</span>
    </div>
    <!--  we're using the HINT filed to store the image's URL  -->
    <!--  if no image provided, we use a placeholder image (Rave building from the outside  -->
    <img src="http://localhost:8888/ravedigitalzombies/wp-content/uploads/2014/08/building.png">
</div>

<div class="quiz_section slide{{question.number}} question box col-md-6">
    <div class="title" data-toggle="modal" data-target="#modal{{0}}">

        On which floors are the toilets?
        <span class="badge">1/10</span>
    </div>
    <!--  we're using the HINT filed to store the image's URL  -->
    <!--  if no image provided, we use a placeholder image (Rave building from the outside  -->
    <img src="http://localhost:8888/ravedigitalzombies/wp-content/uploads/2014/08/rave-lates.png">
</div>

<div class="quiz_section slide{{question.number}} question box col-md-6">
    <div class="title" data-toggle="modal" data-target="#modal{{0}}">

        On which floors are the toilets?
        <span class="badge">1/10</span>
    </div>
    <!--  we're using the HINT filed to store the image's URL  -->
    <!--  if no image provided, we use a placeholder image (Rave building from the outside  -->
    <img src="http://localhost:8888/ravedigitalzombies/wp-content/uploads/2014/08/fire-point.png">
</div>

<div class="quiz_section slide{{question.number}} question box col-md-6">
    <div class="title" data-toggle="modal" data-target="#modal{{0}}">

        On which floors are the toilets?
        <span class="badge">1/10</span>
    </div>
    <!--  we're using the HINT filed to store the image's URL  -->
    <!--  if no image provided, we use a placeholder image (Rave building from the outside  -->
    <img src="http://localhost:8888/ravedigitalzombies/wp-content/uploads/2014/08/mezz.png">
</div>

</div>


<!-- modal -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true" id="modal1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-image:url('{{http://localhost:8888/ravedigitalzombies/wp-content/uploads/2014/08/rave-lates.png}}');">
                <div class="modal-image-dark"></div>
                <h4 class="modal-title" {{On which floors are the toilets?}}</h4>
            </div>
            <div class="modal-body">
                <br>
                <!-- let's try and get rid of these <br> -->
                <input type="radio" name="question{{2}}" id="question{{2_1}}" value="{{All floors}}">
                <label for="question{{2_1}}">{{All floors}}</label>

                <!--  and more answers/options here... -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Done</button>
            </div>
        </div>
    </div>
</div>
               
               
               
               
               
               
<!-- static content end -->
                </div>

            </section> <!-- end article header -->
						
            <footer>
            
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
       
        <?php wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
    </div><!--/span-->

</div> <!-- end #content -->

<!-- loads welcome modal on page load -->
<script type="text/javascript">
// disable until development is finished //
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
            <div class="modal-body">
                <h1>Welcome</h1>
                <p>Please enter the password you were given below to get started.</p>

                <form class="form-inline form-welcome" role="form">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-pencil"></span>
                            </div>
                            <input class="form-control" type="email" placeholder="Enter password">
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Enter site</button>
            </div>
        </div>
    </div>
</div>
<!-- end welcome modal -->







<script type="text/javascript">

	// disabled so we can see static content 
    // jQuery(document).ready(function($)
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
			$question.addClass('question col-sm-6 box')

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