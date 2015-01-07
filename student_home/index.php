<?php
	require '../mysql.inc.conn.php';
	session_start();
	$s_id=$_SESSION['id'];
	$query1="SELECT `c_id` from `student_course` where `s_id`='".$s_id."'";
	$query_result1=@mysql_query($query1);
	$query_num_rows1=@mysql_num_rows($query_result1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Homepage</title>
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
    	<div id="site_title"><?php echo 'Welcome Student Number : '.$s_id; ?></div>
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
                        	<h2><a href="#about">Courses Enrolled</a></h2>
                        	Courses you are taking currently. </div>
                    </div>
                    <div class="row1 box2">
                    	<div class="box_with_padding">
                        	<h2><a href="#services">Join Course</a></h2>
                        	Enroll for a new course.</div>
                    </div>
                    <div class="row1 box3">
                    	<div class="box_with_padding">
                        	<h2><a href="#testimonial">Send Request</a></h2>
                        	Allows you to send request to a faculty member.
                    	</div>
                    </div>
                    <div class="row1 box4">
                    	<div class="box_with_padding">
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
						
						if($query_num_rows1==0)
						{
						echo "NO COURSES BEING TAKEN!";
						}
						else
						{		
							while($row1 =mysql_fetch_row($query_result1))
	  {
			$query2="SELECT `name` from `courses` where `c_id`='".$row1[0]."'";
			$query_result2=@mysql_query($query2);
			$row2 =@mysql_fetch_row($query_result2);
			echo '<li>'.$row2[0].'<a href="drop_course.php/?name='.$row2[0].'">      Drop?</a></li>';
	  }
						}?></ul>
				</div>
                <a href="#home" class="home_btn">home</a> 
                <a href="#home" class="page_nav_btn previous">Previous</a>
                <a href="#services" class="page_nav_btn next">Next</a>
            </div> <!-- END of About -->
            
            <div class="section section_with_padding" id="services"> 
                <h1>Courses Available</h1>
                <div class="half left">
                	<p>&nbsp;</p>
                	<ul class="list_bullet">
                    <?php
						$query3="SELECT `name` from `courses` where `c_id` NOT IN (SELECT `c_id` from `student_course` where `s_id`='".$s_id."')";
						$query_result3=@mysql_query($query3);
						$query_num_rows3=@mysql_num_rows($query_result3);
						if($query_num_rows3==0)
						{
							echo 'You have enrolled for all the courses being offered!';
						}
						else
						{
							while($row3=@mysql_fetch_row($query_result3))
							{
								echo '<li><a href="join_course.php/?name='.$row3[0].'"</a>'.$row3[0].'</li>';
							}
						}
						?>
                    </ul>
                    
                </div>
                <div class="half right">
                    <div class="img_border img_nom"> <a href="#gallery"><img src="images/images.jpg" alt="image 1" width="306" height="195" /></a>	
                    </div>
                    
               	  <p>Enroll for courses keeping in mind your time constraints. After all, QUALITY OVER QUANTITY!<a href="http://jigsaw.w3.org/css-validator/check/referer" rel="nofollow"></a></p>
                </div>
                <a href="#home" class="home_btn">home</a> 
                <a href="#about" class="page_nav_btn previous">Previous</a>
                <a href="#gallery" class="page_nav_btn next">Next</a> 
            </div> <!-- END of Services -->
            
            <div class="section" id="gallery"> 
                <ul>
                    <li><a href="images/gallery/01-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/01.jpg" alt="image 1" /></a></li>
                    <li><a href="images/gallery/02-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/02.jpg" alt="image 2" /></a></li>
                    <li><a href="images/gallery/03-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/03.jpg" alt="image 3" /></a></li>
                    <li><a href="images/gallery/04-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/04.jpg" alt="image 4" /></a></li>
                    <li><a href="images/gallery/05-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/05.jpg" alt="image 5" /></a></li>
                    <li><a href="images/gallery/06-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/06.jpg" alt="image 6" /></a></li>
                    <li><a href="images/gallery/07-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/07.jpg" alt="image 7" /></a></li>
                    <li><a href="images/gallery/08-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/08.jpg" alt="image 8" /></a></li>
                    <li><a href="images/gallery/09-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/09.jpg" alt="image 9" /></a></li>
                    <li><a href="images/gallery/10-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/10.jpg" alt="image 10" /></a></li>
                    <li><a href="images/gallery/11-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/11.jpg" alt="image 11" /></a></li>
                    <li><a href="images/gallery/12-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/12.jpg" alt="image 12" /></a></li>
                    <li><a href="images/gallery/13-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/03.jpg" alt="image 13" /></a></li>
                    <li><a href="images/gallery/14-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/14.jpg" alt="image 14" /></a></li>
                    <li><a href="images/gallery/15-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/15.jpg" alt="image 15" /></a></li>
                    <li><a href="images/gallery/16-l.jpg" rel="lightbox[gallery]"><img src="images/gallery/16.jpg" alt="image 16" /></a></li>
                    
                </ul>
                <a href="#home" class="home_btn">home</a> 
                <a href="#services" class="page_nav_btn previous">Previous</a>
                <a href="#testimonial" class="page_nav_btn next">Next</a>		
            </div> <!-- END of Gallery -->
            
            <div class="section section_with_padding" id="testimonial"> 
               	<h1>Send Requests</h1>
           	  <p><form action="send_request.php" method="POST"><br>
Student ID :<br /> <label for="s_id"><?php echo $s_id ?></label><br/><br/>
Course Name : <br /><select name="course_request">
      <?php $query4="SELECT `c_id` from `student_course` where `s_id`='".$s_id."'";
	  		$query_result4=@mysql_query($query4);
			while($row4=@mysql_fetch_row($query_result4))
			{
				$query6="SELECT `name`,`c_id` from `courses` where `c_id`='".$row4[0]."'";
				$query_result6=@mysql_query($query6);
				$row6=@mysql_fetch_row($query_result6);
				echo '<option value="'.$row6[1].'">'.$row6[0].'</option>';
			}
			
		?>
</select>
<br /><br />
Faculty Name : <br /><select name="faculty_request">
      <?php
	  $query5="SELECT `c_id` from `student_course` where `s_id`='".$s_id."'";
	  
	  		$query_result5=@mysql_query($query5);
			while($row5=@mysql_fetch_row($query_result5))
			{
				$query7="SELECT `name`,`f_id` from `faculty` where `f_id`=(SELECT `f_id` from `courses` where `c_id`='".$row5[0]."')";
				$query_result7=@mysql_query($query7);
				$row7=@mysql_fetch_row($query_result7);
				echo '<option value="'.$row7[1].'">'.$row7[0].'</option>';
			}
	  
		?>
</select>
<br />
<br />
Request info : <input type="text" name="request_info" value=""><br><br>
<input type="submit" name="submit">
 </form></p>
              	
                
                <a href="#home" class="home_btn">home</a> 
                <a href="#gallery" class="page_nav_btn previous">Previous</a>
                <a href="#contact" class="page_nav_btn next">Next</a>
            </div> <!-- END of Testimonial -->
            
            <div class="section section_with_padding" id="contact"> 
                <h1>Contact</h1> 
                
                <div class="half left">
                    <h4>Mailing Address</h4>
                    220-440 Nullam lacus diam,<br />
                	Pulvinar sit amet convallis eget, 10220<br />
                	Lorem ipsum dolor<br /><br />
                 
                 	Email: info[at]company.com | Phone: 020-010-0101<br />

                    <div class="clear h20"></div>
                <div class="img_nom img_border"><span></span>
                    <iframe width="320" height="160" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=new+york+central+park&amp;aq=&amp;sll=37.0625,-95.677068&amp;sspn=60.158465,135.263672&amp;vpsrc=6&amp;ie=UTF8&amp;hq=&amp;hnear=Central+Park,+New+York&amp;t=m&amp;ll=40.769606,-73.973372&amp;spn=0.014284,0.033023&amp;z=14&amp;output=embed"></iframe>
                </div>
                
                <a href="#home" class="home_btn">home</a> 
                <a href="#testimonial" class="page_nav_btn previous">Previous</a>
                <a href="#home" class="page_nav_btn next">Next</a>
            	</div> <!-- END of Contact -->
                
                <div class="half right">
                    <h4>Quick Contact</h4>
                    <p>Nullam a tortor est, congue fermentum nisi. Maecenas nulla nulla, eu volutpat euismod, scelerisque ut dui.</p>
                    <div id="contact_form">
                        <form method="post" name="contact" action="#contact">
                            <div class="left">
                                <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field" />
                            </div>
                            <div class="right">                           
                                <label for="email">Email:</label> <input type="text" id="email" name="email" class="validate-email required input_field" />
                            </div>
                            <div class="clear"></div>
                            <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                            <input type="submit" class="submit_btn float_l" name="submit" id="submit" value="Send" />
                        </form>
                    </div>
                </div>
                
                
            
        </div> 
    </div>
</div>

<div id="templatemo_footer_wrapper">
	<div id="templatemo_footer">
    	<p>Copyright © 2013 <strong>Coursedx.com</strong> by <a href="https://www.facebook.com/vivek.tejwani.5" rel="nofollow" target="_blank" >Vivek</a> and<a href="https://www.facebook.com/VNVMG" rel="nofollow" target="_blank" > Abhinav</p>
    </div>
</div>

</div>

</body> 
</html>