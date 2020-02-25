<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
    <?= $meta ?>
    <base href="/">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <!--Custom-Theme-files-->
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="h3 text-center col-md-10">Менеджер задач</div>
        <div class="h4 col-md-2 mt-2">
            <? if (!isset($_SESSION['user'])): ?>
                <a href="/auth/signup">Войти</a>
            <? endif ?>

            <? if (isset($_SESSION['user'])): ?>
                <a class="ml-2" href="/auth/logout">Выйти</a>
            <? endif ?>
        </div>
    </div>
    <? if (isset($_SESSION['error'])): ?>
        <div class='alert alert-danger' style="margin-top: 1em">
            <ul>
                <li><?=$_SESSION['error']?></li>
            </ul>
        </div>
    <? endif ?>

    <!--start viewFile content-->

    <?= $content ?>

    <!--end viewFile content-->

</div>

<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</html>