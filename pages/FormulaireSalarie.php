<?php
require_once "paterns/Head.php";
?>
<html lang="fr">
<link rel="stylesheet" href="../css/FormulaireSalarie.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {box-sizing: border-box;}

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: darkslategrey;
            background-repeat: no-repeat;
            background-attachment: fixed;

        }
        .header {
            overflow: hidden;
            background: linear-gradient(to bottom right, cyan, black);
            padding: 20px 10px;
        }

        .header a {
            float: left;
            color: white;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
            color: white;
        }

        .header a:hover {
            background-color: white;
            color: dodgerblue;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
            color: white;

        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
                color: white;
            }
        }

    </style>
</head>
<body>

<body>
<br>
<br>
<br>
<center>
    <form method="post" id="chaise">
        <fieldset>
            <legend class="chaise">A quoi votre chaise ressemble-t-elle?</legend>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/chaise/1.png"  onclick="getSelection() " ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/chaise/2.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/chaise/3.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/chaise/4.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/chaise/5.png"  ></label>
        </fieldset>
    </form>
    <form method="post" id="casque">
        <fieldset>
            <legend class="casque">A quoi votre casque ressemble-t-il?</legend>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/casque/1.png"  onclick="getSelection() " </label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/casque/2.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/casque/3.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/casque/4.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/casque/5.png"  w></label>
        </fieldset>
    </form>
    <form method="post" id="clavier">
        <fieldset class="clavier">
            <legend class="clavier">A quoi votre clavier ressemble-t-il?</legend>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/clavier/1.png"  onclick=onmousemove()> </label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/clavier/2.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/clavier/3.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/clavier/4.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/clavier/5.png"  ></label>
        </fieldset>
    </form>
    <form method="post" id="souris">
        <fieldset>
            <legend class="souris">A quoi votre souris ressemble-t-elle?</legend>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/souris/1.png"   onclick="getSelection() " </label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/souris/2.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/souris/3.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/souris/4.png"  ></label>
            <label><input type="radio" name="radio"><img src="/Workshop2022/image/souris/5.png"  ></label>
        </fieldset>

        <button class= "send" id= "Button1" type="submit" onclick=myFunction()>Envoyez vos informations</button>

    </form>
</center>


</body>
<script>
    var close = document.getElementsByClassName("closebtn");
    var i;

    for (i = 0; i < close.length; i++) {
        close[i].onclick = function(){
            var div = this.parentElement;
            div.style.opacity = "0";
            setTimeout(function(){ div.style.display = "none"; }, 600);
        }
    }
    <script type="text/javascript">
        $(function () {
        $("#Button1").on('click', function () {
            $("#Button2").show();
        });
    });
</script>

<?php

require 'paterns/Foot.php';
