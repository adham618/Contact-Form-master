<?php

// check if user come from request

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // assign variable

  $user = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
  $tel = filter_var($_POST['tel'], FILTER_SANITIZE_NUMBER_INT);
  $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

  // creating array of errors

  $formErrors = array();
  if (strlen($user) < 3) {
    $formErrors[] = "Your Username Must Be Larger Than <strong>3</strong> Characters" . "<br/>";
  }
  if (strlen($message) < 10) {
    $formErrors[] = "Your Message Must Be Larger Than <strong>10</strong> Characters";
  }

  // if no errors send te email [to , subject, message , header, parametter]

  $header = 'From' . $email . '\r\n';
  $myemail = 'adhamtarek618@gmail.com';
  $subject = 'Contact Form';

  if (empty($formErrors)) {
    mail($myemail, $subject, $message, $header);
    $user = '';
    $email = '';
    $message = '';

    $success = "<div class='alert alert-success alert-dismissible fade show' role='alert'>We Have Recevied Your Message
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
     </button>
      </div>";

  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>

                                              <!-- META TAG -->

  <meta charset="UTF-8" />
  <meta name="description" content="" />
  <meta name="theme-color" content="#00e7d9" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

                                            <!-- CSS FILE -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
    integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@1,600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/contact.css" />
  <link rel="shortcut icon" href="" type="image/x-icon" />

  <title>Contact Form</title>
</head>

<body>

                                              <!-- CONTACT FORM -->

  <div class="contact-form">
    <div class="container"></div>
      <h2 class="text-center" id="responsive_headline">Contact Me</h2>

      <?php
if (!empty($formErrors)) {?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          <?php
  foreach ($formErrors as $errors) {
    echo $errors;
  }
?>
    </div>
        <?php
}?>
        <?php if (isset($success)) {
  echo $success;
}
?>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
          <div class="form-group">
          <input type="text" class="form-control username" name="username" placeholder="Type Your Username*" value="<?php if (isset($user)) {
  echo $user;
}?>">
          <i class="fas fa-user fa-fw"></i>
          <div class="alert alert-danger alert-custom">Your Username Must Be Larger Than <strong>3</strong> Characters</div>
          </div>
          <div class="form-group">
            <input type="email" class="form-control email" name="email" placeholder="Please Type a Valid Email*" value='<?php if (isset($email)) {
  echo $email;
}?>'>
            <i class="fas fa-envelope fa-fw"></i>
            <div class="alert alert-danger alert-custom">
              Email Can't Be <strong>Empty</strong>
            </div>
        </div>
        <div class="form-group">
          <input type="tel" class="form-control" name="tel" placeholder="Type Your Call Phone" value='<?php if (isset($tel)) {
  echo $tel;
}?>'>
          <i class="fas fa-phone-alt fa-fw"></i>
        </div>
        <div class="form-group">
          <textarea class="form-control message" name="message" rows="7" placeholder="Your Message*" value=''><?php if (isset($message)) {
  echo $message;
}?>
</textarea>
    <div class="alert alert-danger alert-custom">our Message Must Be Larger Than <strong>10</strong> Characters"</div>
          </div>

          <!-- Recaptcha -->

          <div class='form-controlhh'>
          <input type="submit" class="btn btn-primary g-recaptcha" value="Send Message"
                  data-sitekey="6LeRgf0UAAAAAJx9Jrs6wCVTvxE4XqxEtSo1wUi9" 
                  data-callback='onSubmit' 
                  data-action='submit'>
          <i class="fas fa-paper-plane fa-fw send-icon"></i>
          </div>
        </div>
      </form>
    </div>
  </div>

                                                  <!-- JS SCRIPTS -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FitText.js/1.2.0/jquery.fittext.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    <!-- reacaptcha -->

    <script src="https://www.google.com/recaptcha/api.js?render=6LeRgf0UAAAAAJx9Jrs6wCVTvxE4XqxEtSo1wUi9"></script>
    <script>
      function onClick(e) {
        e.preventDefault();
        grecaptcha.ready(function() {
          grecaptcha.execute('6LeRgf0UAAAAAJx9Jrs6wCVTvxE4XqxEtSo1wUi9', {action: 'submit'}).then(function(token) {
              // Add your logic to submit to your backend server here.
          });
        });
      }
  </script>
   <script>
   function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
 </script>
</body>
</html>