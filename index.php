<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css"/>
    <title>Contact form</title>
</head>
<body>
    <div class="theTitle">
        <h2 class="">Contact us</h2>
    </div>
    <div class="container">
    <?php require "contactform.php"; ?>
        <?php if($msg != ''): ?>
            <div class="alert <?php echo $msgClass ?>">
                <?php echo $msg  ?>
            </div>
        <?php endif; ?>
        <form action="contactform.php" method="post">
            <input type="text" name="name" placeholder="Full name" value="<?php echo isset($_POST['name']) ? $name : ''; ?>"/>
            <input type="text" name="email" placeholder="Your E-Mail" value="<?php echo isset($_POST['email']) ? $email : ''; ?>"/>
            <input type="text" name="subject" placeholder="Subject" value="<?php echo isset($_POST['subject']) ? $subject : ''; ?>"/>
            <textarea name="message" placeholder="Message" value="<?php echo isset($_POST['message']) ? $message : ''; ?>"></textarea>
            <button class="submitButton" type="submit" name="submit">Send Mail</button>
        </form>
    </div>
</body>
</html>