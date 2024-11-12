<?php get_header() ?>

    <!-- SINGLE BANNER -->
    <section class="singleBanner">
      <div class="single__bg"></div>
      <div class="container">
        <div class="single__header">
          <div class="singleBanner__title">
            <h2><?php the_title() ?></h2>
        <?php the_field('published') ?>
          </div>
        </div>
        <div class="single__text">
          <?php the_field('level') ?>
          <?php the_field('cooking_time') ?>
          <?php the_field('yield') ?>
        </div>
        <div class="singleBanner__wrapper">
         <?php
          if(has_post_thumbnail()){
                    the_post_thumbnail();
                }
         ?>
          <div class="wrapper__txt">
            <div class="ingredients">
              <?php the_field('recipe_ingredients') ?>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- DIRECTIONS -->
    <section class="directions">
      <div class="container">
        <div class="directions__title"><h3>Directions</h3></div>
        <div class="directions__wrapper">
          <div class="directions__step">
            <?php the_content(); ?>
            <ul>
              <li>PREV RECIPE</li>
              <li>NEXT RECIPE</li>
            </ul>
            <div class="youtube">
              <h3>Watch this recipe on YouTube</h3>
              <iframe
                width="560"
                height="315"
                src="https://www.youtube.com/embed/nDpb7_44-RU?si=neDDYmrONHIyIfvV"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
              ></iframe>
            </div>
          </div>
          <div class="else">
            <p>Category: <a href="">Healthy</a></p>
            <p>
              Tags: <a href="">Poultry</a>
              <a href="">Chicken</a>
              <a href="">Healthy</a>
              <a href="">Fast</a>
              <a href="">Easy</a>
            </p>
            <h3>Looking for Someone else?</h3>
            <div class="else__wrapper">
    <?php
        $args= array(
            'post_type' => 'classic_collection',
            'posts_per_page' => 4,
            // 'offset' => 1,
        );
        $newQuery = new WP_Query($args);
    ?>

     <?php
        if($newQuery->have_posts()) : while($newQuery->have_posts()) : $newQuery->the_post();
    ?>


          <div class="else__menu">
            <div class="else__img">
                <?php
               
                if(has_post_thumbnail()){
                    the_post_thumbnail();
                }

               ?>
            </div>
            <div class="else__txt">
              <li><small><?php the_field('category') ?></small></li>
              <li><?php the_title() ?></li>
              <li>

              <?php
              $myRating = get_field('star');
              for($star = 0; $star<$myRating;$star++) {
              
              ?>
                <a href=""><i class="fa-solid fa-star"></i></a>

                <?php } ?>
              </li>
              <li><p><?php the_field('description') ?></p></li>
            </div>
          </div>

    <?php
            endwhile;
            else :
                echo "no available content yet";
            endif;
            wp_reset_postdata();
    ?>
            </div>
          </div>
        </div>
      </div>
    </section>

<?php get_footer() ?>