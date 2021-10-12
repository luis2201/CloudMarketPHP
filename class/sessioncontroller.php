<?php

  require_once 'class/session.php';

  class SessionController extends Controller {

    private $userSession;
    private $usuario;
    private $idusuario;

    private $session;
    private $sites;

    private $user;

    function __construct() {
      parent::__construct();
      $this->init();
    }

    function init() {
      $this->session = new Session();

      $json = $this->getJSONFileConfig();

      $this->sites = $json['sites'];
      $this->defaultsites = $json['default-sites'];

      $this->validateSession();
    }

    private function getJSONFileConfig() {
      $string = file_get_contents('config/access.json');
      $json = json_decode($string, true)      ;

      return $json;
    }

    public function validateSession() {
      if ($this->existsSession()) {
        $role = $this->getUserSessionData()->getRol();

        if ($this->isPublic()) {
          $this->redirectDefaultSiteByRole($role);
        } else {
          if ($this->isAuthorized($role)) {
            //Lo deja entrar
          } else {
            $this->redirectDefaultSiteByRole($role);
          }
        }
      } else {
        if ($this->isPublic()) {
          //Lo deja entrar
        } else {
          header('Location:' . constant('URL') . '');
        }
      }
      
    }

    function existsSession() {
      if (!$this->session->exists()) {
        return false;
      }
      if ($this->session->getCurrentUser() == null) {
        return false;
      }

      $idusuario = $this->session->getCurrentUser();

      if($idusuario) return true;

      return false;
    }

    function getUserSessionData() {
      $idusuario = $this->idusuario;
      $this->user = new UsuarioModel();
      $this->user->get($idusuario);

      return $this->user;
    }

    function isPublic() {
      $currentURL = $this->getCurrentPage();
      $currentURL = preg_replace("/\?.*/", "", $currentURL);

      for ($i=0; $i < sizeof($this->sites); $i++) { 
        if ($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public') {
          return true;
        }
      }

      return false;
    }

    function getCurrentPage() {
      $actualLink = trim("$_SERVER[REQUEST_URI]");
      $url = explode('/', $actualLink);

      return $url[2];
    }

    private function redirectDefaultSiteByRole($role) {
      $url = '';
      for ($i=0; $i < sizeof($this->sites); $i++) { 
        if ($this->sites[$i]['role'] == $role) {
          $url = '/CloudMarketPHP/' . $this->sites[$i]['site'];
          break;
        }
      }

      header('Location:' . $url);
    }

    private function isAuthorized($role) {
      $currentURL = $this->getCurrentPage();
      $currentURL = preg_replace("/\?.*/", "", $currentURL);

      for ($i=0; $i < sizeof($this->sites); $i++) { 
        if ($currentURL == $this->sites[$i]['site'] && $this->site[$i]['role'] == $role) {
          return true;
        }
      }

      return false;
    }

    function initialize($user) {
      $this->session->setCurrentUser($user->getIdUsuario());
      $this->authorizedAccess($user->getRole());
    }

    function authorizedAccess($role) {
      switch ($role) {
        case 'user':
          $this->redirect($this->defaultSites['user'], []);
          break;
        
        case 'admin':
          $this->redirect($this->defaultSites['admin'], []);
          break;
      }
    }

    function logout() {
      $this->session->closeSession();
    }

  }

?>