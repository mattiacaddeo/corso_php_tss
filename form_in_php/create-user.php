<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
//phpinfo();

/** Aggiungere la validazione del nome utente, deve essere un email corretta */
require "./class/validator/Validable.php";
require "./class/validator/ValidateRequired.php";
require "./class/validator/ValidateMail.php";
require "./class/validator/ValidateDate.php";
require "./class/validator/ValidatePassword.php";

// print_r($_SERVER['REQUEST_METHOD']);
print_r($_POST);

$validatorName = new ValidateRequired('', 'Il nome è obbligatorio');
$validatorLastName = new ValidateRequired('', 'Il cognome è obbligatorio');
$validatorDate = new ValidateDate('', 'data obbligatoria');
$validatorBirthplace = new ValidateRequired('', 'Il luogo di nascita è obbligatorio');
$validatorGender = new ValidateRequired('', 'Il gender è obbligatorio');
$validatorEmail = new ValidateMail('', 'email obbligatoria');
$validatorPassword = new ValidatePassword('', 'password obbligatoria');


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
     $validatedName = $validatorName->isValid($_POST['first_name']);
     $validatedLastName = $validatorLastName->isValid($_POST['last_name']);
     $validatedDate = $validatorDate->isValid($_POST['birthday']);
     $validatedBirthplace = $validatorBirthplace->isValid($_POST['birth_place']);
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
                         <div class="mb-3">
                              <label for="birth_place" class="form-label">Luogo di nascita</label>
                              <input type="text" value="<?= $validatorBirthplace->getValue(); ?>" 
                                   class="form-control <?php echo !$validatorBirthplace->getValid()? 'is-invalid' : '' ?>" 
                                   name="birth_place" id="birth_place">
                              <?php
                                   if(!$validatorBirthplace->getValid()) : ?>
                                        <div class="invalid-feedback">
                                             <?= $validatorBirthplace->getMessage(); ?>
                                        </div>
                                    <?php
                                   endif ?>
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