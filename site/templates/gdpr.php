<?php snippet('header') ?>

<main>
	<?php snippet('intro-amp') ?>

	<!-- ALL IMAGES OF PAGE TO ARRAY -->

  	<!-- Since at the moment kirby serves all filetypes found we wrap everything in a PHP function that checks for the image type and then filters out everything that is not webp -->
	<?php 
	// an array to store all the images in to make it easier to place rthem in various parts of the template  
	$images_ar = NULL;
	
	// FILTERING THE IMAGES

	// make use of kirbys filter function to load web optimized images for all images of the site
	$images = $page->images()->filterBy('extension', 'webp');
	// filter images by filename containing a string to use for main site body
	$images_filtered = $images->filterBy('filename', '*=', 'gdpr-');
	// Then load those filtered images into an array to populate the page
	foreach($images_filtered as $file ):
		$images_ar[] = $file;
  endforeach;

	// PHP HELPER FUNCTION:
	// This function takes a kirby files object and can be called in this template to place the first image from this object along with it's meta information and then remove it from the array to avoid duplication
	// -> the '&' infront of the variable is used to pass a reference to the variable instead of a copy
	function unshift_image(&$el) {
		// First, we check if the array actually contains any images
		if (empty($el)) {
			// Do nothing, because array is empty and/or all images are already placed
		} else {				
			?><figure class="grid__item grid__item--image">
			<img class="grid__image" srcset="<?= $el[0] -> srcset([480, 768, 1024, 1280, 1440, 1680, 1920, 2560, 3840]) ?>"
											src="<?php echo $el[0]->url() ?>" alt="<?= $el[0]->content()->title() ?>" loading="lazy" 
                                            style="height:<?= floor(($el[0] -> height()) * 0.5) ?>; width:<?= floor(($el[0] -> width()) * 0.5) ?>;">
			</figure>
			<?php
			array_shift($el);
		}	
	}
?>

<?php snippet('introMood') ?>

<section class="mood__claim">
    <?= $page -> Claim() -> kirbytext() ?>
  </section>

	<section class="project__text--longform">
		<?php 
    // PHP HELPER FUNTION
		// -> Placing a number of images from a given array where the images are stored
		function place_images(&$el, $amount = 99) {
			?><section class="grid__container--images"><?php
			for ($i = 0; $i < $amount; $i++) {
				unshift_image($el);	
			}
			?></section><?php
    }	?>

    <!-- PROJECT PAGE TEXT TO ARRAY -->
    <!-- TOTO: Refactor into Function, becaused it is used on multiple pages -->

  	<!-- Splitting all the kirbytext content up into chunks which are loaded into an array for finer control over the placement on the site. The Delimiter for the next array section is the <h2> tag -->
	  <?php 
	  	// loading the kirbytext of the project page
    $projecttext = $page->PageText()->kirbytext();
		
		// Splitting the text up into various chunks by use of the <h2> Tag as a chapter marker. 
		// If simply splitting by /<h2>/, the tag disappears, so we need '/(?=<h2>)/' to tell PHP to keep the tag intact
		$projecttext_ar = preg_split('/(?=<h2>)/', $projecttext, -1, PREG_SPLIT_NO_EMPTY);

		// Now we have everything in an array with the following structure
		// [0] <h1>
		// [1] <h2><p><p>
		// [2] <h2><p><p> 
		// etc.

		// PHP HELPER FUNCTION:
		// This function takes a kirbytext object and can be called in this template to place the first chapter from the object along with it's meta information and then remove it from the array to avoid duplication
		// -> the '&' infront of the variable is used to pass a reference to the variable instead of a copy
		function unshift_projecttext (&$el) {
			// First, we check if the array actually contains any text
			if (empty($el)) {
				// Do nothing, because array is empty and/or all text is already placed
			} else {
				?><section class="project__text project__text--chapter"><?php
					print($el[0]);
					array_shift($el);
				?></section><?php
			}
    }
  ?>  

<?php // Placing First paragraph of text
	unshift_projecttext($projecttext_ar); 
	unshift_projecttext($projecttext_ar);  ?>

  <?php // Placing the first half of the images
  place_images($images_ar, 3); ?>
  </section>

    <?php // Placing the rest of the paragraphs that are in the array
    $length = count($projecttext_ar);

    for ($i = 0; $i < $length; $i++) {
        unshift_projecttext($projecttext_ar);
    } ?>

    <section class="project__text project__text--imprint project__text--imprint--addendum">
        <h2>Impressum</h2>
        <ul class="address">
            <?= page('imprint')->address()->kt() ?>
            <li><?= html::email(page('imprint')->email()) ?></li>
            <li><?= html::tel(page('imprint')->phone()) ?></li>
        </ul>
    </section>
	
</main>

<?php snippet('footer') ?>
