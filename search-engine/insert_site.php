 <!DOCTYPE html>

<html>
   
    <head>
    </head>


    <body bgcolor="blue"> 

        <form action="insert_site.php" method="post" enctype="multipart/form-data">

             <table bgcolor="orange" width="500" border="2" cellpadding="2" align="center">
             	   <tr>
             	   	<td colspan="s" align="center"> Inserting new website</td>
                                       	   </tr>>
                   <tr>
                   	
                   	<td align="right">Site Title</td>
                   	<td align="right"><input type="text" name="site_title" /></td>

                   </tr>

                    <tr>
                   	
                   	<td align="right">Site Link</td>
                   	<td align="right"><input type="text" name="site_link" /></td>

                   </tr>
                    <tr>
                   	
                   	<td align="right">Site Keywords</td>
                   	<td align="right"><input type="text" name="site_keywords" /></td>

                   </tr>
                    <tr>
                   	
                      <td align="right">Site Description</td>
                   	  <td align="right"><textarea  cols="17" rows="8" name="site_desc"></textarea></td>

                   </tr>
                     
                   <tr>
                   	
                     	<td align="right">Site Image</td>
                   	    <td align="right"><input type="file" name="site_image" /></td>

                   </tr> 

                   <tr>
                   	                  
                   	<td align="right"><input type="submit" name="submit" value="ADD site now" /></td>

                   </tr>



             </table>





         </form>
    </body>


</html>    

<?php 
      mysql_connect("localhost","root","");
      mysql_select_db("search");


      if(isset($_POST['submit'])){


          $site_title    =$_POST['site_title'];
          $site_link     =$_POST['site_link'];
	      $site_keywords =$_POST['site_keywords'];
	      $site_desc     =$_POST['site_desc'];
	      $site_image    =$_FILES['site_image']['name'];
	      $site_image_tmp =$_FILES['site_image']['tmp_name'];

      if($site_title=='' or $site_link='' or  $site_keywords =='' or $site_desc=='')
     
      {
      	echo "<script>alert('please fill all the fields')</script>";
      	exit();
      }

      else {

      $insert_query="insert into sites(site_title,site_link,site_keywords,site_desc,site_image) values('$site_title','$site_link','$site_keywords','$site_desc','$site_image')";

      move_uploaded_file($site_image_tmp,"images/{$site_image}" );
      
      if(mysql_query($insert_query))
      	
      	{  	echo "<script> alert('Data inserted into Table') </script>";
           }

       }

  }
?>
