<!DOCTYPE html>
<?php require_once('../../loggia_includes/db_connection.php'); ?>
<?php require_once('../../loggia_includes/validation_functions.php'); ?>
<?php 
  $code = 3;
if(isset($_POST['submit'])){
  $required_fields = array("email");
  $required_lengths = array("email" => 60);
  
  validate_max_lengths($required_lengths);
  validate_presences($required_fields);

  if(empty($errors)){
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	  
	$request_query  = "INSERT INTO emails (";
		$request_query .= "email";
		$request_query .= ") VALUES (";
		$request_query .= "'{$email}')";	

	//submit the query 
	$result = mysqli_query($connection, $request_query);
	
	if($result){
		$code = 1;
	}else{
                $code = 0;
        }
  }else{
    $code = 0;
  }
}
?>
<html>
<head lang="en">
<title>Beeschool.io</title>
<meta charset="UTF-8">
     <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>


<p class="logo">
	 <img src="12.png" /> 
	
</p>

<h1 class="main_text">Stay in the Loop</h1>
<p class="secondary_text">Bee School powers codemoji.com</p>

<p class="little_text">Sign up for our mailing list and stay updated with our progress on Bee School!</p>

<?php if($code == 1){ ?>
	<div class="message_box message_success">
	  <p>You have successfully signed up!</p>
	</div>
<?php }elseif($code==0){ ?>
	<div class="message_box message_failure">
	  <p>An error occurred with your submission! Try again.</p>
	</div>
<?php } ?>

<?php if($code != 1){ ?>
<div id="form">
	<form action="index.php" method="POST">
		<input id="email" name="email" type="email" placeholder="Email" required />
		
		<input type="submit" name="submit" value="SIGN UP">
	</form>
</div>
<?php } ?>


<div class="container">
    <h1>Bee School</h1>
    <div class="row">
        <div class="col-md-3 col-sm-6 ">
            <div class="service-box">
                <div class="service-icon yellow">
                    <div class="front-content">
                        <i class="fa fa-trophy"></i>
                        <h3>Blink</h3>
                    </div>
                </div>
                <div class="service-content">
                    <h3>Blink</h3>
                    <p>More information coming soon on our top sercet blink project.</p>
                </div>
            </div>
        </div>
        <a href="https://www.codemoji.com"><div class="col-md-3 col-sm-6 ">
            <div class="service-box">
                <div class="service-icon orange">
                    <div class="front-content">
                        <i class="fa fa-anchor"></i>
                        <h3>Codemoji</h3>
                    </div>
                </div>
                <div class="service-content">
                    <h3>Codemoji.com</h3>
                    <p>Codemoji's unique approach to teaching programming ensures that the user has fun while learning basic coding skills applicable to all areas of STEM.</p>
                </div>
            </div>
        </div>
        </a>
       <a href="https://www.codemoji.com"> <div class="col-md-3 col-sm-6">
            <div class="service-box ">
                <div class="service-icon red">
                    <div class="front-content">
                        <i class="fa fa-trophy"></i>
                        <h3>Math</h3>
                    </div>
                </div>
                <div class="service-content">
                    <h3>Coming SOON</h3>
                    <p>Math is a fun way for students to learn new math concepts this platform will be blended with our Codemoji platform so teacher can see progress across platforms.</p>
                </div>
            </div>
        </div>
        </a>
       <a href="http://www.classmanager.io"> <div class="col-md-3 col-sm-6">
            <div class="service-box">
                <div class="service-icon grey">
                    <div class="front-content">
                        <i class="fa fa-paper-plane-o"></i>
                        <h3>Class Manager</h3>
                    </div>
                </div>
                <div class="service-content">
                    <h3>Classmanager.io</h3>
                    <p> Class manager is an LMS design for the 21st century classroom. Designed for K-12 and up to help teachers, Schools and students still struggling with the pains of blackboard. </p>
                </div>
            </div>
        </div>
        </a>
    </div>
</div>

<a class="facebook_link" href="https://www.facebook.com/codemoji">
<div id="follow_us">
	<img src="facebook.png" />
	<p>Like us on Facebook!</p>
</div>
</a>


	<?php include_once("analyticstracking.php");
	include_once("heatmap.php");
	 ?>

	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/583e00cbe6ab3b03d061fcd2/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>