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
            <p> 7 de junio de 2022<br/> 9:00 a 18:30 h</p>
            <p> <a href="https://www.fundacionibercaja.es/nuestros-espacios/campus-ibercaja" target="_blank">Monasterio Cogullada. Campus Ibercaja</a><br/> Carretera de Cogullada, 127, Zaragoza</p>
            <p> <a href="mailto:congreso.aragon.agilidad@gmail.com">congreso.aragon.agilidad@gmail.com</a></p>
        </div>
    
        <div class="footer-links">
            <div class="tickets">
                <a href="https://www.fundacionibercaja.es/zaragoza/caea-i-conferencia-de-agilidad-en-la-empresa-aragonesa" target="_blank">ENTRADAS</a><br/>
            </div>
            <div class=social>
                <a href="http://twitter.com/IAragon" target=_blank>
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/twitter.png" 
                         class="footer-image" />
                </a>
                <a href="https://www.linkedin.com/in/conferencia-agilidad-empresa-aragonesa/" target=_blank>
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/linkedin.png" 
                         class="footer-image" />
                </a>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>
