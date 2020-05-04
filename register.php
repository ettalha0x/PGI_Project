<?php require_once'function.php'; 


session_start();

if (!empty($_POST)) {
	
    $errors=array();

	$pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','');

	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

	$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);




    if (empty($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
    	$errors['email']="Votre email n'est valide";
    } else{
      
      $req = $pdo->prepare('SELECT id FROM users WHERE email = ?');

      $req->execute([$_POST['email']]);

      $user = $req->fetch();
      
        if ($user){
        	$errors['email'] = 'Cet email est déja utilisé pour un autre compte';
        }
    }


    if (empty($_POST['password']) || $_POST['password'] != $_POST['password2']){
    	$errors['password']="Vous devez rentrer un mot de passe valide ";
    }

    if (empty($errors)){
        

    $req = $pdo->prepare("INSERT INTO users SET email=?, password=?,confirmation_token=?");
    $password = password_hash($_POST['password'],PASSWORD_BCRYPT);
    $token = str_random(60); 

    $req->execute([$_POST['email'],$password,$token]);
    $user_id = $pdo->lastInsertId();
    mail($_POST['email'],'Confirmation de votre compte',"Votre compte est bien cree pour continuer les demarches d'inscription  merci de cliquer sur ce lien\n\nhttp://localhost/Projet/confirm.php?id=$user_id&token=$token");

    $_SESSION['flash']['success'] = 'Un email de confirmation vous a été envoyé pour valider votre compte';
    header('location: register.php');
    exit();
    
    }
    
  
 

    }





 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Créer un compte</title>
	<link rel="stylesheet" href="style/styleindex.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>
<header>

<h2><span class="titre1">Plate-forme de Gestion d'inscription</span></h2>
     
        
</header>
 


<div class="login">
		<h2>Nouveau Compte</h2>

<?php  if (!empty($errors)):?>

<div class="alert alert-danger">
	<p>vous n'avez pas rempli le formulaire correctement</p>
   
  <?php foreach ($errors as $error): ?>
  <ul>

	  <li><?= $error; ?></li>
	  
	  <?php endforeach; ?> 

	  </ul>

</div>
<?php endif; ?>




<form action="" method="POST">
  <?php 
                if (session_status() == PHP_SESSION_NONE ) {

                    session_start();
                }
                ?>
    <?php if (isset($_SESSION['flash'])): ?>
                       <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                 
                         <div class="alert alert-success"><li>Un email de confirmation vous a été envoyé pour valider votre compte </li></div>

                      <?php endforeach; ?>
                     <?php unset($_SESSION['flash']); ?>
                 <?php endif;?>
    
	     <div class="inputlogin">
	          
		      <input type="email" name="email" placeholder="Adress e-mail" >
		      <input type="password" name="password" placeholder="Mot de passe" >
		      <input type="password" name="password2" placeholder="Confirme Mot de passe" >

	    </div>
			
		    <input type="submit" name="ok" value="S'inscrire">
	    </div>
	  
   
 
</form>
</body>
</html>