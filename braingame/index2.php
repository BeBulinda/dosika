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
<!DOCTYPE html>
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

<!-- From -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<style type="text/css">
.form-style-8{
    font-family: 'Open Sans Condensed', arial, sans;
    width: 500px;
    padding: 30px;
    background: #FFFFFF;
    margin: 50px auto;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -moz-box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.22);
    -webkit-box-shadow:  0px 0px 15px rgba(0, 0, 0, 0.22);

}
.form-style-8 h2{
    background: #4D4D4D;
    text-transform: uppercase;
    font-family: 'Open Sans Condensed', sans-serif;
    color: #797979;
    font-size: 18px;
    font-weight: 100;
    padding: 20px;
    margin: -30px -30px 30px -30px;
}
    
input[type="text"],input[type="password"],input[type="date"], input[type="number"]{
    height: 25px;
    width: 200px;
    border: none;
    background-color: #fff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -o-border-radius: 4px;
    border-radius: 4px;
    -webkit-box-shadow: 0 0 12px rgba(51, 204, 255, 0.5);
    -moz-box-shadow: 0 0 12px rgba(1, 204, 255, 0.5);
    -chrome-box-shadow: 0 0 12px rgba(51, 204, 255, 0.5);
    box-shadow: 0 0 12px rgba(51, 204, 255, 0.5);
    clear: both;
    margin-top: 8px;}
    
.form-style-8 input[type="text"],
.form-style-8 input[type="date"],
.form-style-8 input[type="datetime"],
.form-style-8 input[type="email"],
.form-style-8 input[type="number"],
.form-style-8 input[type="search"],
.form-style-8 input[type="time"],
.form-style-8 input[type="url"],
.form-style-8 input[type="password"],
.form-style-8 textarea,
.form-style-8 select
{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    outline: none;
    //display: block;
    width: 100%;
    padding: 7px;
    border: none;
    border-bottom: 1px solid #ddd;
    background: transparent;
    margin-bottom: 10px;
    font: 16px Arial, Helvetica, sans-serif;
    height: 45px;
    color: #000;
}
.form-style-8 textarea{
    resize:none;
    overflow: hidden;
}
input[type="button"],
input[type="submit"]{
    -moz-box-shadow: inset 0px 1px 0px 0px #45D6D6;
    -webkit-box-shadow: inset 0px 1px 0px 0px #45D6D6;
    box-shadow: inset 0px 1px 0px 0px #45D6D6;
    background-color: #2CBBBB;
    border: 1px solid #27A0A0;
    display: inline-block;
    cursor: pointer;
    color: #FFFFFF;
    font-family: 'Open Sans Condensed', sans-serif;
    font-size: 14px;
    padding: 8px 18px;
    text-decoration: none;
    text-transform: uppercase;
}
input[type="button"]:hover,
input[type="submit"]:hover {
    background:linear-gradient(to bottom, #34CACA 5%, #30C9C9 100%);
    background-color:#34CACA;
}
</style>
<script type="text/javascript">
//auto expand textarea
function adjust_textarea(h) {
    h.style.height = "20px";
    h.style.height = (h.scrollHeight)+"px";
}
</script>
<!-- Form -->
    
    <script>document.createElement('header');document.createElement('nav');document.createElement('section');document.createElement('article');document.createElement('aside');document.createElement('footer');</script>
    <script src="js/modernizr.custom.js"></script>
 <script language="javascript" type="text/javascript" src="js/datetimepicker.js"></script>
  <script type="text/javascript" src="js/jquery.min.1.7.2.js"></script>
<script>
    webshims.setOptions('forms-ext', {types: 'date'});
webshims.polyfill('forms forms-ext');
</script>
<link rel='stylesheet' id='contact-form-7-css'  href='css/styles.css' type='text/css' media='all' />
<link rel='stylesheet' id='jf-style-css'  href='css/style.css' type='text/css' media='all' />
<link rel='stylesheet' id='jf-global-css'  href='css/global.css' type='text/css' media='all' />
<link type="text/css" rel="stylesheet" href="css/font-awesome.min.css">
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
<style type="text/css">
#left { float:left }
#right { float:right }
.div1 {
    height:430px;
    width: 900px;
    font-size: 20px;
    font-style:normal;
	font-family:verdana;
    text-align: center;
    margin-top: 50px;
    margin-left: 5%;
    overflow: auto;
}
.div2{
    height:50px;
    width: 700px;
    font-size: 14px;
    font-style:normal;
	font-family:verdana;
    text-align: center;
    margin-top: 10px;
    margin-left:10%;
	style="overflow: auto;"
}
table a:link {
	color: #666;
	font-weight: bold;
	text-decoration:none;
}
table a:visited {
	color: #999999;
	font-weight:bold;
	text-decoration:none;
}
table a:active,
table a:hover {
	color: #bd5a35;
	text-decoration:underline;
}
table {
 width:100%;
	font-family:Arial, Helvetica, sans-serif;
	color:#666;
	font-size:12px;
	text-shadow: 1px 1px 0px #fff;
	background:#eaebec;
	margin:20px;
	border:#ccc 1px solid;

	-moz-border-radius:3px;
	-webkit-border-radius:3px;
	border-radius:3px;

	-moz-box-shadow: 0 1px 2px #d1d1d1;
	-webkit-box-shadow: 0 1px 2px #d1d1d1;
	box-shadow: 0 1px 2px #d1d1d1;
}
table th {
	padding:21px 25px 22px 25px;
	border-top:1px solid #fafafa;
	border-bottom:1px solid #e0e0e0;

	background: #ededed;
	background: -webkit-gradient(linear, left top, left bottom, from(#ededed), to(#ebebeb));
	background: -moz-linear-gradient(top,  #ededed,  #ebebeb);
}
table th:first-child {
	text-align: left;
	padding-left:20px;
}
table tr:first-child th:first-child {
	-moz-border-radius-topleft:3px;
	-webkit-border-top-left-radius:3px;
	border-top-left-radius:3px;
}
table tr:first-child th:last-child {
	-moz-border-radius-topright:3px;
	-webkit-border-top-right-radius:3px;
	border-top-right-radius:3px;
}
table tr {
	text-align: center;
	padding-left:20px;
}
table td:first-child {
	text-align: left;
	padding-left:20px;
	border-left: 0;
}
table td {
	padding:18px;
	border-top: 1px solid #ffffff;
	border-bottom:1px solid #e0e0e0;
	border-left: 1px solid #e0e0e0;

	background: #fafafa;
	background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
	background: -moz-linear-gradient(top,  #fbfbfb,  #fafafa);
}
table tr.even td {
	background: #f6f6f6;
	background: -webkit-gradient(linear, left top, left bottom, from(#f8f8f8), to(#f6f6f6));
	background: -moz-linear-gradient(top,  #f8f8f8,  #f6f6f6);
}
table tr:last-child td {
	border-bottom:0;
}
table tr:last-child td:first-child {
	-moz-border-radius-bottomleft:3px;
	-webkit-border-bottom-left-radius:3px;
	border-bottom-left-radius:3px;
}
table tr:last-child td:last-child {
	-moz-border-radius-bottomright:3px;
	-webkit-border-bottom-right-radius:3px;
	border-bottom-right-radius:3px;
}
table tr:hover td {
	background: #f2f2f2;
	background: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#f0f0f0));
	background: -moz-linear-gradient(top,  #f2f2f2,  #f0f0f0);	
}


		</style>
</head>
<body class="page page-id-6 page-template page-template-page-templatescontact-php" data-controller="contact">

<div id="page" class="site">
		<header id="header" class="page1">
        <div class="row header">
             <h1><a href="#"><img style="margin-left: -40px;" src="images/logo.png" alt="Dosika Fun Club"></a></h1>
	
            <nav id="nav" class="main-navigation" role="navigation">
                <ul id="menu-main" class="menu">
<li  id="menu-item-15" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-15"><a href="http://www.dosika.co.ke/"  >Home</a></li>

<li id="menu-item-16" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-16"><a href="http://www.dosika.co.ke/about">About</a></li>
<li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="http://www.dosika.co.ke/portifolio">Gallery</a></li>
<!--<li id="menu-item-18" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-18"><a href="http://www.dosika.co.ke/GiftShop" target="blank">Gift Shop</a></li>-->
<li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="http://www.dosika.co.ke/braingame">Brain Game</a></li>
<li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19"><a href="http://www.dosika.co.ke/contact" class="active">Contact Us</a></li>
<li id="menu-item-19" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-19"><a href="http://www.dosika.co.ke/waspplanet/">Rising Stars</a></li>
</ul>                 <span id="m-nav-close" class="fa">&#xf057;</span>
            </nav><!-- #nav -->
                           <a class="forkit" data-text="Subscribe" data-text-detached="Sms Dosika to 21208"></a>
                
                        <a id="m-nav" href="#">Menu <span class="fa">&#xf039;</span></a>
          <div class="clear"></div>
		</div>
	</header><!-- #header -->

    <div id="page1" class="content">
  
    <div id="main" style="width:80%; margin-left: 20em;">
	    <div style="float: left;">
            Pic
        </div>
        <div style="float: left;">
            Info
        </div>

	</div><!-- #content -->
        <div class="clear"></div>
	<footer id="footer">
        <a id="next-page" href="#"><span class="fa">&#xf107;</span></a>		<div class="bg-header">
            <a href="http://www.waspafrica.com" rel="home">
                <img src="images/logo.png" alt="Dosika" />
            </a>
		</div>
        <nav id="footer-nav">
            <div class="sep"></div>
            <ul id="menu-footer" class="menu"><li id="menu-item-347" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-347"><a href="http://www.dosika.co.ke/about">About Dosika</a></li>
<li id="menu-item-348" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-348"><a href="http://www.dosika.co.ke/GiftShop" target="blank">Gift Shop</a></li>
<li id="menu-item-349" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-349"><a href="#">Contact Us</a></li>
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
		 <span class="sep"> This is a content subscription service. Cost: shs 10 for 1 SMS/Daily. This service is available for Safaricom and Airtel users only.To cancel the service: For Safaricom call *100# for Pre-Paid customers & *200# for Post Paid customers.For Airtel send STOP to 21208 <br/>
            By subscribing to this service you agree 
		that you may receive free marketing promotion text messages from us. For help call us on 0727808265/6 (Safaricom) or 0733275203/206 (Airtel) or email us at wasp@waspafrica.com</span>
           
<!--            <ul>-->
<!--                <li><a href="#privacy">Privacy Policy</a></li>-->
<!--                <li><a href="#faq">FAQ</a></li>-->
<!--            </ul>-->
        </div>
	</footer>

</div><!-- #page -->
<script type='text/javascript'>
/* <![CDATA[ */
var _wpcf7 = {"loaderUrl":"http:\/\/www.bigdropinc.com\/wp-content\/plugins\/contact-form-7\/images\/ajax-loader.gif","sending":"Sending ..."};
/* ]]> */
</script>
<script type='text/javascript' src='js/jquery.form.min.js'></script>
<script type='text/javascript' src='js/scripts.js'></script>
<script type='text/javascript' src='js/forkit.min.js'></script>

<script type='text/javascript' src='js/production.min.js'></script>

</body>
</html>
