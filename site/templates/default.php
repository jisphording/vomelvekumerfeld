<!-- Fetching the header snippet -->
<?php snippet('header') ?>

<h1><?= $page->title() ?></h1>
<p><?= $page->Text()->kirbytext() ?></p>

<!-- Get all images from news item -->
<?php foreach( $page -> images() as $file ): ?>
    <img src="<?= $file->url() ?>" alt="Cover Bild f&uuml;r den Newseintrag" width="<?= floor($file->width()) ?>" height="<?= floor($file->height()) ?>">
<?php endforeach ?>
