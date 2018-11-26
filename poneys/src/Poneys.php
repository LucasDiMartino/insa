<?php
/**
 * Gestion de poneys
 */
class Poneys
{
    private $_count = 8;
    private $places = 15;

    /**
     * Retourne le nombre de poneys
     *
     * @return void
     */
    public function getCount(): int
    {
        return $this->_count;
    }

    public function is_free() : bool
    {
        return ($this->places - $this->_count > 0);
    }

    /**
     * Retire un poney du champ
     *
     * @param int $number Nombre de poneys à retirer
     *
     * @return void
     */
    public function removePoneyFromField(int $number): void
    {
        if($number <= 0)
        {
            throw new UnexpectedValueException('Parameter 0 / negatif');            }

        if($this->_count - $number < 0)
        {
            throw new UnexpectedValueException('counter 0 / negatif');
        }
      
        $this->_count -= $number;
    }

    /**
     * Ajoute un poney dans un champ
     *
     * @param int $number Nombre de poneys à ajouter
     *
     * @return void
     */
    public function addPoneyToField(int $number): void
    {
        if($number <= 0)
        {
            throw new UnexpectedValueException('Valeur nulle / negative');
        }

        if($this->is_free())
        {
            throw new UnexpectedValueException('no more space');
        }

        if($this->_count + $number <= $this->places)
            $this->_count += $number;
    }

    /**
     * Retourne les noms des poneys
     *
     * @return array
     */
    public function getNames(): array
    {

    }
}
?>
