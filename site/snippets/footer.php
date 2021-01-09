  </div>

  <footer class="footer brown-bg">

    <!-- START - Footer top -->
    <section class="footer-top brown-bg">
      <p>Man kann auch ohne Hund Leben, aber es lohnt sich nicht.</p>
      <p><strong>Heinz R&uuml;hmann</strong></p>
    </section>
    <!-- END - Footer top -->

    <!-- START - Footer navigation -->
    <section class="footer-navigation">
    <?php if ($contact = page('contact')): ?>
      <div class="footer-navigation__menu__main">
        <!-- start - main menu -->
        <div class="footer-navigation__menu__sub">
                      <!-- include the main menu -->
            <?php snippet('menu') ?>

            <!-- include submenu only for selected pages -->
            <?php if ($page->slug() == 'hunde' || 'zucht') {
                snippet('submenu'); 
            } ?> 
        </div>
        <!-- start - contact -->
        <ul class="footer-navigation__menu__sub">
          <li>Kontakt</li>
          <li><?= strip_tags(page('contact')->address()->kirbytext()) ?></li>
          <li><?= html::email(page('contact')->email()) ?></li>
          <li><?= html::tel(page('contact')->phone()) ?></li>
          <li><?= html::tel(page('contact')->mobile()) ?></li>
        </ul>
        <!-- start - imprint -->
        <ul class="footer-navigation__menu__sub">
          <li>Legal</li>
          <li><a href="<?= $site->url() ?>/imprint">Impressum</a></li>
        </ul>
        <!-- start - social -->
        <ul class="footer-navigation__menu__sub">
          <li>Folgen Sie Uns</li>
          <li><?php foreach ($contact->social()->toStructure() as $social): ?>
            <a href="<?= $social->url() ?>"><?= $social->platform() ?></a>
          <?php endforeach ?></li>
        </ul>
      </div>
    <?php endif ?>
    </section>
    <!-- END - Footer navigation -->

    <!-- START - Footer mood img -->
    <section class="footer-bottom">
      <section class="mood__image--footer">
        <!-- start - mood img -->
        <div class="mood__image--inside--footer">
            <?php if($image = new Asset('/dist/img/footer-mood.webp')): // creating a new image object to make useof kirby obj functions ?>
                <img srcset="<?= $image -> srcset([480, 768, 1024, 1280, 1440, 1680, 1920, 2560, 3840]) ?>"
                                            src="<?= $image -> url()?>" alt="Mood Image" style="height:<?= floor(($image -> height()) * 0.5) ?>; width:<?= floor(($image -> width()) * 0.5) ?>;" />
            <?php endif ?>
        </div>

        <!-- start - emblem -->
        <div class="emblem">
          <img src="<?= $kirby->url() ?>/dist/img/emblem.webp" width="200" height="321" alt="Dog Kennel Emblem">
        </div>

        <!-- start - credits -->
        <div class="copyright">
          <p>Crafted <a class="date" href="<?= url() ?>"> <?= date('Y') ?></a> by <a href="http://studioisphording.com/">Studio Isphording</a></p>
          <span>Alle Rechte Vorbehalten</span>
          <span class="trademark">&copy;</span>
        </div>
      </section>
    </section>
    <!-- END - Footer mood img -->
  </footer>

  <?php snippet('cookies') ?>

<?= js('dist/script.js', ['async' => false]) ?>

<!-- Enabling a very basic Progressive Web App Service Worker in case the user has no internet connection -->
<script>
if ('serviceWorker' in navigator) {
  // Before registering the service worker, wait until site has loaded
  window.addEventListener('load', () => {
    // Register a service worker hosted at the root of the
    // site using the default scope.
    navigator.serviceWorker.register('dist/serviceworker.js').then(function(registration) {
      console.log('Service worker registration succeeded:', registration);
    }, /*catch*/ function(error) {
      console.log('Service worker registration failed:', error);
    });
  });
} else {
  console.log('Service workers are not supported.');
}
</script>

</body>
</html>
