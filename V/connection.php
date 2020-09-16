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
            <form action="index.php" method="get" >
            <h1>Connection Admin</h1>
          
          	<div class="input-group mb-3">
          		<div class="input-group-prepend">
           			<span class="input-group-text" id="inputGroup-sizing-default">identifiant</span>
          		</div>
          			<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="identifiant" required>
            </div>
          	
          	<div class="input-group mb-3 ">
          		<div class="input-group-prepend">
           			<span class="input-group-text" id="inputGroup-sizing-default">mdp</span>
          		</div>
          			<input type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default" name="mdp" required>
            </div>

            
            <div> 
              <button name="router" value="liste" type="submit" class="btn btn-primary">valider</button>
              <p>identifiant: root ,mdp: btssio</p>
            </div>
          </form>
          </div>
          <div class="col-md-1">
            
          </div>
        </div>
      </div>
    
  </body>
</html>