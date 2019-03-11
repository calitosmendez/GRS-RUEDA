<?php
session_start();
class Home extends Controller
{
    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index(){
        require APP.'view/_templates/header.php';
        require APP . 'view/home/index.php';
    }
    public function login(){
      $_SESSION['Usuario'] = $this->model->login($_POST['txtUsuario'], $_POST['txtPassword']);
      header('Location: '.URL.'Home/pedido');

    }
    public function pedido(){
      require APP.'view/_templates/header.php';
      require APP.'view/_templates/navbar.php';
      $lista = $this->model->listaClientes($_SESSION['Usuario']['0']->Pais, $_SESSION['Usuario']['0']->SlpCode);
            require APP.'view/home/pedido.php';
      //$correo  = $this->model->idCliente($_SESSION['Usuario']['0']->Codigo);      
    }
    public function setEncabezado(){
      require APP.'view/home/detalle.php';
    }

    /**
     * PAGE: exampleone
     * This method handles what happens when you move to http://yourproject/home/exampleone
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleOne()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_one.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * PAGE: exampletwo
     * This method handles what happens when you move to http://yourproject/home/exampletwo
     * The camelCase writing is just for better readability. The method name is case-insensitive.
     */
    public function exampleTwo()
    {
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/example_two.php';
        require APP . 'view/_templates/footer.php';
    }
}
