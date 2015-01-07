<?php
	require '../mysql.inc.conn.php';
	session_start();
	$f_id=$_SESSION['id'];
	$query="SELECT `name` from courses where `f_id`='".$f_id."'";
	$query_result=@mysql_query($query);
	
	$query_num_rows=@mysql_num_rows($query_result);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Faculty Homepage</title>
<meta name="keywords" content="tech layer, free template, one page layout" />
<meta name="description" content="Tech Layer is free one-page template layout by templatemo.com using colorful navigations and darkgray background." />
<link href="templatemo_style.css" type="text/css" rel="stylesheet" /> 
<script type="text/javascript" src="js/jquery.min.js"></script> 
<script type="text/javascript" src="js/jquery.scrollTo-min.js"></script> 
<script type="text/javascript" src="js/jquery.localscroll-min.js"></script> 
<script type="text/javascript" src="js/init.js"></script>  
<link rel="stylesheet" href="css/slimbox2.css" type="text/css" media="screen" /> 
<script type="text/JavaScript" src="js/slimbox2.js"></script> 
<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head> 
<body> 

<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
   	  <div id="site_title"><?php echo 'Welcome Faculty Number : '.$f_id; ?></div>
        <a class="templatemo_header_bg" href="http://cn.mystockphoto.com" title="Stockphoto" rel="nofollow" target="_blank"><img src="images/header.png" alt="Stockphoto"  /></a>
    </div>
</div>

<div id="templatemo_main_wrapper">
	<div id="templatemo_main">
		<div id="content"> 
            <div id="home" class="section">
                <div class="home_box left">
                	<div class="row1 box box1">
                    	<div class="box_with_padding">
                        	<h2><a href="#about">Courses</a></h2>
                        	Courses you are teaching currently. </div>
                    </div>
                    <div class="row1 box2">
                    	<div class="box_with_padding">
                        	<h2><a href="../create_course.php">Create Course</a></h2>
                        	Create a new course.</div>
                    </div>
                    <div class="row1 box3">
                    	<div class="box_with_padding">
                        	<h2><a href="requests.php">Student Requests</a></h2>
                        	This contains joining requests from students.
                    	</div>
                    </div>
                    
                  <div class="row1 box4"><div class="box_with_padding">
                        	<h2>&nbsp;</h2>
                  </div>
                  </div>
                </div>
 				<div class="home_box right">
                	<div class="row1 box5">
                    	<div class="box_with_padding">
                        	<h5><a href="../index.php">Logout</a></h5>
                    	</div>
                    </div>
                    <div class="row2" id="home_gallery">
                    	<a href="images/gallery/01-l.jpg" rel="lightbox[home_gallery]" class="left"><img src="images/gallery/01.jpg" alt="image 1" /></a>
                        <a href="images/gallery/02-l.jpg" rel="lightbox[home_gallery]" class="left"><img src="images/gallery/02.jpg" alt="image 2" /></a>
                        <a href="images/gallery/03-l.jpg" rel="lightbox[home_gallery]" class="left"><img src="images/gallery/03.jpg" alt="image 3" /></a>
                        <a href="images/gallery/04-l.jpg" rel="lightbox[home_gallery]" class="left"><img src="images/gallery/04.jpg" alt="image 4" /></a>
					</div>
                    <div class="row1 box6">
                        <div id="mini_contact_form">
                        	<h5>&nbsp;</h5>
                            <form method="post" name="contact" action="#">
                            	<div class="col_half left"></div>                                
                            	<div class="col_half right"></div>                                
                            </form>
                            <div class="clear"></div>
                        </div>
                        
                    </div>
                </div>
            </div> <!-- END of Home -->
            
            <div class="section section_with_padding" id="about"> 
                <h1>Courses</h1>
                <div class="half left">
                    <div class="img_border img_fl"> <a href="#gallery"><img src="images/templatemo_image_02.jpg" alt="image 2" /></a>	
                  </div>
                    <p>&quot;Intelligence plus character-that is the goal of true education.&rdquo; <br />
― Martin Luther King Jr.</p>
                    <p>&ldquo;Prejudices, it is well known, are most difficult to eradicate from the heart whose soil has never been loosened or fertilised by education: they grow there, firm as weeds among stones.&rdquo; </p>
				</div>
                <div class="half right">
                     <ul >
                        <?php 
						if($query_num_rows==0)
						{
						echo "NO COURSES BEING TAUGHT!";
						}
						else
						{		
							for ($x=0; $x<$query_num_rows; $x++)
	  {
			$course_name=mysql_result($query_result,$x,`name`);
			echo '<li><a href="courses.php/?name='.$course_name.'">'.$course_name.'</a></li>';
	  }
						}?></ul>
				</div>
                <a href="#home" class="home_btn">home</a> 
            <a href="#home" class="page_nav_btn previous">Previous</a></div> <!-- END of About --><!-- END of Services --><!-- END of Gallery --><!-- END of Testimonial --></div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
    	<p>Copyright © 2013 <strong>Coursedx.com</strong> by <a href="https://www.facebook.com/vivek.tejwani.5" rel="nofollow" target="_blank" title="free templates">Vivek</a> and <a href="https://www.facebook.com/VNVMG" rel="nofollow" target="_blank" title="free templates">Abhinav</p>
    </div>
</div>

</div>

</body> 
</html>