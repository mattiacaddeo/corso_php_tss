<?php
print_r($_SERVER['REQUEST_METHOD']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     echo 'dati inviati adesso li devo controllare';
} else {
     echo "l'utente deve ancora compilare il form";
}
// is-invalid
//<input type="text" class="form-control is-invalid" name="first_name" id="first_name">
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
                              <input type="text" class="form-control" name="first_name" id="first_name">
                              <div class="invalid-feedback">
                                   il nome è obbligatorio
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="last_name" class="form-label">Cognome</label>
                              <input type="text" class="form-control" name="last_name" id="last_name">
                              <div class="invalid-feedback">
                                   il cognome è obbligatorio
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="birthday" class="form-label">Data di nascita</label>
                              <input type="date" class="form-control" name="birthday" id="birthday">
                              <div class="invalid-feedback">
                                   la data di nascita è obbligatoria
                              </div>
                         </div>
                         <div class="mb-3">
                              <label for="birth_place" class="form-label">Luogo di nascita</label>
                              <input type="text" class="form-control" name="birth_place" id="birth_place">
                              <div class="invalid-feedback">
                                   il luogo di nascita è obbligatorio
                              </div>
                         </div>
                         <!-- <div class="mb-3">
                     <label for="gender-f" class="form-label">F</label>
                     <input type="radio" class="form-control" name="gender" id="gender-f" value="F">
                     <label for="gender-m" class="form-label">M</label>
                     <input type="radio" class="form-control" name="gender" id="gender-m" value="M">
                     <label for="gender-o" class="form-label">Altro</label>
                     <input type="radio" class="form-control" name="gender" id="gender-o" value="Altro">                  
                </div>  -->
                         <!-- <div class="mb-3">
                    <label for="gender" class="form-label">Sesso</label>
                    <select class="form-control is-invalid" name="gender" id="gender">
                         <option></option>
                         <option>F</option>
                         <option>M</option>
                    </select>               
                </div>  -->
                         <div class="mb-3">
                              <span>Genere</span>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="gender" id="gender_M">
                                   <label class="form-check-label" for="gender_M">
                                        Maschile
                                   </label>
                              </div>
                              <div class="form-check">
                                   <input class="form-check-input" type="radio" name="gender" id="gender_F">
                                   <label class="form-check-label" for="gender_F">
                                        Femminile
                                   </label>
                                   <div class="invalid-feedback">
                                        obbligatorio
                                   </div>
                              </div>
                         </div>
                              <div class="mb-3">
                                   <label for="username" class="form-label">Nome utente</label>
                                   <input type="email" class="form-control" name="username" id="username">
                                   <div class="invalid-feedback">
                                        email obbligatoria
                                   </div>
                              </div>
                              <div class="mb-3">
                                   <label for="password" class="form-label">Password</label>
                                   <input type="password" id="password" name="password" class="form-control">
                                   <div class="invalid-feedback">
                                        la password è obbligatoria
                                   </div>
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