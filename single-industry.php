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

			$content = get_the_content();
			if ($content):
?>
			<div data-section="1">
                    <div class="container">
						<div class=" column is-10 is-offset-1">
                        	<?php the_content(); ?>
						</div>
                    </div>
                </div>            
                <?php
				endif;
                $img_carousel = get_field("image_carousel");
				if ($img_carousel):
                ?>
                <div data-section="2">
                    <div class="container">
                        <div class="image_carousel">
							
							<?php foreach ($img_carousel as $img): ?>
								<div class="slide-item">
									<a data-popup class="image-overlay" href="<?php echo $img["image"]; ?>">									
									</a>
									<?php sod_generate_image_tag( $img["image"]); ?>
								</div>
								<?php endforeach; ?>
							
						</div>

						<div class="image_carousel icarousel_content">
							
							<?php foreach ($img_carousel as $img): ?>
								<div class="slide-item">
									<div class="columns is-multiline">
										<div class="column is-one-third-desktop ">
											<h3><?php echo $img["title"] ? $img["title"] : ""; ?></h3>
										</div>
										<div class="column">
											<p><?php echo  $img["content"] ?  $img["content"] : ""; ?></p>
										</div>
									</div>
								</div>									
							<?php endforeach; ?>

						</div>
                    </div>
                </div>
				<?php
				endif;
			
				$item_image_pos = get_field("item_list_image_from_left");
				$left = "";
				$shuffle = "";
				foreach ($item_image_pos as $iip) {
					if ($iip == "Left") {
						$left = "left";
					} else if ($iip == "Shuffle") {
						$shuffle = "shuffle";
					}
				}
				?>
				<div id="industry_items" class="item_list_container_from_<?php echo $left . "  " . $shuffle; ?> ">
				<?php
				$item_list = get_field("item_list");
				if ($item_list && count($item_list) > 0):
					foreach ($item_list as $item):
						$bg_color = $item["background_color"];

						$full_width = "";
						if ($item["full_width"]) {
							$full_width = "full_width";
						}
				?>
				
				<div data-section style="<?php echo $bg_color ? "background: $bg_color;" : ""; ?>">
					<div class="container item_list_section">
						
						<div class="columns  is-multiline">
							<div class="column industy-wrap <?php echo $full_width; ?>">
								<div class="industry-item">									
										
										<a href="<?php echo $item["link"]; ?>" class="title"> <?php echo isset($item["title"]) ? $item["title"] : ""; ?> </a>	
										
										<p>
											<?php echo isset($item["content"]) ? $item["content"] : ""; ?>
										</p>
								</div>
							</div>
							<?php if ($item["image"]) : ?>
								<div class="column <?php echo $full_width; ?>">
									<div class="thumbnail">	
										
										<a class='image-overlay'  href="<?php echo $item["link"]; ?>" />
											<?php sod_generate_image_tag( $item["image"]); ?>
										</a>
									</div>
								</div>
							<?php endif; ?>
						</div>
						
					</div>
				</div>
				<?php endforeach; ?>
				<?php endif; ?>
					</div>
				<?php 
					$section_title = get_field("section_title");
					$section_sub_title = get_field("section_sub_title");
					$section_image = get_field("section_image");

					if ($section_title && $section_sub_title) {
						?>
						<div data-section class="sections">
							<div class="container">
								<h2 class="features-title"><?php echo $section_title; ?></h2>
								<p><?php echo $section_sub_title; ?></p>
								<?php if ($section_image): ?>
								<div class="section-image">									
									<?php sod_generate_image_tag( $section_image); ?>
								</div>
								<?php endif; ?>
							</div>
						</div>
						<?php
					}
				?>

				<?php 
					$featues_title = get_field("features_title");
					$featues = get_field("features");
					if ($featues_title && $featues && count ($featues) > 0):
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
											<?php sod_generate_image_tag( $f["icon"]); ?>
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
				<?php
				$headline =  get_field("boxed_section_headline");

				if ($headline): ?>
				<div class="container brand_section_title">				
					<h2 class="features-title"><?php echo $headline; ?></h2>
				</div>
				<?php endif; ?>
				<?php $boxed_option = get_field("boxed_list_option");
				$boxed_class = $boxed_option ? "boxed_brand container" : "";
				 ?>
				<?php 
					endif;
					$brands = get_field("brand_list");
					if ($brands && count($brands) > 0 ) : ?>
				
					<?php
					
					foreach ($brands as $brand) :
						$bd_image = $brand["brand"];
						$brand_title = $brand["brand_title"];
						$brand_content = $brand["brand_content"];
						$bgcolor = $brand["background_color"];
					
						
				?>
				
				<div data-section  class="<?php echo $boxed_class; ?>" style="<?php echo $bgcolor ? "background: $bgcolor;" : ""; ?>" >
					<div class="container brand_content">
						<div class="columns is-multiline">
							<div class="column is-one-third-desktop text-center">								
								<?php sod_generate_image_tag($bd_image); ?>
							</div>
							<div class="column">
								<h4 class="comercial-title" style="text-align: left;"><?php echo $brand_title ? $brand_title : ""; ?></h4>
								<p><?php echo $brand_content ? $brand_content : ""; ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
				<div class="<?php echo $boxed_class; ?> boxed_last" style="height: 0;"></div>
				
				<?php endif ;?>

				<?php
					$brands = get_field("second_brand_list");
					if ($brands && count($brands) > 0 ) : ?>
					<div data-section></div>
					<?php

					foreach ($brands as $brand) :
						$bd_image = $brand["brand"];
						$brand_title = $brand["brand_title"];
						$brand_content = $brand["brand_content"];
						$bgcolor = $brand["background_color"];
					
						
				?>
				
				<div data-section style="<?php echo $bgcolor ? "background: $bgcolor;" : ""; ?>" >
					<div class="container brand_content">
						<div class="columns is-multiline">
							<div class="column is-one-third-desktop text-center">								
								<?php sod_generate_image_tag($bd_image); ?>
							</div>
							<div class="column">
								<h4 class="comercial-title" style="text-align: left;"><?php echo $brand_title ? $brand_title : ""; ?></h4>
								<p><?php echo $brand_content ? $brand_content : ""; ?></p>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
					
				
				<?php endif ;?>
		<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #main -->

<?php
get_footer();
