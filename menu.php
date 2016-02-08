<style>
    

.site-navigation {
    display: block;
    font-family: 'Titillium Web', sans-serif;
    font-size: 16px;
    font-weight: bold;
    margin: 0px;
}

.site-navigation ul {
  background: rgba(194, 10, 2, 0);
    list-style: none;
    margin: 0;
    padding-left: 0;
}

.site-navigation li {
    color: #fff;
    background: rgba(194, 10, 2, 0);
    display: block;
    float: left;
    margin: 0 2px 0 0;
    padding: 12px;
    position: relative;s
    text-decoration: none;
    text-transform: uppercase;
}
  
.site-navigation li a {
      color: #fff;
      text-decoration: none;
      display: block;
      background: rgb(198, 26, 26) none repeat scroll 0% 0%;
      padding: 5px;
      
}

.site-navigation li:hover {
    @include transition(background, 0.2s);
    background: rgba(194, 10, 2, 0);
    cursor: pointer;
}

.site-navigation ul li ul {
    background: rgba(194, 10, 2, 0);
    visibility: hidden;
    float: left;
    min-width: 150px;
    position: absolute;
    transition: visibility 0.65s ease-in;
    margin-top:12px;
    left: 0;
    z-index: 999;
}

.site-navigation ul li:hover > ul,
.site-navigation ul li ul:hover {
   visibility: visible;
}

.site-navigation ul li ul li {
    clear: both;
    padding: 0px 0px 0px 0px;
    width: 100%;
}

.site-navigation ul li ul li:hover {
    background: rgba(194, 10, 2, 0);
}
</style>
<div class="row header">
            


                <nav id="navigation" class="site-navigation" role="navigation">
                <h1><a href="http://www.waspafrica.com"><img src="images/logo.png" alt="Dosika Fun Club"></a></h1>
                  <ul class="menu">
                    <li class="menu-item"><a href="http://www.dosika.co.ke">Home</a></li>
                    <li class="menu-item"><a href="http://www.dosika.co.ke/waspplanet/0g/" target="_blank">HD Mobile Games</a></li>
                    <li class="menu-item"><a href="http://www.dosika.co.ke/about">About</a></li>
                    <li class="menu-item"><a href="http://www.dosika.co.ke/GiftShop/">Gift Shop</a></li>
                    <li class="menu-item"><a href="http://www.dosika.co.ke/braingame">Brain Game</a></li>
                    <li class="menu-item"><a href="http://www.dosika.co.ke/contact">Contact Us</a></li>
                    <li class="menu-item"><a href="http://www.dosika.co.ke/waspplanet/" target="_blank">Rising Stars <span class="arrow">&#9660;</span></a>
                      <ul class="dropdown">
                        <li class="menu-item sub-menu"><a href="http://www.dosika.co.ke/waspplanet/audio.php" target="_blank">Download Music</a></li>
                        <li class="menu-item sub-menu"><a href="http://www.dosika.co.ke/waspplanet/visual.php" target="_blank">Download Videos</a></li>
                        <li class="menu-item sub-menu"><a href="http://www.dosika.co.ke/waspplanet/login.php" target="_blank">Artist Login</a></li>
                        <li class="menu-item sub-menu"><a href="http://www.dosika.co.ke/waspplanet/reg_user.php" target="_blank">Artist Signup</a></li>
                      </ul>
                      </li>
                  </ul>

            <span id="m-nav-close" class="fa">&#xf057;</span>
            </nav><!-- #nav -->
                           <a class="forkit" data-text="Subscribe" data-text-detached="Sms Dosika to 21208"></a>
                
                        
		</div>