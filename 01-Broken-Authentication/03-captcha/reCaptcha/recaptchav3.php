<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<script src="https://www.google.com/recaptcha/api.js?render=6LeHeL8UAAAAAP2aaUpGKQLaEyEvEYycCZLJhcfY"></script>
<script>
grecaptcha.ready(function() {
    grecaptcha.execute('6LeHeL8UAAAAAP2aaUpGKQLaEyEvEYycCZLJhcfY', {action: 'homepage'}).then(function(token) {
       //...
    });
});
</script>

</body>
</html>