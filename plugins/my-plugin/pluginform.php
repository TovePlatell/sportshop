<?php

/*
 Plugin name: contactform

 

*/


function contactform_plugin(){

    $content = '';
    $content .= '<h3>Contact us! </h3>';

    $content .= '<form method="post" action="http://localhost:10008/thank-you/" />';

    $content .= '<label for="your_name">Name</label>';
    $content .= '<input type="text" name="your_name" class="form-control" placeholder="Enter your name" />';
    
    $content .= '<label for="your_email">Email</label>';
    $content .= '<input type="email" name="your_email" class="form-control" placeholder="Enter your emailadress" />';

    
    $content .= '<label for="your_message">Message</label>';
    $content .= '<textarea name="your_message" class="form-control" placeholder="Enter your message"></textarea>';

    $content .= '<br /> <input class="btn btn-primary" name="form_submit" type="submit" value="Submit" />';

    // closing the form
    $content .= '</form>';

    
    return $content;
    
}
 // callback function with the same name as the function we created
add_shortcode('contactform', 'contactform_plugin');
?>

<?php
// capture the message from the contactform - where the forms submits - submitting the form with wp_head add-action. Everytime the page is loading is looking if the form has been submitting

function contactform_capture(){

    if(isset($_POST['form_submit']))
    {
        // build in function the wordpress that clean the information that is coming through

        // grabbed the information and stored it to individual variables
       $name = sanitize_text_field($_POST['your_name']);
       $email = sanitize_text_field($_POST['your_email']);
       $comments = sanitize_textarea_field($_POST['your_message']);

       //store it in a mail

       $to = 'toveplatell@gmail.com';
       $subject = 'Contact form submission';
       $message = '' .$name. ' - ' .$email. ' - ' .$comments;
       wp_mail($to,$subject,$message);
    }
    
}

add_action('wp_head','contactform_capture' );

?>