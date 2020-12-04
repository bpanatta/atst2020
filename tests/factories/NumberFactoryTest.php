<?php namespace bpanatta\tests\factories;

use bpanatta\factories\NumberFactory;

class NumberFactoryTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testCreateRange()
    {
        $numbers = NumberFactory::createRange( 1, 10 );
        
        $this->assertIsArray( $numbers, 'Range is not an array' );
        $this->assertNotEquals( [], $numbers, 'Numbers not generated' );
        $this->assertEquals( 10, count( $numbers ), 'Incorrect count' );
        $this->assertEquals( 8, $numbers[7]->getValue(), 'Incorrect number generated' );
        $this->assertEquals( 3, $numbers[2]->getLabel(), 'Incorrect label generated' );
    }
}