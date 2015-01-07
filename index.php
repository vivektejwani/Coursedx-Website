<?php
	require 'mysql.inc.conn.php';
	session_start();
	unset($_SESSION['id']);
	unset($_SESSION['type']);
    $query1="SELECT `name` from 

`courses`";
    $query_result1=mysql_query($query1)
;
$query2="SELECT `fees` from 

`courses`";
    $query_result2=mysql_query($query2)
;
$query3="SELECT `duration` from `courses`";
    $query_result3=mysql_query($query3)
;
$query4="SELECT `discipline` from 

`courses`";
    $query_result4=mysql_query($query4)
;
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Coursedx, the free registration portal!</title>
<meta name="keywords" content="metro, free website template, beautiful grid, image grid menu, colorful theme" />
<meta name="description" content="Metro is a free website template by templatemo.com and it features jQuery horizontal scrolling among pages." />

	<link href="templatemo_style.css" type="text/css" rel="stylesheet" /> 
	<script type="text/javascript" src="js/jquery.min.js"></script> 
	<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script> 
	<script type="text/javascript" src="js/jquery.localscroll-min.js"></script> 
	<script type="text/javascript" src="js/init.js"></script> 
    
    <link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
    <script type="text/JavaScript" src="js/slimbox2.js"></script> 

</head> 
<body> 
<div id="templatemo_header">
    <div id="site_title">
      <h1>Coursedx</h1></div>
</div>
<div id="templatemo_main">
    <div id="content"> 
		<div id="home" class="section">
        	
			<div id="home_about" class="box">
           	  <h2>Welcome</h2>
                <p>Coursedx is a free online registration portal for students and teachers from various fields. It can be used for educational purposes. </p>
                <p>Coursedx helps students reach out to teachers and to register for courses that various teachers from different fields of study may want to offer. Teachers can also find this system useful as it helps them connect with students and helps maintain student records, and also to accept online payments for different courses that they may offer.</p>
            </div>
            
            <div id="home_gallery" class="box no_mr">
              <p><strong><a href="student_login.php" target="_parent" ><img src="images/student_login.jpg" width="266" height="129" /></a></strong></p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p><strong><a href="faculty_login.php" target="_parent" ><img src="images/faculty_login.png" /></a></strong></p>
          </div>
            <div class="box home_box1 color1">
            	<a href="#services"><img src="images/templatemo_services.jpg" alt="Services" /></a>
            </div>
            
            <div class="box home_box1 color2">
	            <a href="#testimonial"><img src="images/courses_link.jpg" alt="Courses" height="150" /></a>
            </div>
            
            <div class="box home_box2 color3">
            	<div id="social_links">
                    <a href="https://www.facebook.com/vivek.tejwani.5" target="_blank"><img src="images/facebook.png" alt="Facebook" /></a>
                    <a href="#"><img src="images/flickr.png" alt="Flickr" /></a>
                    <a href="https://www.twitter.com" target="_blank"><img src="images/twitter.png" alt="Twitter" /></a>
                    <a href="https://www.youtube.com" target="_blank"><img src="images/youtube.png" alt="Youtube" /></a>
                    <a href="#"><img src="images/vimeo.png" alt="Vimeo" /></a>
              <div class="clear h20"></div>
                    <h3>Social</h3>
              </div>	
            </div>
            
            <div class="box home_box1 color4 no_mr">
            	<a href="#contact"><img src="images/contact.jpg" alt="Contact" /></a>
            </div>
               
        </div> <!-- END of home -->
        
        <div class="section section_with_padding" id="services"> 
            <h2>Services</h2>
            <div class="img_border img_fl">
                <img src="images/yunolearning.jpg" alt="image" />	
            </div>
            <div class="half right">
                <ul class="list_bullet">
                    <li>Forms a medium to register students.</li>
                    <li>Faculty get an easy medium to collect payments.</li>
                    <li>Contains courses from diverse fields.</li>
                    <li>Easy system to view performance in courses.</li>
                 </ul>
            </div>
            <div class="clear h40"></div>
            <div class="img_border img_fr">
                <img src="images/templatemo_image_04.jpg" alt="image" />	
            </div>
			<div class="half left">                
            	<p><em>“Tell me and I forget, teach me and I may remember, involve me and I learn.” 
― Benjamin Franklin</em></p>
            	<p>Coursedx believes in doing away the nitty gritty of registration and payment for courses so as to enable the students and teachers to focus on the most important aspect <strong> LEARNING! </strong> </p>
            </div>

            <a href="#home" class="slider_nav_btn home_btn">home</a> 
            <a href="#home" class="slider_nav_btn previous_btn">Previous</a>
            <a href="#testimonial" class="slider_nav_btn next_btn">Next</a> 

        </div> 
        <div class="section section_with_padding" id="testimonial"> 
            <h2>Courses</h2>
            <p><em>Any student is a learner. Any learner is a teacher. Coursedx allows any person to teach courses!</em></p>
            <div class="clear h40"></div>
            <div class="clear h40"><strong>The courses offered are :</strong></div>
            <p><a href="#home" class="slider_nav_btn home_btn">home</a> 
              <a href="#services" class="slider_nav_btn previous_btn">Previous</a>
              <a href="#contact" class="slider_nav_btn next_btn">Next</a></p>
			<table width="802" height="160" border="1">
			<tr>
			<th width="244">Course</th>
			<th width="122">Fees</th>
            <th width="142">Duration</th>
            <th width="266">Discipline</th>
			</tr>
			<tr>
            <td><?php echo @mysql_result($query_result1,0,`name`);?></td>
            <td>Rs. <?php echo @mysql_result($query_result2,0,`fees`);?></td>
            <td><?php echo @mysql_result($query_result3,0,`duration`);?> weeks</td>
            <td><?php echo @mysql_result($query_result4,0,`discipline`);?></td>
            </tr>
            <tr>
            <td><?php echo @mysql_result($query_result1,1,`name`);?></td>
            <td>Rs. <?php echo @mysql_result($query_result2,1,`fees`);?></td>
            <td><?php echo @mysql_result($query_result3,1,`duration`);?> weeks</td>
            <td><?php echo @mysql_result($query_result4,1,`discipline`);?></td>
            </tr>
            <tr>
            <td><?php echo @mysql_result($query_result1,2,`name`);?></td>
            <td>Rs. <?php echo @mysql_result($query_result2,2,`fees`);?></td>
            <td><?php echo @mysql_result($query_result3,2,`duration`);?> weeks</td>
            <td><?php echo @mysql_result($query_result4,2,`discipline`);?></td>
            </tr>
            <tr>
            <td><?php echo @mysql_result($query_result1,3,`name`);?></td>
            <td>Rs. <?php echo @mysql_result($query_result2,3,`fees`);?></td>
            <td><?php echo @mysql_result($query_result3,3,`duration`);?> weeks</td>
            <td><?php echo @mysql_result($query_result4,3,`discipline`);?></td>
            </tr>
            <tr>
            <td><?php echo @mysql_result($query_result,4,`name`);?></td>
            <td>Rs. <?php echo @mysql_result($query_result,4,`fees`);?></td>
            <td><?php echo @mysql_result($query_result,4,`duration`);?> weeks</td>
            <td><?php echo @mysql_result($query_result,4,`discipline`);?></td>
            </tr>
            </table>
      </div> 
        <div class="section section_with_padding" id="contact"> 
            <h2>Contact</h2> 
            <div class="half left">
                <h4>Quick Contact Details :</h4>
                <p>&nbsp;</p>
                <p>Feel free to reach us at : </p>
                <p><strong>cs1100138@iiti.ac.in</strong></p>
                <p><strong>cs1100139@iiti.ac.in</strong>
                <div id="contact_form"></div>
          </div>
            
            <div class="half right">
                <h4>Mailing Address</h4>
                <p>RH- 18, Jal Enclave, Silver Springs Township, Agra Mumbai Bypass Road, Indore - 452001.<br />
                  <br />
                </p>
                <div class="clear h20"></div>
                <div class="img_nom img_border"><span></span>
                
                <iframe width="320" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?ie=UTF8&amp;q=Silver+Springs+Township&amp;fb=1&amp;gl=in&amp;hq=silver+springs+indore&amp;cid=0,0,12125291592854263742&amp;ll=22.658992,75.908085&amp;spn=0.006295,0.006295&amp;t=m&amp;output=embed"></iframe>
                
            </div>
			<a href="#home" class="slider_nav_btn home_btn">home</a> 
            <a href="#testimonial" class="slider_nav_btn previous_btn">Previous</a>
             
        </div> 
    </div> 
</div>
</div>
<div id="templatemo_footer">
    <a class="templatemo_footer_icon" href="http://jp.mystockphoto.com" title="MyStockPhoto"  target="_blank"><img src="images/templatemo_footer_icon.png" alt="MyStockPhoto from jp.mystockphoto.com" title="MyStockPhoto" /></a>Copyright © 2013 <strong>Coursedx.com</strong> by <a href="https://www.facebook.com/vivek.tejwani.5" rel="nofollow" target="_blank" title="free templates">Vivek</a> and <a href="https://www.facebook.com/VNVMG" rel="nofollow" target="_blank" title="free templates">Abhinav</a>
</div>

 
<script type='text/javascript' src='js/logging.js'></script>
</body>
</html>