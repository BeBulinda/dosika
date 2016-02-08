<!DOCTYPE html>
<script type="text/javascript" src="../lib/ibox.js"></script>
<!--[if IE 7]>
<html class="ie ie7" lang="en-US" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7)]>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
<head>
 <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dosika Fun Club</title>
    
    <!--[if IE 7]>
    <link rel="stylesheet" href="/wp-content/themes/bd/css/ie7/ie7.css" type="text/css" media="all">
    <![endif]-->
    <script>document.createElement('header');document.createElement('nav');document.createElement('section');document.createElement('article');document.createElement('aside');document.createElement('footer');</script>
    <script src="js/modernizr.custom.js"></script>
<link rel="stylesheet" href="boot/css/bootstrap.css">
<link rel="stylesheet" href="boot/css/bootstrap-theme.css">
<link rel='stylesheet' id='contact-form-7-css'  href='css/styles.css' type='text/css' media='all' />
<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
<!--<link rel='stylesheet' id='jf-style-css'  href='css/style.css' type='text/css' media='all' />-->
<link rel='stylesheet' id='jf-global-css'  href='css/global.css' type='text/css' media='all' />
<link rel="stylesheet" href="css/style_1.css">
<link rel="stylesheet" href="css/camera.css">
<link rel="stylesheet" href="css/form.css">
<script type='text/javascript' src='js/jquery.js'></script>
<script type='text/javascript' src='js/jquery-migrate.min.js'></script>
<script src="js/superfish.js"></script>
<script src="js/forms.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/jquery.equalheights.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.ui.totop.js"></script>
<script src="js/tms-0.4.1.js"></script>
<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<style type="text/css">#nav{margin-right:100px}
.myButton {
	-moz-box-shadow: 17px 13px 25px -2px #8a2a21;
	-webkit-box-shadow: 17px 13px 25px -2px #8a2a21;
	box-shadow: 17px 13px 25px -2px #8a2a21;
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #c62d1f), color-stop(1, #f24437));
	background:-moz-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-webkit-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-o-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:-ms-linear-gradient(top, #c62d1f 5%, #f24437 100%);
	background:linear-gradient(to bottom, #c62d1f 5%, #f24437 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#c62d1f', endColorstr='#f24437',GradientType=0);
	background-color:#c62d1f;
	-moz-border-radius:14px;
	-webkit-border-radius:14px;
	border-radius:14px;
	display:inline-block;
	cursor:pointer;
	color:#ffffff;
	font-family:Arial;
	font-size:28px;
	font-weight:bold;
	padding:21px 76px;
	text-decoration:none;
	text-shadow:1px -2px 7px #810e05;
}
.myButton:hover {
	background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #f24437), color-stop(1, #c62d1f));
	background:-moz-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-webkit-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-o-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:-ms-linear-gradient(top, #f24437 5%, #c62d1f 100%);
	background:linear-gradient(to bottom, #f24437 5%, #c62d1f 100%);
	filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#f24437', endColorstr='#c62d1f',GradientType=0);
	background-color:#f24437;
}
.myButton:active {
	position:relative;
	top:1px;
}

</style>
</head>
<body>

<div id="page" class="site">
	<header id="header" class="page1">
           	
        <?php include('../menu.php'); ?>
	</header><!-- #header -->
    
    
    <div>
        <a href="sub.php" rel="ibox" title="Subscribe Here"><img style="margin-top: 68px; display: block; width: 100% !important;  margin-left: 0px; height: auto !important;" src="images/brain.jpg"/></a>
    </div>
    
    <div class="table_display">
    <!-- Table -->  
        

        
<?php 
error_reporting(0);
require_once ('../php/conn_x1.php');
$cont='';
$yest='20'.date('y-m-d', time() - 60 * 60 * 24);
$today='20'.date('y-m-d');
if($_POST['submit']){
	
	$_SESSION['e']=$_POST['date'];
}
?>
  <h3>DAILY STATISTICS</h3>
        <form  method="POST" class="form-inline" action="<?php $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">	
            <div class="form-group">
				<input type="submit" class="form-control" name="today" width="25" value="Today's Entries"/>&#124;
            </div>
            <div class="form-group">
                <input id="date" name="date" class="form-control" style="color: #000;" placeholder="CHOOSE DATE" type="text" size="15" <?php if(isset($_SESSION['e']))                       {?> value = "<?php echo $_SESSION['e'];?>" <?php } ?>/>
                    <a href="javascript:NewCal('date','mmddyyyy')">
                    <img src="images/Calendar.png" width="32" height="32" border="0" alt="Pick a date"></a>
            </div>
            <div class="form-group">
                <input type="submit" class="form-control" value="GO!">	
            </div>
            <div class="form-group">
                <input class="form-control" style="margin-left:0%; color: #000;" placeholder="FROM" id="from" name="from" type="text" size="15" <?php                                        if(isset($_SESSION[d])){?> value = "<?php echo $_SESSION[d];?>" <?php } ?>>
                    <a href="javascript:NewCal('from','mmddyyyy')"><!-- ddmmyyyy-->
                    <img src="images/Calendar.png" width="32" height="32" border="0" alt="Pick a date"></a>
            </div>
            <div class="form-group">
                <input class="form-control" id="to" name="to" style="color: #000;" placeholder="TO" type="text" size="15" <?php if(isset($_SESSION[e])){?> value = "<?php echo $_SESSION[e];?>" <?php } ?> style="color:red;">
                    <a href="javascript:NewCal('to','mmddyyyy')"><!-- ddmmyyyy-->
                    <img src="images/Calendar.png" width="32" height="32" border="0" alt="Pick a date"> </a>
            </div>
            <div class="form-group">
				<input class="form-control" type="submit" value="GO!" name="weekly">
            </div>
				
        </form>
        
        <br/>
        <br/>
      
<?php
    if(isset($_POST['today']) || isset($_POST['date']) || isset($_POST['from']) || isset($_POST['to']) || isset($_POST['weekly']) ){
        ?>
      <div class="information">
    
				<?php
				if($_POST['today'])
			   {			
				?>
				<h4>Top Participants <?php echo date('d-m-y'); ?></h4>
				<?php 
                    } 
                if($_POST['date'])
                {
                ?>
                <h4>Top Participants <?php  
                $date =$_POST['date'];
                echo date('d-m-20y',strtotime(str_replace('-', '/', $date)));?></h4>
                <?php 
                }
                if($_POST['weekly'])
                {
                ?>
                <h4>Participants Between
                <?php
                $f=$_POST['from'];
                $from=date('d-m-20y',strtotime(str_replace('-', '/', $f)));
                $t=$_POST['to'];
                $to=date('d-m-20y',strtotime(str_replace('-', '/', $t)));
                $today=date('d-m-20y');
                if($to!=$today)
                {
                echo ' '.$from.' '.'AND'.' '.$to;
                }
                else{
                echo ' '.$from.' '.'AND'.' '.date('d-m-20y', time() - 60 * 60 * 24).'<br>'.'(This list excludes todays participants)';
                }

                }
                ?></h4>
          <br/>
          <div style="overflow: scroll; overflow-x:hidden; height:300px; width: 700px;">
		   <table style="margin-left: 60px;" id="table" class="table table-striped">
			  <tr style="color:red"><th>Rank</th><th>Participant Phone Number</th><th>Score</th></tr>
			
			<?php
if(isset($_POST['today']))
{
$winnerQ=mssql_query("select TOP 100 u.numberr,COUNT(*) as count from d_questionsent d JOIN userr u on(d.user_id=u.id) and DATEADD(dd, 0, DATEDIFF(dd, 0, d.senttime)) = DATEADD(dd, 0, DATEDIFF(dd, 0,GETDATE()))and d.flag='1' and d.status='1'
group by u.numberr order by count desc");
}

if($_POST['date']!="")
{
$date =$_POST['date'];
$madate='20'.date('y-m-d',strtotime(str_replace('-', '/', $date)));
if($madate==$today)
{
$winnerQ=mssql_query("select TOP 100 u.numberr,COUNT(*) as count from d_questionsent d JOIN userr u on(d.user_id=u.id) AND d.senttime like '".$madate.'%'."' and d.flag='1' and d.status='1'
group by u.numberr order by count desc");
}
else
{
$winnerQ=mssql_query("select TOP 100 u.numberr,COUNT(*) as count from d_QuestionSentArchive d JOIN userr u on(d.user_id=u.id) AND d.senttime like '".$madate.'%'."' and d.flag='1'  and d.status='1'
group by u.numberr order by count desc");
}
}
if(isset($_POST['weekly']))
{
$f=$_POST['from'];
$from='20'.date('y-m-d',strtotime(str_replace('-', '/', $f))). ' 00:00:01';
$t=$_POST['to'];
$to='20'.date('y-m-d',strtotime(str_replace('-', '/', $t))). ' 23:59:59';
$winnerQ=mssql_query("select TOP 100 u.numberr,COUNT(*) as count from d_QuestionSentArchive d JOIN userr u on(d.user_id=u.id) 
AND d.senttime BETWEEN '".$from."' AND '".$to."' and d.flag='1' and d.status='1'  group by u.numberr order by count desc");

        }
			   $j=1;
			  while($row=mssql_fetch_array($winnerQ))
			  {
			  
			  $score=$row['count']*10;
			   $noz=$row['numberr'];
			   $no=substr($noz, -9);
			   $str='0'.$no;			       
                $str[2] = 'X';
                $str[3] = 'X';
                $str[4] = 'X';
                $str[5] = 'X';
                $str[6] = 'X';				
	          echo '<tr style="color:#000;">';
			  echo '<td>'.$j.'</td>';
			  echo '<td>'.$str.'</td>';
			  echo '<td>'.$score.'</td>';
			  echo '</tr>';
			  $j=$j+1;
			  }			  
			  ?>
			  
			  
			 
			  </table>
    </div>
</div>
     <?php   } ?>
<!-- Table -->

    </div>
    
    

    
    
		<footer id="footer">
        <a id="next-page" href="#"><span class="fa">&#xf107;</span></a>		<div class="bg-header">
            <a href="http://www.waspafrica.com" rel="home">
                <img width="200" src="images/logo.png" alt="Dosika" />
            </a>
		</div>
        <nav id="footer-nav">
            <div class="sep"></div>
            <ul id="menu-footer" class="menu"><li id="menu-item-347" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-347"><a href="www.dosika.co.ke">Home</a></li>
<li id="menu-item-348" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-348"><a href="www.dosika.co.ke/GiftShop">Gift Shop</a></li>
<li id="menu-item-349" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-349"><a href="www.dosika.co.ke/contact">Contact Us</a></li>
</ul>            <div class="sep"></div>
        </nav><!-- #footer-nav -->
       <ul class="footer social">
            <li><a target="_blank" href="https://www.facebook.com/Waspafrica" class="fa fb"><span>&#xf09a;</span></a>
			</li><li><a target="_blank" href="https://twitter.com/waspafrica" class="fa tw">&#xf099;</a></li>
			<li><a target="_blank" href="http://www.waspplanet.com/wap-fun/dosika" class="fa pt">&#xf0d2;</a></li>
			<li><a target="_blank" href="https://plus.google.com/100212337296371384451/videos" class="fa gp">&#xf0d5;</a>
			</li><li><a target="_blank" href="https://www.linkedin.com/company/wasp-africa" class="fa in">&#xf16d;</a></li>
        </ul>
        <div class="bd-footer">
		
		  This is a content subscription service. Cost: shs 10 for 1 SMS/Daily. This service is available for Safaricom and Airtel users only.To cancel the service: For Safaricom call *100# for Pre-Paid customers & *200# for Post Paid customers.For Airtel send STOP to 21208<span class="sep"></span>
          By subscribing to this service you agree 
		that you may receive free marketing promotion text messages from us. For help call us on 0727808265/6 (Safaricom) or 0733275203/206 (Airtel) or email us at wasp@waspafrica.com
<!--            <ul>-->
<!--                <li><a href="#privacy">Privacy Policy</a></li>-->
<!--                <li><a href="#faq">FAQ</a></li>-->
<!--            </ul>-->
        </div>
	</footer>

</div><!-- #page -->
<script type='text/javascript' src='js/jquery.form.min.js'></script>
<script type='text/javascript' src='js/scripts.js'></script>
<script type='text/javascript' src='js/forkit.min.js'></script>
<script type='text/javascript' src='js/production.min.js'></script>
<script src="js/modernizr.custom.js"></script>
<script language="javascript" type="text/javascript" src="js/datetimepicker.js"></script>
<script type="text/javascript" src="js/jquery.min.1.7.2.js"></script>
<script>
webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
</script>
</body>
</html>
	
