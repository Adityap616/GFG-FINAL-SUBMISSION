<?php
			$host='localhost';
			$username='root';
			$password='';
			$servername='record';

			$conn = mysqli_connect($host, $username,$password,$servername);
        

			$fname =mysqli_real_escape_string($conn,$_POST["name"] );
            $email =mysqli_real_escape_string($conn,$_POST["xyz"] );
            $phone =mysqli_real_escape_string($conn,$_POST["phonenumber"] );
            

            $s = " insert into `signup`
            (`name`,`email`,`phoneno`) 
            values('$fname','$email','$phone')";
			
            $result = $conn->query($s);
            

            
            if ($result== TRUE)
            {
                echo "<script>
                alert('Registered Successfully');
                window.location.href='index.html';
                </script>";
                
            }
            else
            {
                echo "failed";
            }
    


//PHPMailer Object
        require 'PHPMailer/PHPMailer/PHPMailerAutoload.php';

		$mail = new PHPMailer;

		$mail->isSMTP();                                   
		$mail->Host = 'smtp.gmail.com';                    
		$mail->SMTPAuth = true;                           
		$mail->Username = 'anmclinic420@gmail.com';        //email id
		$mail->Password = 'anmclinic';		  //password
		$mail->SMTPSecure = 'tls';                        
		$mail->Port = 587;                                 

		$mail->addAddress($email);   		//receiver email id $email is used to store receiver email
	

		$mail->isHTML(true);  

		$bodyContent = 'Dear ' . $fname . ' thank you for choosing ANM Clinic.
                        You have Succeessfully booked an appointment. We will contact you shortly.';
		
		$mail->Subject = 'Appointment Confirmation';
		$mail->Body    = $bodyContent;

		if(!$mail->send()) 
        {
			echo 'Message could not be sent.';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} 
        else 
        {
			echo 'Message has been sent';
			
		}

    ?>
    
    
