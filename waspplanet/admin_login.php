<head>
<title>DOSIKA RISING STARS | WASP PLANET</title>
</head>
<link href="css/admin.css" rel="stylesheet" type="text/css" media="all" />

<hgroup>
  <h1>WASP ADMIN LOGIN</h1>
  <h3>By Dosika Rising Stars</h3>
</hgroup>
<form action="admin_login.php" method="post">
  <div class="group">
    <input name="username" type="text"><span class="highlight"></span><span class="bar"></span>
    <label>Username</label>
  </div>
  <div class="group">
    <input type="password" name="password"><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
  </div>
  <button type="submit" name="submit" class="button buttonBlue">Login
    <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
  </button>
</form>

<!--Processing Start-->
<?php
require('dbconn.php');
   if(isset($_POST['username'])&& isset($_POST['password'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
       if(!empty($username)&&!empty($password)){
        $query="SELECT * FROM `admin` WHERE `admin`='$username' AND `password`='$password'";
            if($query_run = mysql_query($query)){   // Run SQL query         
                $query_num_rows = mysql_num_rows($query_run); //Check the row data
                      if($query_num_rows == 0){ //The data is non-existent
                             echo "<p>Invalid username/password combination.!</p>";
                      }else if($query_num_rows == 1){ //Data exists
                          
                 $username = mysql_result($query_run, 0, 'username');
                 $u_id = mysql_result($query_run, 0, 'u_id');
                 $_SESSION['username']=$username;
                /* $_SESSION['u_id'] = $u_id;
                 $_COOKIE['u_id'] = $u_id;*/
                 Header('Location:r_payment.php');
            echo 'OK.';}
            }
       }
   }
   
?>


<!--Processing End-->




<footer><!--<a href="http://www.dosika.co.ke/waspplanet/" target="_blank"><img src="https://www.polymer-project.org/images/logos/p-logo.svg"></a>-->
  <p>You Gotta Love <a href="http://www.dosika.co.ke/waspplanet/" target="_blank">DOSIKA RISING STARS</a></p>
</footer>




<script>
$(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
  	$(this).removeClass('is-active');
  });

});
</script>