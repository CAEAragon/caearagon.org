<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles('wp-rig-content');

?>
<a name="conferencia"></a>
	<main id="primary" class="site-main">
		<?php
        if (have_posts()) {
            get_template_part('template-parts/content/page_header');

            while (have_posts()) {
                the_post();

                get_template_part('template-parts/content/entry', get_post_type());
            }

            if (! is_singular()) {
                get_template_part('template-parts/content/pagination');
            }
        } else {
            get_template_part('template-parts/content/error');
        }
        ?>
<div class="with_margin">
<div class="speakers_main">
<a name="agenda"></a>
<?php $speakers_post = get_post(66) ?>

<h1 class="speakers_title"><?php echo $speakers_post->post_title;?> </h1>
<p class="speakers_text"><?php echo $speakers_post->post_content;?> </p>

<?php
$posts = get_posts([
  'post_type' => 'speaker',
  'post_status' => 'publish',
  'numberposts' => -1
]);

?>

<ul class=speakers>

<?php

foreach ($posts as $post) {
    if (has_post_thumbnail($post->ID)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
	<div class=speaker style="background-image: url('<?php echo $image[0]; ?>')">
            <span class="speaker_excerpt"><?php echo $post->excerpt; ?></span>
            <span class="speaker_name"><?php echo $post->post_title; ?></span>
        </div>
        <?php
    }
}
?>
</ul>
</div>
<a href="" class=speakers_button>VER AGENDA</a>
<div class="sponsors_main">
<a name="patrocinio"></a>
<?php $sponsors_post = get_post(64) ?>

<h1 class="sponsors_title"><?php echo $sponsors_post->post_title;?> </h1>

<?php
$posts = get_posts([
  'post_type' => 'sponsor',
  'post_status' => 'publish',
  'numberposts' => -1
]);
?>

<ul class=sponsors>

<?php

foreach ($posts as $post) {
    if (has_post_thumbnail($post->ID)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
	<div class=sponsor style="background-image: url('<?php echo $image[0]; ?>')"></div>
        <?php
    }
}
?>
</ul>
</div>
<div class="articles_main">
<a name="noticias"></a>
<?php $articles_post = get_post(22) ?>

<h1 class="articles_title"><?php echo $articles_post->post_title;?> </h1>

<?php
$posts = get_posts([
  'post_type' => 'post',
  'post_status' => 'publish',
  'numberposts' => -1
]);
?>

<ul class=articles>

<?php

foreach ($posts as $post) { ?>
    <div class="article">
    <?php
    if (has_post_thumbnail($post->ID)) {
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
        <div class=article_image style="background-image: url('<?php echo $image[0]; ?>')"></div>
        <?php
    } ?>
    <?php echo "<h4 class=article_title>$post->post_title</h4><span class=article_date>$post->post_modified</span>";
          echo "<p class=article_excerpt>$post->post_excerpt</p><p class=article_readmore>Leer +</p>" ?>
</article>
    <?php
}
?>
</ul>
</div>

<script>
	document.getElementById('unete-al-cambio').style = `margin-top: ${(window.innerHeight / 2) - 200}px`;
	document.getElementById('separator').style = `height: ${(window.innerHeight / 2) - 218}px`;

</script>
</div>
<?php
get_sidebar();
get_footer();
