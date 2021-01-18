<?php

// CUSTOM SITE METHODS
// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
//
// This "plugin" contains a few custom functions used across multiple pages on different sites.

Kirby::plugin('studio-isphording/site-methods', [
  'siteMethods' => [

		// PULL SUB PAGES
		// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
		//
		// Pulling all content from current page and it's child pages together to create a onepager
		// This way the different sections can be more easily managed by users in the backend
		'pullSubPages' => function ($subpages = '') {

			$subpages = $subpages;
			$subpages = $subpages->children();

			foreach ($subpages as $subpage): ?>
				<hr /> <!-- temporary until css is in place -->
			
				<h1><?= $subpage->content()->title() ?></h1>
			
				<?= $subpage->content()->text()->blocks(); ?>

				<!-- Image Loop -->
				<?= $images = $subpage->images()->filterBy('extension', 'webp');
				// filter images by filename containing a string to use for main site body
				$images_filtered = $images->filterBy('filename', '!*=', 'mood');
				foreach ($images_filtered as $image):
					echo $image;
				endforeach;
		
			endforeach;
		},
		
		// UNSHIFT IMAGES
		// ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- ----- -----
		//
		// Pulling all images of the page into an array to programmatically mix images and body copy text on page 
		'unshiftImage' => function ($page = '') {
			// FILTERING THE IMAGES
			// make use of kirbys filter function to only load web optimized images for all images of the site
			$images = $page->images()->filterBy('extension', 'webp');
			// filter images by filename containing a string to use for main site body, excluding mood images
			$images_filtered = $images->filterBy('filename', '!*=', 'mood');
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
					<?php array_shift($el);
				}	
			}

			unshift_image($images_ar);
		}
  ] // end site methods
]); 
?>