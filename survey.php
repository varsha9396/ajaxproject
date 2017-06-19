<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  


	<head>
		
		<style>
			
			
			#jsconfirm {
				border-color: #c0c0c0;
				border-width: 2px 4px 4px 2px;
				left: 0;
				margin: 0;
				padding: 0;
				position: absolute;
				top: -1000px;
				z-index: 100;
			}

			

			#jsconfirmtitle {
				size: 30;
				height: 20px;
				text-align: center;
			}
		</style>

	</head>
	<body>
		<?php
			$link = mysqli_connect("localhost","root","root","Survey");
			if (!$link) {
				die('Could not connect: '.mysqli_errno()."==" . mysqli_error());
			}
			
			$id = $_GET['id'];
			$id1 = $_GET['uid'];
			$id2 = $_GET['aid'];
			$id3 = $_GET['did'];
			$name = $_GET['name'];
			$email = $_GET['email'];
			$mobile = $_GET['mobile'];
			$model = $_GET['model'];
			$rating = $_GET['rating'];
			$comments = $_GET['comments'];
			$id = mysqli_real_escape_string($link,$id);
			$id1 = mysqli_real_escape_string($link,$id1);
			$id2 = mysqli_real_escape_string($link,$id2);
			$id3 = mysqli_real_escape_string($link,$id3);
			$name = mysqli_real_escape_string($link,$name);
			$email = mysqli_real_escape_string($link,$email);
			$mobile = mysqli_real_escape_string($link,$mobile);
			$model = mysqli_real_escape_string($link,$model);
			$rating = mysqli_real_escape_string($link,$rating);
			$comments = mysqli_real_escape_string($link,$comments);
			
			
			if ($id2!=0) {
				$sqlqry = "UPDATE iphone SET name = '$name', email = '$email', mobile = '$mobile', model = '$model', rating = $rating, comments = '$comments' where id = $id2";
				$sqlquery_result = mysqli_query($link,$sqlqry);
			} else {
				$sql = "INSERT INTO iphone (name,email,mobile,model,rating,comments) VALUES ('$name','$email','$mobile','$model',$rating,'$comments')";
				$retval = mysqli_query($link,$sql);
			}
			$query = "SELECT * FROM iphone";
			$qry_result = mysqli_query($link,$query);
			$display_string = "<table width=800>";
		$display_string.= "<tr>";
			$display_string.= "<th>Name</th>";
			$display_string.= "<th>Model</th>";
			$display_string.= "<th>Rating</th>";
			$display_string.= "<th>View</th>";
			$display_string.= "<th>Edit</th>";
			$display_string.= "<th>Delete</th>";
			$display_string.= "</tr>";
			
			while($row = mysqli_fetch_array($qry_result)) {
	   			$display_string.= "<tr>";
				$display_string.= "<td>$row[name]</td>";
	   			$display_string.= "<td>$row[model]</td>";
	   			$display_string.= "<td>$row[rating]</td>";

                                        '<td><input type=button name=view value=view id=<?php echo $row[id]; ?>  /></td>';  
                          

				$display_string.= '<td><a href=# onclick="show('.$row[id].',\''.$row[name].'\',\''.$row[email].'\',\''.$row[mobile].'\',\''.$row[model].'\','.$row[rating].',\''.$row[comments].'\')"><img src=drop.png  class="btn btn-info btn-xs" width=40 height=40 id=view/></a></td>';

				$display_string.= '<td><a href=# onclick="edit('.$row[id].',\''.$row[name].'\',\''.$row[email].'\',\''.$row[mobile].'\',\''.$row[model].'\','.$row[rating].',\''.$row[comments].'\')"><img src=edit.png class="btn btn-warning btn-xs update" width=40 height=40 id=edit/></a></td>';
                $display_string.= '<td><a href=# onclick="func('.$row[id].',\''.$row[name].'\',\''.$row[email].'\',\''.$row[mobile].'\',\''.$row[model].'\','.$row[rating].',\''.$row[comments].'\')"><img src=delete.png class="btn btn-danger btn-xs delete" width=40 height=40 id=delete/></a></td>';
				$display_string.= "</tr>";
					
			}
			$display_string.= "</table>";
			echo $display_string;
		    
			$qry = "SELECT * FROM iphone where id = $id";
			
			if ($id!=0) {
				$query_result = mysqli_query($link,$qry);
				if (mysqli_num_rows($query_result) > 0) {
					while ($result = mysqli_fetch_array($query_result)) {
						//echo $result[name]."<br>";
						//echo $result[email]."<br>";
					}
				}
			}
			
			$sqlquery = "DELETE FROM iphone where id = $id3";
			//echo $sqlquery;
			$sqlqryresult = mysqli_query($link,$sqlquery);
			
		?>
		
			
	</body>



 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div> 
 <script>  
 $(document).ready(function(){  
      $('.view_data').click(function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"content.php",  
                method:"post",  
                data:{employee_id:employee_id},  
                success:function(data){  
                     $('#employee_detail').html(data);  
                     $('#dataModal').modal("show");  
                }  
           });  
      });  
 });  
 </script>



</html>
