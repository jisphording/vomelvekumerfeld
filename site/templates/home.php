<!-- Fetching the header snippet -->
<?php snippet('header') ?>
<!-- Fetching the standard mood image -->
<?php snippet('intro-mood') ?>

<!-- List all subpages on page - makes for easier backend management -->

<!-- Main Page Loop -->
<section class="content content__main">
    <?= $page->content()->text()->blocks(); ?>
</section>

<!-- Image Loop -->
<?php $images = $page->images()->filterBy('extension', 'webp');
// filter images by filename containing a string to use for main site body
$images_filtered = $images->filterBy('filename', '!*=', 'mood');
foreach ($images_filtered as $image):
    echo $image;
endforeach; ?>

<!-- Fetching the standard mood image -->
<?php snippet('insert-readmore') ?>

<!-- Fetching the footer snippet -->
<?php snippet('footer') ?>