<footer class="site__footer">
    <h2 class="footer__titre">Navigation du site</h2>
    <?php 

    $icone = '<svg width="20px" height="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" color="#f00"><path fill-rule="evenodd" d="M10.293 15.707a1 1 0 010-1.414L14.586 10l-4.293-4.293a1 1 0 111.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path><path fill-rule="evenodd" d="M4.293 15.707a1 1 0 010-1.414L8.586 10 4.293 5.707a1 1 0 011.414-1.414l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
    wp_nav_menu(array(
                        "menu"=>"simple",
                        "container"=>"nav",
                        "container_class"=>"site__footer__menu",
                        "menu_class"=>"site__footer__menu__ul",

                        "link_before"=>$icone)); ?>
    <p class="footer__presentation">Copyright 2022 - College de Maisonneuve.</p> 
</footer>
<?php wp_footer(); ?>
</body>

</html>