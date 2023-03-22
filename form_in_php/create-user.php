<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//phpinfo();

/** Aggiungere la validazione del nome utente, deve essere un email corretta */

use Registry\it\Provincia;
use Registry\it\Regione;
use validator\ValidateDate;
use validator\ValidateMail;
use validator\ValidatePassword;
use validator\ValidateRequired;
use validator\ValidatorRunner;

require "../config.php";
require "./autoload.php";

// print_r($_SERVER['REQUEST_METHOD']);
print_r($_POST);
print_r($_GET);
/*
$first_name = new ValidateRequired('', 'Il nome è obbligatorio');
$last_name = new ValidateRequired('', 'Il cognome è obbligatorio');
$birthday = new ValidateDate('', 'data obbligatoria');
$birth_city = new ValidateRequired('', 'La città è obbligatorio');
$birth_region = new ValidateRequired('', 'La regione è obbligatoria');
$birth_province = new ValidateRequired('', 'La provincia è obbligatoria');
$gender = new ValidateRequired('', 'Il gender è obbligatorio');
$username = new ValidateMail('', 'email obbligatoria');
$password = new ValidatePassword('', 'password obbligatoria');
*/
$validatorRunner = new ValidatorRunner([
     'first_name' => new ValidateRequired('', 'Il nome è obbligatorio'),
     'last_name' => new ValidateRequired('', 'Il cognome è obbligatorio'),
     'birthday' => new ValidateDate('', 'data obbligatoria'),
     'birth_city' => new ValidateRequired('', 'La città è obbligatorio'),
     'birth_region' =>new ValidateRequired('', 'La regione è obbligatoria'),
     'birth_province' => new ValidateRequired('', 'La provincia è obbligatoria'),
     'gender' => new ValidateRequired('', 'Il gender è obbligatorio'),
     'username' => new ValidateMail('', 'email obbligatoria'),
     'password' => new ValidatePassword('', 'password obbligatoria')
]);
extract($validatorRunner->getValidatorList());


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
     $validatorRunner->isValid();
     //extract($validatorRunner->getValidatorList());
     if($validatorRunner->getValid()) {
          echo "posso inviare i dati al server";
     }
    
     /*
     $first_name->isValid($_POST['first_name']);
     $last_name->isValid($_POST['last_name']);
     $birthday->isValid($_POST['birthday']);
     $birth_city->isValid($_POST['birth_city']);
     $birth_region->isValid($_POST['birth_region']);
     $birth_province->isValid($_POST['birth_province']);
     $value = isset($_POST['gender'])? $_POST['gender'] : '';
     $gender->isValid($value);
     $username->isValid($_POST['username']);
     $password->isValid($_POST['password']);
     */
}

// is-invalid
//<input type="text" class="form-control is-invalid" name="first_name" id="first_name">

// Questo script viene eseguito quando visualizzo per la prima volta il form
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
     
}
?>

<!doctype html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Bootstrap demo</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
     <header class="bg-light p-1">
          <h1 class="display-6">Applicazione demo</h1>
     </header>
     <main class="container">

          <section class="row">
               <div class="col-sm-4">

               </div>
               <div class="col-sm-4">
                    <form class="mt-1 mt-md-5" action="create-user.php" method="POST">
                         <div class="mb-3">
                              <label for="first_name" class="form-label">Nome</label>
                              <input type="text" value="<?= $first_name->getValue(); ?>" 
                                   class="form-control <?php echo !$first_name->getValid()? 'is-invalid' : '' ?>" 
                                   name="first_name" id="first_name">
                                   <?php
                                   if(!$first_name->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $first_name->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>
                         </div>
                         <div class="mb-3">
                              <label for="last_name" class="form-label">Cognome</label>
                              <input type="text" value="<?= $last_name->getValue(); ?>" 
                                   class="form-control <?php echo !$last_name->getValid()? 'is-invalid' : '' ?>"
                                   name="last_name" id="last_name">
                                   <?php
                                   if(!$last_name->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $last_name->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>
                              
                         </div>
                         <div class="mb-3">
                              <label for="birthday" class="form-label">Data di nascita</label>
                              <input type="date" value="<?= $birthday->getValue(); ?>" 
                                   class="form-control <?php echo !$birthday->getValid()? 'is-invalid' : '' ?>" 
                                   name="birthday" id="birthday">
                              <?php
                                   if(!$birthday->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $birthday->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>
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
                                        <label for="birth_region" class="form-label">Regione</label>
                                        <select id="birth_region"  
                                        class="birth_region form-select <?php echo !$birth_region->getValid()? 'is-invalid' : '' ?>" 
                                        name="birth_region">
                                             <option value=""></option>
                                             <?php foreach(Regione::all() as $key => $regione) : ?>
                                                  <option <?= ($birth_region->getValue() == $regione->id_regione)? 'selected' : '' ?> 
                                                  value="<?= $regione->id_regione ?>"> <?= $regione->nome ?> </option>;
                                             <?php endforeach ?>
                                        </select>
                                        <?php
                                             if(!$birth_region->getValid()) : ?>
                                                  <div class="invalid-feedback">
                                                       <?= $birth_region->getMessage(); ?>
                                                  </div>
                                        <?php
                                        endif ?>
                                   </div>
                                   <div class="col">
                                        <label for="birth_province" class="form-label">Provincia</label>
                                        <select id="birth_province" 
                                        class="birth_province form-select <?php echo !$birth_province->getValid()? 'is-invalid' : '' ?>" 
                                        name="birth_province">
                                             <option value=""></option>
                                             <?php foreach(Provincia::all() as $key => $provincia) : ?>
                                                  <option <?= ($birth_province->getValue() == $provincia->id_provincia)? 'selected' : '' ?> 
                                                  value="<?= $provincia->id_provincia ?>"> <?= $provincia->nome ?> </option>;
                                             <?php endforeach ?>
                                        </select>
                                        <?php
                                             if(!$birth_province->getValid()) : ?>
                                                  <div class="invalid-feedback">
                                                       <?= $birth_province->getMessage(); ?>
                                                  </div>
                                        <?php
                                        endif ?>
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
                                   <label class="form-check-label" for="gender_M">
                                        Maschile
                                   </label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input <?php echo !$gender->getValid()? 'is-invalid' : '' ?>" 
                                        type="radio" name="gender" value="F" 
                                        id="gender_F" <?php echo $gender->getValue() == 'F'? 'checked' : ''; ?>>
                                   <label class="form-check-label" for="gender_F">
                                        Femminile
                                   </label>
                                   <?php
                                   if(!$gender->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $gender->getMessage(); ?>
                                        </div>
                                   <?php 
                                   endif ?>
                              </div>
                         </div>
                              <div class="mb-3">
                                   <label for="username" class="form-label">Nome utente</label>
                                   <input type="text" value="<?= $username->getValue(); ?>" 
                                        class="form-control <?php echo !$username->getValid()? 'is-invalid' : '' ?>" 
                                        name="username" id="username">
                                   <?php
                                   if(!$username->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $username->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>                                   
                              </div>
                              <div class="mb-3">
                                   <label for="password" class="form-label">Password</label>
                                   <input type="password" value="<?= $password->getValue(); ?>" 
                                        id="password" name="password" 
                                        class="form-control <?php echo !$password->getValid()? 'is-invalid' : '' ?>"> 
                                   <?php
                                   if(!$password->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $password->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>
                                   
                              </div>
                              <button class="btn btn-primary btn-sm" type="submit">Registrati</button>
                    </form>
               </div>

               <div class="col-sm-4">

               </div>
          </section>
     </main>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>