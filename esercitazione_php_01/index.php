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
        $array = array("Rosso","Verde","Blu");
        /* dichiarazione della funzione */
        function array2ul($array) {
            for ($i=0; $i < count($array); $i++) { 
                $stringa .= "<li>$array[$i]</li>";
            }
            return "<ul>".$stringa."</ul>";
        }
        echo array2ul($array);
    ?>
</body>
</html>