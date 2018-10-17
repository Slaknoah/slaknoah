<?php
/*
 * Send Mail function
 */
add_action( 'wp_ajax_submit_form', 'submitForm' );
add_action( 'wp_ajax_nopriv_submit_form', 'submitForm' );

function submitForm() {

    $date = date("H:i:s / m.d.y");
    $ip_client = $_SERVER['REMOTE_ADDR'];

// **********************************************

    if (empty($_POST['js'])) {
        $mes= "<table style='width: 100%; background-color: #f8f8f8;'>";

        $mes.= "
        <tr style='background-color: #d6d6d6'>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>Time/Date sent</td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>$date</td>
        </tr>";

        foreach ( $_POST as $key => $value ) {
            if ($value != "" && $key != "utm_source" && $key != "utm_medium" && $key != "utm_campaign" && $key != "utm_term" && $key != "utm_content" && $key != "cm_title" && $key != "usr_file") {
                $mes.= "
                <tr>
                    <td style='padding: 10px; border: #e9e9e9 1px solid;'>".preg_replace("/_/", " ", $key)."</td>
                    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$value</td>
                </tr>";
            }
        }


        $mes.= "<tr><td style='padding: 10px; colspan='2'></td></tr>";

        $mes.= "
        <tr>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>Sender's IP</td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'>$ip_client</td>
        </tr>";

        $mes.= "</table>";

        $mes.= "<div style='text-align: right; color: #939393; margin: 20px 0 0 0'>Клиенты для Вашего бизнеса. Команда Markello.</div>";


        $to = get_bloginfo('admin_email'); //Your email
        $subject .= "Application from site";
        $subject = "=?utf-8?b?" . base64_encode($subject) . "?=";

        $boundary = "--".md5(uniqid(time()));
        $mailheaders = "MIME-Version: 1.0;\r\n";
        $mailheaders .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\r\n";
        $mailheaders .= "From: admin \r\n";

        $multipart = "--$boundary\r\n";
        $multipart .= "Content-Type: text/html; charset=\"utf-8\"\r\n";
        $multipart .= "Content-Transfer-Encoding: 7bit\r\n";
        $multipart .= "\r\n";
        $multipart .= $mes;

        $message_part = '';
        if (is_uploaded_file($_FILES['usr_file']['tmp_name'])) {
            $filename = $_FILES['usr_file']['name'];
            $filetype = $_FILES['usr_file']['type'];
            $filesize = $_FILES['usr_file']['size'];

            $message_part = "\r\n--$boundary\r\n";
            $message_part .= "Content-Type: application/octet-stream; name=\"$filename\"\r\n";
            $message_part .= "Content-Transfer-Encoding: base64\r\n";
            $message_part .= "Content-Disposition: attachment; filename=\"$filename\"\r\n";
            $message_part .= "\r\n";
            $message_part .= chunk_split(base64_encode(file_get_contents($_FILES['usr_file']['tmp_name'])));
            $message_part .= "\r\n--$boundary--\r\n";
        }
        $multipart .= $message_part;

        if ($filesize < 26214400) {
            if (mail($to, $subject, $multipart, $mailheaders)) {
                $response = [
                    'success' => true,
                    'message' => 'Mail sent, thanks for reaching me.'
                ];
                echo json_encode($response);
            }else{
                $response = [
                    'success' => false,
                    'message' => 'Error sending mail :('
                ];
                echo json_encode($response);
            }
        }
        else {
            $response = [
                'success' => false,
                'message' => 'File size larger than 25MB'
            ];
            echo json_encode($response);
        }
    }

    wp_die(); // this is required to terminate immediately and return a proper response
}

?>
