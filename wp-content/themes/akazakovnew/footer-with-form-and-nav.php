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
             <? if(!is_page(array(2,49,46,311))):?>
			 <? if(!is_attachment()){ ?>
          <div class="footer_navigation">
                <div class="footer_navigation_wrap">
                    <p class="bigP">Большее количество<br/> информации, о которой<br/>
                        я не пишу в блоге и не<br/> даю в видео, получают<br/>
                        мои читатели.</p>
                    <p>
                        Присоединяйтесь к 1200 читателей моего блога сейчас и <br/>
                        откройте для себя уже сегодня тот опыт, который я полу-<br/>
                        чил за десять лет в нише продаж товаров через интернет<span class="white_arrow"></span>
                    </p>
                    <div class="f-form foot-style">
                        <form method="post" action="https://app.getresponse.com/add_contact_webform_v2.html?u=BvAtt&webforms_id=2329806" target="_blank" name="SR_form_2_1" onsubmit="_gaq.push(['_trackEvent', 'ZapolnenyeFormy','Otpravka']);return true;">
                            <div class="name">
                                <input type="text" placeholder="ваше имя" name="webform[first_name]" class="sr-required">
                                <span class="icon_name"></span>
                            </div>
                            <div class="email">
                                <input type="text" placeholder="ваш e-mail" name="webform[email]">
                                <span class="icon_email"></span>
                            </div>
                            <input type="submit" class="submit" value="Присоединиться"/>
                        </form>
                    </div>
                </div>
            </div>
			<? }?>
             <? endif;?>
            <footer>
                    <?php wp_footer(); ?>
                    <div class = "camp-footer">
                        <div class="wrap-top-menu-head">
                            <div class = "head-title">
                                <a href = "<?php echo home_url(); ?>" style = "color:#<?php header_textcolor(); ?>"><span><?php bloginfo( 'name' ); ?></span></a>
                            </div>
                            <nav class = "site-navigation">
                                <?php wp_nav_menu( array( 'theme_location' => 'head' ) );?>
                            </nav>
                        </div>
                    </div> 
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