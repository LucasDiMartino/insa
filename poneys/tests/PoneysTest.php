<?php
use PHPUnit\Framework\TestCase;

require_once 'src/Poneys.php';

/**
 * Classe de test de gestion de poneys
 */
class PoneysTest extends TestCase
{
    /**
     * Undocumented function
     * @param $count
     * @param $expected
     * @dataProvider removeDataProvider
     * @return void
     */
    public function testRemovePoneyFromField($count, $expected)
    {
        // Setup
        $Poneys = new Poneys();

        // Action
        $Poneys->removePoneyFromField($count);

        // Assert
        $this->assertEquals($expected, $Poneys->getCount());
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testRemovePoneyWithNegativeOrNullNumber()
    {
        $Poneys = new Poneys();
        $this->expectException(UnexpectedValueException::class);
        $Poneys->removePoneyFromField(-3);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testRemovePoneyWithNegativeOrNullCounter()
    {
        $Poneys = new Poneys();
        $this->expectException(UnexpectedValueException::class);
        $Poneys->removePoneyFromField(10);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function testAddPoneyToField()
    {
        $Poneys = new Poneys();
        $Poneys->addPoneyToField(3);
        $this->assertEquals(11, $Poneys->getCount());
    }

    public function testAddPoneyToFieldFull()
    {
        $Poneys = new Poneys();
        $this->expectException(UnexpectedValueException::class);
        $Poneys->addPoneyToField(5);
    }

    public function removeDataProvider()
    {
        return [
                    [1, 7],
                    [2, 6]
                ];
    }

    public function testGetNames()
    {
        $poneyMock = $this->getMockBuilder(Poneys::class)->setMethods(['getNames'])->getMock();
        $poneyMock->expects($this->once())->method('getNames')->willReturn(array('foo', 'bar'));
        $this->assertEquals($poneyMock->getNames(), ['foo', 'bar']);
    }    
}
?>
