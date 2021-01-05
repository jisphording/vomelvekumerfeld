<!-- Fetching the header snippet -->
<?php snippet('header') ?>

<h1><?= $page->title() ?></h1>

<!-- List all subpages on page - makes for easier backend management -->

<!-- Main Page Loop -->
<?= $page->content()->text()->blocks();

// Image Loop
$images = $page->images();
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

<!-- List all subpages on page -->