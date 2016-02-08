<!--<script type="text/javascript" src="ibox/ibox.js"></script>
        <script>
            // Example 1: From an element in DOM
        $('.open-popup-link').magnificPopup({
          type:'inline',
          midClick: true // allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source.
        });

        // Example: 2 Dynamically created
        $('button').magnificPopup({
          items: {
              src: '<div class="white-popup">Dynamically created popup</div>',
              type: 'inline'
          },
          closeBtnInside: true
        });
</script>-->
       
       
       
       
        <?php include('../track/track.php'); ?>
        <?php include('dbconn.php'); ?>
        <div id="tooplate_main">
            <?php
            $display3 = "SELECT * FROM games WHERE platform = 'ANDROID' ORDER BY g_name ASC";
            $display3_proc = mysql_query($display3);

        ?>
    <td></td>
  
      <?php while ($row = mysql_fetch_assoc($display3_proc)) { ?>
    
        <div class="col one_third fp_services">
            <img src="images/game_icons/<?php echo $row['icon']; ?>" alt="<?php echo $row["g_name"]; ?>" />
            <h2><a href="m_input.php?url_i=<?php echo $row["url"];?>" rel="ibox"><?php echo $row["g_name"]; ?></a></h2>
            <p><?php echo $row["platform"]; ?></p>
            <div class="cleaner"></div>
        </div>
   <?php  } ?>


    
		
        <div class="cleaner divider"></div>
        
       <!-- <div class="col one_fourth fp_post">
        	<h2><a href="#">HTML CSS Coding</a></h2>
        	<a href="#"><img src="images/tooplate_image_01.jpg" alt="Image 01" /></a>
            <p>Premium is a free website template for everyone. You may edit and apply this template for any purpose. Please tell your friends about <a href="#">tooplate</a> website.</p>
        </div>
        <div class="col one_fourth fp_post">
        	<h2><a href="#">Logo Design</a></h2>
        	<a href="#"><img src="images/tooplate_image_02.jpg" alt="Image 02" /></a>
            <p>Mauris ac elit urna. Praesent faucibus tellus eget quam vulputate, id euismod lectus malesuada. Nunc sit amet risus tortor. Fusce rutrum eget.</p>
        </div>
        <div class="col one_fourth fp_post">
        	<h2><a href="#">Web Blog Posts</a></h2>
        	<a href="#"><img src="images/tooplate_image_03.jpg" alt="Image 03" /></a>
            <p>Cras viverra, mi id placerat suscipit, ante est ullamcorper metus. Ut commodo tortor ut lacus  pharetra. Donec eget felis vel tortor varius a id est.</p>
        </div>
        <div class="col one_fourth fp_post no_margin_right">
        	<h2><a href="#">Online Marketing</a></h2>
        	<a href="#"><img src="images/tooplate_image_04.jpg" alt="Image 04" /></a>
            <p>Validate <a href="http://validator.w3.org/check?uri=referer" rel="nofollow"><strong>XHTML</strong></a> and <a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"><strong>CSS</strong></a>. Sed ac lacus a risus tristique vulputate sed in turpis. Donec tincidunt mi ac elit interdum non congue turpis volutpat.</p>
        </div>-->
        
        <div class="cleaner"></div>
    </div> <!-- END of main -->





















