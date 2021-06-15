<?PHP  header("Content-Type: text/html; charset=utf-8");?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="styles.css">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <title>MyCaptcha</title>
    <script type="text/javascript">
        function submitForm() {
            let a = document.forms["submit_form"]["username"].value;
            let b = document.forms["submit_form"]["email"].value;
            let c = document.forms["submit_form"]["password"].value;

            if (a == null || a === "", b == null || b === "", c == null || c === "") {
                alert("Пожалуйста, заполните все поля!");
                return false;
            } else {
                let frm = document.getElementsByName('submit_form')[0];
                frm.submit(); // Submit the form
                frm.reset();  // Reset all form data
                return false; // Prevent page refresh
            }
        }
    </script>
</head>
<body>
    <h1>Пссс... Попробуй эту форму</h1>
    <form method="post" action="go.php" name="submit_form" enctype="multipart/form-data">
        <label for="username">Имя пользователя</label>
        <input type="text" id="username" name="username" required="required">

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required="required">

        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" required="required">

        <img src="captcha.php" id="captcha" width="250" height="100" alt="icon">
        <input type="button" value="Обновить" onclick="document.getElementById('captcha').src='captcha.php?rid=' + Math.random();">

        <label for="captcha_text">Введите капчу (текст с картинки выше)</label>
        <input type="text" id="captcha_text" name="captcha_text">

        <input type="button" value="Войти" onclick="submitForm();">
    </form>

</body>
</html>
