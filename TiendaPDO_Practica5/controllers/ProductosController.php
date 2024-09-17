<?php
require_once(dirname(__FILE__) . '/../config/database.php');
require_once(dirname(__FILE__) . '/../models/Productos.php');

class ProductosController
{
    private $db;
    private $producto;

    // Constructor
    public function __construct()
    {
        // Capturamos la conexión a la base de datos
        $database = new Database();
        $this->db = $database->getConnection();

        // Instanciamos el modelo productos
        $this->producto = new Productos($this->db);
    }

    // Método para mostrar la lista de productos
    public function index()
    {
        $result = $this->producto->get_products();
        $productos = $result->fetchAll(PDO::FETCH_ASSOC);

        // Llamamos la vista que muestra la lista de productos
        include(dirname(__FILE__) . '/../views/productos.php');
    }

     // Método para crear un nuevo producto
     public function create()
     {
         if ($_POST) {
             // Asignamos los datos del formulario a las propiedades del 
             // ['nombre'] estos valores bienen del formulario create.php
             // $_POST['nombre'] obtendrá el valor ingresado en el campo name="nombre" del formulario
             $this->producto->nombre = $_POST['nombre'];
             $this->producto->descripcion = $_POST['descripcion'];
             $this->producto->categoria = $_POST['categoria'];
             
             header("Location: index.php");
             return $this->producto->create();   
         }
 
         // Incluimos la vista del formulario de creación
         include(dirname(__FILE__) . '/../views/create.php');
     }
 
     // Método para editar un producto
     public function edit($id)
     {
         // Cargamos el producto que se desea editar
         $this->producto->id = $id;
         $this->producto->get_product_by_id();
 
         if ($_POST) {
             // Asignamos los datos del formulario a las propiedades del producto
             $this->producto->id = $id;
             $this->producto->nombre = $_POST['nombre'];
             $this->producto->descripcion = $_POST['descripcion'];
             $this->producto->categoria = $_POST['categoria'];
             
             header("Location: index.php");
             return $this->producto->update();
         }
         // Incluimos la vista del formulario de edición
         include(dirname(__FILE__) . '/../views/update.php');
     }

     // Método para eliminar un producto
    public function delete($id)
    {
        $this->producto->id = $id;
        header("Location: index.php");
        return $this->producto->delete();   
    }
}

?>