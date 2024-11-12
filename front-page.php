    <?php get_header() ?>

    <section class="banner">
      <div class="container">
        <div class="banner__wrapper">
          <div class="banner__details">
            <small><?php the_field('banner_intro') ?></small>
            <h3>
              <?php the_field('banner_title')?>
            </h3>
            <p>
              <?php the_field('banner_text')?>
            </p>
            <a href="./singlepage.html" class="btn bg--dark"><?php the_field('banner_btn')?></a>
          </div>
          <div class="banner__img">
            <?php if(get_field('banner_image')) : ?>
                <img src="<?php the_field('banner_image');?>" alt="">
                <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

    <section class="recipe">
      <div class="container">
        <div class="recipe__title"><h3>Recipe of the Week</h3></div>
        <div class="recipe__wrapper">
          <?php 
             if(have_rows('recipe_of_the_week')) :
               while(have_rows('recipe_of_the_week')): the_row();
          ?>
          <div class="card">
                <?php if(get_sub_field('recipe_image')) : ?>
                <img src="<?php echo get_sub_field('recipe_image');?>" alt="">
                <?php endif; ?>
            <div class="card__detail">
              <ul class="courses">
                <li><small><?php echo get_sub_field('recipe_category') ?></small></li>
                <li><a href=""><?php echo get_sub_field('recipe_title') ?></a></li>
                <li>
                  <p>
                    <?php echo get_sub_field('recipe_description') ?>
                  </p>
                </li>
              </ul>
            </div>
          </div>

          <?php
          
             endwhile;
            else:
               echo "No content yet.";
            endif;

          ?>
        </div>
      </div>
    </section>

    <section class="recipeCollection">
      <div class="container">
        <div class="recipeCollection__title"><h3>Recipe Collection</h3></div>
        <div class="recipeCollection__wrapper">
    <?php
        $args= array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            // 'offset' => 1,
        );
        $newQuery = new WP_Query($args);
     ?>

     <?php
        if($newQuery->have_posts()) : while($newQuery->have_posts()) : $newQuery->the_post();
    ?>

          <div class="food">
            <div class="food__img">
               <?php
               
                if(has_post_thumbnail()){
                    the_post_thumbnail();
                }

               ?>
            </div>
            <div class="food__text">
              <li>
                <small>
                <?php $category = get_the_category();
                echo $category[0]->cat_name;
                ?>
                </small>
            </li>
              <li><a href=""><?php the_title();?></a></li>
              <li>
                <p>
                  <?php the_excerpt(); ?>
                </p>
              </li>
              <li>
                <a href="<?php the_permalink(); ?>">
                <button href="" class="btn bg--dark">Read More</button>
                </a>
              </li>
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
    </section>

    <section class="cta" style="background:linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)),url('<?php the_field('cta_background_url') ?>');background-repeat:no-repeat;background-size:cover">
      <div class="container">
        <div class="cta__wrapper">
          <h2><?php the_field('cta_title') ?></h2>
          <p>
            <?php the_field('cta_text') ?>
          </p>
          <form action="">
            <textarea name="text" id=""></textarea>
            <button href="" class="btn bg--dark">Subscribe</button>
          </form>
        </div>
      </div>
    </section>

    <section class="classic">
      <div class="container">
        <div class="classic__title"><h3>Classic Collection</h3></div>
        <div class="classic__wrapper">
    <?php
        $args= array(
            'post_type' => 'classic_collection',
            'posts_per_page' => -1,
            // 'offset' => 1,
        );
        $newQuery = new WP_Query($args);
    ?>

     <?php
        if($newQuery->have_posts()) : while($newQuery->have_posts()) : $newQuery->the_post();
    ?>


          <div class="menu">
            <div class="menu__img">
                <?php
               
                if(has_post_thumbnail()){
                    the_post_thumbnail();
                }

               ?>
            </div>
            <div class="menu__txt">
              <li><small><?php the_field('category') ?></small></li>
              <li><h3><?php the_title() ?></h3></li>
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
    </section>

    <?php get_footer() ?>