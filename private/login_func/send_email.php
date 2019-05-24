<?php 

    function send_verification_email($email, $firstname, $lastname, $hash) {

        $to      = $email;
        $subject = 'Account Verification ( camagru.com )';
        $message_body = '
        Hello ' . $firstname . ' ' . $lastname .',
    
        Thank you for signing up!
    
        Please click this link to activate your account:
    
        http://localhost:8100' . WWW_ROOT . '/pages/login/verify.php?email='.$email.'&hash='.$hash;  
        
        mail( $to, $subject, $message_body );
    }

    function send_reset_pass_email($email, $firstname, $lastname, $hash) {
        $to = $email;
        $subject = 'Password Reset Link';
        $message_body = '
        Hello ' . $firstname . ' ' . $lastname . ',

        You have requested password reset!

        Please click this link to reset your password:

        http://localhost:8100' . WWW_ROOT . '/pages/login/reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);
    }
?>