<!DOCTYPE html>
<html>
<head>
<title> STUDENT SURVEY</title>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600&display=swap" rel="stylesheet">
<style>
    body{
        font-family:  sans-serif;
        font-size: 12px;
    }
table, td, th {
  border: 1px solid black;
  flex-wrap: all;

}

table {
  border-collapse: collapse;
  text-align: center;
}
#btn{
    font-size: 20px;
    height:40px;
    width: 80px;
    border-radius:25px;
    background-image:linear-gradient(-45deg, #8808CF 0%, #9E05CE 100%);
 
    color: #fff; 
    border:white;
    font-size:16px;  
    transition: all 0.7s;
   }
   #btn:hover{
    transform: scale(1.05);
   }


select{
    color: white; 
    width: 20%; 
    border-radius: 5px;
    background: black;  
    padding: 12px;
    background-image:linear-gradient(-45deg, #8808CF 0%, #9E05CE 100%);  
    color: #fff; 
    border:white;
}

.css-serial {
 counter-reset: serial-number; /* Set the serial number counter to 0 */
}
.css-serial td:first-child:before {
 counter-increment: serial-number; /* Increment the serial number counter */
 content: counter(serial-number); /* Display the counter */
}
@media print {

    .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
        
}
input#btn  {
display: none;
}
button#btn  {
display: none;
}
}    


</style>
</head>

<body><center>
<form method = "post">
    <h1> STUDENT SURVEY </h1>
	<label for="Batch"><h1><b></b></h1></label>

			<select name="survey" value="select" >
				<option > Select</option>
          
  				<option value="2018-2021">2018 - 2021</option>
  				<option value="2019-2022">2019 - 2022</option>
  				<option value="2020-2023">2020 - 2023</option>
			</select>
			<input type = "submit", name = "submit" , id="btn" , value = "submit"><br><br>
</form>
	
	
		<?php
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "studentsurvey";

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}
    if($_POST)
    {
      $x=$_POST['survey'];
			
                $sql = "SELECT * FROM satishfact WHERE Batch='$x'  ORDER BY Batch";
                if($result = mysqli_query($conn, $sql)){
                if(mysqli_num_rows($result) > 0){
                ?> <div class="page">
                    <table class="css-serial">
                 <col width="10">
                 <col width="150">
                 <col width="100">
                 <col width="500">
                 <col width="350">
                 <col width="200">
                 <col width="100">
                 <col width="150">
                 <col width="70">
                 <col width="550">
                 <col width="500">
                  <col width="550">
                 <col width="500">
                  <col width="550">
                 <col width="500">
                  <col width="550">
                 <col width="500">
                  <col width="550">
                 <col width="500">

<?php
           
                        echo "<tr>";
                        echo "<th><b>S.No</b></th>";
                        echo "<th><b>Name</b></th>";
                        echo "<th> <b>CurriculumDesign</b></th>";
                        echo "<th> <b>TeachingProcess</b></th>";
                        echo "<th> <b>AssociationActivities</b></th>";
                        echo "<th> <b>Studymaterials</b></th>";
                        echo "<th> <b>Lab</b></th>";
                        echo "<th> <b>Approachability</b></th>";
                        echo "<th> <b>Infrastructure</b></th>";
                        echo "<th> <b>Effectiveness</b></th>";
                        echo "<th> <b>Counselling</b></th>";
                while($row = mysqli_fetch_array($result)){
                    echo "<tr>";
                        echo "<td>&nbsp;</td>";
                         echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>" . $row['CurriculumDesign'] . "</td>";
                        echo "<td>" . $row['TeachingProcess'] . "</td>";
                        echo "<td>" . $row['AssociationActivities'] . "</td>";
                        echo "<td>" . $row['Studymaterials'] . "</td>";
                        echo "<td>" . $row['Lab'] . "</td>";
                         echo "<td>" . $row['Approachability'] . "</td>";
                          echo "<td>" . $row['Infrastructure'] . "</td>";
                           echo "<td>" . $row['Effectiveness'] . "</td>";
                           echo "<td>" . $row['Counselling'] . "</td>";

                    echo "</tr>";
                    }
                ?>

           </table>
         </div>
            <?php

                mysqli_free_result($result);
                } 
            else{
                echo "No records matching your query were found.";
                }
        }       
        else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
            }
          }
           
 echo "<br><br>";
		
		?>
        <input type="button" id="btn" onclick="window.print();" value="Print" /><br><br>
        <br><br>
</center>	
</body>
</html>