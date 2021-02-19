<?php
/**
 * Template Name: Commercial Page
 */

get_header();
?>

	<main id="primary" class="site-main">
		
			<?php
			while ( have_posts() ) :
				the_post();

                
                ?>
                <div data-section="1">
                    <div class="container">
                        <?php the_content(); ?>
                    </div>
                </div>                
                <?php

                $platform_title = get_field("comercial_platform");
                ?>
                <div data-section="3" class="bg-color2">
                    <div class="container">
                        <h2 class="comercial-title"><?php echo $platform_title; ?></h2>

                        <div class="columns  is-multiline">
                            <?php
                            $platforms = get_field("platform__vairant");
                            foreach ($platforms as $p):
                                $icon = $p["icon"];
                                $title = $p["title"];
                                $content = $p["content"];
                            ?>
                            <div class="column is-half-tablet">
                                <div class="c-content">
                                    <div class="icon">
                                        <img src="<?php echo $icon; ?>" />
                                    </div>
                                    <div class="content">
                                        <h4><?php echo $title; ?></h4>
                                        <p><?php echo $content; ?></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
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
