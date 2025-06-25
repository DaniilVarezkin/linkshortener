<?php require_once("func.php"); ?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Новая ссылка</title>
</head>
<body>
    <div class="container mt-3">
        <h3>Сокращенная ссылка</h3>
        <div class="input-group">
            <input type="text" class="form-control" id="textToCopy" value="<?php echo createShortLink(htmlspecialchars( $_POST['user-link'])); ?>" readonly>
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" onclick="copyText()">Копировать</button>
            </div>
        </div>
        <a href="/createlink.php">на главную</a>

        <script>
            function copyText() {
                var copyText = document.getElementById("textToCopy");
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");
            }
        </script>
    </div>
</body>
</html>
