<?php

// ESERCIZIO 1

// Replicare l'esercizio del panino visto a lezione (se siete stanch* dei panini potete comporre quello che preferite, dalle torte, ai burrito a quello che volete, è solo un pretesto per mettere tutto in pratica)

abstract class Tortilla
{
    abstract public function dimension();
}

class SmallTortilla extends Tortilla
{
    public function dimension()
    {
        echo "Es una tortilla de 12 centímetros de diámetro\n";
    }
}

class MediumTortilla extends Tortilla
{
    public function dimension()
    {
        echo "Es una tortilla de 18 centímetros de diámetro\n";
    }
}

class LargeTortilla extends Tortilla
{
    public function dimension()
    {
        echo "Es una tortilla de 24 centímetros de diámetro\n";
    }
}

abstract class Chili
{
    abstract public function spicy();
}

class Jalapeno extends Chili
{
    public function spicy()
    {
        echo "con jalapeños ligeramente picantes\n";
    }
}

class Habanero extends Chili
{
    public function spicy()
    {
        echo "con habaneros muy picantes\n";
    }
}

class CarolinaReaper extends Chili
{
    public function spicy()
    {
        echo "con carol... ¡Dios mío! Tu coraje es admirable\n";
    }
}

abstract class Filling
{
    abstract public function filledWith();
}

class PapaYChorizo extends Filling
{
    public function filledWith()
    {
        echo "relleno de papas y chorizo\n";
    }
}
class Carnita extends Filling
{
    public function filledWith()
    {
        echo "relleno de carnitas\n";
    }
}

class PolloYArroz extends Filling
{
    public function filledWith()
    {
        echo "relleno de pollo y arroz\n";
    }
}

class Burrito
{
    public $tortilla, $chili, $filling;

    public function __construct(Tortilla $tortilla, Chili $chili, Filling $filling)
    {
        $this->tortilla = $tortilla;
        $this->chili = $chili;
        $this->filling = $filling;
    }

    public function ingredientes()
    {
        $this->tortilla->dimension();
        $this->chili->spicy();
        $this->filling->filledWith();
    }
}

$elmuycalientenegrospecial = new Burrito(new LargeTortilla(), new CarolinaReaper(), new Carnita());

$elmuycalientenegrospecial->ingredientes();

// ESERCIZIO 2	

// Ultimare l'esercizio dell'Esercito che abbiamo iniziato a lezione (può essere un esercito fantasy o di supereroi o di personaggi di videogiochi, anche qui potete sbizzarrirvi)

abstract class Defense
{
    abstract public function defenseType();
}

class Tower extends Defense
{
    public function defenseType()
    {
        echo "Al mio segnale scatenate l'inferno \n";
    }
}

class Trench extends Defense
{
    public function defenseType()
    {
        echo "Mi nascondo ciaooo \n";
    }
}

abstract class Attack
{
    abstract public function attackType();
}

class Tank extends Attack
{
    public function attackType()
    {
        echo "I'm a tank \n";
    }
}

class Bomb extends Attack
{
    public function attackType()
    {
        echo "Boom \n";
    }
}

class Army
{
    public $defense, $attack;

    public function __construct(Defense $a, Attack $b)
    {
        $this->defense = $a;
        $this->attack = $b;
    }

    public function combat()
    {
        $this->defense->defenseType();
        $this->attack->attackType();
    }
}

$esercito = new Army(new Tower(), new Bomb());
$esercito->combat();

// ESERCIZIO SUI TRAIT

// Crea un trait chiamato “Calculator“ definendo le seguenti operazioni tra numeri:

trait Calculator
{
    public function sum($a, $b) {
        return $a + $b;
      }
      public function sub($a, $b) {
        return $a - $b;
      }
      public function mul($a, $b) {
        return $a * $b;
      }
      public function div($a, $b) {
        return $a / $b;
      }
      public function sqr($a){
        return sqrt($a);
      }
}

// Crea una classe Rettangolo con due attributi
// Base (b);
// Altezza (h);
// Importare nella classe il trait
// Dentro la classe Rettangolo crea tre metodi che vanno a calcolare:
// Area → b * h;
// Perimetro → 2 * b + 2 * h;
// Diagonale → √ hˆ2 + bˆ2 (Tutto sotto radice)
// TIP: vedere il metodo di php sqrt()
// I metodi della classe rettangolo devono sfruttare al loro interno le operazioni fornite dal trait Calculator

class Rettangolo
{
    use Calculator;

    public $b, $h;
    public function __construct($b, $h)
    {
        $this->b = $b;
        $this->h = $h;
    }
    public function area()
    {
        echo "Area: " . $this->mul($this->b, $this->h) . "\n";
    }
    public function perimetro()
    {
        echo "Perimetro: " . $this->sum($this->b * 2, $this->h * 2) . "\n";
    }
    public function diagonale()
    {
        echo "Diagonale: " . $this->sqr($this->sum($this->b ** 2, $this->h ** 2)) . "\n";
    }
}

$terreno = new Rettangolo(10, 5);
$terreno->area();
$terreno->perimetro();
$terreno->diagonale();