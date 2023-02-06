<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php
        $nome = "Mario";
        $eta = 50;
        $passatempi = array("Tennis","Cinema","No sport");
        
        /* dichiarazione della funzione */
        function saluta($nome) {
            return "Ciao io sono $nome, come va?";
        }

        echo saluta($nome); //chiamata della funzione
        echo "<h1>".saluta($nome)."</h1>";
        echo "<div>".saluta($nome)."</div>";
        echo "<p>".saluta($nome)."</p>";

        // genera un warning perché echo può visualizzare solo string e number
        // echo $passatempi;
        echo "<ul>";
        for ($i=0; $i < count($passatempi); $i++) { 
            echo "<li>$passatempi[$i]</li>";
        }
        echo "</ul>";
    ?>
    
</body>
</html>