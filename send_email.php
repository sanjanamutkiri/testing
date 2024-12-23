<?php
// Include necessary files
include 'db_connection.php';
require __DIR__ . '/vendor/autoload.php'; // Include Composer's autoload

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Get the ref_no from the URL
$ref_no = $_GET['ref_no'];

// Query to fetch the applicant's data based on ref_no
$sql = "SELECT ref_no, name, email_id FROM interns WHERE ref_no = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $ref_no);
$stmt->execute();
$result = $stmt->get_result();

// Check if the applicant exists
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Path to the generated PDF certificate
    $pdfPath = "generated_certificates/{$row['ref_no']}_certificate.pdf";

    // Check if the PDF certificate exists
    if (file_exists($pdfPath)) {
        // Send the certificate via email
        $status = sendEmailWithAttachment($row['email_id'], "Your Certificate", "Dear {$row['name']},<br><br>Attached is your certificate in PDF format.<br><br>Best regards,<br>Team", $pdfPath);

        // Display email status
        echo $status;
    } else {
        echo "Certificate PDF not found.";
    }
} else {
    echo "Applicant not found.";
}

// Close database connection
$stmt->close();
$conn->close();

/**
 * Function to send email with the certificate attached
 *
 * @param string $to Recipient's email address
 * @param string $subject Subject of the email
 * @param string $msg Body of the email
 * @param string $attachmentPath Path to the attachment file
 * @return string Status message
 */
function sendEmailWithAttachment($to, $subject, $msg, $attachmentPath) {
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'komalkalshetti989@gmail.com'; // Your Gmail address
        $mail->Password = 'wausnmwcvlaszygl'; // Your app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Email headers and content
        $mail->setFrom('komalkalshetti989@gmail.com', 'Your Name');
        $mail->addAddress($to);
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $msg;

        // Attachment
        $mail->addAttachment($attachmentPath);

        // Send email
        $mail->send();
        return "Email sent successfully to $to.";
    } catch (Exception $e) {
        return "Error sending email: " . $mail->ErrorInfo;
    }
}
