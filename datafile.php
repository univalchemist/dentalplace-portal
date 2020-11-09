<?php

$username="a1pro_dental-place";
$password="+s}u2l05uDw^";
$hostname = "localhost";
//connection string with database
$dbhandle = mysqli_connect($hostname, $username, $password)
or die("Unable to connect to MySQL");

echo "";
// connect with database
$selected = mysqli_select_db($dbhandle, "a1pro_dental-place")
or die("Could not select examples");
//query fire

 $servername = "localhost";
$username = "a1pro_dental-place";
$password = "+s}u2l05uDw^";
$dbname = "a1pro_dental-place";
 
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//$sql = "INSERT INTO user (user_name, last_name, full_name,user_email,password,level,status) VALUES ('John', 'Doe', 'John Doe','john@example.com','123456789','1','1')";

$sql = "UPDATE user SET status='1' WHERE id=378";




if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
} 








$result = mysqli_query($dbhandle,"select * from user where level='1';");  
$json_response = array();
// fetch data in array format  
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {  
// Fetch data of Fname Column and store in array of row_array
$row_array['id'] = $row['id'];  
$row_array['user_name'] = $row['user_name']; 
$row_array['last_name'] = $row['last_name']; 
$row_array['full_name'] = $row['full_name']; 
$row_array['user_email'] = $row['user_email']; 
$row_array['profile_image'] = $row['profile_image']; 
$row_array['password'] = $row['password']; 
$row_array['level'] = $row['level']; 
$row_array['datetime'] = $row['datetime']; 
$row_array['otp'] = $row['otp']; 
$row_array['source'] = $row['source']; 
$row_array['facebook_id'] = $row['facebook_id']; 
$row_array['google_id'] = $row['google_id']; 
$row_array['apple_id'] = $row['apple_id']; 
$row_array['status'] = $row['status']; 
$row_array['ben_start'] = $row['ben_start']; 
$row_array['ben_end'] = $row['ben_end']; 
$row_array['online_status'] = $row['online_status']; 
$row_array['created_at'] = $row['created_at']; 
$row_array['updated_at'] = $row['updated_at']; 

//push the values in the array  
array_push($json_response,$row_array);  
}

echo "<pre>";
print_r($json_response);

?>


