<?php
require_once('classes/user.php')
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">

    <title>Document</title>
</head>

<body class="container">
<div class="col-6 mx-auto">
    <form method="post">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input type="text" class="form-control" name="firstname" id="firstname" aria-describedby="emailHelp" placeholder="Prénom">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="phone">Téléphone</label>
            <input type="number" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" placeholder="Téléphone">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" placeholder=">Mot de passe">
        </div>
        <input type="submit" class="btn btn-primary" name="submitted" value="Envoyer">
    </form>

    <?php

    if(isset($_POST['submitted'])){
        $x = new Users($_POST['name'],$_POST['firstname'], $_POST['email'], $_POST['phone'], $_POST['password']);
        file_put_contents ('coucou.txt', $x->save() );
    }


?>




</div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
</body>

</html>