<?php

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
        }
        .header {
            overflow: hidden;
            background-color: rebeccapurple;
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

<div class="header">
    <i class='fas fa-air-freshener' style='font-size:48px;color:red'></i>
    <a href="#default" class="logo">Ergonobro</a>
    <div class="header-right">
        <a class="active" href="#home">Accueil</a>
        <a class= "manager" href="#contact">Page Manager</a>
        <a class= "salarié" href="#about">Page Salarié</a>
    </div>
</div>
<body>
<br>
<br>
<br>
<center>
    <form method="post" id="chaise">
        <fieldset>
            <legend>A quoi votre chaise ressemble-t-elle</legend>
            <label><input type="radio" name="radio"><img src="/image/chaise/1.png"  width="200" height="180" onclick="getSelection() " </label>
            <label><input type="radio" name="radio"><img src="/image/chaise/2.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/chaise/3.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/chaise/4.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/chaise/5.png"  width="200" height="180"></label>
        </fieldset>
    </form>
    <form method="post" id="casque">
        <fieldset>
            <legend>A quoi votre casque ressemble-t-elle</legend>
            <label><input type="radio" name="radio"><img src="/image/casque/1.png"  width="200" height="180" onclick="getSelection() " </label>
            <label><input type="radio" name="radio"><img src="/image/casque/2.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/casque/3.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/casque/4.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/casque/5.png"  width="200" height="180"></label>
        </fieldset>
    </form>
    <form method="post" id="clavier">
        <fieldset>
            <legend>A quoi votre clavier ressemble-t-elle</legend>
            <label><input type="radio" name="radio"><img src="/image/clavier/1.png"  width="200" height="180" onclick=onmousemove() </label>
            <label><input type="radio" name="radio"><img src="/image/clavier/2.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/clavier/3.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/clavier/4.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/clavier/5.png"  width="200" height="180"></label>
        </fieldset>
    </form>
    <form method="post" id="souris">
        <fieldset>
            <legend>A quoi votre souris ressemble-t-elle</legend>
            <label><input type="radio" name="radio"><img src="/image/souris/1.png"  width="200" height="180" onclick="getSelection() " </label>
            <label><input type="radio" name="radio"><img src="/image/souris/2.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/souris/3.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/souris/4.png"  width="200" height="180"></label>
            <label><input type="radio" name="radio"><img src="/image/souris/5.png"  width="200" height="180"></label>
        </fieldset>




</center>
<footer>
    <center>
        <button id= "send" type="submit" onclick=myFunction()>Envoyez vos informations</button>


        <div class="alert success">
            <span class="closebtn">&times;</span>
            <strong>Informations bien envoyé</strong>
        </div>


</center>
</footer>

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
    </script>


</body>
</html>