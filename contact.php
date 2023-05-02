<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Validate form data
  if (empty($name) || empty($email) || empty($message)) 
  {
    // Return an error if any required fields are empty
    $error = 'Please fill out all required fields.';
  }
   else
    {
      // Send email with form data
      $to = 'khalidmusty1234@gmail.com';
      $subject = $_POST['subject'];
      $body = "Name: $name\nEmail: $email\nMessage: $message";
      $headers = "From: $email\r\nReply-To: $email\r\n";

      if (mail($to, $subject, $body, $headers))
      {
          // Return a success message if the email was sent successfully
          $success = 'Your message was sent successfully!😉';
      } 
      else 
      {
          // Return an error message if the email failed to send
          $error = 'There was an error sending your message. Please try again later.';
      }
    }
  }
  if(isset($error))
    {
      echo '<div class="error">'.$error.'</div>';
    }
  elseif(isset($success))
  {
    header('Refresh: 5; URL=../index.php');
    echo '<div class="success">'.$success.'</div>';
  }
 ?>
