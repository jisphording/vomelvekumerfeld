<section class="insert--readmore">
    <ul>
      <?php foreach(page('hunde')->children()->published()->limit(4) as $project): ?>
      <li>
        <div class="grid__container--images">
          <!-- Since at the moment kirby serves allfiletypes found we wrap everything in a PHP function that checks for the image type and then filters out everything that is not webp -->
          <?php foreach( $project -> images() as $file ): ?>
              
              <?php $extension = $file->extension();
              $video_dir = "video/"; // where the video footage resides on the server
              $file_video = NULL;
              $file_webp = NULL;

              // Check for image extension to filter out only webp
              if ($extension == 'webp') {

                // If there is a video file with the same name as an image file, then the website will display the video instead of the image

                // Writing filename to video variable while stripping the file extension
                // This is achieved with basename and the respective kirbyobjects. The dot has to be 'manually' connected to the extension
                $file_video = basename($file->filename(), "." . $file->extension());
                // Writing filename to variable
                $file_webp = $file; ?>

                <?php // Before injecting a webm video into the page we have to check if there actually exists a file 'behind' the url
                // variable containing the files to check for
                $filetocheck = $video_dir . $file_video . ".webm";
                // Here is the check. If 'true' the video is used. Else the image of the same name is used.
                if ( file_exists( $filetocheck )) { ?>
                  
                  <figure class="grid__item grid__item--image">
                    
                    <video class="grid__image" playsinline autoplay muted loop>
                        <source src="<?= $video_dir . $file_video ?>.webm" type="video/webm">
                    </video>

                    <figcaption>
                      <span class="title"><h1><?= $project->title() ?></h1></span>
                      <span class="link"><a href="<?= $project->url() ?>">Kennenlernen</a></span>
                    </figcaption>
                    
                  </figure>
                  
                <?php } // endif 

                else { ?>
                  <figure class="grid__item">
                    <div class="grid__item--image">
                      <img class="grid__image grid__item--image--inside" srcset="<?= $file_webp -> srcset([480, 768, 1024, 1280, 1440, 1680, 1920, 2560, 3840]) ?>"
                                                src="<?= $file_webp -> url()?>" alt="<?= $project->title() ?>" loading="lazy" 
                                                style="height:<?= floor(($file_webp -> height()) * 0.5) ?>; width:<?= floor(($file_webp -> width()) * 0.5) ?>;">
                    </div>

                    <figcaption>
                      <span class="title"><h1><?= $project->title() ?></h1></span>
                      <span class="link"><a href="<?= $project->url() ?>">Kennenlernen</a></span>
                    </figcaption>

                  </figure>
              <?php }} ?>
                
          <?php endforeach ?>
        </div>
      </li>
      <?php endforeach ?>
    </ul>
  </section>