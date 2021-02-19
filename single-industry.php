<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package _s
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

                $img_carousel = get_field("image_carousel");
				if ($img_carousel):
                ?>
                <div data-section="2">
                    <div class="container">
                        <div class="image_carousel">
							
								<?php foreach ($img_carousel as $img): ?>
									<div class="slide-item">
										<img src="<?php echo $img["image"]; ?>" />
									</div>
									<?php endforeach; ?>
							
						</div>
                    </div>
                </div>
				<?php
				endif;
				
				$carousel_title = get_field("image_carousel_title");
				$carousel_content = get_field("image_carousel_content");
				?>

				<div class="container icarousel_content">
					<div class="columns is-multiline">
						<div class="column is-one-third-desktop ">
							<h3><?php echo $carousel_title ? $carousel_title : ""; ?></h3>
						</div>
						<div class="column">
							<p><?php echo $carousel_content ? $carousel_content : ""; ?></p>
						</div>
					</div>
				</div>

				<?php 
				?>
				<div data-section="3" class="bg-color2">
					<div class="container" id="item_list_section">
						<?php
						$item_list = get_field("item_list");

						if ($item_list):
							foreach ($item_list as $item):
						?>
						<div class="columns">
							<div class="column industy-wrap">
								<div class="industry-item">									
										
										<a href="<?php echo $item["link"]; ?>" class="title"> <?php echo isset($item["title"]) ? $item["title"] : ""; ?> </a>	
										
										<p>
											<?php echo isset($item["content"]) ? $item["content"] : ""; ?>
										</p>
									
								</div>								
							</div>

							<div class="column">
								<div class="thumbnail">
										<?php echo isset($item["image"]) ? "<img src='" . $item["image"] . "'>" : ""; ?>
								</div>
							</div>
						</div>
						<?php endforeach; endif; ?>
					</div>
				</div>

				<?php 
					$featues_title = get_field("features_title");
					$featues = get_field("features");
				?>

				<div data-section="4" class="industry-featues-secton">
					<div class="container">
						<h2 class="features-title"><?php echo $featues_title ? $featues_title : ""; ?></h2>
						<div class="columns is-multiline">
							<?php
								if ($featues):
								foreach ($featues as $f):
							?>
								<div class="column is-one-third-tablet">

									<div class="s4-item">
                                        <div class="icon">
                                            <img src="<?php echo $f["icon"]; ?>" />
                                        </div>
                                        <div class="content">
                                            <h5><?php echo $f["title"]; ?></h5>
                                            <p><?php echo $f["content"]; ?></p>
                                        </div>                                        
                                    </div>

								</div>
							<?php
								endforeach;
								endif;
							?>
						</div>
					</div>
				</div>

				<div data-section="5"  class="bg-color2">
					<?php 
					
				$brand = get_field("brand");
				$brand_title = get_field("brand_title");
				$brand_content = get_field("brand_content");
				?>

				<div class="container brand_content">
					<div class="columns is-multiline">
						<div class="column is-one-third-desktop ">
							<?php echo $brand ? "<img src='$brand'>" : ""; ?>
						</div>
						<div class="column">
							<h4 class="comercial-title" style="text-align: left;"><?php echo $brand_title ? $brand_title : ""; ?></h4>
							<p><?php echo $brand_content ? $brand_content : ""; ?></p>
						</div>
					</div>
				</div>
					
				</div>
		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
