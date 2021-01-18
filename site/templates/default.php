<!-- Fetching the header snippet -->
<?php snippet('header') ?>
<!-- Fetching the standard mood image -->
<?php snippet('intro-mood') ?>

<!-- List all subpages on page - makes for easier backend management -->

<!-- Main Page Loop -->
<section class="content content__main">
    <?= $page->content()->text()->blocks(); ?>
</section>

<!-- Unshift Images Loop -->
<?php $site->unshiftImage($page) ?>

<!-- Sub Pages Loop -->
<?php $site->pullSubPages($page) ?>

<!-- END - List all subpages on page -->

<!-- Fetching the footer snippet -->
<?php snippet('footer') ?>