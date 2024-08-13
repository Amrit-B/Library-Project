
  <?php

    
    $email =$_POST['email'];
	$password =$_POST['password'];
    //echo $email;

    
    // Database connection
	$conn = new mysqli('localhost:3308','root','','test1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Failed to Connect : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("select * from registration where email =?");
		$stmt->bind_param("s", $email);
		$stmt->execute();
        $stmt_result =$stmt->get_result();
        if($stmt_result->num_rows>0){
            $data =$stmt_result->fetch_assoc();
            if($data['password'] === $password){
                //echo "<h2>Login successfull</h2>";
				//<link rel="stylesheet" type="text/html" href="dashboard.html" />
				include('dashboard.html');
            }
            else{
                echo "<h2>Invalid username or password</h2>";
            }
        }
        else{
            echo "<h2>Invalid username or password</h2>";
        }

 
}    

?>

