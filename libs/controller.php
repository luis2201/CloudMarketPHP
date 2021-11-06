<?php

  class Controller {

    function __construct() {      
      $this->view = new View();
    }

    function loadModel($model){
      $url = 'models/'.$model.'Model.php';

      if(file_exists($url)){
          require $url;
          
          $modelName = ucfirst($model).'Model';
          $this->model = new $modelName();
      }
    }

    function uploadImage() {
      //Recogemos el archivo enviado por el formulario
      $archivo = $_FILES['foto']['name'];
      //Si el archivo contiene algo y es diferente de vacio
      if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['foto']['type'];
        $tamano = $_FILES['foto']['size'];
        $temp = $_FILES['foto']['tmp_name'];

        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
          
          //  - Se permiten archivos .gif, .jpg, .png. y de 200 kb como máximo.</b></div>';
          return "";
        } else {
          $file = new SplFileInfo($archivo);
          $extension  = $file->getExtension();
          $archivo = uniqid().'.'.$extension;

          //Si la imagen es correcta en tamaño y tipo
          //Se intenta subir al servidor
          if (move_uploaded_file($temp, 'public/img-user/' . $archivo)) {
            //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
            //chmod(URL.'public/img-user/' . $archivo, 0777);

            //Mostramos el mensaje de que se ha subido co éxito
            return $archivo;
          } else {

            //Si no se ha podido subir la imagen, mostramos un mensaje de error
            return "";
          }
        }
      }
    }

    function encryption($string){
      $output = FALSE;
      $key = hash('sha256', SECRET_KEY);
      $iv = substr(hash('sha256', SECRET_IV), 0, 16);
      $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
      $output = base64_encode($output);

      return $output;
    }

    function decryption($string){            
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);            

        return $output;
    }

    function generar_codigo_usuario($string, $size, $number){            
        for($i=1; $i<=$size; $i++){
            $num = rand(0,9);
            $string.= $num;
        }

        return $string.$num;
    }

    function limpiarCadena($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = str_ireplace("<script>", "", $string);
        $string = str_ireplace("</script>", "", $string);
        $string = str_ireplace("<script type=", "", $string);
        $string = str_ireplace("SELECT * FROM", "", $string);
        $string = str_ireplace("DELETE FROM", "", $string);
        $string = str_ireplace("INSERT INTO", "", $string);
        $string = str_ireplace("--", "", $string);
        $string = str_ireplace("^", "", $string);
        $string = str_ireplace("[", "", $string);
        $string = str_ireplace("]", "", $string);
        $string = str_ireplace("==", "", $string);
        $string = str_ireplace(";", "", $string);

        return $string;
    }

    function successMessage($message) {
      return "<script>
                $.alert({
                  icon: 'fas fa-thumbs-up',
                  theme: 'modern',
                  type: 'blue',
                  animation: 'scale',
                  title: '¡Éxito!',
                  content: '".$message."',
                  buttons: {
                    buttonOK: {
                        text: 'Aceptar',
                        btnClass: 'btn-blue',
                        action: function(){
                          location.reload();
                        }
                    },
                  }
                });          
              </script>";
    }

    function deleteMessage($message) {
      return "<script>
                $.alert({
                  icon: 'fas fa-thumbs-up',
                  theme: 'modern',
                  type: 'blue',
                  animation: 'scale',
                  title: '¡Éxito!',
                  content: '".$message."',
                  buttons: {
                    buttonOK: {
                        text: 'Aceptar',
                        btnClass: 'btn-blue',
                        action: function(){
                          
                        }
                    },
                  }
                });          
              </script>";
    }

    function warningMessage($message) {
      return "<script>
                $.alert({
                  icon: 'fas fa-exclamation-circle',
                  theme: 'modern',
                  type: 'orange',
                  animation: 'scale',
                  title: '¡Error!',
                  content: '".$message."',
                  buttons: {
                    buttonOK: {
                        text: 'Aceptar',
                        btnClass: 'btn-orange',
                        action: function(){
                        
                        }
                    },
                  }
                });                
              </script>";
    }

    function errorMessage($message) {
      return "<script>
                $.alert({
                  icon: 'fas fa-ban',
                  theme: 'modern',
                  type: 'red',
                  animation: 'scale',
                  title: '¡Advertencia!',
                  content: '".$message."',
                  buttons: {
                    buttonOK: {
                        text: 'Aceptar',
                        btnClass: 'btn-red',
                        action: function(){
                          
                        }
                    },
                  }
                });
              </script>";
    }

    function questionMessage($message) {
      return "<script>
                $.confirm({
                  icon: 'fas fa-ban',
                  theme: 'modern',
                  type: 'red',
                  animation: 'scale',
                  title: '¡Advertencia!',
                  content: '".$message."',
                  buttons: {
                    confirm: function () {
                        $.alert('Confirmed!');
                    },
                    cancel: function () {
                        $.alert('Canceled!');
                    },
                  }
                });
              </script>";
    }

  }

  