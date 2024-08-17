<?php
// include 'config.php';
    session_start();
    $message = '';
    date_default_timezone_set('Asia/Kolkata');
    $currentDateTime = date('d-m-Y H:i:s a');


    $to = 'info@jdbuilders.co.in';
    $subject = $currentDateTime;
    $messageArray = array(
        $_POST['name'],
        $_POST['email'],
        $_POST['phone'],
        $_POST['message']
    );
    
    $message = implode("\n", $messageArray);
    $from = 'info@jdbuilders.co.in'; 
    $headers = 'From: ' . $from . "\r\n" .
        'Reply-To: ' . $_POST['email'] . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    
    $status = mail($to, $subject, $message, $headers);
    
    if ($status) {
        $_SESSION['message'] = "Mail sent successfully!";
        header("location: contact.php");
    } else {
        $_SESSION['message'] = "Failed to send mail. Please try again later.";
        header("location: contact.php");
    }


// $query              =      "INSERT INTO clients (name, email, phone, plan, created_at, updated_at) 
//                             VALUES ('$name', '$email', $phone, $plan, '2023-11-25', '2023-11-25');
//                             ";
// $datainserted       =       $connection->query($query);
// if ($datainserted) {
//     $message = "Mail send successfully!";
//     header("location:contact.php?success=$message");
//     echo "Data inserted successfully!";
// } else {
//     echo "Query failed!";
// }

// $connection->close();
