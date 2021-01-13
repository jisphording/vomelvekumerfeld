<!doctype html>
<html lang="en" class="white-bg">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="Online Presence of Dog Kennel and Breeder Vom Elvekumer Feld." />
    <meta name="author" content="Johannes Isphording" />
    <meta name="keywords" content="dogs, golden retriever, breeder, kennel, dog training" />

    <title><?= $site->title() ?> | <?= $page->title() ?></title>

    <!-- Canonical Link to main content for this site -->
    <link rel="canonical" href="https://vomelvekumerfeld.test/">

    <!-- main css file for styling -->
    <?= css(['dist/index.css']) ?>

</head>
<body class="loading">

  <div class="page <?= $page->uri() ?>">
    <header class="header">

		<section id="navbar" class="navbar green-bg">
      <div id="mainmenu">
            <!-- include the main menu -->
            <?php snippet('menu') ?>

            <!-- include submenu only for selected pages -->
            <?php if ($page->slug() == 'hunde' || 'zucht') {
                snippet('submenu'); 
            } ?> 
      </div>
    <!-- "Hamburger menu" / "Bar icon" to toggle the navigation links -->
    <a href="javascript:void(0);" class="icon" id="burgermenu">
      <span class="fa fa-bars">Men&uuml;</span>
    </a>
		</section>

    </header>

