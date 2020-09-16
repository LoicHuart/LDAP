<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <form action="#" method="post">
    <table class="table">
      <thead class="thead-dark">
        <tr>  
          <th colspan="6" >Liste a valider
              <button name="supp" type="submit" class="btn btn-primary float-right mr-3" >supprimer</button>
              <button name="valide" type="submit" class="btn btn-primary float-right mr-3">valider</button> 
              <select class="float-right mr-3" name="groupe">
                <?php 
                  require 'liste_deroulante.php';
                ?>
              </select>
          </th>
        </tr>
        <tr>
          <th scope="col">id</th>
          <th scope="col">nom</th>
          <th scope="col">prenom</th>
          <th scope="col">mail</th>
          <th scope="col">tel</th>
          <th scope="col">sélectionner</th>
        </tr>
      </thead>
      <tbody>
        <?php
          require 'liste_table_a_valider.php';
        ?>
      </tbody>
    </table>

    <table class="table">
      <thead class="thead-dark">
        <tr>  
          <th colspan="7">Liste valider
            <button name="suppGroupe" type="submit" class="btn btn-primary float-right mr-3" >supprimé groupe ldap</button>
            <button name="nouveauGroupe" type="submit" class="btn btn-primary float-right mr-3" >créer groupe ldap</button>
            <p class="float-right mr-3">Ou :<input type="text" name="groupeInput"></p>

          </th>
        </tr>
        <tr>
          <th scope="col">uid</th>
          <th scope="col">prenomNOM(cn)</th>
          <th scope="col">nom(sn)</th>
          <th scope="col">mail</th>
          <th scope="col">tel</th>
          <th scope="col">Groupe(ou)</th>
          <th scope="col">sélectionner</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          require 'liste_ldap.php';  
        ?>
      </tbody>
    </table>
    </form>

  	<script src="jscript.js"></script>
  	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>