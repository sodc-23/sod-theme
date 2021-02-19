<?php
/**
 * Template Name: Home Page
 */

get_header();
?>

	<main id="primary" class="site-main">
		
			<?php
			while ( have_posts() ) :
				the_post();

                $pages = get_field("pages");
                ?>
                <div class="container" data-section="1">
                <div class="columns">
                <?php
                foreach ($pages as $page):
                    $image = $page["image"];
                    $title = $page["title"];
                    $link = $page["link"];
                ?>
                
                    <div class="column">
                        <div class="p-content">
                            <figure>
                                <img src="<?php echo $image;?>" />
                            </figure>
                            <p class="p-text">
                                <a href="<?php echo $link; ?>">
                                <?php echo $title;?>
                                </a>
                            </p>
                        </div>
                    </div>
                
                <?php
                endforeach;
                ?>
                </div>
                </div>

                <div data-section="2"  class="bg-color2">
                    <div class="container">
                        <div class="section2-content">
                            <h2 class="section-title"><?php echo get_field("section2_title"); ?></h2>
                            <p class="section-sub-title"><?php echo get_field("section2_description"); ?></p>

                            <div class="columns">
                                <?php 
                                $history = get_field("section2_history");

                                foreach ($history as $h):
                                    $icon = $h["icon"];
                                    $number = $h["number"];
                                    $description = $h["description"];
                                ?>
                                <div class="column">
                                    <div class="s-history">
                                        <div class="icon">
                                            <img src="<?php echo $icon; ?>" />
                                        </div>
                                        <span class="number"><?php echo $number; ?></span>
                                        <p class="description"><?php echo $description; ?></p>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div data-section="3">
                    <div class="container">
                        <div class="columns">
                            <div class="column is-half-desktop">
                                <div class="section3-carousel">
                                    <?php 

                                    $carousels = get_field("section3-carousel");                                    
                                    foreach ($carousels as $carousel):
                                    ?>
                                    <div class="carousel-item">
                                        <img src="<?php echo $carousel["image"]; ?>" />
                                    </div>
                                    <?php
                                    endforeach;
                                    ?>
                                </div>
                            </div>

                            <div class="column align-items-center">
                                <div class="section3-content">
                                    <h4><?php echo get_field('section3_title'); ?></h4>
                                    <p><?php echo get_field('section3_description'); ?></p>
                                    <div class="button-section">
                                        <a class="s-btn s-normal" href="<?php echo get_field("section3_link"); ?>"><?php echo get_field("section3_button"); ?></a>
                                    </div>
                                </div>        
                            </div>

                        </div>
                    </div>
                </div>
                
                <div data-section="4">
                    <div class="container">
                        <h2 class="section-title" style="margin-bottom: 50px;"><?php echo get_field("section4_title"); ?></h2>

                        <div class="columns">
                            <?php 
                                $columns = get_field("section4_columns");
                                foreach ($columns as $column):
                                    ?>
                                <div class="column">
                                    <div class="s4-item">
                                        <div class="icon">
                                            <img src="<?php echo $column["image"]; ?>" />
                                        </div>
                                        <div class="content">
                                            <h5><?php echo $column["title"]; ?></h5>
                                            <p><?php echo $column["description"]; ?></p>
                                        </div>                                        
                                    </div>
                                </div>
                                    <?php
                                endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <?php


				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>
		
	</main><!-- #main -->

<?php
get_footer();
