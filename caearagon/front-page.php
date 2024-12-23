<?php
/**
 * Front page theme
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles('wp-rig-content');
$ARTICLES_POST_ID = 104;
$SPEAKERS_POST_ID = 66;
$SPONSORS_POST_ID = 64;
$SCHEDULE_POST_ID = 255;

$ROUNDTABLE_POST_ID = 735;

$articles_post = get_post($ARTICLES_POST_ID);
$articles = get_posts(
    array(
            'post_type' => 'post',
            'post_status' => 'publish',
            'numberposts' => -1,
            'orderby' => 'menu_order'
    )
);

$speakers_post = get_post($SPEAKERS_POST_ID);
$speakers_posts = get_posts(
    array(
            'post_type' => 'speaker',
            'post_status' => 'publish',
            'numberposts' => -1,
            'orderby' => 'menu_order'
    )
);

$roundtable_post = get_post($ROUNDTABLE_POST_ID);
$roundtable_posts = get_posts(
    array(
            'post_type' => 'roundtable',
            'post_status' => 'publish',
            'numberposts' => -1,
            'orderby' => 'menu_order'
    )
);



$sponsors_types = array (
        'especial' => 'Especial',
        'platino' => 'Platino',
        'oro' => 'Oro',
        'colaborador' => 'Colaboradores',
);
$sponsors_post = get_post($SPONSORS_POST_ID);
$sponsors_posts = array();


foreach ($sponsors_types as $sponsor_type => $sponsor_type_name) {
        $sponsors_posts[$sponsor_type] = get_posts(
                array(
                        'post_type' => 'sponsor',
                        'post_status' => 'publish',
                        'numberposts' => -1,
                        'meta_key' => 'Tipo',
                        'meta_value' => $sponsor_type,
                        'orderby' => 'menu_order'
                )
            );
            
}

$schedule_post = get_post($SCHEDULE_POST_ID);

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

<script>
function hide_text(post){ document.getElementById(post).classList.remove('showText'); }
function show_text(post){ document.getElementById(post).classList.add('showText'); }
</script>

<div class="with_margin">
        <div class="speakers_main">
                <a name="ponentes"></a>

                <h1 class="speakers_title"><?php echo $speakers_post->post_title; ?> </h1>
                <p class="speakers_text"><?php echo $speakers_post->post_content; ?> </p>

                <ul class=speakers>
                <?php
                foreach ($speakers_posts as $post) {
                        $title = get_post_meta($post->ID, 'title', true);
                        $type = get_post_meta($post->ID, 'type', true);
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                        <div class=speaker id="post_<?php echo $post->ID; ?>" 
                                onmouseover="show_text('post_<?php echo $post->ID; ?>')"
                                onmouseout="hide_text('post_<?php echo $post->ID; ?>')"
                                 style="background-image: url('<?php echo $image[0]; ?>')">
                                <div class=speaker_extname>
                                        <div class=speaker_extname_in>
                                                <span class="speaker_name"><?php echo $post->post_title; ?></span>
                                        </div>
                                </div>

                                <div class=speaker_text>
                                        <div class=speaker_text_in>
                                        <span class="speaker_name"><?php echo $post->post_title; ?></span>
                                        <span class="speaker_title"><?php echo $title; ?></span>
                                        <span class="speaker_excerpt"><?php echo $post->post_excerpt; ?></span>
                                        <span class="speaker_link"> 
                                                <a href="<?php echo get_permalink($post); ?>"> Ver perfil &gt; </a>
                                        </span>
                                </div>
                                </div>
                        </div>
                        <?php
                }
                ?>
                </ul>

                <?php
                if ($roundtable_post->post_status == 'publish' || is_user_logged_in()) { ?>
               
                <h1 class="speakers_title"><?php echo $roundtable_post->post_title; ?> </h1>
                <p class="speakers_text"><?php echo $roundatble_post->post_content; ?> </p>
                <ul class=speakers>
                <?php
                foreach ($roundtable_posts as $post) {
                        $title = get_post_meta($post->ID, 'title', true);
                        $type = get_post_meta($post->ID, 'type', true);
                        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                        <div class=speaker id="post_<?php echo $post->ID; ?>" 
                                onmouseover="show_text('post_<?php echo $post->ID; ?>')"
                                onmouseout="hide_text('post_<?php echo $post->ID; ?>')"
                                 style="background-image: url('<?php echo $image[0]; ?>')">
                                <div class=speaker_extname>
                                        <div class=speaker_extname_in>
                                                <span class="speaker_name"><?php echo $post->post_title; ?></span>
                                        </div>
                                </div>

                                <div class=speaker_text>
                                        <div class=speaker_text_in>
                                        <span class="speaker_name"><?php echo $post->post_title; ?></span>
                                        <span class="speaker_title"><?php echo $title; ?></span>
                                        <span class="speaker_excerpt"><?php echo $post->post_excerpt; ?></span>
                                        <span class="speaker_link"> 
                                                <a href="<?php echo get_permalink($post); ?>"> Ver perfil &gt; </a>
                                        </span>
                                </div>
                                </div>
                        </div>
                        <?php
                }
                ?>
                </ul>
                <?php
                }
                ?>

        </div>
        
        <?php
        if ($schedule_post->post_status == 'publish' || is_user_logged_in()) { ?>

        <div class="schedule_main">
                <a name="agenda"></a>

                <h1 class="schedule_title"><?php echo $schedule_post->post_title; ?> </h1>
                <div class="schedule_content"><?php echo $schedule_post->post_content; ?> </div>
        </div>
        
        <?php
        }
        ?>

        <div class="sponsors_main">
                <a name="patrocinios"></a>

                <h1 class="sponsors_title"><?php echo $sponsors_post->post_title; ?> </h1>
                <p class="sponsors_text"><?php echo $sponsors_post->post_content; ?> </p>
                <?php
                foreach ($sponsors_types as $sponsor_type => $sponsor_type_name) { 
                        if (count($sponsors_posts[$sponsor_type]) > 0) {  ?>

                        <div class="sponsors sponsors-<?php echo $sponsor_type; ?>"> 
                                <h2><?php echo $sponsor_type_name; ?></h2>
                                <ul class="sponsors sponsors-<?php echo $sponsor_type; ?>"> 
                                <?php
                                foreach ($sponsors_posts[$sponsor_type] as $post) {
                                        if (has_post_thumbnail($post->ID)) {
                                                $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
                                                <div class="sponsor sponsor-<?php echo $key; ?>" 
                                                        style="background-image: url('<?php echo $image[0]; ?>')">
                                                </div>
                                                <?php
                                        }
                                }
                                ?>
                                </ul>
                        </div>
                <?php
                        }
                }
                ?>
        </div>

        <script>
                document.getElementById('unete-al-cambio').style = `margin-top: ${(window.innerHeight / 2) - 220}px`;
                document.getElementById('separator').style = `height: ${(window.innerHeight / 2) - 270}px`;
        </script>
</div>

<?php
get_sidebar();
get_footer();
