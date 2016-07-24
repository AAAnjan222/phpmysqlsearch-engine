<!DOCTYPE html>
<html>
    <head>
	    <title>Results</title>
	</head>

<style type="text/css">

.results{margin:10%;}


</style>






	
<body bgcolor="F%DEB3">
 
 <form action="result.php" method="post">

    <span><b>write your keyword</b></span>
	<input type="text" name="user_query" size="120" />
    <input type="submit" name="result" value="Search Now"/>


</form>
 
 <?php
 
      mysql_connect("localhost","root","");
      mysql_select_db("search");
 
 
      if(isset($_GET['search'])){
		  
		  $get_value=$_GET['user_query'];
		  
		  $result_query = "select * from sites where site_keywords like '%$get_value%'";
		  $run_result=mysql_query($result_query);
		  
		  
		  
		  while($row_result=mysql_fetch_array($run_result))
     {
			  $site_title=$row_result['site_title'];
			  $site_link=$row_result['site_link'];
			  $site_keywords=$row_result['site_keywords'];
			  $site_desc=$row_result['site_desc'];
			  $site_image=$row_result['site_image'];
			  
			  
		  
		   echo "<div class='results'>
		          <h2>$site_title</h2>
				  <a href='$site_link' target='_blank'>$site_link</a>
				  <p align='justify'>$site_desc</p>
				  <img src='images/$site_image' width='100' height='100'/>
				 </div>";
	  }
 
 
 
 
 ?>
 
 

          </body>	

</html>