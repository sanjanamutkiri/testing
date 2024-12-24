# Offer Generation Portal

## Overview
This project is an Offer Generation Portal that allows users to manage applicant data, generate certificates, and send them via email. The system integrates several functionalities such as certificate generation using FPDF, email sending with SMTP via PHPMailer, and CAPTCHA integration for secure user authentication.

## Features
- **User Authentication**: Secure login and signup functionality with CAPTCHA validation.
- **Applicant Management**: Add, view, modify, and delete applicant details.
- **Certificate Generation**: Create personalized certificates in PDF format using FPDF.
- **Email Integration**: Send certificates to applicants via email using PHPMailer.
- **Responsive Design**: User-friendly interface styled with CSS.

## Technologies Used
- **PHP**: Backend scripting language.
- **MySQL**: Database for storing applicant and user details.
- **FPDF**: Library for generating PDF certificates.
- **PHPMailer**: Library for sending emails via SMTP.
- **CAPTCHA**: For enhancing authentication security.
- **Composer**: Dependency manager for PHP libraries.

## Database Structure
The system uses two main tables:
- **`interns`**: Stores applicant details such as `ref_no`, `name`, `designation`, `date_from`, `date_to`, `serial_number`, and `date`.
- **`users`**: Stores user authentication details like `username`, `password`, and other relevant information.

## File Storage
All generated certificates are stored in the `generated_certificates` directory. Each certificate is named using the applicant's `ref_no` to ensure easy identification and retrieval.

## Installation Instructions

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/your-repo-name.git
   cd your-repo-name
   ```

2. **Install Dependencies**:
   Make sure Composer is installed on your system. Run the following command:
   ```bash
   composer install
   ```

3. **Set Up Database**:
   - Create a MySQL database.
   - Import the provided SQL file to set up the required tables.
   - Update `config.php` with your database credentials.

4. **Add Required Fonts**:
   Ensure that `calibrib.ttf` and `calibril.ttf` are present in the `fonts` folder for certificate generation.

5. **Set Up SMTP**:
   Update the `send_email.php` file with your SMTP credentials:
   ```php
   $mail->Host = 'smtp.gmail.com';
   $mail->Username = 'your-email@gmail.com';
   $mail->Password = 'your-email-password';
   ```

6. **Run the Application**:
   - Place the project folder in your server's root directory (e.g., `htdocs` for XAMPP).
   - Access the application in your browser at `http://localhost/project-folder`.

## File Structure
- **Certificate.jpg**: Template image used for generating certificates.
- **config.php**: Contains database connection settings.
- **db_connection.php**: Handles database operations.
- **generate_certificate.php**: Generates certificates using FPDF.
- **send_email.php**: Sends certificates via email using PHPMailer.
- **view_file.php**: Displays the generated certificate.
- **style.css**: Stylesheet for the application.
- **composer.json / composer.lock**: Files for managing PHP dependencies.
- **fonts**: Directory containing custom fonts for certificate generation.
- **generated_certificates**: Directory where all generated certificates are stored.

## Libraries and Tools
- **FPDF**:
  - Used for generating PDF files.
  - Website: [http://www.fpdf.org/](http://www.fpdf.org/)

- **PHPMailer**:
  - Used for sending emails via SMTP.
  - Documentation: [https://github.com/PHPMailer/PHPMailer](https://github.com/PHPMailer/PHPMailer)

- **CAPTCHA**:
  - Integrated to secure login and signup forms.

## Usage Instructions
1. **Login/Signup**:
   - Users must log in or sign up to access the dashboard.
   - CAPTCHA validation is required during signup.

2. **Manage Applicants**:
   - Add, view, modify, and delete applicant details.

3. **Generate Certificates**:
   - Navigate to the "Generate Certificate" section.
   - Provide the necessary details to create a personalized certificate.

4. **Send Certificates**:
   - Use the "Send Email" option to email the generated certificates.

## Troubleshooting
- **SMTP Errors**:
  - Verify your SMTP credentials in `send_email.php`.
  - Ensure "Less Secure App Access" is enabled for the email account or use an app-specific password.

- **FPDF Errors**:
  - Check the font path in `generate_certificate.php`.
  - Ensure `calibrib.ttf` and `calibril.ttf` are correctly placed.

- **Database Connection Issues**:
  - Verify the credentials in `config.php`.
  - Ensure the MySQL server is running.

## Future Enhancements
- Add bulk certificate generation.
- Enable multi-language support.
- Integrate advanced email templates.
- Add analytics for tracking sent certificates.

## License
This project is licensed under the [MIT License](LICENSE).

## Authors

- Komal Kalshetti
- Aishwarya Kalshetti
- Sanjana Mutkiri



## Acknowledgments
- [FPDF](http://www.fpdf.org/)
- [PHPMailer](https://github.com/PHPMailer/PHPMailer)
- Community tutorials and guides.

---
Feel free to contribute to this project and suggest improvements!

