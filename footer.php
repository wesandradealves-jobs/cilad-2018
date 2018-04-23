    </div>
    <footer id="footer">
        <div class="fluid-container">
            <div class="container">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <p class="copyright">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/css/img/copyright.png" alt="Colégio Ibero-Latino-Americano de Dermatología" />
                    </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <h3 class="brandico-instagram-filled">Instagram</h3>
                    <script src="//lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/8472565f677a56e993f59ff3d35c9560.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width: 100%; border: 0; overflow: hidden;"></iframe>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <h3 class="brandico-facebook-rect">Facebook</h3>
                    <div class="fb-page" data-href="https://www.facebook.com/ciladdermatologia" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/ciladdermatologia" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/ciladdermatologia">C.I.L.A.D.</a></blockquote></div>
                </div>
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-right">
                    <p>&#169; <?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> - desenvolvido por <a href="http://visanacomunicacao.com.br/" target="_blank" title="Visana Comunicação">Visana Comunicação</a></p>
                </div>
            </div>            
        </div>
    </footer>    
    <div id="fb-root"></div>
	<script>
	transformicons.add('.tcon')
	</script>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.9&appId=599384393561456";
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
    <?php wp_footer(); ?> 
</body>
</html>