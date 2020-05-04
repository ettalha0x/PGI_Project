<?php 

require_once 'function.php';


session_start();
		    

  

   if (!empty($_POST)) {


                       $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            );

   	        $errors=array();
   	
            $pdo = new PDO('mysql:dbname=first_proj;host=localhost','root','',$options);

		       	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

     
			    
    	
   if (!empty($_POST['nom_fr']) && !empty($_POST['nom_ar']) && !empty($_POST['prénom_fr']) && !empty($_POST['prénom_ar']) && !empty($_POST['adresse_fr']) && !empty($_POST['adresse_ar']) && !empty($_POST['CIN']) && !empty($_POST['num_télé']) && !empty($_POST['pays']) && !empty($_POST['ville']) && !empty($_POST['date_de_naissance']) && !empty($_POST['sexe']) && !empty($_POST['Code_postal'])&& !empty($_POST['nationalité'])&& !empty($_POST['prénom_pére'])&& !empty($_POST['Nom_pére'])&& !empty($_POST['CIN_pére'])&& !empty($_POST['date_naissance_pére'])&& !empty($_POST['prénom_mére'])&& !empty($_POST['Nom_mére'])&& !empty($_POST['CIN_mére'])&& !empty($_POST['date_naissance_mére'])&& !empty($_POST['Assurance'])){

              $nom_fr = $_POST['nom_fr'];
              $nom_ar = $_POST['nom_ar'];
              $prénom_fr = $_POST['prénom_fr'];
              $prénom_ar = $_POST['prénom_ar'];
              $adresse_fr = $_POST['adresse_fr'];
              $adresse_ar = $_POST['adresse_ar'];
              $CIN = $_POST['CIN'];
              $num_télé = $_POST['num_télé'];
              $pays = $_POST['pays'];
              $ville = $_POST['ville'];
              $date_de_naissance = $_POST['date_de_naissance'];
              $sexe = $_POST['sexe'];
              $Code_postal = $_POST['Code_postal'];
              $nationalité = $_POST['nationalité'];
              $prénom_pére = $_POST['prénom_pére'];
              $Nom_pére = $_POST['Nom_pére'];
              $CIN_pére = $_POST['CIN_pére'];
              $date_naissance_pére = $_POST['date_naissance_pére'];
              $pére_décédé = $_POST['pére_décédé'];
              $prénom_mére = $_POST['prénom_mére'];
              $Nom_mére = $_POST['Nom_mére'];
              $CIN_mére = $_POST['CIN_mére'];
              $date_naissance_mére = $_POST['date_naissance_mére'];
              $mére_décédée = $_POST['mére_décédée'];
              $Assurance = $_POST['Assurance'];
              $compte_bancaire = $_POST['compte_bancaire'];
              
     
    
              $dure =  date("Y-m-d G:i:s"); 
 




   $insertion = $pdo->prepare("UPDATE users SET nom_fr = ?,nom_ar = ?,prénom_fr = ?,prénom_ar = ?,adresse_fr = ?,adresse_ar = ?,CIN = ? ,num_télé = ?,pays = ? ,ville = ? ,date_de_naissance = ? ,sexe = ? ,Code_postal = ?,nationalité = ?,prénom_pére =? ,Nom_pére = ? ,CIN_pére = ? ,date_naissance_pére = ?,pére_décédé = ?,prénom_mére = ?,Nom_mére = ?,CIN_mére = ?,date_naissance_mére =? ,mére_décédée =? ,Assurance = ?,compte_bancaire =? WHERE confirmed_at <= ? AND confirmed_at >='2020-05-02 13:41:22' ");
  $insertion->bindValue(1, $nom_fr);
  $insertion->bindValue(2, $nom_ar);
  $insertion->bindValue(3, $prénom_fr);
  $insertion->bindValue(4, $prénom_ar);
  $insertion->bindValue(5, $adresse_fr);
  $insertion->bindValue(6, $adresse_ar);
  $insertion->bindValue(7, $CIN);
  $insertion->bindValue(8, $num_télé);
  $insertion->bindValue(9, $pays);
  $insertion->bindValue(10, $ville);
  $insertion->bindValue(11, $date_de_naissance);
  $insertion->bindValue(12, $sexe);
  $insertion->bindValue(13, $Code_postal);
  $insertion->bindValue(14, $nationalité);
  $insertion->bindValue(15, $prénom_pére);
  $insertion->bindValue(16, $Nom_pére);
  $insertion->bindValue(17, $CIN_pére);
  $insertion->bindValue(18, $date_naissance_pére);
  $insertion->bindValue(19, $pére_décédé);
  $insertion->bindValue(20, $prénom_mére);
  $insertion->bindValue(21, $Nom_mére);
  $insertion->bindValue(22, $CIN_mére);
  $insertion->bindValue(23, $date_naissance_mére);
  $insertion->bindValue(24, $mére_décédée);
  $insertion->bindValue(25, $Assurance);
  $insertion->bindValue(26, $compte_bancaire);
  $insertion->bindValue(27, $dure);
 

   $insertion->execute();



  



     

    $_SESSION['flash']['success'] = 'Veuillez continuer les étapes d\'inscription afin d\'uploader les informations demandées';
    header('location: form2.php');
    exit();
  
     
}   

    else{

   	$errors[]="tous les champs doivent être remplis"; 
    
 }
    
}
         
 

  
   
  
 ?>





<!DOCTYPE html>
<html>
<head>
<title>Formulaire d'inscription </title>

 <link rel="stylesheet" href="bootstrap\css\bootstrap.min.css">
 <script src="bootstrap\js\jquery.min.js"></script>
 <script src="bootstrap\js\bootstrap.min.js"></script>   
 <style>
     td{width:50%;}
     hr{border: 3px solid rgb(113, 197, 223);border-radius: 10px;}
 </style>
	 
</head>

<body>


<?php  if (!empty($errors)):?>

<div class="alert alert-danger">
	<p>vous n'avez pas rempli le formulaire correctement</p>
   
  <?php foreach ($errors as $error): ?>
  <ul>

	  <li><?= $error; ?></li>
	  
	  <?php endforeach; ?> 

	  </ul>

<?php endif; ?>


<form action="" method="POST">

<?php 
                if (session_status() == PHP_SESSION_NONE ) {

                    session_start();
                }
                ?>
    <?php if (isset($_SESSION['flash'])): ?>
                       <?php foreach ($_SESSION['flash'] as $type => $message): ?>
                 
                         <div class="alert alert-success"><li>Votre compte est bien validé</li></div>

                      <?php endforeach; ?>
                     <?php unset($_SESSION['flash']); ?>
                 <?php endif;?>


<!--Information personelle-->

<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
        <hr><h3>Information Personelle</h3><hr>
        </td> 
  

    </tr>
   
     <tr>
         <td>
             <label><b>Nom :</label>
             <input type="text" class="form-control"  placeholder="Enter votre nom" style="width:80%;" maxlength="255" id="nom" name="nom_fr" >
         </td>
         <td>
            <label><b>Nom en Arabe :</label> 
            <input type="text" class="form-control"  placeholder="Enter votre nom en Arabe" style="width:80%;" maxlength="255" id="nom_ar" name="nom_ar" >
         </td>
     </tr>
     <tr>
         <td>
             <label><b>Prénom :</label>
             <input type="text" class="form-control"  placeholder="Enter votre prénom" style="width:80%;" maxlength="255" id="prénom" name="prénom_fr" >
         </td>
        <td>
             <label><b>Prénom en Arabe :</label> 
             <input type="text" class="form-control"  placeholder="Enter votre prénomen Arabe" style="width:80%;" maxlength="255" id="prénom_ar" name="prénom_ar" >
        </td>
    </tr>
    <tr>
        <td>
            <label><b>Adresse :</label>
            <input type="text" class="form-control"  placeholder="Enter votre prénom" style="width:80%;" maxlength="255" id="adresse" name="adresse_fr" >
        </td>
       <td>
            <label><b> Adresse en Arabe :</label> 
             <input type="text" class="form-control"  placeholder="Enter votre prénomen Arabe" style="width:80%;" maxlength="255" id="adresse_ar" name="adresse_ar" >
       </td>
   </tr>
    <tr>
         <td>
             <label><b>CIN :</label>
             <input type="text" class="form-control"  placeholder="Enter le numéro de votre CIN" style="width:80%;" maxlength="255" id="CIN" name="CIN" >
         </td>
        <td>
             <label><b>Numéro de téléphone :</label> 
             <input type="tel" class="form-control"  placeholder="Enter votre numéro de téléphone" style="width:80%;" maxlength="255" id="num_télé" name="num_télé" >
        </td>
    </tr>
    <tr>
         <td>
             <label><b>Pays de naissance :</label>
             <select class="browser-default custom-select" style="width:80%;"
             name="pays">
                     <option selected>Veuillez choisir votre pays</option>
                     <option value="1">Maroc</option>
             </select>
         </td>
         <td>
             <label><b>Ville de naissance :</label>
             <select class="browser-default custom-select" style="width:80%;"
             name="ville">
                     <option selected>Veuillez choisir votre Ville</option>
                     <option value="1">casablanca</option>
                     <option value="2">Fez</option>
                     <option value="3">Tangier</option>
                     <option value="4">Marrakech</option>
                     <option value="5">Salé</option>
                     <option value="6">Meknes</option>
                     <option value="7">Rabat</option>
                     <option value="8">Oujda</option>
                     <option value="9">Kenitra</option>
                     <option value="10">Agadir</option>
                     <option value="11">Tetouan</option>
                     <option value="12">Temara</option>
                     <option value="13">Safi</option>
                     <option value="14">Mohammedia</option>
                     <option value="15">Khouribga</option>
                     <option value="16">El Jadida</option>
                     <option value="17">Beni Mellal</option>
                     <option value="18">Aït Melloul</option>
                     <option value="19">Nador</option>
                     <option value="20">Dar Bouazza</option>
                     <option value="21">Taza</option>
                     <option value="22">Settat</option>
                     <option value="23">Berrechid</option>
                     <option value="24">Khemisset</option>
                     <option value="25">Inezgane</option>
                     <option value="26">Ksar El Kebir</option>
                     <option value="27">Larache</option>
                     <option value="28">Guelmim</option>
                     <option value="29">Khenifra</option>
                     <option value="30">Berkane</option>
                     <option value="31">Taourirt</option>
                     <option value="32">Bouskoura</option>
                     <option value="33">Fquih Ben Salah</option>
                     <option value="34">Dcheira El Jihadia</option>
                     <option value="35">Oued Zem</option>
                     <option value="36">El Kelaa Des Sraghna</option>
                     <option value="37">Sidi Slimane</option>
                     <option value="38">Errachidia</option>
                     <option value="39">Guercif</option>
                     <option value="40">Oulad Teima</option>
                     <option value="41">Ben Guerir</option>
                     <option value="42">Tifelt</option>
                     <option value="43">Lqliaa</option>
                     <option value="44">Taroudant</option>
                     <option value="45">Sefrou</option>
                     <option value="46">Essaouira</option>
                     <option value="47">Fnideq</option>
                     <option value="48">Sidi Kacem</option>
                     <option value="49">Tiznit</option>
                     <option value="50">Tan-Tan</option>
                     <option value="51">Ouarzazate</option>
                     <option value="52">Souk El Arbaa</option>
                     <option value="53">Youssoufia</option>
                     <option value="54">Lahraouyine</option>
                     <option value="55">Martil</option>
                     <option value="56">Ain Harrouda</option>
                     <option value="57">Suq as-Sabt Awlad an-Nama</option>
                     <option value="58">Skhirat</option>
                     <option value="59">Ouazzane</option>
                     <option value="60">Benslimane</option>
                     <option value="61">Al Hoceima</option>
                     <option value="62">Beni Ansar</option>
                     <option value="63">M'diq</option>
                     <option value="64">Sidi Bennour</option>
                     <option value="65">Midelt</option>
                     <option value="66">Azrou</option>
                     <option value="67">Drargua</option>
             </select>
             </select>
             </select>
         </td>
    </tr>
    <tr>
        <td>
            <label><b>Date de naissance :</label>
                <input type="date" class="form-control"  placeholder="Enter votre date de naissance" style="width:80%;" maxlength="255" id="date_naissance" name="date_de_naissance" >
        </td>
        <td>
            <label><b>Sexe :</label><br>
            <select class="browser-default custom-select" style="width:80%;"
            name="sexe">
                     <option selected>--sexe--</option>
                     <option value="1">Masculin</option>
                     <option value="2">Féminin</option>
            </select>
        </td>
   </tr>
    <tr>
        <td>
            <label><b>Code postal :</label><br>
            <input type="text" class="form-control"  placeholder="Enter votre Code postal" style="width:80%;" maxlength="255" id="Code postal" name="Code_postal" >
        </td>
        <td>
            <label><b>Nationalité :</label><br>
            <input type="text" class="form-control"  placeholder="Enter votre nationalité" style="width:80%;" maxlength="255" id="nationalité" name="nationalité" >
        </td>
   </tr>

</table>

<!--Information sur le pére -->


<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
        <hr><h3>Information sur le pére</h3><hr>
        </td>
    </tr>
    
   <tr>
        <td>
            <label><b>Prénom du pére :</label>
            <input type="text" class="form-control"  placeholder="Enter le prénom de votre pére" style="width:80%;" maxlength="255" id="prénom_mére" name="prénom_pére" >
        </td>
        <td>
            <label><b>Nom du pére :</label>
            <input type="text" class="form-control"  placeholder="Enter le prénom de votre pére" style="width:80%;" maxlength="255" id="Nom_pére" name="Nom_pére" >
        </td>
    </tr>
    <tr>
        <td>
            <label><b>CIN du pére :</label>
            <input type="text" class="form-control"  placeholder="Enter le CIN de votre pére" style="width:80%;" maxlength="255" id="CIN_pére" name="CIN_pére" >
        </td>
        <td>
            <label><b>Date de naissance du pére :</label>
            <input type="date" class="form-control"  placeholder="Enter la date de naissance de votre pére" style="width:80%;" maxlength="255" id="date_naissance_pére" name="date_naissance_pére" >
        </td>
    </tr>
    <tr>
        <td>
          <label class="form-check-label"><b>votre pére est t-il décédé ?</b></label>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
          	OUI: 
          	<input  type="radio" value="OUI"name="pére_décédé"> 
          	NON: 
          	<input  type="radio" value="NON"name="pére_décédé">
         
        </td>
    </tr>
       
</table>

<!--Information sur la mére -->

<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
            <hr><h3>Information sur la mére</h3><hr>
        </td>
    </tr>
    
   <tr>
        <td>
            <label><b>Prénom du mére :</label>
            <input type="text" class="form-control"  placeholder="Enter le prénom de votre mére" style="width:80%;" maxlength="255" id="prénom_mére" name="prénom_mére" >
        </td>
        <td>
            <label><b>Nom du mére :</label>
            <input type="text" class="form-control"  placeholder="Enter le prénom de votre mére" style="width:80%;" maxlength="255" id="Nom_mére" name="Nom_mére" >
        </td>
    </tr>
    <tr>
        <td>
            <label><b>CIN du mére :</label>
            <input type="text" class="form-control"  placeholder="Enter le CIN de votre mére" style="width:80%;" maxlength="255" id="CIN_mére" name="CIN_mére" >
        </td>
        <td>
            <label><b>Date de naissance du mére :</label>
            <input type="date" class="form-control"  placeholder="Enter la date de naissance de votre mére" style="width:80%;" maxlength="255" id="date_naissance_mére" name="date_naissance_mére" >
        </td>
    </tr>
    <tr>
        <td>
          <label class="form-check-label"><b>votre mére est t-elle décédée ?</b></label>
          &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            OUI: 
          	<input  type="radio" value="OUI"name="mére_décédée"> 
          	NON: 
          	<input  type="radio" value="NON"name="mére_décédée">
         
        </td>
    </tr>
       
</table>
<!--l'Assurance -->

<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td>
            <hr><h3>Information relatives à l'Assurance Maladie Obligatoire</h3><hr>
        </td>
    </tr>
    
   <tr>
        <td>
            <label><b>Avez-vous une Assurance Médicale?</label>
           <select class="browser-default custom-select" style="width:80%;"
           name="Assurance">
                     <option selected>Avez-vous une Assurance Médicale?</option>
                     <option value="1">CNOPS</option>
                     <option value="2">SANAD</option>
                     <option value="3">Autres</option>
            </select>
        </td>
        <td>
            <label><b>Avez-vous un compte bancaire?</label>
            <input type="text" class="form-control"  placeholder="Si vous avez un numéro de compte(RIB) afin de l'utiliser pour l'Assurance" style="width:80%;" maxlength="255" name="compte_bancaire" >
        </td>
    </tr>
    
       
</table>


<table align="right" cellpadding="10" cellspacing="10" width="80%" class="mod-form" style="margin: 10px 0; border: 5;">
    <tr>
        <td align="center">
            <input class="btn btn-info" type="submit" value="Continuer"  >
            <input class="btn btn-warning" type="reset" value="Annuler" >
        </td>
      
    </tr>
</table>



</form>
</body>
</html>