<?php namespace bpanatta\tests\formatters;

use bpanatta\formatters\NumberArrayFormatter;
use bpanatta\models\Number;

class NumberArrayFormatterTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testSomeFeature()
    {
        $formatter = new NumberArrayFormatter();

        $numbers = [new Number( 5, 'Five' )];
        $this->assertEquals( 'Five', $formatter->format( $numbers ),
            'Format must get number label'
        );
        $numbers = [new Number( 4, 4 )];
        $this->assertEquals( 4, $formatter->format( $numbers ),
            'Format must get number label'
        );
        $numbers = [
            new Number( 1, 'One' ),
            new Number( 2, 'Two' )
        ];
        $this->assertEquals( 'OneAndTwo', $formatter->format( $numbers ),
            'Format must get joined numbers label'
        );

        $formatter = new NumberArrayFormatter( ',' );
        $numbers = [
            new Number( 3, 'Three' ),
            new Number( 5, 'Five' )
        ];
        $this->assertEquals( 'Three,Five', $formatter->format( $numbers ),
            'Format must join numbers labels with different glues'
        );
        $numbers = [
            new Number( 1, 'Three' ),
            new Number( 2, 'Five' )
        ];
        $this->assertEquals( 'Three,Five', $formatter->format( $numbers ),
            'Format must join must be independent of the number values'
        );
    }
}