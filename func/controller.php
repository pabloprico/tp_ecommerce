<?php
// Inicio sesión
session_start();
// // ---------------******----------------/--/ LOGUIN/SESSION /--/------------------******------------------
// // ----------- AUTOLOGUEAR CON SESION  -----------
// function loginUser($userV) {
//   $_SESSION['userLoged'] = $userV;
// }
// // ----------- ---------------------------------  -----------
//
// // ----------- VERIFICAR SESION Y LOGUEO  -----------
// function isLoged() {
//   return isset($_SESSION['userLoged']);
// }
// // ----------- ---------------------------------  -----------
//
// // ---------------- COOKIE-RECORDAME  ----------------
// // if (isset($_COOKIE['userEmail'])) {
// //   $userV = searchUser($_COOKIE['userEmail']);
// //   loginAuto($userV);
// // }
// // ----------- ---------------------------------  -----------
//
// // ---------------- VALIDAR LOGIN  ----------------
// function validateLogin($emailPost, $passPost){
//   $userDB = searchFullUser($emailPost);
//   if(password_verify($passPost, $userDB['password'])){
//     return true;
// 		exit;
//   } else {
//     return false;
//     }
// }
// // ----------- ---------------------------------  -----------
// // ---------------*********----------------/--/ - /--/------------------**********------------------
//
//
// // --------------- BUSQUEDA  DE USER POR EMAIL ---------------
// function searchUser ($email){
// //try catch
//   try{
//   $conn = new PDO(
//     'mysql:host=localhost; dbname=test; charset=utf8mb4; port=3306',
//     'root',
//     '');
//   //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//   //$userVerificado = "";
//
//   $stateUser = $conn->prepare("SELECT id, nombre, apellido, email FROM users WHERE email = :email");
//   $stateUser->bindValue(":email", $email, PDO::PARAM_STR);
//   $stateUser->execute();
//   $resultUser = $stateUser->fetch(PDO::FETCH_ASSOC);
//  // var_dump($resultUser);
//   return $resultUser;
//
//   }catch(PDOException $e){
//             print "<pre> ¡Error!: " . $e->getMessage() . "<br></pre>";
//             die();
//         }$conn = null;  //Cierro conexion
// }
// // ----------- ---------------------------------  -----------
//
// // --------------- BUSQUEDA DE USER POR EMAIL:TRAE ARRAY COMPETO CON PASS PARA LOGIN ---------------
// function searchFullUser ($email){
// //try catch
//   try{
//   $conn = new PDO(
//     'mysql:host=localhost; dbname=test; charset=utf8mb4; port=3306',
//     'root',
//     '');
//   $stateUser = $conn->prepare("SELECT * FROM users WHERE email = :email");
//   $stateUser->bindValue(":email", $email, PDO::PARAM_STR);
//   $stateUser->execute();
//   $resultUser = $stateUser->fetch(PDO::FETCH_ASSOC);
//
//   return $resultUser;
//
//   }catch(PDOException $e){
//             print "<pre> ¡Error!: " . $e->getMessage() . "<br></pre>";
//             die();
//         }$conn = null;  //Cierro conexion
// }
// // ----------- ---------------------------------  -----------
//
//
// // ----------- GUARDAR USUARIO NUEVO EN DB  -----------
// function saveUser(){
//   $passHash = password_hash($_POST['password'], PASSWORD_DEFAULT);
//   try{
//   $conn = new PDO(
//     'mysql:host=localhost; dbname=test; charset=utf8mb4; port=3306',
//     'root',
//     '');
//   //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//
//   $stateUserNvo = $conn->prepare("INSERT INTO users VALUES (default,:nombre,:apellido,:email,:password)");
//   $stateUserNvo->bindValue(":nombre", $_POST["nombre"], PDO::PARAM_STR);
//   $stateUserNvo->bindValue(":apellido", $_POST["apellido"], PDO::PARAM_STR);
//   $stateUserNvo->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
//   $stateUserNvo->bindValue(":password", $passHash, PDO::PARAM_STR);
//   $stateUserNvo->execute();
//
//   return true;
//
//   }catch(PDOException $e){
//             print "<pre> ¡Error!: " . $e->getMessage() . "<br></pre>";
//             die();
//             return false;
//         }$conn = null;  //Cierro conexion
// }

if (isset($_COOKIE['userEmail'])) {
		$user = getByEmail($_COOKIE['userEmail']);
		login($user);
	}

	function getAllUsers() {
		return json_decode(file_get_contents('users.json'), true);
	}

	function getByEmail($email) {
		$allUsers = getAllUsers();

		foreach ($allUsers as $oneUser) {
			if ($oneUser['email'] == $email) {
				return $oneUser;
			}
		}

		return null;
	}

	function login($user) {
		$_SESSION['userLoged'] = $user;
	}

	function isLoged() {
		return isset($_SESSION['userLoged']);
	}

  function saveUser(){
  // 2. Validamos que el archivo tenga la extension correcta
  //guardo el nombre del archivo en una variable
  $nombreFoto = $_FILES["foto"]["name"];
  $ext=pathinfo($nombreFoto, PATHINFO_EXTENSION);
  // 3. Si no hay errores guardamos el archivo del lado del servidor
  //guardo el nombre temporal del archivo
  $origen = $_FILES["foto"]["tmp_name"];
  $nombre = $_POST["usuario"];
  $destino = "";
  $destino = $destino."archivos/";
  //genero la ruta donde guardo el archivo
  $destino = $destino."fotodeperfil.".$nombre.".".$ext;

  //guardo el archivo con esta funcion
  move_uploaded_file($origen,$destino);
  //$vfoto = "Archivo subido con exito";

  $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $usuario = [
       "nombre" => $_POST["nombre"],
       "apellido" => $_POST["apellido"],
       "usuario" => $_POST["usuario"],
       "email" => $_POST["email"],
       "foto-perfil" => $destino,
       "password" => $pass,
       "nacionalidad" => $_POST['pais']
       ];

   $usuarios = file_get_contents("users.json");
   $usuariosArray = json_decode($usuarios,true);
   array_push($usuariosArray, $usuario);
   $usuarios = json_encode($usuariosArray);
   file_put_contents("users.json",$usuarios);
//retorno el array de usuario nuevo apra que se loguee.
	 return $usuario;
  }

function validateLogin($emailPost, $passPost){
  $userDB = getByEmail($emailPost);
  if(password_verify($passPost, $userDB['password'])){
    return true;
		exit;
  } else {
    return false;
    }
}

// 1.1- Funciona login y funciona register falta correcciones de abajo y tener un boton logout intuitivo.


//verificar login correcto en profile -CORRECTO
// verificar que guarde correctamente la barra en la direccion de perfil de json FOTO
// verificar el style del mail en el profile.
// el boton lo loguin debe llamar a la pagina loguin.php. EN HEADER -CORREGIDO
// FALTA PROBAR BIEN EL REGISTER Y LOGIN.
// FALTA PROBAR BIEN COKIES Y SESSION. LO BASICO DE SESION FUNCIONA PORQUE EN PROFILE MUESTRA LOS DATOS DEL USER CONECTADO.



?>
