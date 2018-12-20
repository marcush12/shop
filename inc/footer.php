<div class="footer">
      <div class="wrapper">
         <div class="section group">
                <div class="col_1_of_4 span_1_of_4">
                        <h4>Informação</h4>
                        <ul>
                        <li><a href="#">Sobre Nós</a></li>
                        <li><a href="#">Serviços ao cliente</a></li>
                        <li><a href="#"><span>Pesquisa Avançada</span></a></li>
                        <li><a href="#">Pedidos</a></li>
                        <li><a href="#"><span>Contato</span></a></li>
                        </ul>
                    </div>
                <div class="col_1_of_4 span_1_of_4">
                    <h4>Por que comprar aqui?</h4>
                        <ul>
                        <li><a href="about.php">Sobre Nós</a></li>
                        <li><a href="faq.php">Serviços ao cliente</a></li>
                        <li><a href="#">Política de Privacidade</a></li>
                        <li><a href="contact.php"><span>Mapa do Site</span></a></li>
                        <li><a href="preview.php"><span>Termos de Pesquisa</span></a></li>
                        </ul>
                </div>
                <div class="col_1_of_4 span_1_of_4">
                    <h4>Minha Conta</h4>
                        <ul>
                            <li><a href="contact.php">Entrar</a></li>
                            <li><a href="index.php">Ver Carrinho</a></li>
                            <li><a href="#">Wishlist</a></li>
                            <li><a href="#">Meus pedidos</a></li>
                            <li><a href="faq.php">Ajuda</a></li>
                        </ul>
                </div>
                <div class="col_1_of_4 span_1_of_4">
                    <h4>Contato</h4>
                        <ul>
                            <li><span>tonydevelopersolutions@gmail.com</span></li>
                            <li><span>tonydevelopersolutions.com</span></li>
                        </ul>
                        <div class="social-icons">
                            <h4>Siga-nos</h4>
                              <ul>
                                  <?php
                                   $brand = new Brand();
                                   $getsocial = $brand->getsocialById();
                                   if ($getsocial) {
                                    while ($result = $getsocial->fetch_assoc()) {
                                   ?>
                                  <li class="facebook"><a href="<?php echo $result['fb']; ?>" target="_blank"> </a></li>
                                  <li class="twitter"><a href="<?php echo $result['tw']; ?>" target="_blank"> </a></li>
                                  <li class="googleplus"><a href="<?php echo $result['gp']; ?>" target="_blank"> </a></li>
                                  <li class="contact"><a href="contact.php" target="_blank"> </a></li>
                                  <?php }} ?>
                                  <div class="clear"></div>
                             </ul>

                        </div>
                </div>
            </div>
            <div class="copy_right">
                <?php
                 $brand = new Brand();
                 $getcopy = $brand->getcopyById();
                 if ($getcopy) {
                  while ($result = $getcopy->fetch_assoc()) {
                ?>
                <p><?php echo $result['copyright']; ?></p>
                <?php }} ?>
           </div>
     </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            /*
            var defaults = {
                containerID: 'toTop', // fading element id
                containerHoverID: 'toTopHover', // fading element hover id
                scrollSpeed: 1200,
                easingType: 'linear'
            };
            */

            $().UItoTop({ easingType: 'easeOutQuart' });

        });
    </script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
    <link href="css/flexslider.css" rel='stylesheet' type='text/css' />
      <script defer src="js/jquery.flexslider.js"></script>
      <script type="text/javascript">
        $(function(){
          SyntaxHighlighter.all();
        });
        $(window).load(function(){
          $('.flexslider').flexslider({
            animation: "slide",
            start: function(slider){
              $('body').removeClass('loading');
            }
          });
        });
      </script>
</body>
</html>
