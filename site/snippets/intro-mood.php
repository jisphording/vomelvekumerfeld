<section class="mood__image">
    <div class="mood__image--inside">
        <?php if($image = $page -> image('intro-mood.webp')): ?>
            <img srcset="<?= $image -> srcset([480, 768, 1024, 1280, 1440, 1680, 1920, 2560, 3840]) ?>"
                                        src="<?= $image -> url()?>" alt="Mood Image" style="height:<?= floor(($image -> height()) * 0.5) ?>; width:<?= floor(($image -> width()) * 0.5) ?>;" />
        <?php endif ?>
    </div>

    <!-- start - emblem -->
    <div class="titlecard green-bg">
        <div class="emblem">
            <img src="<?= $kirby->url() ?>/dist/img/emblem-light.webp" width="200" height="321" alt="Dog Kennel Emblem">
        </div>
        <h1><?= site()->title() ?></h1>
    </div>
</section>