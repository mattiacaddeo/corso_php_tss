<?php

use crud\UserCRUD;
use models\User;

require "../config.php";
require "./autoload.php";
require "./class/views/head-view.php"; ?>

<?php 

$users = (new UserCRUD())->read();
print_r($users);





?>

<section class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-4">
        <table class="table">
        <tr>
        <?php 
        $utente = new User();
        $propieta = get_object_vars($utente);
        foreach ($propieta as $key => $value) :
                    echo "<th>".$key."</th>";
        endforeach ?>
        <td>
            <a href="create-user.php" class="btn btn-primary btn-xs">edit</a>
            <a class="btn btn-danger btn-xs">delete</button>
        </td>
        </tr>
            <!-- <tr>
                
                <th>#</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Comune</th>
            </tr> -->
            
            <?php foreach ($users as $value) :
                    echo "<tr>";
                    echo "<th>".$value->id_user."</th>";
                    echo "<th>".$value->first_name."</th>";
                    echo "<th>".$value->last_name."</th>";
                    echo "<th>".$value->birthday."</th>";
                    echo "<th>".$value->birth_city."</th>";
            ?>
            <td>
                <a href="create-user.php" class="btn btn-primary btn-xs">edit</a>
                <a class="btn btn-danger btn-xs">delete</button>
            </td>
            <?php
                    echo "</tr>";
            endforeach ?>
                
            
        </table>
    </div>

    <div class="col-sm-2"></div>
</section>
<?php require "./class/views/foot-view.php"; ?>