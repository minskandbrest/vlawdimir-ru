<?php

$response = [
  'success' => true
];

$isFieldsValid = true;

// NAME
if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['text'])) {
  $isFieldsValid = false;
  $response['success'] = false;
}

if ($isFieldsValid) {
  $name = !empty($_POST['name']) ? $_POST['name'] : '-';
  $email = !empty($_POST['email']) ? $_POST['email'] : '-';
  $phone = !empty($_POST['phone']) ? $_POST['phone'] : '-';
  $text = !empty($_POST['text']) ? $_POST['text'] : '-';

  $EmailTo = "info@vlawdimir.ru";
  $Subject = 'Новое сообщение с сайта Адвокат Владимир Соловьев';

  // prepare email body text
  $Body = "";
  $Body .= "Имя: ";
  $Body .= $name;
  $Body .= "\n";
  $Body .= "Email: ";
  $Body .= $email;
  $Body .= "\n";
  $Body .= "Телефон: ";
  $Body .= $phone;
  $Body .= "\n";
  $Body .= "Сообщение: ";
  $Body .= $text;
  $Body .= "\n";

  // send email
  $headers = 'From: '.$email . "\r\n" .
  'Reply-To: '.$email . "\r\n" .
  'X-Mailer: vlawdimir.ru PHP/' . phpversion();

  $success = mail($EmailTo, $Subject, $Body, $headers);

  if (!$success) {
    $response['success'] = false;
  }
}

// redirect to success page
// if ($success){
//    echo "success";
// } else {
//   // if($errorMSG == ""){
//   //     echo "Something went wrong :(";
//   // } else {
//   //     echo $errorMSG;
//   // }
// }

echo json_encode($response);
?>