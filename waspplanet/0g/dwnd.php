<?php include('header.php'); ?>

<body>

    <?php include('menu.php'); ?>
    </div> <!-- END of header-->
    <?php //include('slider.php'); ?>
    
    <div id="tooplate_main_top"></div>
    
<!-- Game Filter by phone manufaturer -->
   <!-- <script type="text/javascript" src="ibox/ibox.js"></script>
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
            $dwnd = $_REQUEST['dwnd'];
            $game = $_REQUEST['game'];
            $display3 = "SELECT * FROM games WHERE phone = '$dwnd' AND g_name = '$game' ORDER BY model_id ASC";
            $display3_proc = mysql_query($display3);

        ?>
    <td></td>
    <!--<td><a class='youtube' href="preview/<?php //echo $row["url"]; ?>">PREVIEW</a></td>-->
   <!-- <td><?php //echo $row["s_name"];?></td>
    <td><a class='youtube' href="m_input.php?url_i=<?php //echo $row["url"];?>">SUBSCRIBE</a></td>
    <td><a class='youtube' href="m_process.php?url_i=<?php //echo $row["url"];?>">DOWNLOAD</a></td>-->
      <?php while ($row = mysql_fetch_assoc($display3_proc)) { ?>
    
        <div class="col one_third fp_services">
            <img src="images/game_icons/<?php echo $row['icon']; ?>" alt="<?php echo $row["g_name"]; ?>" />
            <h2><a href="m_input.php?url_i=<?php echo $row["url"];?>" rel="ibox"><?php echo $row["g_name"]; ?></a></h2>
            <p><?php echo '<span style="color:#FF4747">'.$row["platform"] .'</span> | <span style="color:#009900">'. $row["phone"]. '</span> | <span style="color:#800000">'. $row["model_id"].'</span>'; ?></p>
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