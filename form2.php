
<!DOCTYPE html>
 <html>
<head>
  <meta charset="utf-8">
    <title>Page de profil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/styleprofil.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<style>
  td{width:50%;}
  hr{border: 3px solid rgb(113, 197, 223);border-radius: 10px;}
</style>
</head>
<body>
   
<form class="md-form" method="POST" enctype="multipart/form-data" >
        <div class="container"
       style="display: grid;
         grid-template-columns: repeat(1,auto);
         grid-gap: 4em;
         margin-top:2em;">

          <table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
        <hr><h3>Priére de compléter les information ci-dessous</h3><hr>
        </td> 
        <td></td>
    </tr>
  </table>
            
    
  <main>
    <div class="card" style="
        background: white;
        padding: 1.5em;
        border-radius: .4em;
        box-shadow:
        0 20px 30px 0 rgba(0,0,0,.1),
        0 4px  4px 0 rgba(0,0,0,.15)">
     
      <strong>Photo de profil</strong>
      <input type="file" name="fichier">
      <p>Exemple</p>
      <img src="style/img/profil.jpg" width="450pX" height="300px">
      <br>
  

      <strong>Carte d'identité(recto)</strong>
      <input type="file" name="fichier">
      <p>Exemple</p>
      <img src="style/img/id1.jpg"width="450pX" height="300px">
      <br>

      <strong>carte d'identité(verso)</strong>
      <input type="file" name="fichier">
      <p>Exemple</p>
      <img src="style/img/id2.jpg"width="450pX" height="300px">
      <br><br>
      
      <input class="btn btn-info" type="submit" value="Confirmer" >
    </div>
  </main>
</div>
</form>
</body>
</html>