<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * 
 * @package stargorod
 */

 get_header();
 ?>

<div id="primary" class="content-area">
  <main id="main" class="site-main">

    <?php if ( have_rows('services') ): ?>
    <?php while( have_rows('services') ) : the_row(); ?>
    <?php if( get_row_layout() == 'hero' ):
					$title = get_sub_field('title');
					$bgImage = get_sub_field('background_image');
				?>

    <section class="hero"
      style="background-image: linear-gradient(90deg, #213867 0%, rgba(33, 56, 103, 0) 100%), url('<?= $bgImage['url'] ?>');">
      <div class="grid-container">
        <div class="grid-x">
          <h1><?= $title ?></h1>
        </div>
      </div>
    </section>

    <?php endif; ?>

    <?php if( get_row_layout() == 'cta' ): ?>

    <section class="cta">
      <div class="grid-container">
        <div class="grid-x align-justify align-top cta-header">
          <div class="cell large-5 flex-middle-justify cta-button">
            <span class="cta-text">Качественно, быстро и удобно</span>
            <img src="<?= get_template_directory_uri() . '/img/arrows.png' ?>" alt="">
            <a href="#" class="button">Заказать</a>
          </div>
          <div class="cell large-5 custom-list">
            <?= get_template_part('template-parts/custom-list') ?>
          </div>
        </div>

        <?php if( have_rows('item_list') ): ?>
        <?php while( have_rows('item_list') ) : the_row();
                      $iconCall = get_sub_field('icon_call');
                      $iconAction = get_sub_field('icon_action');
                      $contentCall = get_sub_field('content_call');
                      $contentAction = get_sub_field('content_action');
                      $length = mb_strlen( $contentAction );
                    ?>

        <div class="grid-x align-middle cta-list">
          <div class="cell small-6 cta-list_item">
            <span class="icon call"><img src="<?= $iconCall['url'] ?>"></span>
            <span class="content call"><?= $contentCall ?></span>
          </div>

          <div class="cell large-4 small-6 cta-list_item">
            <span class="icon action"><img src="<?= $iconAction['url'] ?>"></span>
            <span
              class="content action <?php if( $length > 65 ):  echo "smaller"; endif; ?>"><?= $contentAction ?></span>
          </div>
        </div>

        <?php endwhile; ?>
        <?php endif; ?>

      </div>
      <!-- /.grid-container -->
    </section>
    <!-- /.cta -->
    <?php endif; ?>

    <?php if( get_row_layout() == 'timelines'): 
        $title = get_sub_field('title');
        $time = get_sub_field('time');
        $content = get_sub_field('content');  
        $bgImage = get_sub_field('bg-image');
      ?>

    <section class="timelines">
      <div class="grid-container">
        <div class="grid-x fancy-container timelines__fancy-container"
          style="background-image: url('<?= $bgImage['url'] ?>')">
          <div class="cell large-4 large-offset-1">
            <h2><?= $title ?> <span class="red"><?= $time ?>&nbspминут</span></h2>
            <p><?= $content ?></p>
            <a href="#" class="button">Заказать оценку недвижимости</a>
          </div>

          <?php if( have_rows('timeline') ): ?>
          <div class="cell large-5 large-offset-1">
            <div class="timeline">
              <?php while( have_rows('timeline') ) : the_row(); 
                $title = get_sub_field('title');
                $time  = get_sub_field('time');
              ?>

              <div class="timeline__item">
                <div class="timeline-header">
                  <h3 class="header__title"><?= $title ?></h3>
                  <div class="circle timeline-header__circle">

                    <?php if( $time ) { ?>
                    <span class="large"><?= $time ?></span><span class="small"> мин</span>
                    <?php } else { ?>
                    <img src="<?= get_template_directory_uri() . '/img/checked.png' ?>" alt="checked">
                    <?php } ?>

                  </div>
                </div>
                <ul class="timeline-body">
                  <?php if( have_rows('list') ): ?>
                  <?php while( have_rows('list') ) : the_row();
                      $title = get_sub_field('title');
                      $content = get_sub_field('content');
                    ?>


                  <li class="timeline-body__item">
                    <span class="subtitle"><?= $title ?></span>
                    <?php if($content) { ?>
                    <p class="content"><?= $content ?></p>
                    <?php } ?>
                  </li>

                  <?php 
                      endwhile;
                      endif;
                    ?>
                </ul>
              </div>

              <?php endwhile; ?>
              <?php endif; ?>

            </div>
          </div>
        </div>
      </div>
    </section>

    <?php endif; ?>

    <?php if( get_row_layout() == 'cards'): 
      $title = get_sub_field('section_title');    
    ?>

    <section class="cards">
      <div class="wrapper">
        <h2 class="section-title cards__section-title"><?= $title ?></h2>

        <div class="cards__wrapper">
          <?php if( have_rows('card') ): ?>
          <?php while( have_rows('card') ) : the_row(); 
              $icon = get_sub_field('icon');
              $title = get_sub_field('title');
              $content = get_sub_field('content');
            ?>
  
          <div class="card">
            <div class="card__container">
              <div class="card__icon"><img src="<?= $icon['url'] ?>" alt="<?= $icon['alt'] ?>"></div>
              <div class="card__title"><?= $title ?></div>
              <div class="card__text"><?= $content ?></div>
            </div>
          </div>
  
          <?php endwhile; ?>
          <?php endif; ?>
        </div>
        <!-- /.cards__wrapper -->
      </div>
    </section>

    <?php endif; ?>

    <?php if( get_row_layout() == 'certifikates' ): 
      $title = get_sub_field('title');
      $images = get_sub_field('images');  
      $size = 'full';
    ?>

    <section class="awards">
      <h2 class="section-title awards__section-title"><?= $title ?></h2>

      <?php if( $images ) : ?>
      <div class="wrapper">
        <div class="owl-carousel">
          <?php foreach( $images as $image ): ?>

          <div>
            <a href="<?= $image['url'] ?>" data-fancybox="gallery">
              <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
            </a>
          </div>

          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </section>


    <?php endif ?>

    <?php if( get_row_layout() == 'prices' ): 
      $minPrice = get_sub_field('min_price');
      $minTime = get_sub_field('min_time');
      $disclaimer = get_sub_field('disclaimer');
      $bgImage = get_sub_field('bg_image');
    ?>

    <section class="prices">
      <div class="grid-container">
        <div class="fancy-container" style="background-image: url('<?= $bgImage['url'] ?>')">
          <div class="grid-x prices__margin--bottom">
            <div class="cell large-6 text-align-right">
              <div class="prices__text">Выгодные цены</div>
            </div>
            <div class="cell large-5 large-offset-1">
              <div class="red prices__text">от&nbsp<?= $minPrice ?>&nbspгрн</div>
            </div>
          </div>
          <div class="grid-x prices__margin--bottom">
            <div class="cell large-6 text-align-right">
              <div class="prices__text">Комфортные сроки</div>
            </div>
            <div class="cell large-5 large-offset-1">
              <div class="red prices__text">от&nbsp<?= $minTime ?>&nbspчасов</div>
            </div>
          </div>
          <div class="grid-x prices__margin--top">
            <div class="cell large-6 text-align-right"><a href="#" class="button">Заказать оценку недвижимости</a></div>
            <div class="cell large-5 large-offset-1 --change-order"><span class="disclaimer">Цены мы формируем
                индивидуально под вашу задачу и прогнозируемый обьем работ — вы ни за что не переплачиваете</span></div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.prices -->

    <?php endif; ?>
    <?php endwhile; ?>
    <?php endif; ?>

    
    <section class="contact-form">
      <div class="grid-container">
        <div class="grid-x simple-fancy">
          <div class="cell large-4 large-offset-1 text-align-right">
            <h2 class="contact-form__title">Остались вопросы?</h2>
            <span class="contact-form__subtitle">Задайте их прямо сейчас</span>
          </div>
          <div class="cell large-4 large-offset-1">
            <?php echo do_shortcode( '[contact-form-7 id="112" title="Form 1" html_class="form"]' ); ?>
          </div>
        </div>
      </div>
    </section>
    <!-- /.contact-form -->

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();