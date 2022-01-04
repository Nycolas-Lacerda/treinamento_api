<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RBMWEB</title>
</head>
<body>
    <form action="<?= base_url('pass/index/1') ?>" method="post" enctype="multipart/form">
        <input type="text" name="name" required>
        <button type="submit">ENVIAR</button>
    </form>
    <p><?= isset($name) ? $name : '';?></p>
</body>
</html>