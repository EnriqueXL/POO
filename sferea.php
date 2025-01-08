<?php

/*---------------------------------------------------------------Constructor-------------------------------------------------------------------------------------------*/
//Método que se llama automáticamente cuando se crea una instancia de una clase. Se utiliza para inicializar los atributos del objeto.

class Aspirante {
    public $nombre;
    public $edad;

    public function __construct($nombre, $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }
}

$aspirante = new Aspirante("Enrique", 28);
echo $aspirante->nombre; // Enrique

/*---------------------------------------------------------------Método-------------------------------------------------------------------------------------------*/
//Método es una función definida dentro de una clase que describe el comportamiento de los objetos de esa clase.
class Saluda {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function saludar() {
        return "Hola, mi nombre es " . $this->nombre;
    }
}

$saludo = new Saluda("Enrique");
echo $saludo->saludar(); // Hola, mi nombre es Enrique

/*---------------------------------------------------------------Herencia-------------------------------------------------------------------------------------------*/
//Permite que una clase herede propiedades y métodos de otra clase.

class AspiranteAvanzado extends Aspirante {
    public $experiencia;

    public function __construct($nombre, $edad, $experiencia) {
        parent::__construct($nombre, $edad);
        $this->experiencia = $experiencia;
    }

    public function mostrarExperiencia() {
        return $this->nombre . " tiene " . $this->experiencia . " años de experiencia.";
    }
}

$aspiranteAvanzado = new AspiranteAvanzado("Enrique", 28, 3);
echo $aspiranteAvanzado->mostrarExperiencia(); // Enrique tiene 3 años de experiencia.

/*---------------------------------------------------------------Excepción-------------------------------------------------------------------------------------------*/
//Una excepción es una forma de manejar errores en el código. Se utiliza para capturar y manejar errores de manera controlada.
try {
    $aspiranteAvanzado = new AspiranteAvanzado("Enrique", 28, -1);
    if ($aspiranteAvanzado->experiencia < 0) {
        throw new Exception("La experiencia no puede ser negativa.");
    }
    echo $aspiranteAvanzado->mostrarExperiencia();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

/*---------------------------------------------------------------Interfaz-------------------------------------------------------------------------------------------*/
//Una interfaz es una colección de métodos abstractos que deben ser implementados por una clase.
interface Entrevistable {
    public function realizarEntrevista();
    public function evaluarCandidato($nombre, $resultado);
}

class Entrevistador implements Entrevistable {
    public function realizarEntrevista() {
        return "Entrevista realizada.";
    }

    public function evaluarCandidato($nombre, $resultado) {
        return "El candidato " . $nombre . " ha sido " . ($resultado ? "aprobado" : "rechazado") . ".";
    }
}

$entrevistador = new Entrevistador();
echo $entrevistador->realizarEntrevista(); // Entrevista realizada.
echo $entrevistador->evaluarCandidato("Enrique", true); // El candidato Enrique ha sido aprobado.

/*---------------------------------------------------------------Clase abstracta-------------------------------------------------------------------------------------------*/
//Una clase abstracta es una clase que no puede ser instanciada y que puede contener métodos abstractos que deben ser implementados por las clases hijas.
abstract class PersonaAbstracta {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    abstract public function mostrarInformacion();
}

class AspirantePersona extends PersonaAbstracta {
    public function mostrarInformacion() {
        return "Nombre del aspirante: " . $this->nombre;
    }
}

$aspirantePersona = new AspirantePersona("Enrique");
echo $aspirantePersona->mostrarInformacion(); // Nombre del aspirante: Enrique

/*---------------------------------------------------------------This y Super-------------------------------------------------------------------------------------------*/
//$this hace referencia al objeto actual. La palabra clave parent se refiere a la clase padre de la clase actual.

class Persona {
    public $nombre;

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function saludar() {
        return "Hola, soy " . $this->nombre;
    }
}

class AspiranteVacante extends Persona {
    public $vacante;

    public function __construct($nombre, $vacante) {
        parent::__construct($nombre);
        $this->vacante = $vacante;
    }

    public function saludar() {
        return parent::saludar() . " y aspiro a la vacante de " . $this->vacante;
    }
}

$aspiranteVacante = new AspiranteVacante("Enrique", "Desarrollador");
echo $aspiranteVacante->saludar(); // Hola, soy Enrique y aspiro a la vacante de Desarrollador

?>