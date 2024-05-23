<?php
    $filenameee =  $_FILES['file']['name'];
    $fileName = $_FILES['file']['tmp_name']; 
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $userSubject = $_POST['subject'];
    $usermessage = $_POST['message'];
    
    $message = 'Contact Request Submitted 
    Name: '.$name. '
    Email: '.$email. '
    Phone: '.$phone. '
    Subject: '.$userSubject. '
    Message: '.$usermessage. 
    
    $subject ="Nursing - Contact from";
    $fromname = $name;
    $fromemail =  $email;  //if u dont have an email create one on your cpanel

    $mailto = 'info@regionalworkforce.com';  //the email which u want to recv this email

    $content = file_get_contents($fileName);
    $content = chunk_split(base64_encode($content));
    // a random hash will be necessary to send mixed content
    $separator = md5(time());
    // carriage return type (RFC)
    $eol = "\r\n";
    // main header (multipart mandatory)
    $headers = "From: ".$fromname." <".$fromemail.">" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;
    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;
    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filenameee . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";
    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
       //Set Location After Successsfull Submission
  header('Location: contact.html?message=Successfull');
        
        
    } else {
        //Set Location After Unsuccesssfull Submission
  	header('Location: contact.html?message=Failed');	
    }



    // aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    // aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    // aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa


//     <?php
// if (isset($_POST['submit'])) {
//     // Define the allowed file extensions
//     $allowed_exts = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'gif'];

//     // Get the submitted form data
//     $qualification = $_FILES['qualification'];
//     $ahpraRegistration = $_FILES['ahpraRegistration'];
//     $photoOfPassport = $_FILES['photoOfPassport'];

//     // Validate the file types
//     $qualification_ext = strtolower(pathinfo($qualification['name'], PATHINFO_EXTENSION));
//     $ahpraRegistration_ext = strtolower(pathinfo($ahpraRegistration['name'], PATHINFO_EXTENSION));
//     $photoOfPassport_ext = strtolower(pathinfo($photoOfPassport['name'], PATHINFO_EXTENSION));

//     if (!in_array($qualification_ext, $allowed_exts)) {
//         echo "Invalid file format for qualification. Please upload a PDF, DOC, DOCX, JPG, JPEG, PNG, or GIF.<br>";
//     }

//     if (!empty($ahpraRegistration['name']) && !in_array($ahpraRegistration_ext, $allowed_exts)) {
//         echo "Invalid file format for AHPRA registration. Please upload a PDF, DOC, DOCX, JPG, JPEG, PNG, or GIF.<br>";
//     }

//     if (!empty($photoOfPassport['name']) && !in_array($photoOfPassport_ext, $allowed_exts)) {
//         echo "Invalid file format for photo of passport. Please upload a PDF, DOC, DOCX, JPG, JPEG, PNG, or GIF.<br>";
//     }

//     // Validate the file size
//     $max_file_size = 5 * 1024 * 1024; // Set the maximum file size to 5MB

//     if ($qualification['size'] > $max_file_size) {
//         echo "Qualification file is too large. Please upload a file smaller than 5MB.<br>";
//     }

//     if (!empty($ahpraRegistration['name']) && $ahpraRegistration['size'] > $max_file_size) {
//         echo "AHPRA registration file is too large. Please upload a file smaller than 5MB.<br>";
//     }

//     if (!empty($photoOfPassport['name']) && $photoOfPassport['size'] > $max_file_size) {
//         echo "Photo of passport file is too large. Please upload a file smaller than 5MB.<br>";
//     }

//     // Define the upload directory
//     $upload_dir = "uploads/";

//     // Create the upload directory if it doesn't exist
//     if (!file_exists($upload_dir)) {
//         mkdir($upload_dir, 0755, true);
//     }

//     // Function to handle file uploads
//     function upload_file($file, $upload_dir, $file_name) {
//         $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
//         $file_name = $file_name . '.' . $file_ext;
//         $file_path = $upload_dir . $file_name;
//         if (move_uploaded_file($file['tmp_name'], $file_path)) {
//             echo "{$file_name} uploaded successfully.<br>";
//         } else {
//             echo "Error uploading {$file_name}<br>";
//         }
//     }

//     // Upload the files
//     if (empty($errors)) {
//         if (!empty($qualification['name'])) {
//             upload_file($qualification, $upload_dir, 'qualification');
//         }
//         if (!empty($ahpraRegistration['name'])) {
//             upload_file($ahpraRegistration, $upload_dir, 'ahpraRegistration');
//         }
//         if (!empty($photoOfPassport['name'])) {
//             upload_file($photoOfPassport, $upload_dir, 'photoOfPassport');
//         }
//     }
// }
// 










// aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    // aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
    // aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa


    <?php
if (isset($_POST['submit'])) {
    // Get the submitted form data
    $qualification = $_FILES['qualification'];
    $ahpraRegistration = $_FILES['ahpraRegistration'];
    $photoOfPassport = $_FILES['photoOfPassport'];

    // Define the upload directory
    $upload_dir = "uploads/";

    // Create the upload directory if it doesn't exist
    if (!file_exists($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }

    // Function to handle file uploads
    function upload_file($file, $upload_dir, $file_name) {
        $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $file_name = $file_name . '.' . $file_ext;
        $file_path = $upload_dir . $file_name;
        if (move_uploaded_file($file['tmp_name'], $file_path)) {
            echo "{$file_name} uploaded successfully.<br>";
        } else {
            echo "Error uploading {$file_name}<br>";
        }
    }

    // Upload the files
    if (isset($qualification) && $qualification['error'] == UPLOAD_ERR_OK) {
        upload_file($qualification, $upload_dir, 'qualification');
    }
    if (isset($ahpraRegistration) && $ahpraRegistration['error'] == UPLOAD_ERR_OK) {
        upload_file($ahpraRegistration, $upload_dir, 'ahpraRegistration');
    }
    if (isset($photoOfPassport) && $photoOfPassport['error'] == UPLOAD_ERR_OK) {
        upload_file($photoOfPassport, $upload_dir, 'photoOfPassport');
    }
}
?>