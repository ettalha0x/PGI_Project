<?php  require_once 'function.php';
   
   if (!empty($_POST) && !empty($_POST['email']) && !empty($_POST['password'])) {
   	
   
		    $pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','');

			$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

    $req = $pdo->prepare('SELECT * FROM users WHERE (email = :email) AND confirmed_at IS NOT NULL' );
    $req->execute(['email' => $_POST['email']]);

    $user = $req->fetch();
    
		    if( password_verify($_POST['password'], $user->password)){
		    	session_status();
             
               $_SESSION['auth'] = $user;
               $_SESSION['flash']['success']= 'Vous etes maintenant connecté ';

               header('location: profil.php');
               exit();


		    }else{
                    $_SESSION['flash']['danger']= 'Email ou mot de passe incorrecte';

		    }


   


  
   }
   



  ?>







<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<title>Plateform de Gestion d'inscription</title>
	<link rel="stylesheet" href="style/styleindex.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

<header>

<h2><span class="titre1">Plate-forme de Gestion d'inscription </h2>></span>





     <?php 
                if (session_status() == PHP_SESSION_NONE ) {

                    session_start();
                }
                ?>
<?php                 
     if (isset($_SESSION['flash'])): ?>
                       <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                 
                         <div class="alert alert-danger"><li>Votre token n'est pas valide</li></div>

                      <?php endforeach; ?>
                     <?php unset($_SESSION['flash']); ?>
                 <?php endif;?>

</header>

<div class="login">

		<h2>Identiez-vous</h2>
				


   <form action="" method="POST">

              <div class="inputlogin">
          
			      <input type="email" name="email" >
			      <label>Adress e-mail</label>

			  </div>

			  <div class="inputlogin">
			      <input type="password" name="password" >
			      <label>Mot de Passe</label>
		     </div>
				
				<h6><a href="">Mot de pass oublié ?</a></h6>
			    
			    <br><br>

			<input type="submit" name="ok" value="Se connecter">
			
			
			   <br><br>
			
			<h6><a href="register.php">Créer un compte</a></h6>

	

   </form>

 </div>
</body>
</html>