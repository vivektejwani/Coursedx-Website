<?php
	require 'mysql.inc.conn.php';
	$err_msg="";
	session_start();
	if(isset($_POST['name'])&&isset($_POST['surname'])&&isset($_POST['login'])&&isset($_POST['password'])&&isset($_POST['re_password'])&&isset($_POST['email'])&&isset($_POST['account_no'])&&isset($_POST['account_bal'])&&isset($_POST['profile']))
	{
		$err_msg="";
		 $name=$_POST['name'];
		 $surname=$_POST['surname'];
		 $login=$_POST['login'];
		 $password=$_POST['password'];
		 $re_password=$_POST['re_password'];
		 $email=$_POST['email'];
		 $website=$_POST['website'];
		 $phone=$_POST['phone'];
		 $account_no=$_POST['account_no'];
		 $account_bal=$_POST['account_bal'];
		 $country=$_POST['country'];
		 $class_no=$_POST['class_no'];
		 $profile=$_POST['profile'];
		
		if(!empty($login)&&!empty($password)&&!empty($name)&&!empty($surname)&&!empty($account_no)&&!empty($account_bal)&&!empty($profile)&&!empty($re_password)&&!empty($email))
		{
			$err_msg="";
			$query="SELECT `login` from `faculty` where `login`='".$login."'";
			$query_result=mysql_query($query);
			$no_of_rows=mysql_num_rows($query_result);
			if($no_of_rows>=1)
			{
				$err_msg="The username : ".$login." has already been taken!";
			}
			else
			{
				if($password==$re_password)
				{
					$err_msg="";
					$password_hash=md5($password);
					$query="INSERT INTO `faculty`(`login`, `password`, `name`, `surname`, `email`, `website`, `phone`, `acc_no`, `acc_bal`, `country`, `class_no`, `profile`) VALUES ('".$login."','".$password_hash."','".$name."','".$surname."','".$email."','".$website."','".$phone."','".$account_no."','".$account_bal."','".$country."','".$class_no."','".$profile."')";	
					$query_result=mysql_query($query);
					$query="SELECT `f_id` from `faculty` where `login`='".$login."'";
					$query_result=mysql_query($query);
					$id=mysql_result($query_result,0,`f_id`);
					 $_SESSION['id']=$id;
					 $_SESSION['type']='f';
					header('Location: faculty_home/index.php');
				}
				else
				{	
					$err_msg="Password is not re-typed correctly!";
				}
			}
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
<title>Faculty Registration Form</title>

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
        
                <h1>Sign up to Coursedx.com <br/> 
                FREE !</h1>

            
            </div>
			<p>Please complete the fields below, the fields with asterisks are required.</p>
			<p><span style="text-align: center; font-size: 36px;"><strong style="font-size: 18px"><?php echo $err_msg; ?></strong></span></p>

            
            <form id="send" action="new_reg_faculty.php" method="post">
            	
                <p>

                <label for="name"> Name *</label>
                <input id="name" type="text" name="name" value="<?php if(isset($name)){
		  echo $name;
		  }?>" />
                </p>
                <p>

                <label for="surname"> Surname *</label>
                <input id="surname" type="text" name="surname" value="<?php if(isset($surname)){
		  echo $surname;
		  }?>" />
                </p>
                <p>
                <label for="login">Login ID *</label>
                <input id="login" type="text" name="login" value="<?php if(isset($login)){
		  echo $login;
		  }?>" maxlength="10"/>
                </p>
                <p>
                <label for="password">Password *</label>
                <input id="password" type="password" name="password" value=""/>
                </p>
                <p>
                <label for="re_password">Re-type Password *</label>
                <input id="re_password" type="password" name="re_password" value=""/>
                </p>
                
                <p>

                <label for="email">Email *</label>
                <input id="email" type="email" name="email" value="<?php if(isset($email)){
		  echo $email;
		  }?>" />
                </p>
                
                <p>
                <label for="website">Website</label>
                <input id="website" type="url" name="website" value="<?php if(isset($website)){
		  echo $website;
		  }
		  else
		  {
			  echo "http://";
		  }
		?>" />
                </p>
                
                <p>

                <label for="phone">Phone</label>
                <input id="phone" type="number" name="phone" value="<?php if(isset($phone)){
		  echo $phone;
		  }?>" />
                </p>
                <p>

                <label for="account_no">Account Number *</label>
                <input id="account_no" type="number" name="account_no" value="<?php if(isset($account_no)){
		  echo $account_no;
		  }?>" />
                </p>
                <p>

                <label for="account_bal">Account Balance *</label>
                <input id="account_bal" type="number" name="account_bal" value="<?php if(isset($account_bal)){
		  echo $account_bal;
		  }?>" />
                </p>
                
                <p>
                <label for="country">Country</label>
                <input id="Country" type="text" name="country" value="<?php if(isset($country)){
		  echo $country;
		  }?>" />
                </p>
                <p>
                <label for="class_no">Classroom Number </label>
                <input id="class_no" type="text" name="class_no" value="<?php if(isset($class_no)){
		  echo $class_no;
		  }?>" />
                </p>
                
              <p>
                <label for="profile">Tell us about yourself *</label>
                <textarea name="profile" id="profile" cols="30" rows="10" maxlength="300" value=""></textarea>

                </p>
                
                <p>

                <button id="submit" type="submit">Submit</button>
                </p>
                
            </form>
            
		<div id="required"></div>


            </div>
        
        <!--END #signup-inner -->
        </div>
        
    <!--END #signup-form -->   
    </div>

</body>
</html>
