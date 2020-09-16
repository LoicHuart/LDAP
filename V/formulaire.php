<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>truc</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  </head>
  <body class="bg-dark text-white" >
    
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-1">
          </div>
          <div class="col-md-5">
            <form action="index.php" method="post" >
            <h1>S'enregistrer</h1>
          
          	<div class="input-group mb-3">
          		<div class="input-group-prepend">
           			<span class="input-group-text" id="inputGroup-sizing-default">Nom</span>
          		</div>
          			<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="nom" required>
            </div>
          	
          	<div class="input-group mb-3 ">
          		<div class="input-group-prepend">
           			<span class="input-group-text" id="inputGroup-sizing-default">Prenom</span>
          		</div>
          			<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="prenom" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default" >Mail(pro)</span>
                </div>
                  <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="mail" oncopy="return false" onpaste="return false" oncut="return false" required>
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Mail confirmation</span>
                </div>
                  <input type="email" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="mailConfirmation" oncopy="return false" onpaste="return false" oncut="return false" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Tel</span>
                </div>
                  <input type="tel" pattern="[0-9]{10}" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="tel">
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Mot de passe</span>
                </div>
                  <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="mdp" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oncopy="return false" onpaste="return false" oncut="return false" required>
            </div>  

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroup-sizing-default">Mot de passe</span>
                </div>
                  <input type="password" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="mdpConfirmation" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" oncopy="return false" onpaste="return false" oncut="return false" required>
            </div> 
            <div class="input-group mb-3">
            	<p><input type="checkbox" class="form-check-input" name="rgpd" value="rgpd" required>J'ai pris connaissance de mes droits d'accès de rectification et de suppression de mes données à caractère personnel<a href="index.php?router=rgpd"><span> lien </span></a> </p>
            </div>
            <div class=""> 
            </form> 
              <button name="validerForm" type="submit" class="btn btn-primary">valider</button>  &emsp;  <a href="index.php?router=connection"><button type="button" class="btn btn-primary">admin</button></a>
            </div>
            
          </div>
          <div class="col-md-1">
            
          </div>
        </div>
      </div>
    
  </body>
</html>