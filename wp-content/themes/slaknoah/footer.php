</main>

<footer id="contact">
    <div class="contact">
        <div class="footer-head row">
            <h2 class=""><?php the_field('contact_header', 'option'); ?></h2>
            <div class="header-after"></div>
            <p class="long-text"><?php the_field('contact_text'); ?></p>
        </div>

        <form action="#" class="contact-form js--contact-form">
            <div class="form-row">
                <input type="text" name="Name" placeholder="Name" data-validation="required" data-validation-error-msg="">
                <input type="email" name="email" placeholder="E-mail" data-validation="email" data-validation-error-msg="">
            </div>
            <textarea name="message" id="message" placeholder="Message"></textarea>
            <div class="contact-response">
                <p>Message goes here</p>
                <span class="btn-close js--contact-btn-close"><i class="icon ion-ios-close"></i></span>
            </div>
            <button type="submit" class="btn btn-full contact-submit">Submit</button>
        </form>

    </div>

    <div class="footer-bottom">
        <div class="row footer-bottom-container">
            <p class="copyright">Copyright &copy; Slaknoah 2018</p>
            <?php
                $fb_link = get_field('facebook_link', 'option');
                $ig_link = get_field('instagram_link', 'option');
                $twitter_link = get_field('twitter_link', 'option');
                $linkedin_link = get_field('linkedin_link', 'option');
            ?>
            <ul class="footer-social">
                <?php if (!empty($fb_link)): ?>
                    <li><a href="<?php echo $fb_link ?>"><i class="icon ion-logo-facebook"></i></a></li>
                <?php endif; ?>

                <?php if (!empty($ig_link)): ?>
                    <li><a href="<?php echo $ig_link ?>"><i class="icon ion-logo-instagram"></i></a></li>
                <?php endif; ?>

                <?php if (!empty($twitter_link)): ?>
                    <li><a href="<?php echo $twitter_link ?>"><i class="icon ion-logo-twitter"></i></a></li>
                <?php endif; ?>

                <?php if (!empty($linkedin_link)): ?>
                    <li><a href="<?php echo $linkedin_link ?>"><i class="icon ion-logo-linkedin"></i></a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>

</footer>

<script>
    var ajaxurl = '<?php echo site_url() ?>/wp-admin/admin-ajax.php';
</script>
<?php wp_footer() ?>
<script id="dsq-count-scr" src="//slaknoah.disqus.com/count.js" async></script>
</body>

</html>
