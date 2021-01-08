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
<?php $images = $page->images();
foreach ($images as $image):
    echo $image;
endforeach; ?>

<!-- Sub Pages Loop -->
<?php $subpages = $page->children();

foreach ($subpages as $subpage): ?>

    <hr /> <!-- temporary until css is in place -->

    <h1><?= $subpage->content()->title() ?></h1>

    <?= $subpage->content()->text()->blocks();

    // Image Loop
    $images = $subpage->images();
    foreach ($images as $image):
        echo $image;
    endforeach;

endforeach;
?>
<!-- END - List all subpages on page -->

<!-- Fetching the footer snippet -->
<?php snippet('footer') ?>