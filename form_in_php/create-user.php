<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//phpinfo();

/** Aggiungere la validazione del nome utente, deve essere un email corretta */

use crud\UserCRUD;
use models\User;
use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidatePassword;
use validator\ValidateRequired;
use validator\ValidatorRunner;

include "config.php";
require "./autoload.php";

// print_r($_SERVER['REQUEST_METHOD']);
// print_r($_POST);
// print_r($_GET);

$validatorRunner = new ValidatorRunner([
     'first_name' => new ValidateRequired('', 'Il nome è obbligatorio'),
     'last_name' => new ValidateRequired('', 'Il cognome è obbligatorio'),
     'birthday' => new ValidateDate('', 'data obbligatoria'),
     'birth_city' => new ValidateRequired('', 'La città è obbligatorio'),
     'id_regione' =>new ValidateRequired('', 'La regione è obbligatoria'),
     'id_provincia' => new ValidateRequired('', 'La provincia è obbligatoria'),
     'gender' => new ValidateRequired('', 'Il gender è obbligatorio'),
     'username' => new ValidateMail('', 'email obbligatoria'),
     'password' => new ValidatePassword('', 'password obbligatoria')
]);
extract($validatorRunner->getValidatorList());


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
     $validatorRunner->isValid();
     //extract($validatorRunner->getValidatorList());
     //var_dump($validatorRunner->getValid());
     if($validatorRunner->getValid()) {

          $user = User::arrayToUser($_POST);
          $crud = new UserCRUD();
          /*
          try {
               $crud->create($user);
           } catch (\Throwable $th) {
               
               if($th->getCode() == "23000") {
                    header("location: create-user.php");
                   echo "Email già registrata";
               } else {
                    header("location: index-user.php");
               }
           }
          */
          
          $crud->create($user);
          // redirect
          header("location: index-user.php");
     }
}

// is-invalid
//<input type="text" class="form-control is-invalid" name="first_name" id="first_name">

// Questo script viene eseguito quando visualizzo per la prima volta il form
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
     
}
?>
<?php require "./class/views/head-view.php";?>

     
          <section class="row">
               <div class="col-sm-4"></div>
               <div class="col-sm-4">
                    <form class="mt-1 mt-md-5" action="create-user.php" method="POST">
                         <div class="mb-3">
                              <label for="first_name" class="form-label">Nome</label>
                              <input type="text" value="<?= $first_name->getValue(); ?>" 
                                   class="form-control <?php echo !$first_name->getValid()? 'is-invalid' : '' ?>" 
                                   name="first_name" id="first_name">
                                   <?php if(!$first_name->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $first_name->getMessage(); ?>
                                        </div>
                                   <?php endif ?>
                         </div>
                         <div class="mb-3">
                              <label for="last_name" class="form-label">Cognome</label>
                              <input type="text" value="<?= $last_name->getValue(); ?>" 
                                   class="form-control <?php echo !$last_name->getValid()? 'is-invalid' : '' ?>"
                                   name="last_name" id="last_name">
                                   <?php if(!$last_name->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $last_name->getMessage(); ?>
                                        </div>
                                   <?php endif ?>
                         </div>
                         <div class="mb-3">
                              <label for="birthday" class="form-label">Data di nascita</label>
                              <input type="date" value="<?= $birthday->getValue(); ?>" 
                                   class="form-control <?php echo !$birthday->getValid()? 'is-invalid' : '' ?>" 
                                   name="birthday" id="birthday">
                              <?php if(!$birthday->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $birthday->getMessage(); ?>
                                        </div>
                              <?php endif ?>
                         </div>

                         <!-- LUOGO DI NASCITA -->
                         <div class="mb-3">
                              <div class="row">
                                   <div class="col"> 
                                        <label for="birth_city" class="form-label">Città</label>
                                        <input type="text" value="<?= $birth_city->getValue(); ?>" 
                                             class="form-control <?php echo !$birth_city->getValid()? 'is-invalid' : '' ?>" 
                                             name="birth_city" id="birth_city">
                                             <?php if(!$birth_city->getValid()) : ?>
                                                  <div class="invalid-feedback">
                                                       <?= $birth_city->getMessage(); ?>
                                                  </div>
                                             <?php endif ?>
                                   </div>
                                   <div class="col">
                                        <label for="id_regione" class="form-label">Regione</label>
                                        <select id="id_regione"  
                                        class="id_regione form-select <?php echo !$id_regione->getValid()? 'is-invalid' : '' ?>" 
                                        name="id_regione">
                                             <option value=""></option>
                                             <?php foreach(Regione::all() as $key => $regione) : ?>
                                                  <option <?= ($id_regione->getValue() == $regione->id_regione)? 'selected' : '' ?> 
                                                  value="<?= $regione->id_regione ?>"> <?= $regione->nome ?> </option>;
                                             <?php endforeach ?>
                                        </select>
                                        <?php if(!$id_regione->getValid()) : ?>
                                                  <div class="invalid-feedback">
                                                       <?= $id_regione->getMessage(); ?>
                                                  </div>
                                        <?php endif ?>
                                   </div>
                                   <div class="col">
                                        <label for="id_provincia" class="form-label">Provincia</label>
                                        <select id="id_provincia" 
                                        class="id_provincia form-select <?php echo !$id_provincia->getValid()? 'is-invalid' : '' ?>" 
                                        name="id_provincia">
                                             <option value=""></option>
                                             <?php foreach(Provincia::all() as $key => $provincia) : ?>
                                                  <option <?= ($id_provincia->getValue() == $provincia->id_provincia)? 'selected' : '' ?> 
                                                  value="<?= $provincia->id_provincia ?>"> <?= $provincia->nome ?> </option>;
                                             <?php endforeach ?>
                                        </select>
                                        <?php if(!$id_provincia->getValid()) : ?>
                                                  <div class="invalid-feedback">
                                                       <?= $id_provincia->getMessage(); ?>
                                                  </div>
                                        <?php endif ?>
                                   </div>
                              </div>
                         </div>

                         <!-- GENDER -->
                         <div class="mb-3">
                              <span>Genere</span>
                              <div class="form-check">
                                   <input class="form-check-input <?php echo !$gender->getValid()? 'is-invalid' : '' ?>" 
                                        type="radio" name="gender" value="M" 
                                        id="gender_M" <?php echo $gender->getValue() == 'M'? 'checked' : ''; ?>>
                                   <label class="form-check-label" for="gender_M">Maschile</label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input <?php echo !$gender->getValid()? 'is-invalid' : '' ?>" 
                                        type="radio" name="gender" value="F" 
                                        id="gender_F" <?php echo $gender->getValue() == 'F'? 'checked' : ''; ?>>
                                   <label class="form-check-label" for="gender_F">Femminile</label>
                                   <?php if(!$gender->getValid()) : ?>
                                             <div class="invalid-feedback">
                                                  <?= $gender->getMessage(); ?>
                                             </div>
                                   <?php endif ?>
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="username" class="form-label">Nome utente</label>
                              <input type="text" value="<?= $username->getValue(); ?>" 
                                   class="form-control <?php echo !$username->getValid()? 'is-invalid' : '' ?>" 
                                   name="username" id="username">
                              <?php if(!$username->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $username->getMessage(); ?>
                                        </div>
                              <?php endif ?>                                   
                         </div>
                         <div class="mb-3">
                              <label for="password" class="form-label">Password</label>
                              <input type="password" value="<?= $password->getValue(); ?>" 
                                   id="password" name="password" 
                                   class="form-control <?php echo !$password->getValid()? 'is-invalid' : '' ?>"> 
                              <?php if(!$password->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $password->getMessage(); ?>
                                        </div>
                              <?php endif ?>
                         </div>
                         <button class="btn btn-primary btn-sm" type="submit">Registrati</button>
                    </form>
               </div>

               <div class="col-sm-4"></div>
          </section>
<?php require "./class/views/foot-view.php";?>