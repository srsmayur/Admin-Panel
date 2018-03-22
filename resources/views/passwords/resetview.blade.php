
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>Verify Your Email Address</h2>

<div>
    Thanks for creating an account with the verification demo app.
    Please follow the link below to rese tpassowrd
    <a href=<?php echo URL::to('password/reset/'.$verification_code); ?>>Reset</a>.<br/>

</div>

</body>
</html>
