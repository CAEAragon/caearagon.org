<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<footer id="colophon" class="site-footer">
<img src="<?php echo get_template_directory_uri();?>/assets/images/footer.png" class="footer-image" />
    <div class=footer-content>

        <div class="footer-data">
            <p> <a href="mailto:congreso.aragon.agilidad@gmail.com">congreso.aragon.agilidad@gmail.com</a></p>
        </div>

        <div class="footer-links">
            <div class=social>
                <a href="http://twitter.com/iagilidad" target=_blank>
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/twitter.png" />
                </a>
                <a href="https://www.linkedin.com/in/conferencia-agilidad-empresa-aragonesa/" target=_blank>
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/linkedin.png" />
                </a>
                <a href="https://www.youtube.com/channel/UCZkVhc0TGy_mgFhIkel7Khw" target=_blank>
                    <img width="40px" src="<?php echo get_template_directory_uri();?>/assets/images/youtube.png" />
                </a>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
