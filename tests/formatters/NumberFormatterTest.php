<?php namespace bpanatta\tests\formatters;

use bpanatta\formatters\NumberFormatter;
use bpanatta\models\Number;

class NumberFormatterTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFormat()
    {
        $formatter = new NumberFormatter();

        $number = new Number( 1, 'One' );
        $this->assertEquals( 'One', $formatter->format( $number ),
            'Format must get number label'
        );
        $number = new Number( 5, 'Five' );
        $this->assertEquals( 'Five', $formatter->format( $number ),
            'Format must get number label'
        );
        $number = new Number( 4, 4 );
        $this->assertEquals( 4, $formatter->format( $number ),
            'Format must get number label'
        );
    }
}