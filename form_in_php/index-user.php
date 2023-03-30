<?php

use crud\UserCRUD;
use models\User;

require "../config.php";
require "./autoload.php";
require "./class/views/head-view.php"; ?>

<?php 

$users = (new UserCRUD())->read();
//print_r($users);

?>
        <table class="table">
        <!-- <tr>
            <?php 
            $utente = new User();
            $propieta = get_object_vars($utente);
            foreach ($propieta as $key => $value) :
                        echo "<th>".$key."</th>";
            endforeach ?>
            <td>
                <th>Azioni</th>
            </td>
        </tr> -->
            <tr>
                
                <th>#</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Giorno di nascita</th>
                <th>Città</th>
                <th>Regione</th>
                <th>Provincia</th>
                <th>Genere</th>
                <th>Username</th>
                <th>Password</th>
                <th>Azioni</th>
            </tr>
            
            <?php 
            if($users) :
            foreach ($users as $user) :
                    echo "<tr>";
                    echo "<th>".$user->id_user."</th>";
                    echo "<th>".$user->first_name."</th>";
                    echo "<th>".$user->last_name."</th>";
                    echo "<th>".$user->birthday."</th>";
                    echo "<th>".$user->birth_city."</th>";
                    echo "<th>".$user->id_regione."</th>";
                    echo "<th>".$user->id_provincia."</th>";
                    echo "<th>".$user->gender."</th>";
                    echo "<th>".$user->username."</th>";
                    echo "<th>".$user->password."</th>";
            ?>
            <td>
                <th>
                <a href="edit-user.php?id_user=<?= $user->id_user?>" class="btn btn-primary btn-sm">edit</a>
                <a href="delete-user.php?id_user=<?= $user->id_user?>" class="btn btn-danger btn-sm">delete</a>
                </th>
            </td>
            <?php
                    echo "</tr>";
            endforeach;
            endif; ?>
                
            
        </table>
   
<?php require "./class/views/foot-view.php"; ?>