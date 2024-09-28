<?php
// Creación de clase padre
class EntidadInvestigacion {
    protected $id;
    protected $nombre;

    // Constructor
    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    // Getters y Setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    // Método común
    public function mostrarInformacion() {
        return "ID: " . $this->id . ", Nombre: " . $this->nombre;
    }
}

class GrupoInvestigacion extends EntidadInvestigacion{
    private $url_grupal;
    private $categoria;
    private $convocatoria;
    private $fecha_fundacion;
    private $universidad;
    private $interno;
    private $ambito;

    // Constructor
    public function __construct($id, $nombre, $url_grupal, $categoria, $convocatoria ,$fecha_fundacion, $universidad,$interno, $ambito) {
        parent::__construct($id, $nombre);
        $this->url_grupal = $url_grupal;
        $this->categoria = $categoria;
        $this->convocatoria = $convocatoria;
        $this->fecha_fundacion = $fecha_fundacion;
        $this->universidad = $universidad;
        $this->interno = $interno;
        $this->ambito = $ambito;
    }

    // Métodos Getters y Setters
  
    public function getUrl_Grupal() {
        return $this->url_grupal;
    }

    public function setUrl_grupal($url_grupal) {
        $this->url_grupal = $url_grupal;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function getConvocatoria() {
        return $this->convocatoria;
    }

    public function setConvocatoria($convocatoria) {
        $this->convocatoria = $convocatoria;
    }

    public function getFechaFundacion() {
        return $this->fecha_fundacion;
    }

    public function setFechaFundacion($fecha_fundacion) {
        $this->fecha_fundacion = $fecha_fundacion;
    }

    public function getUniversidad() {
        return $this->universidad;
    }

    public function setUniversidad($universidad) {
        $this->universidad = $universidad;
    }

    public function getInterno() {
        return $this->interno;
    }

    public function setInterno($interno) {
        $this->interno = $interno;
    }

    public function getAmbito() {
        return $this->ambito;
    }

    public function setAmbito($ambito) {
        $this->ambito = $ambito;
    }

    public function mostrarInformacion() {
        return parent::mostrarInformacion() . ", Url Grupal: " . $this->url_grupal .", Categoría: " . $this->categoria .", Convocatoria: " . 
        $this->convocatoria . ", Fundación: " . $this->fecha_fundacion . ", Universidad: " . $this->universidad .
         ", Interno: " . $this->interno. ", Ambito: " . $this->ambito; 
    }
}

class Semillero extends EntidadInvestigacion {
    private $fecha_fundacion;
    private $grupoInvestigacion; // Relación con GrupoInvestigacion

    // Constructor
    public function __construct($id, $nombre, $fecha_fundacion, GrupoInvestigacion $grupoInvestigacion) {
        parent::__construct($id, $nombre);
        $this->fecha_fundacion = $fecha_fundacion;
        $this->grupoInvestigacion = $grupoInvestigacion;
    }

    // Métodos Getters y Setters
    
    public function getFechaFundacion() {
        return $this->fecha_fundacion;
    }

    // Método para obtener el grupo de investigación
    public function getGrupoInvestigacion() {
        return $this->grupoInvestigacion;
    }

    // Métodos
    public function mostrarInformacion() {
        return parent::mostrarInformacion() . ", Fundación: " . $this->fecha_fundacion. ", Grupo investigación: " . $this->grupoInvestigacion;
    }
}

class LineaInvestigacion extends EntidadInvestigacion {
    private $descripcion;

    // Constructor
    public function __construct($id, $nombre, $descripcion) {
        parent::__construct($id, $nombre);
        $this->descripcion = $descripcion;
    }

    // Métodos Getters y Setters
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    // Métodos
    public function mostrarInformacion() {
        return parent::mostrarInformacion() . ", Descripción: " . $this->descripcion;
    }
}

abstract class Investigacion {
    protected $titulo;
    protected $fechaInicio;
    protected $fechaFin;

    public function __construct($titulo, $fechaInicio, $fechaFin) {
        $this->titulo = $titulo;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    // Método abstracto que debe ser implementado por las clases derivadas
    abstract public function obtenerDetalles();

    public function getTitulo() {
        return $this->titulo;
    }
}

interface InvestigacionInterface {
    public function iniciar();
    public function finalizar();
}

class ProyectoInvestigacion extends Investigacion implements InvestigacionInterface {
    private $montoFinanciacion;

    public function __construct($titulo, $fechaInicio, $fechaFin, $montoFinanciacion) {
        parent::__construct($titulo, $fechaInicio, $fechaFin);
        $this->montoFinanciacion = $montoFinanciacion;
    }

    public function obtenerDetalles() {
        return "Título: $this->titulo, Financiación: $this->montoFinanciacion";
    }

    public function iniciar() {
        echo "El proyecto de investigación '$this->titulo' ha comenzado.";
    }

    public function finalizar() {
        echo "El proyecto de investigación '$this->titulo' ha finalizado.";
    }
}

class EstudioInvestigacion extends Investigacion implements InvestigacionInterface {
    private $metodoInvestigacion;

    public function __construct($titulo, $fechaInicio, $fechaFin, $metodoInvestigacion) {
        parent::__construct($titulo, $fechaInicio, $fechaFin);
        $this->metodoInvestigacion = $metodoInvestigacion;
    }

    public function obtenerDetalles() {
        return "Título: $this->titulo, Método: $this->metodoInvestigacion";
    }

    public function iniciar() {
        echo "El estudio de investigación '$this->titulo' ha comenzado.";
    }

    public function finalizar() {
        echo "El estudio de investigación '$this->titulo' ha finalizado.";
    }
}

class ParticipaGrupo {
    private $grupoInvestigacion;        
    private $docenteCedula;
    private $rol;
    private $fechaInicio;
    private $fechaFin;

    // Constructor
    public function __construct($docenteCedula, GrupoInvestigacion $grupoInvestigacion, $rol, $fechaInicio, $fechaFin = null) {
        $this->docenteCedula = $docenteCedula;
        $this->grupoInvestigacion = $grupoInvestigacion;
        $this->rol = $rol;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    // Métodos Getters y Setters
    public function getGrupoInvestigacion() {
        return $this->grupoInvestigacion;
    }

    public function setGrupoInvestigacion(GrupoInvestigacion $grupoInvestigacion) {
        $this->grupoInvestigacion = $grupoInvestigacion;
    }

    public function getDocenteCedula() {
        return $this->docenteCedula;
    }

    public function setDocenteCedula($docenteCedula) {
        $this->docenteCedula = $docenteCedula;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaFin() {
        return $this->fechaFin;
    }

    public function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }
}

class OdsLinea {
    private $lineaInvestigacion;
    private $ods;

    // Constructor
    public function __construct(LineaInvestigacion $lineaInvestigacion, $ods) {
        $this->lineaInvestigacion = $lineaInvestigacion;
        $this->ods = $ods;
    }

    // Métodos Getters y Setters
    public function getLineaInvestigacion() {
        return $this->lineaInvestigacion;
    }

    public function setLineaInvestigacion(LineaInvestigacion $lineaInvestigacion) {
        $this->lineaInvestigacion = $lineaInvestigacion;
    }

    public function getOds() {
        return $this->ods;
    }

    public function setOds($ods) {
        $this->ods = $ods;
    }
}

class AcLinea {
    private $lineaInvestigacion;
    private $areaConocimiento;

    // Constructor
    public function __construct(LineaInvestigacion $lineaInvestigacion, $areaConocimiento) {
        $this->lineaInvestigacion = $lineaInvestigacion;
        $this->areaConocimiento = $areaConocimiento;
    }

    // Métodos Getters y Setters
    public function getLineaInvestigacion() {
        return $this->lineaInvestigacion;
    }

    public function setLineaInvestigacion(LineaInvestigacion $lineaInvestigacion) {
        $this->lineaInvestigacion = $lineaInvestigacion;
    }

    public function getAreaConocimiento() {
        return $this->areaConocimiento;
    }

    public function setAreaConocimiento($areaConocimiento) {
        $this->areaConocimiento = $areaConocimiento;
    }
}

class AaLinea {
    private $areaAplicacion;
    private $lineaInvestigacion;

    // Constructor
    public function __construct($areaAplicacion, LineaInvestigacion $lineaInvestigacion) {
        $this->areaAplicacion = $areaAplicacion;
        $this->lineaInvestigacion = $lineaInvestigacion;
    }

    // Métodos Getters y Setters
    public function getAreaAplicacion() {
        return $this->areaAplicacion;
    }

    public function setAreaAplicacion($areaAplicacion) {
        $this->areaAplicacion = $areaAplicacion;
    }

    public function getLineaInvestigacion() {
        return $this->lineaInvestigacion;
    }

    public function setLineaInvestigacion(LineaInvestigacion $lineaInvestigacion) {
        $this->lineaInvestigacion = $lineaInvestigacion;
    }
}

class SemilleroLinea {
    private $semillero;
    private $lineaInvestigacion;

    // Constructor
    public function __construct(Semillero $semillero, LineaInvestigacion $lineaInvestigacion) {
        $this->semillero = $semillero;
        $this->lineaInvestigacion = $lineaInvestigacion;
    }

    // Métodos Getters y Setters
    public function getSemillero() {
        return $this->semillero;
    }

    public function setSemillero(Semillero $semillero) {
        $this->semillero = $semillero;
    }

    public function getLineaInvestigacion() {
        return $this->lineaInvestigacion;
    }

    public function setLineaInvestigacion(LineaInvestigacion $lineaInvestigacion) {
        $this->lineaInvestigacion = $lineaInvestigacion;
    }
}

class GrupoLinea {
    private $grupoInvestigacion;
    private $lineaInvestigacion;

    // Constructor
    public function __construct(GrupoInvestigacion $grupoInvestigacion, LineaInvestigacion $lineaInvestigacion) {
        $this->grupoInvestigacion = $grupoInvestigacion;
        $this->lineaInvestigacion = $lineaInvestigacion;
    }

    // Métodos Getters y Setters
    public function getGrupoInvestigacion() {
        return $this->grupoInvestigacion;
    }

    public function setGrupoInvestigacion(GrupoInvestigacion $grupoInvestigacion) {
        $this->grupoInvestigacion = $grupoInvestigacion;
    }

    public function getLineaInvestigacion() {
        return $this->lineaInvestigacion;
    }

    public function setLineaInvestigacion(LineaInvestigacion $lineaInvestigacion) {
        $this->lineaInvestigacion = $lineaInvestigacion;
    }
}

class ParticipaSemillero {
    private $semillero;
    private $docente;
    private $rol;
    private $fechaInicio;
    private $fechaFin;

    // Constructor
    public function __construct($docente, Semillero $semillero, $rol, $fechaInicio, $fechaFin = null) {
        $this->docente = $docente;
        $this->semillero = $semillero;
        $this->rol = $rol;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    // Métodos Getters y Setters
    public function getSemillero() {
        return $this->semillero;
    }

    public function setSemillero(Semillero $semillero) {
        $this->semillero = $semillero;
    }

    public function getDocente() {
        return $this->docente;
    }

    public function setDocente($docente) {
        $this->docente = $docente;
    }

    public function getRol() {
        return $this->rol;
    }

    public function setRol($rol) {
        $this->rol = $rol;
    }

    public function getFechaInicio() {
        return $this->fechaInicio;
    }

    public function setFechaInicio($fechaInicio) {
        $this->fechaInicio = $fechaInicio;
    }

    public function getFechaFin() {
        return $this->fechaFin;
    }

    public function setFechaFin($fechaFin) {
        $this->fechaFin = $fechaFin;
    }
}

?>  

<?php
// Configuración de conexión
$servername = "localhost"; // Cambia esto si tu servidor es diferente
$username = "root"; // Cambia esto por tu nombre de usuario
$password = ""; // Cambia esto por tu contraseña
$dbname = "investigacion";

// Crear conexión
$conn = new mysqli($servername, $username, $password);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos si no existe
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada exitosamente.<br>";
} else {
    echo "Error creando base de datos: " . $conn->error . "<br>";
}

// Seleccionar la base de datos
$conn->select_db($dbname);

// Crear tabla si no existe
$sql = "CREATE TABLE IF NOT EXISTS grupo_investigacion (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    url_grupal VARCHAR(255),
    categoria VARCHAR(255),
    convocatoria VARCHAR(255),
    fecha_fundacion DATE,
    universidad VARCHAR(255),
    interno BOOLEAN,
    ambito VARCHAR(255)
)";
if ($conn->query($sql) === TRUE) {
    echo "Tabla 'grupo_investigacion' creada exitosamente.<br>";
} else {
    echo "Error creando tabla: " . $conn->error . "<br>";
}

// Crear
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['crear'])) {
    $nombre = $_POST['nombre'];
    $url_grupal = $_POST['url_grupal'];
    $categoria = $_POST['categoria'];
    $convocatoria = $_POST['convocatoria'];
    $fecha_fundacion = $_POST['fecha_fundacion'];
    $universidad = $_POST['universidad'];
    $interno = isset($_POST['interno']) ? 1 : 0;
    $ambito = $_POST['ambito'];

    $sql = "INSERT INTO grupo_investigacion (nombre, url_grupal, categoria, convocatoria, fecha_fundacion, universidad, interno, ambito) 
            VALUES ('$nombre', '$url_grupal', '$categoria', '$convocatoria', '$fecha_fundacion', '$universidad', $interno, '$ambito')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Leer
$sql = "SELECT * FROM grupo_investigacion";
$result = $conn->query($sql);

// Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['actualizar'])) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $url_grupal = $_POST['url_grupal'];
    $categoria = $_POST['categoria'];
    $convocatoria = $_POST['convocatoria'];
    $fecha_fundacion = $_POST['fecha_fundacion'];
    $universidad = $_POST['universidad'];
    $interno = isset($_POST['interno']) ? 1 : 0;
    $ambito = $_POST['ambito'];

    $sql = "UPDATE grupo_investigacion SET nombre='$nombre', url_grupal='$url_grupal', categoria='$categoria', 
            convocatoria='$convocatoria', fecha_fundacion='$fecha_fundacion', universidad='$universidad', 
            interno=$interno, ambito='$ambito' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Eliminar
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    $sql = "DELETE FROM grupo_investigacion WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Grupo de Investigación</title>
</head>
<body>
    <h1>CRUD Grupo de Investigación</h1>

    <!-- Formulario para crear un nuevo registro -->
    <h2>Crear Nuevo Registro</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre" required>
        <input type="text" name="url_grupal" placeholder="URL Grupal" required>
        <input type="text" name="categoria" placeholder="Categoría" required>
        <input type="text" name="convocatoria" placeholder="Convocatoria" required>
        <input type="date" name="fecha_fundacion" required>
        <input type="text" name="universidad" placeholder="Universidad" required>
        <label>Interno: <input type="checkbox" name="interno"></label>
        <input type="text" name="ambito" placeholder="Ámbito" required>
        <button type="submit" name="crear">Crear</button>
    </form>

    <!-- Tabla para mostrar registros existentes -->
    <h2>Registros Existentes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>URL Grupal</th>
            <th>Categoría</th>
            <th>Convocatoria</th>
            <th>Fecha Fundación</th>
            <th>Universidad</th>
            <th>Interno</th>
            <th>Ámbito</th>
            <th>Acciones</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nombre']; ?></td>
                    <td><?php echo $row['url_grupal']; ?></td>
                    <td><?php echo $row['categoria']; ?></td>
                    <td><?php echo $row['convocatoria']; ?></td>
                    <td><?php echo $row['fecha_fundacion']; ?></td>
                    <td><?php echo $row['universidad']; ?></td>
                    <td><?php echo $row['interno'] ? 'Sí' : 'No'; ?></td>
                    <td><?php echo $row['ambito']; ?></td>
                    <td>
                        <a href="javascript:void(0);" onclick="document.getElementById('actualizar<?php echo $row['id']; ?>').style.display='block';">Actualizar</a>
                        <a href="?eliminar=<?php echo $row['id']; ?>" onclick="return confirm('¿Estás seguro de que quieres eliminar este registro?');">Eliminar</a>
                    </td>
                </tr>

                <!-- Formulario para actualizar un registro -->
                <div id="actualizar<?php echo $row['id']; ?>" style="display:none;">
                    <h3>Actualizar Registro</h3>
                    <form method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                        <input type="text" name="url_grupal" value="<?php echo $row['url_grupal']; ?>" required>
                        <input type="text" name="categoria" value="<?php echo $row['categoria']; ?>" required>
                        <input type="text" name="convocatoria" value="<?php echo $row['convocatoria']; ?>" required>
                        <input type="date" name="fecha_fundacion" value="<?php echo $row['fecha_fundacion']; ?>" required>
                        <input type="text" name="universidad" value="<?php echo $row['universidad']; ?>" required>
                        <label>Interno: <input type="checkbox" name="interno" <?php echo $row['interno'] ? 'checked' : ''; ?>></label>
                        <input type="text" name="ambito" value="<?php echo $row['ambito']; ?>" required>
                        <button type="submit" name="actualizar">Actualizar</button>
                        <button type="button" onclick="document.getElementById('actualizar<?php echo $row['id']; ?>').style.display='none';">Cancelar</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="10">No hay registros disponibles.</td>
            </tr>
        <?php endif; ?>
    </table>

    <?php $conn->close(); // Cierra la conexión ?>
</body>
</html>
