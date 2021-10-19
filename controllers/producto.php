<?php

use function PHPSTORM_META\map;

require_once 'models/productomodel.php';
  require_once 'models/categoriamodel.php';

  class Producto extends SessionController {
    private $user;

    public function __construct() {
      parent::__construct();

      $this->user = $this->getUserSessionData();
    }

    function render() {
      $this->view->render('producto/index.php', [
        'user'  => $this->user
      ]);
    }

    function newProducto() {
      if (!$this->existsPOST(['codigo', 'descripcion', 'idcategoria', 'unidad', 'stock', 'stockmin', 'stockmax', 'pcosto', 'ppublico', 'iva'])) {
        $this->redirect('dashboard', []);

        return;
      }

      if ($this->user == null) {
        $this->redirect('dasboard', []);

        return;
      }

      $productos = new ProductoModel();
      $productos->setCodigo($this->getCodigo);
      $productos->setDescripcion($this->getDescripcion);
      $productos->setIdCategoria($this->getIdCategoria);
      $productos->setUnidad($this->getUnidad);
      $productos->setStock($this->getStock);
      $productos->setCodigo($this->getCodigo);
      $productos->setCodigo($this->getCodigo);
      $productos->setCodigo($this->getCodigo);
      $productos->setCodigo($this->getCodigo);
      $productos->setCodigo($this->getCodigo);

      $productos->save();
      $this->redirect('dashboard', []);
    }

    function create() {
      $categorias = new CategoriaModel();
      $this->view->render('productos/create', [
        'categoria' => $categorias->getAll(), 
        'user'      => $this->user
      ]);
    }

    function getCategoriasId() {
      $joinModel = new JoinProductoCategoriaModel();
      $categorias = $joinModel->getAll();

      $res = [];

      foreach ($categorias as $row) {
        array_push($res, $row->getIdCategoria());
      }

      $res = array_values(array_unique($res));

      return $res;
    }

    private function getHistoryJSON() {
      header('Content-Type: application/json');
      
      $joinModel = new JoinProductoCategoriaModel();
      $productos = $joinModel->getAll();      

      $res = [];

      foreach ($productos as $row) {
        array_push($res, $row->toArray());
      }

      echo json_encode($res);
    }

    function delete($params) {
      if($params == null) {
        $this->redirect('productos', []);
      }
    }

  }

?>