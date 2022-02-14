 <?php
     /**
      *  Template pour afficher le footer
      */
 ?>

 <footer class="site__footer">

     <div class="site__info">
       
         <section class="site__info__adresse">
             <p>3 800, rue Sherbrook Est Montréal</p>
             <p>(Québec) H1x 2A2</p>
             <p>514-254-7131</p>
             <p>Lorem ipsum dolor sit</p>
             <p>Lorem ipsum dolor sit</p>
             <p>Lorem ipsum dolor sit</p>      
         </section>

         <?php wp_nav_menu(array("menu" => "footer", "container" => "nav")); ?>

         <section class="site__info__nouvelle">
             <p>Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur Lorem ipsum dolor sit amet consectetur</p>
         </section>
     </div>    
    <section class="site__info2__droit">
        <p>Copyright 2022 - College de Maisonneuve.</p>
    </section> 
     <?php wp_footer(); ?>
</body>
</html>




















 </footer>