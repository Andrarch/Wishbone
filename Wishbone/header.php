<?php
class header{
   
    public function getHeader(){
        
        echo "<div class=\"page-wrap\">
        <!-- header -->
        <header class=\"header\">
			<div class=\"container\">
				<div class=\"header__logo\">
					<a style=\"color: #f39c12; font-size: 25px; font-weight: 700;\" href=\"index.html\">WISHBONE</a>
				</div>
            
                <nav class=\"consult-nav\">
                    <!-- consult-menu -->
					<ul class=\"consult-menu\">
						<li><a href=\"userHome.php\">Home</a></li>
				        <li><a href=\"myNetwork.php\">My Network</a></li>
						<li><a href=\"profile.php\">My Profile</a>
						<li><a href=\"search.php\">Search</a>
						<li><a href=\"logout.php\">Log out</a>
					</ul>
					<!-- consult-menu -->
                    <div class=\"navbar-toggle\">
						<span></span><span></span><span></span>
					</div>
                </nav>
				<!-- End / consult-nav -->
            </div>
            
            
        </header>
            
            
    </div>";
    }
    
}
