<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package action-labs-theme
 */

get_header();

// Top container on the homepage with background image
if (is_front_page() || is_home()) :
  ?>
    <section class="home-action" aria-label="Portal do cliente">
        <div class="home-action-inner">
            <h1 class="home-action-title"><?php echo esc_html( get_theme_mod( 'home_action_title', 'Portal do cliente' ) ); ?></h1>
        </div>
    </section>
    <?php
endif;
?>

  <main id="primary" class="site-main">

    <?php if (have_posts()) : ?>

      <div class="home-posts-wrap">
        <div class="home-posts-grid">
          <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('home-post-card'); ?> >
              <a class="card-thumb" href="<?php the_permalink(); ?>">
                <?php
                if (has_post_thumbnail()) {
                  the_post_thumbnail('medium_large', ['class' => 'card-thumb-img']);
                } else {
                  echo '<img class="card-thumb-img" src="' . esc_url(get_template_directory_uri() . '/assets/images/placeholder.jpg') . '" alt="' . esc_attr(get_the_title()) . '">';
                }
            $tags = get_the_tags();
            if ($tags) {
              $first_tag = $tags[0]->name;
            } else {
              $cats = get_the_category();
              $first_tag = $cats ? $cats[0]->name : '';
            }
            if ($first_tag) {
              echo '<span class="card-tag">' . esc_html($first_tag) . '</span>';
            }
            ?>
              </a>
              <div class="card-body">
                <h3 class="card-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <p class="card-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                <a class="card-read-more" href="<?php the_permalink(); ?>">LEIA MAIS &nbsp;&raquo;</a>
              </div>
            </article>
          <?php endwhile; ?>
        </div>
      </div>

      <?php the_posts_navigation(); ?>

    <?php else : ?>

      <p class="no-posts">Nenhum post encontrado.</p>

    <?php endif; ?>

  </main><!-- #main -->

<?php get_footer();
