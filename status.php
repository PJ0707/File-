<?php
session_start(); 
$host="localhost"; 
$user="root"; 
$password=""; 
$db="user_login_details"; 
$con=mysqli_connect($host,$user,$password,$db); 
$id=$_SESSION['rid']; 
$query="select status from file_table where fileid='".$id."'"; 
$result= mysqli_query($con,$query); 
$row = mysqli_fetch_assoc($result); 
$check = (int)$row["status"]; 
if($check == -1 ){ 
 
 $stat1="notactive"; 
 $stat2="inactive"; 
}elseif($check == 1 ){ 
 $stat1="active"; 
 $stat2="inactive"; 
}elseif($check == 2) 
{ 
 $stat1="active"; 
 $stat2="active"; 
}elseif($check == -2) 
{ 
 $stat1="active"; 
 $stat2="notactive"; 
}elseif(is_null($row["status"])) 
{ 
 $stat1="inactive"; 
 $stat2="inactive"; 
} 
?>
 <!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initialscale=1.0">
 <title>track</title>
 <style type="text/css">
 .container{ 
 width:100%; 
 
 } 
 body
 { 
 padding-bottom:400px;
 background-image:url("t.jpg");
 background-size:cover;
 background-position:center;

 } 
 
 .progressbar
 { 
 counter-reset:step; 
 } 
 .progressbar li{ 
 list-style-type:none; 
 float:left; 
 width:33.33%; 
 position:relative; 
 text-align:center; 
 top:70px; 
 } 
 .progressbar li:before{ 
 content:counter(step); 
 counter-increment:step; 
 width:30px; 
 height:30px; 
 line-height:30px; 
 border:1px solid #ddd; 
 display:block; 
 text-align:center; 
 margin:0 auto 10px auto; 
 border-radius:50%; 
 background-color:white; 
 } 
 .progressbar li:after{ 
 content:''; 
 position:absolute; 
 width:100%; 
 height:5px; 
 background-color:#ddd; 
 top:15px; 
 left:-50%; 
 z-index:-1; 
 } 
 .progressbar li:first-child:after{ 
 content:none; 
 } 
 .progressbar li.active{ 
 color:green; 
 } 
 .progressbar li.active:before{ 
 border-color:green; 
 background-color:green; 
 } 
 .progressbar li.active + li:after{ 
 
 animation: mymovegreen 5s; 
 animation-fill-mode: forwards; 
 } 
 .progressbar li.inactive{ 
 color:blue; 
 } 
 .progressbar li.inactive:before{ 
 border-color:blue; 
 background-color:blue; 
 
 } 
 .progressbar li.inactive + li:after{ 
 
 animation: mymove 5s; 
 animation-fill-mode: forwards; 
 animation-delay: 5s; 
 } 
 .progressbar li.notactive{ 
 color:red; 
 } 
 .progressbar li.notactive:before{ 
 border-color:red; 
 background-color:red; 
 } 
 .progressbar li.notactive + li:after{ 
 
 animation: mymovered 5s; 
 animation-fill-mode: forwards; 
 animation-delay: 5s; 
 } 
 #goback
 { 
 float:right; 
 position:relative; 
 top:-50px; 
 right:80px; 23
 } 
 @keyframes mymove { 
 from {background-color:white;} 
 to {background-color: blue;} 
 
} 
@keyframes mymovered { 
 from {background-color:white;} 
 to {background-color: red;} 
} 
@keyframes mymovegreen { 
 from {background-color:white;} 
 to {background-color: green;} 
} 
 </style>
</head>
<body>
 <div class="container">
 <ul class="progressbar">
 <li class="active">submitted</li>
 <li class=<?php echo $stat1; ?>>level1</li>
 <li class=<?php echo $stat2; ?>>level2</li>
 </ul>
 
 </div>
 <a href="tracking.php"><input id="goback" type="button" value
="Go back!"></a>
</body>
</html>
