<?php include('header.php'); ?>

<body>

    <?php include('menu.php'); ?>
    </div> <!-- END of header-->
    <?php include('slider.php'); ?>
    
    <div id="tooplate_main_top"></div>
    
<!-- Game Filter by phone manufaturer -->
    <script type="text/javascript" src="ibox/ibox.js"></script>
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
        </script>
        <?php include('../track/track.php'); ?>
        <?php include('dbconn.php'); ?>
        <p>Click <b>Game Title</b> to Find for your phone model</p>
        <div id="tooplate_main">
        <?php
            $filter = $_REQUEST['filter'];
            $display3 = "SELECT * FROM games WHERE phone = '$filter' GROUP BY g_name ORDER BY g_name ASC";
            $display3_proc = mysql_query($display3);
        ?>
    <td></td>
      <?php while ($row = mysql_fetch_assoc($display3_proc)) { ?>
    
        <div class="col one_third fp_services">
            <img src="images/game_icons/<?php echo $row['icon']; ?>" alt="<?php echo $row["g_name"]; ?>" />
            <h2><a href="dwnd.php?dwnd=<?php echo $row["phone"];?>&game=<?php echo $row["g_name"];?>"><?php echo $row["g_name"]; ?></a></h2>
            <p><?php echo '<span style="color:#FF4747">'.$row["platform"] .'</span>'; ?></p>
            <!--<div class="cleaner"></div>-->
        </div>
   <?php  } ?>

    <div class="cleaner divider"></div>
        
        <div class="cleaner"></div>
    </div> <!-- END of main -->


<!-- Game Filter by phone manufaturer end-->

  <?php include('footer.php'); ?>
</div> <!-- END of wrapper -->

</body>
</html>