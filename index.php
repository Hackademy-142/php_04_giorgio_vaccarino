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