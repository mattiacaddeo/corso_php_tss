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

require "../config.php";
require "./autoload.php";

// print_r($_SERVER['REQUEST_METHOD']);
print_r($_POST);
print_r($_GET);

$validatorName = new ValidateRequired('', 'Il nome è obbligatorio');
$validatorLastName = new ValidateRequired('', 'Il cognome è obbligatorio');
$validatorDate = new ValidateDate('', 'data obbligatoria');
$validatorBirthCity = new ValidateRequired('', 'La città è obbligatorio');
$validatorBirthRegion = new ValidateRequired('', 'La regione è obbligatoria');
$validatorBirthProvince = new ValidateRequired('', 'La provincia è obbligatoria');
$validatorGender = new ValidateRequired('', 'Il gender è obbligatorio');
$validatorEmail = new ValidateMail('', 'email obbligatoria');
$validatorPassword = new ValidatePassword('', 'password obbligatoria');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
     $validatedName = $validatorName->isValid($_POST['first_name']);
     $validatedLastName = $validatorLastName->isValid($_POST['last_name']);
     $validatedDate = $validatorDate->isValid($_POST['birthday']);
     $validatedBirthCity = $validatorBirthCity->isValid($_POST['birth_city']);
     $validatedBirthRegion = $validatorBirthRegion->isValid($_POST['birth_region']);
     $validatedBirthProvince = $validatorBirthProvince->isValid($_POST['birth_province']);
     $value = isset($_POST['gender'])? $_POST['gender'] : '';
     $validatedGender = $validatorGender->isValid($value);
     $validatedEmail = $validatorEmail->isValid($_POST['username']);
     $validatedPassword = $validatorPassword->isValid($_POST['password']);

}
// } else {
//      echo "l'utente deve ancora compilare il form";
// }

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
                              <input type="text" value="<?= $validatorName->getValue(); ?>" 
                                   class="form-control <?php echo !$validatorName->getValid()? 'is-invalid' : '' ?>" 
                                   name="first_name" id="first_name">
                                   <?php
                                   if(!$validatorName->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $validatorName->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>
                         </div>
                         <div class="mb-3">
                              <label for="last_name" class="form-label">Cognome</label>
                              <input type="text" value="<?= $validatorLastName->getValue(); ?>" 
                                   class="form-control <?php echo !$validatorLastName->getValid()? 'is-invalid' : '' ?>"
                                   name="last_name" id="last_name">
                                   <?php
                                   if(!$validatorLastName->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $validatorLastName->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>
                              
                         </div>
                         <div class="mb-3">
                              <label for="birthday" class="form-label">Data di nascita</label>
                              <input type="date" value="<?= $validatorDate->getValue(); ?>" 
                                   class="form-control <?php echo !$validatorDate->getValid()? 'is-invalid' : '' ?>" 
                                   name="birthday" id="birthday">
                              <?php
                                   if(!$validatorDate->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $validatorDate->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>
                         </div>

                         <!-- LUOGO DI NASCITA -->
                         
                         
                         <div class="mb-3">
                              <div class="row">
                                   <div class="col"> 
                                        <label for="birth_city" class="form-label">Città</label>
                                        <input type="text" value="<?= $validatorBirthCity->getValue(); ?>" 
                                             class="form-control <?php echo !$validatorBirthCity->getValid()? 'is-invalid' : '' ?>" 
                                             name="birth_city" id="birth_city">
                                             <?php
                                             if(!$validatorBirthCity->getValid()) : ?>
                                                  <div class="invalid-feedback">
                                                       <?= $validatorBirthCity->getMessage(); ?>
                                                  </div>
                                             <?php
                                             endif ?>
                                       
                                   </div>
                                   <div class="col">
                                        <label for="birth_region" class="form-label">Regione</label>
                                        <select id="birth_region"  
                                        class="birth_region form-select <?php echo !$validatorBirthRegion->getValid()? 'is-invalid' : '' ?>" 
                                        name="birth_region">
                                             <option value=""></option>
                                             <?php foreach(Regione::all() as $key => $regione) : ?>
                                                  <option <?= ($validatorBirthRegion->getValue() == $regione->id_regione)? 'selected' : '' ?> 
                                                  value="<?= $regione->id_regione ?>"> <?= $regione->nome ?> </option>;
                                             <?php endforeach ?>
                                        </select>
                                        <?php
                                             if(!$validatorBirthRegion->getValid()) : ?>
                                                  <div class="invalid-feedback">
                                                       <?= $validatorBirthRegion->getMessage(); ?>
                                                  </div>
                                        <?php
                                        endif ?>
                                   </div>
                                   <div class="col">
                                        <label for="birth_province" class="form-label">Provincia</label>
                                        <select id="birth_province" 
                                        class="birth_province form-select <?php echo !$validatorBirthProvince->getValid()? 'is-invalid' : '' ?>" 
                                        name="birth_province">
                                             <option value=""></option>
                                             <?php foreach(Provincia::all() as $key => $provincia) : ?>
                                                  <option <?= ($validatorBirthProvince->getValue() == $provincia->id_provincia)? 'selected' : '' ?> 
                                                  value="<?= $provincia->id_provincia ?>"> <?= $provincia->nome ?> </option>;
                                             <?php endforeach ?>
                                        </select>
                                        <?php
                                             if(!$validatorBirthProvince->getValid()) : ?>
                                                  <div class="invalid-feedback">
                                                       <?= $validatorBirthProvince->getMessage(); ?>
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
                                   <input class="form-check-input <?php echo !$validatorGender->getValid()? 'is-invalid' : '' ?>" 
                                        type="radio" name="gender" value="M" 
                                        id="gender_M" <?php echo $validatorGender->getValue() == 'M'? 'checked' : ''; ?>>
                                   <label class="form-check-label" for="gender_M">
                                        Maschile
                                   </label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input <?php echo !$validatorGender->getValid()? 'is-invalid' : '' ?>" 
                                        type="radio" name="gender" value="F" 
                                        id="gender_F" <?php echo $validatorGender->getValue() == 'F'? 'checked' : ''; ?>>
                                   <label class="form-check-label" for="gender_F">
                                        Femminile
                                   </label>
                                   <?php
                                   if(!$validatorGender->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $validatorGender->getMessage(); ?>
                                        </div>
                                   <?php 
                                   endif ?>
                              </div>
                         </div>
                              <div class="mb-3">
                                   <label for="username" class="form-label">Nome utente</label>
                                   <input type="text" value="<?= $validatorEmail->getValue(); ?>" 
                                        class="form-control <?php echo !$validatorEmail->getValid()? 'is-invalid' : '' ?>" 
                                        name="username" id="username">
                                   <?php
                                   if(!$validatorEmail->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $validatorEmail->getMessage(); ?>
                                        </div>
                                   <?php
                                   endif ?>                                   
                              </div>
                              <div class="mb-3">
                                   <label for="password" class="form-label">Password</label>
                                   <input type="password" value="<?= $validatorPassword->getValue(); ?>" 
                                        id="password" name="password" 
                                        class="form-control <?php echo !$validatorPassword->getValid()? 'is-invalid' : '' ?>"> 
                                   <?php
                                   if(!$validatorPassword->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $validatorPassword->getMessage(); ?>
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