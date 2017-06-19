<html>
<head>


</head>
<body>
<?php



    $link = mysqli_connect("localhost", "root", "root", "Survey");

    // Check connection

    if($link === false){

        die("ERROR: Could not connectl. " . mysqli_connect_error());

    }


    $id=$_POST["id"];
   echo $id;
   

  $sql = "select * from iphone where id=$id";

  if(mysqli_query($link, $sql))
  {
 
             
            $result = $link->query($sql);

           
           




                if ($result->num_rows > 0) {
               

                        while($row = $result->fetch_assoc())
                         {
                        
                                  echo "Name: " . $row["name"]. "<br>";   
                                  echo "Email: " . $row["email"]. "<br>";
                                  echo "Phone Number: ". $row["mobile"]. "<br>";
                                  echo "Model name: " . $row["model"]. "<br>";
                                  echo "Rating: " . $row["rating"]. "<br>";   
                                  echo "Comment: " . $row["comments"]. "<br>";   
                           

                        }
                    }
                     else {
                        echo "Not working";
                        return false;
                        }


        } else{

        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

    }
 
 

 ?>
 
 
 </body>
 </html>
