<?php
/**
 * The template for displaying the footer
 *
 * @subpackage Camp
 * @since Camp 1.0
 */
?>
            </main> <!-- .camp-main -->
            <? if (!is_page(array(316,2281))):?>
            <? if (is_home()):?>
            <div class="clear"></div>
            <div class="pre-footer">
                <?php
                      if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(1) ) : ?>
                <?php endif; ?>
            </div>
            <? endif;?>
             <div class="clear"></div>

            <footer>
                    <?php wp_footer(); ?>
                        <div class="post-footer">
                            <div class="post-footer-wrap">
                                <div class="left-post-footer">
                                    <div class="menu2_f">
                                        <?php wp_nav_menu( array( 'theme_location' => 'head2' ) );?>
                                    </div>
                                </div>
                                <div class="right-post-footer">
                                    2012-2020 Александр Казаков - о продажах
                                </div>
                            </div>
                        </div>
            </footer>
        </div> <!-- .camp-page -->
<?endif;?>
<script defer src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
    </body>
</html>