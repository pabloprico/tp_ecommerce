<?php
// Inicio sesión
session_start();
// ---------------******----------------/--/ LOGUIN/SESSION /--/------------------******------------------
// ----------- AUTOLOGUEAR CON SESION  -----------
function loginUser($userV) {
  $_SESSION['userLoged'] = $userV;
}
// ----------- ---------------------------------  -----------

// ----------- VERIFICAR SESION Y LOGUEO  -----------
function isLoged() {
  return isset($_SESSION['userLoged']);
}
// ----------- ---------------------------------  -----------

// ---------------- COOKIE-RECORDAME  ----------------
// if (isset($_COOKIE['userEmail'])) {
//   $userV = searchUser($_COOKIE['userEmail']);
//   loginAuto($userV);
// }
// ----------- ---------------------------------  -----------

// ---------------- VALIDAR LOGIN  ----------------
function validateLogin($emailPost, $passPost){
  $userDB = searchFullUser($emailPost);
  if(password_verify($passPost, $userDB['password'])){
    return true;
		exit;
  } else {
    return false;
    }
}
// ----------- ---------------------------------  -----------
// ---------------*********----------------/--/ - /--/------------------**********------------------


// --------------- BUSQUEDA  DE USER POR EMAIL ---------------
function searchUser ($email){
//try catch
  try{
  $conn = new PDO(
    'mysql:host=localhost; dbname=test; charset=utf8mb4; port=3306',
    'root',
    '');
  //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //$userVerificado = "";

  $stateUser = $conn->prepare("SELECT id, nombre, apellido, email FROM users WHERE email = :email");
  $stateUser->bindValue(":email", $email, PDO::PARAM_STR);
  $stateUser->execute();
  $resultUser = $stateUser->fetch(PDO::FETCH_ASSOC);
 // var_dump($resultUser);
  return $resultUser;

  }catch(PDOException $e){
            print "<pre> ¡Error!: " . $e->getMessage() . "<br></pre>";
            die();
        }$conn = null;  //Cierro conexion
}
// ----------- ---------------------------------  -----------

// --------------- BUSQUEDA DE USER POR EMAIL:TRAE ARRAY COMPETO CON PASS PARA LOGIN ---------------
function searchFullUser ($email){
//try catch
  try{
  $conn = new PDO(
    'mysql:host=localhost; dbname=test; charset=utf8mb4; port=3306',
    'root',
    '');
  $stateUser = $conn->prepare("SELECT * FROM users WHERE email = :email");
  $stateUser->bindValue(":email", $email, PDO::PARAM_STR);
  $stateUser->execute();
  $resultUser = $stateUser->fetch(PDO::FETCH_ASSOC);

  return $resultUser;

  }catch(PDOException $e){
            print "<pre> ¡Error!: " . $e->getMessage() . "<br></pre>";
            die();
        }$conn = null;  //Cierro conexion
}
// ----------- ---------------------------------  -----------


// ----------- GUARDAR USUARIO NUEVO EN DB  -----------
function saveUser(){
  $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
  try{
  $conn = new PDO(
    'mysql:host=localhost; dbname=test; charset=utf8mb4; port=3306',
    'root',
    '');
  //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stateUserNvo = $conn->prepare("INSERT INTO users VALUES (default,:nombre,:apellido,:email,:password)");
  $stateUserNvo->bindValue(":nombre", $_POST["nombre"], PDO::PARAM_STR);
  $stateUserNvo->bindValue(":apellido", $_POST["apellido"], PDO::PARAM_STR);
  $stateUserNvo->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
  $stateUserNvo->bindValue(":password", $passHash, PDO::PARAM_STR);
  $stateUserNvo->execute();

  return true;

  }catch(PDOException $e){
            print "<pre> ¡Error!: " . $e->getMessage() . "<br></pre>";
            die();
            return false;
        }$conn = null;  //Cierro conexion
}


?>
