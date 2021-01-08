<?php snippet('header') ?>

<section class="content blog">

    <h1><?= $page->title()->html() ?></h1>

    <!-- tagcloud -->
    <aside class="tags">
        <h1>News nach Thema filtern</h1>
        <ul>
            <?php foreach($tags as $tag): ?>
            <li>
            <a href="<?= url($page->url(), ['params' => ['tag' => $tag]]) ?>">
                <?= html($tag) ?>
            </a>
            </li>
            <?php endforeach ?>
        </ul>
    </aside>

    <!-- Get all news items -->
    <?php foreach($articles as $article): ?>
        <!-- Get all images from news item -->
        <?php foreach( $article -> images() as $file ): ?><?php endforeach ?>

        <article>
            <!-- news-entry -->
            <time datetime="<?= $article->published()->toDate('d.m.Y') ?>" pubdate="pubdate"><?= $article->published()->toDate('d.m.Y') ?></time>

            <h1><?= $article->title()->html() ?></h1>
            <?= $article->newsentry()->blocks() ?>
            <img src="<?= $file->url() ?>" alt="Cover Bild f&uuml;r den Newseintrag" width="<?= floor($file->width()) ?>" height="<?= floor($file->height()) ?>">

            <!-- article tags -->
            <ul class="tags__article">
                <li><?= $article->tags() ?></li>
            </ul>

        </article>

    <?php endforeach ?>
    <!-- END - Get all news items -->

    <!-- pagination -->
    <nav class="pagination">
        <?php if($pagination->hasPrevPage()): ?>
            <a href="<?= $pagination->prevPageUrl() ?>">previous posts</a>
        <?php endif ?>

        <?php if($pagination->hasNextPage()): ?>
            <a href="<?= $pagination->nextPageUrl() ?>">next posts</a>
        <?php endif ?>
    </nav>

</section>

<!-- Fetching the footer snippet -->
<?php snippet('footer') ?> 