<?php
	session_start();
	$f_id=$_SESSION['id'];
	require 'mysql.inc.conn.php';
	if(isset($_POST['name'])&&isset($_POST['discipline'])&&isset($_POST['pre_requisites'])&&isset($_POST['fees'])&&isset($_POST['duration'])&&isset($_POST['start_date']))
	{
		$err_msg="";
		 $name=$_POST['name'];
		 $discipline=$_POST['discipline'];
		 $pre_requisites=$_POST['pre_requisites'];
		 $fees=$_POST['fees'];
		 $duration=$_POST['duration'];
		 $start_date=$_POST['start_date'];
		
		if(!empty($name)&&!empty($discipline)&&!empty($fees)&&!empty($duration)&&!empty($start_date)&&!empty($pre_requisites))
		{
			$start_date;
			$err_msg="";
			$query="SELECT `name` from `courses` where `name`='".$name."'";
			$query_result=mysql_query($query);
			$no_of_rows=mysql_num_rows($query_result);
			if($no_of_rows>=1)
			{
				$err_msg="The course name : ".$name." has already been taken!";
			}
			else
			{
				$err_msg="";
				$query="INSERT INTO `courses`(`name`, `fees`, `duration`, `discipline`, `f_id`, `pre-requisites`, `start_date`) VALUES ('".$name."','".$fees."','".$duration."','".$discipline."','".$f_id."','".$pre_requisites."','".$start_date."')";	
				$query_result=mysql_query($query);
				 $_SESSION['id']=$f_id;
				 $_SESSION['type']='f';
				header('Location: faculty_home/index.php');
			}
		}
		else
		{
			$err_msg="Please enter all the required fields!";
		}
	}
	else
	{
		$err_msg="Please enter all the required fields!";
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Simple Sign Up Form by PremiumFreeibes.eu</title>

	<!---------- CSS ------------>
	<link rel="stylesheet" type="text/css" href="./css/style_reg_page.css">

</head>

<body>

    <!--BEGIN #signup-form -->
    <div id="signup-form">
        
        <!--BEGIN #subscribe-inner -->
        <div id="signup-inner">
        
        	<div class="clearfix" id="header">
        	
        		<img id="signup-icon" src="./images/signup.png" alt="" />
        
                <h1>Create a new course on Coursedx!</h1>

            
            </div>
			<p>Please complete the fields below.</p>

            
            <form id="send" action="create_course.php" method="post">
            	
                <p>

                <label for="name">Course Name *</label>
                <input id="name" type="text" name="name" value="<?php if(isset($name)){
		  echo $name;
		  }?>" />
                </p>
                
                <p>
                <label for="f_id1">Faculty ID :</label>
                <label for="f_id2"><?php echo $f_id ?></label>
                </p>
                
                <p>

                <label for="discipline">Discipline *</label>
                <input id="discipline" type="text" name="discipline" value="<?php if(isset($discipline)){
		  echo $discipline;
		  }?>" />
                </p>
                
                <p>
                <label for="pre_requisites">Pre-Requisites *</label>
                <input id="pre_requisites" type="text" name="pre_requisites" value="<?php if(isset($pre_requisites)){
		  echo $pre_requisites;
		  }?>" />
                </p>
                
                <p>

                <label for="fees">Fees *</label>
                <input id="fees" type="number" name="fees" value="<?php if(isset($fees)){
		  echo $fees;
		  }?>" />
                </p>
                
                <p>
                <label for="duration">Duration *</label>
                <input id="duration" type="number" name="duration" value="<?php if(isset($duration)){
		  echo $duration;
		  }?>" />
                </p>
                <p>
                <label for="start_date">Start Date *</label>
                <input id="start_date" type="date" name="start_date" value="<?php if(isset($start_date)){
		  echo $start_date;
		  }?>" />
                </p>
                
                <p>

                <button id="submit" type="submit">Submit</button>
                </p>
                
            </form>
            
		<div id="required">
		<p>* Required Fields</p>
		</div>


            </div>
        
        <!--END #signup-inner -->
        </div>
        
    <!--END #signup-form -->   
    </div>

</body>
</html>
