<?php
if (isset($_POST['action']) && $_POST['action'] == 'pdf') {
    // var_dump($_POST);
    $name = $_POST['inputName'];
    $Email = $_POST['inputEmail'];
    $Passowrd = $_POST['inputPassword'];
    $file_name = md5(rand()) . '.pdf';

    ob_end_clean();
    require('fpdf184/fpdf.php');

    // Instantiate and use the FPDF class
    $pdf = new FPDF();

    //Add a new page
    $pdf->AddPage();

    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 18);

    // Prints a cell with given text
    $write = $pdf->write(5, '
    Contact Details:
    name
    ' . $name . '
    email`  71t5
    ' . $Email . '
    password
    ' . $Passowrd . '
    ');

    // // contant in the documents/
    // $contents = '
    // Contact Details:
    // name
    // ' . $name . '
    // email
    // ' . $Email . '
    // password
    // ' . $Passowrd . '
    // ';

    // return the generated output
    $result = $pdf->Output($file_name, 'D');
    // $file_success = file_put_contents($file_name, $contents);



    require 'class/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();                                //Sets Mailer to send message using SMTP
    $mail->Host = 'smtpout.secureserver.net';        //Sets the SMTP hosts of your Email hosting, this for Godaddy
    $mail->Port = '80';                                //Sets the default SMTP server port
    $mail->SMTPAuth = true;                            //Sets SMTP authentication. Utilizes the Username and Password variables
    $mail->Username = 'xxxxxxxxxx';                    //Sets SMTP username
    $mail->Password = 'xxxxxxxxxx';                    //Sets SMTP password
    $mail->SMTPSecure = '';                            //Sets connection prefix. Options are "", "ssl" or "tls"
    $mail->From = 'adejumobitoluwanimi2@gmail.com';            //Sets the From email address for the message
    $mail->FromName = 'Toluwanimi';            //Sets the From name of the message
    $mail->AddAddress('empty for now', 'Toluwanimi');        //Adds a "To" address
    $mail->WordWrap = 50;                            //Sets word wrapping on the body of the message to a given number of characters
    $mail->IsHTML(true);                            //Sets message type to HTML				
    $mail->AddAttachment($result);                     //Adds an attachment from a path on the filesystem
    $mail->Subject = 'Details';            //Sets the Subject of the message
    $mail->Body = $contents;                //An HTML or plain text message body
    if ($mail->Send())                                //Send an Email. Return true on success or false on error
    {
        echo '<label class="text-success">Customer Details has been send successfully...</label>';
    } else {
        echo "Email send failed";
    }
    unlink($file_name);
}
