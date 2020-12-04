<?php namespace bpanatta\tests\models;

use bpanatta\models\Number;

class NumberTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testGetValue()
    {
        $number = new Number( 2, 2 );
        $this->assertEquals( 2, $number->getValue(),
            'Number value must match the value passed to its constructor'
        );

        $number = new Number( 2, 'Two' );
        $this->assertNotEquals( 'Two', $number->getValue(),
            'Number value must match the value passed to its constructor'
        );
        $this->assertNotEquals( 3, $number->getValue(),
            'Number value cannot be another number'
        );
    }
    
    public function testGetLabel()
    {
        $number = new Number( 2, 2 );
        $this->assertEquals( 2, $number->getLabel(),
            'Number integer label must match the value passed to its constructor'
        );

        $number = new Number( 2, 'Two' );
        $this->assertEquals( 'Two', $number->getLabel(),
            'Number string label must match the value passed to its constructor'
        );
        $this->assertNotEquals( 2, $number->getLabel(),
            'Number string label must match the value passed to its constructor'
        );
    }
    
    public function testIstMultiple()
    {
        $number = new Number( 2, 2 );
        $this->assertTrue( $number->isMultiple( 2 ),
            'Number must be multiple of itself'
        );
        $this->assertFalse( $number->isMultiple( 3 ),
            '2 must NOT be multiple of 3'
        );

        $number = new Number( 6, 6 );
        $this->assertTrue( $number->isMultiple( $number->getValue() / 2 ),
            'Number must be multiple of its half'
        );
        $this->assertFalse( $number->isMultiple( 4 ),
            '6 must NOT be multiple of 4'
        );
    }
}