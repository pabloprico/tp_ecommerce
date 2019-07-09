<!DOCTYPE html>

<?php
// Definimos variable para hacer dinamico el title e incluimos el head
  $pageTitle = "Crear Cuenta";
  require_once 'partials/head.php';

  require_once 'func/controller.php';

  //v1.0- VALIDA USUARIO OK, CONECTA BD REVISA MAIL OK Y GUARDA NUEVO USER OK
  // Falta sacar los var dumps y ver tema sesion y cokies.
  //tambien crear la page profilSe.

  //FALTA VEWR PORQUE LA VAR USERV ME DA COMO UNDEFINE.
  //SI BIEN FUNCIONA EL SISTEMA NO ME IMPRIME LOS DATOS DE ESA VARIABLE
  //V1.1
  //correccion: se cambia la forma de guardar el usuario y se lo autologuea para ir a profile
  //Correctcion: searchUser() no busca el pass en database

  // echo "<pre>";
  // var_dump($_SESSION);
  // echo "</pre> <br>";
  // echo "<pre>";
  // var_dump($_POST);
  // echo "</pre> <br>";
  // echo $userV;
  // echo "<pre>";
  // var_dump($userV);
  // echo "</pre>";
  // echo "{$_POST['email']} <br>";


  if (isLoged()) {
   	 	header('location: profile.php');
   	 	exit;
  }

  $vnombre = "";
  $vapellido = "";
  $vusuario= "";
  $vemail = "";
  $vpassword = "";
  $vfoto = "";
  $vpass = "";
  $vpais= "";
  $vDH="";
  $vespacios="";
  $nombre = "";
  $apellido = "";
  $email = "";
  $usuario = "";
  $errores = "";



  if ($_POST) {

  //  --------------  VALIDO FORMULARIO NUEVO USER   ----------------
        $errores = 0;
      // ----Validacion de datos de ingreso
        if(empty(trim($_POST['nombre']))){
          $vnombre = "Por favor ingresar el nombre <br>";
          $errores = $errores + 1;
        }else {
          $nombre = $_POST['nombre'];
        }
        if(empty(trim($_POST['apellido']))){
          $vapellido = "Por favor ingresar el apellido <br>";
          $errores = $errores + 1;
        }else {
          $apellido = $_POST['apellido'];
        }
        if(empty(trim($_POST['usuario']))){
          $vusuario = "Por favor ingresar el nombre de usuario <br>";
          $errores = $errores + 1;
        }else {
          $usuario = $_POST['usuario'];
        }
        if(filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL) == false){
          $vemail = "Por favor corroborar el email <br>";
          $errores = $errores + 1;
        }else {
          $email = $_POST['email'];
        }



          //VERIFICO MAIL DUCPLICADO EN DB // JASON
          $userV = getByEmail($_POST['email']);
          if ($userV != null && $userV != ""){
            $errores = $errores + 1;
            $vemail = "El email ya está registrado <br>";
          }



        if(strlen(trim($_POST['password'])) < 5){
          $vpassword = "Por favor ingresa una contraseña de al menos 5 caracteres <br>";
          $errores = $errores + 1;
        }
       // Validamos que la contraseña contenga DH en mayusculas:
        if (strpos($_POST['password'], 'DH') === false) {
          $vDH = "La contraseña debe contener DH en mayusculas <br>";
          $errores = $errores + 1;
          }
          // Validamos que no contenga espacios
        if (strpos($_POST['password'], " ")) {
          $vespacios = "La contraseña no puede contener espacios <br>";
          $errores = $errores + 1;
          }


          // Validamos que el usuario elija un pais. "SP" es la primera posicion del array de paises, "seleccionar un pais".
        if($_POST['pais'] === "SP"){
          $vpais = "Por favor seleccione un pais <br>";
          $errores = $errores + 1;
        }


                    // ---- Confirmacion de pass
        if (($_POST['password'] == $_POST['passwordconf']) == false){
          $vpass = "Las contraseñas no coinciden";
          $errores = $errores + 1;
        }
  //  -------------------  -------------------------   ---------------------

      // VALIDACION DE LA FOTO

      // Si viene algo por $_FILES...
      if (isset($_FILES['foto'])) {
        // 1. Validamos que el archivo haya subido bien. Si el valor del error es distinto de 0, significa que hubo error
          if ($_FILES["foto"]["error"] != 0){
          $vfoto = "Hubo un error en la carga de la foto";
          $errores = $errores + 1;
           }
        // 2. Validamos que el archivo tenga la extension correcta
        //guardo el nombre del archivo en una variable
        // $nombreFoto = $_FILES["foto"]["name"];
        // $ext=pathinfo($nombreFoto, PATHINFO_EXTENSION);
          $nombreFoto = $_FILES["foto"]["name"];
          $ext = pathinfo($nombreFoto, PATHINFO_EXTENSION);
          if ($ext != "jpg" && $ext != "png"){
            $vfoto = "La foto debe tener formato png o jpg <br>";
            $errores = $errores + 1;
           }
        // else {
        //   // 3. Si no hay errores guardamos el archivo del lado del servidor
        //   //guardo el nombre temporal del archivo
        //   $origen = $_FILES["foto"]["tmp_name"];
        //   $destino = "";
        //   $destino = $destino."archivos/";
        //   //genero la ruta donde guardo el archivo
        //   $destino = $destino."fotodeperfil.".$nombre.".".$ext;
        //
        //   //guardo el archivo con esta funcion
        //   move_uploaded_file($origen,$destino);
        //   $vfoto = "Archivo subido con exito";
        // }
      }

        // se podria implemntar una estructura try catch para el guardados de fotos o usuarios
  //  -------------------  GUARDO INFO USUARIO NUEVO   ---------------------
      if($errores == 0){
        // if (saveUser()){
        //   $userok = getByEmail($_POST["email"]);
        //   login($userok);
        //   header('location:profile.php');
        // }
  //se podria agregar una estructura try catch por si falla el registro del user.
        login(saveUser());
        header('location:profile.php');
      }
  //  -------------------  -------------------------   ---------------------

  } // CIERRE IF POST

  // Array de paises para el select del formulario

  $paises = [
      'SP' => "Selecciona un pais",
      'AF' => 'Afghanistan',
    	'AX' => 'Aland Islands',
    	'AL' => 'Albania',
    	'DZ' => 'Algeria',
    	'AS' => 'American Samoa',
    	'AD' => 'Andorra',
    	'AO' => 'Angola',
    	'AI' => 'Anguilla',
    	'AQ' => 'Antarctica',
    	'AG' => 'Antigua And Barbuda',
    	'AR' => 'Argentina',
    	'AM' => 'Armenia',
    	'AW' => 'Aruba',
    	'AU' => 'Australia',
    	'AT' => 'Austria',
    	'AZ' => 'Azerbaijan',
    	'BS' => 'Bahamas',
    	'BH' => 'Bahrain',
    	'BD' => 'Bangladesh',
    	'BB' => 'Barbados',
    	'BY' => 'Belarus',
    	'BE' => 'Belgium',
    	'BZ' => 'Belize',
    	'BJ' => 'Benin',
    	'BM' => 'Bermuda',
    	'BT' => 'Bhutan',
    	'BO' => 'Bolivia',
    	'BA' => 'Bosnia And Herzegovina',
    	'BW' => 'Botswana',
    	'BV' => 'Bouvet Island',
    	'BR' => 'Brazil',
    	'IO' => 'British Indian Ocean Territory',
    	'BN' => 'Brunei Darussalam',
    	'BG' => 'Bulgaria',
    	'BF' => 'Burkina Faso',
    	'BI' => 'Burundi',
    	'KH' => 'Cambodia',
    	'CM' => 'Cameroon',
    	'CA' => 'Canada',
    	'CV' => 'Cape Verde',
    	'KY' => 'Cayman Islands',
    	'CF' => 'Central African Republic',
    	'TD' => 'Chad',
    	'CL' => 'Chile',
    	'CN' => 'China',
    	'CX' => 'Christmas Island',
    	'CC' => 'Cocos (Keeling) Islands',
    	'CO' => 'Colombia',
    	'KM' => 'Comoros',
    	'CG' => 'Congo',
    	'CD' => 'Congo, Democratic Republic',
    	'CK' => 'Cook Islands',
    	'CR' => 'Costa Rica',
    	'CI' => 'Cote D\'Ivoire',
    	'HR' => 'Croatia',
    	'CU' => 'Cuba',
    	'CY' => 'Cyprus',
    	'CZ' => 'Czech Republic',
    	'DK' => 'Denmark',
    	'DJ' => 'Djibouti',
    	'DM' => 'Dominica',
    	'DO' => 'Dominican Republic',
    	'EC' => 'Ecuador',
    	'EG' => 'Egypt',
    	'SV' => 'El Salvador',
    	'GQ' => 'Equatorial Guinea',
    	'ER' => 'Eritrea',
    	'EE' => 'Estonia',
    	'ET' => 'Ethiopia',
    	'FK' => 'Falkland Islands (Malvinas)',
    	'FO' => 'Faroe Islands',
    	'FJ' => 'Fiji',
    	'FI' => 'Finland',
    	'FR' => 'France',
    	'GF' => 'French Guiana',
    	'PF' => 'French Polynesia',
    	'TF' => 'French Southern Territories',
    	'GA' => 'Gabon',
    	'GM' => 'Gambia',
    	'GE' => 'Georgia',
    	'DE' => 'Germany',
    	'GH' => 'Ghana',
    	'GI' => 'Gibraltar',
    	'GR' => 'Greece',
    	'GL' => 'Greenland',
    	'GD' => 'Grenada',
    	'GP' => 'Guadeloupe',
    	'GU' => 'Guam',
    	'GT' => 'Guatemala',
    	'GG' => 'Guernsey',
    	'GN' => 'Guinea',
    	'GW' => 'Guinea-Bissau',
    	'GY' => 'Guyana',
    	'HT' => 'Haiti',
    	'HM' => 'Heard Island & Mcdonald Islands',
    	'VA' => 'Holy See (Vatican City State)',
    	'HN' => 'Honduras',
    	'HK' => 'Hong Kong',
    	'HU' => 'Hungary',
    	'IS' => 'Iceland',
    	'IN' => 'India',
    	'ID' => 'Indonesia',
    	'IR' => 'Iran, Islamic Republic Of',
    	'IQ' => 'Iraq',
    	'IE' => 'Ireland',
    	'IM' => 'Isle Of Man',
    	'IL' => 'Israel',
    	'IT' => 'Italy',
    	'JM' => 'Jamaica',
    	'JP' => 'Japan',
    	'JE' => 'Jersey',
    	'JO' => 'Jordan',
    	'KZ' => 'Kazakhstan',
    	'KE' => 'Kenya',
    	'KI' => 'Kiribati',
    	'KR' => 'Korea',
    	'KW' => 'Kuwait',
    	'KG' => 'Kyrgyzstan',
    	'LA' => 'Lao People\'s Democratic Republic',
    	'LV' => 'Latvia',
    	'LB' => 'Lebanon',
    	'LS' => 'Lesotho',
    	'LR' => 'Liberia',
    	'LY' => 'Libyan Arab Jamahiriya',
    	'LI' => 'Liechtenstein',
    	'LT' => 'Lithuania',
    	'LU' => 'Luxembourg',
    	'MO' => 'Macao',
    	'MK' => 'Macedonia',
    	'MG' => 'Madagascar',
    	'MW' => 'Malawi',
    	'MY' => 'Malaysia',
    	'MV' => 'Maldives',
    	'ML' => 'Mali',
    	'MT' => 'Malta',
    	'MH' => 'Marshall Islands',
    	'MQ' => 'Martinique',
    	'MR' => 'Mauritania',
    	'MU' => 'Mauritius',
    	'YT' => 'Mayotte',
    	'MX' => 'Mexico',
    	'FM' => 'Micronesia, Federated States Of',
    	'MD' => 'Moldova',
    	'MC' => 'Monaco',
    	'MN' => 'Mongolia',
    	'ME' => 'Montenegro',
    	'MS' => 'Montserrat',
    	'MA' => 'Morocco',
    	'MZ' => 'Mozambique',
    	'MM' => 'Myanmar',
    	'NA' => 'Namibia',
    	'NR' => 'Nauru',
    	'NP' => 'Nepal',
    	'NL' => 'Netherlands',
    	'AN' => 'Netherlands Antilles',
    	'NC' => 'New Caledonia',
    	'NZ' => 'New Zealand',
    	'NI' => 'Nicaragua',
    	'NE' => 'Niger',
    	'NG' => 'Nigeria',
    	'NU' => 'Niue',
    	'NF' => 'Norfolk Island',
    	'MP' => 'Northern Mariana Islands',
    	'NO' => 'Norway',
    	'OM' => 'Oman',
    	'PK' => 'Pakistan',
    	'PW' => 'Palau',
    	'PS' => 'Palestinian Territory, Occupied',
    	'PA' => 'Panama',
    	'PG' => 'Papua New Guinea',
    	'PY' => 'Paraguay',
    	'PE' => 'Peru',
    	'PH' => 'Philippines',
    	'PN' => 'Pitcairn',
    	'PL' => 'Poland',
    	'PT' => 'Portugal',
    	'PR' => 'Puerto Rico',
    	'QA' => 'Qatar',
    	'RE' => 'Reunion',
    	'RO' => 'Romania',
    	'RU' => 'Russian Federation',
    	'RW' => 'Rwanda',
    	'BL' => 'Saint Barthelemy',
    	'SH' => 'Saint Helena',
    	'KN' => 'Saint Kitts And Nevis',
    	'LC' => 'Saint Lucia',
    	'MF' => 'Saint Martin',
    	'PM' => 'Saint Pierre And Miquelon',
    	'VC' => 'Saint Vincent And Grenadines',
    	'WS' => 'Samoa',
    	'SM' => 'San Marino',
    	'ST' => 'Sao Tome And Principe',
    	'SA' => 'Saudi Arabia',
    	'SN' => 'Senegal',
    	'RS' => 'Serbia',
    	'SC' => 'Seychelles',
    	'SL' => 'Sierra Leone',
    	'SG' => 'Singapore',
    	'SK' => 'Slovakia',
    	'SI' => 'Slovenia',
    	'SB' => 'Solomon Islands',
    	'SO' => 'Somalia',
    	'ZA' => 'South Africa',
    	'GS' => 'South Georgia And Sandwich Isl.',
    	'ES' => 'Spain',
    	'LK' => 'Sri Lanka',
    	'SD' => 'Sudan',
    	'SR' => 'Suriname',
    	'SJ' => 'Svalbard And Jan Mayen',
    	'SZ' => 'Swaziland',
    	'SE' => 'Sweden',
    	'CH' => 'Switzerland',
    	'SY' => 'Syrian Arab Republic',
    	'TW' => 'Taiwan',
    	'TJ' => 'Tajikistan',
    	'TZ' => 'Tanzania',
    	'TH' => 'Thailand',
    	'TL' => 'Timor-Leste',
    	'TG' => 'Togo',
    	'TK' => 'Tokelau',
    	'TO' => 'Tonga',
    	'TT' => 'Trinidad And Tobago',
    	'TN' => 'Tunisia',
    	'TR' => 'Turkey',
    	'TM' => 'Turkmenistan',
    	'TC' => 'Turks And Caicos Islands',
    	'TV' => 'Tuvalu',
    	'UG' => 'Uganda',
    	'UA' => 'Ukraine',
    	'AE' => 'United Arab Emirates',
    	'GB' => 'United Kingdom',
    	'US' => 'United States',
    	'UM' => 'United States Outlying Islands',
    	'UY' => 'Uruguay',
    	'UZ' => 'Uzbekistan',
    	'VU' => 'Vanuatu',
    	'VE' => 'Venezuela',
    	'VN' => 'Viet Nam',
    	'VG' => 'Virgin Islands, British',
    	'VI' => 'Virgin Islands, U.S.',
    	'WF' => 'Wallis And Futuna',
    	'EH' => 'Western Sahara',
    	'YE' => 'Yemen',
    	'ZM' => 'Zambia',
    	'ZW' => 'Zimbabwe',
  ];


 ?>

<html lang="es" dir="ltr">

  <body>
    <!-- Incluimos la barra de navegacion -->
    <?php
    require_once 'partials/header-navbar.php';
    ?>

    <!-- <style media="screen">
      .error { border: solid 1px red;}
    </style> -->

    <section class="form-container">
      <h2>Crear cuenta</h2>
        <form class="access-form" action=" " method="post" enctype="multipart/form-data">
          <div class="field-group">
            <label for="Nombre">Nombre</label>
            <!-- Dentro de cada etiqueta input ponemos la clase "error" que pone el borde de color rojo en caso de que el campo contenga un error-->
            <input
              type="text"
              id="Nombre"
              name="nombre"
              value="<?= $nombre ?>"
              class="<?php echo $vnombre != "" ? "error" : null ?>"
            >
            <em class="form-error-validate"><?php echo $vnombre?></em>
          </div>
          <div class="field-group">
            <label for="Apellido">Apellido</label>
            <input type="text" id="Apellido" name="apellido" value="<?= $apellido ?>" class="<?php echo $vapellido != "" ? "error" : null ?>">
            <em class="form-error-validate"><?php echo $vapellido?></em>
          </div>
          <div class="field-group">
            <label for="Usuario">Nombre de usuario</label>
            <input type="text" id="Usuario" name="usuario" value="<?= $usuario ?>" class="<?php echo $vusuario != "" ? "error" : null ?>" >
            <em class="form-error-validate"><?php echo $vusuario?></em>
          </div>
          <div class="field-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?= $email ?>" class="<?php echo $vemail != "" ? "error" : null ?>">
            <em class="form-error-validate"><?php echo $vemail?></em>
          </div>
          <div class="field-group">
                 <label for="">Foto de perfil: </label>
                 <input type="file" name="foto" value="" class="<?php echo $vfoto != "" ? "error" : null ?>">
                 <em class="form-error-validate"><?php echo $vfoto?></em>
          </div>
          <div class="field-group">
            <label for="pais">Pais de nacimiento: </label>
            <select name="pais" class="<?php echo $vpais != "" ? "error" : null ?>" >
              <!-- Persistencia para el dato del pais, cuando el foreach llega al pais elegido por $_POST, deja ese pais marcado con la opcion "selected" -->
              <?php foreach ($paises as $codigo => $pais) :?>
                <?php if($_POST['pais'] == $codigo): ?>
                <option value="<?=$codigo?>" selected>
                  <?=$pais?>
                </option>
              <?php else: ?>
                <option value="<?=$codigo?>">
                  <?=$pais?>
                </option>
            <?php endif; ?>
              <?php endforeach; ?>
              </select>
              <br>
              <em class="form-error-validate"><?php echo $vpais?></em>
          </div>
          <div class="field-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" value="" class="<?php echo $vpassword != "" ? "error" : null ?>">
            <em class="form-error-validate"><?php echo $vpassword?><?php echo $vDH?><?php echo $vespacios?></em>
          </div>
          <div class="field-group">
            <label for="passwordconf">Confirmar Contraseña</label>
            <input type="password" id="passwordconf" name="passwordconf" value="" class="<?php echo $vpass != "" ? "error" : null ?>">
            <em class="form-error-validate"><?php echo $vpass?></em>
          </div>
          <div class="register-button">
            <button type="submit" name="send">ENVIAR</button>
          </div>
        </form>
    </section>

    <hr>
    <!-- Incluimos el footer -->
    <?php
    require_once 'partials/footer.php';
    ?>

    </body>
  </body>
</html>
