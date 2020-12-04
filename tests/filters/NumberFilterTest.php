<?php namespace bpanatta\tests\filters;

use bpanatta\factories\NumberFactory;
use bpanatta\filters\NumberFilter;
use bpanatta\models\Number;

class NumberFilterTest extends \Codeception\Test\Unit
{

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testFilterMultiplesFromNumber()
    {
        $multiples = [
            new Number( 3, 'Three' ),
            new Number( 4, 'Four' )
        ];

        $number = new Number( 1, 1 );
        $this->assertIsArray(
            NumberFilter::filterMultiplesFromNumber( $number, $multiples ),
            'Filtered values must be an array'
        );
        $this->assertEquals(
            [$number],
            NumberFilter::filterMultiplesFromNumber( $number, $multiples ),
            'Not filtering non multiple number'
        );

        $number = new Number( 6, 6 );
        $this->assertEquals(
            [ $multiples[0] ],
            NumberFilter::filterMultiplesFromNumber( $number, $multiples ),
            'Not filtering single multiple'
        );

        $number = new Number( 12, 12 );
        $this->assertEquals(
            $multiples,
            NumberFilter::filterMultiplesFromNumber( $number, $multiples ),
            'Not filtering more than one multiple'
        );

        $multiples = [
            new Number( 3, 'Three' ),
            new Number( 5, 'Five' )
        ];
        $number = new Number( 15, 15 );
        $this->assertEquals(
            $multiples,
            NumberFilter::filterMultiplesFromNumber( $number, $multiples ),
            'Not filtering more than one multiple'
        );
    }


    public function testFilterMultiplesFromArray()
    {
        $numbers = NumberFactory::createRange( 1, 12 );
        $multiples = [
            new Number( 3, 'Three' ),
            new Number( 4, 'Four' )
        ];
        
        $filteredNumbers = NumberFilter::filterMultiplesFromArray( $numbers, $multiples );
        $this->assertIsArray( $filteredNumbers, 'Filtered values must be an array' );
        foreach ( $filteredNumbers as $filteredNumber ) {
            $this->assertIsArray( $filteredNumbers, 'Filtered number must be array' );
        }

        $this->assertEquals(
            [$numbers[6]],
            $filteredNumbers[6],
            'Not filtering non multiple number'
        );
        $this->assertEquals(
            [$multiples[0]],
            $filteredNumbers[5],
            'Not filtering multiple'
        );
        $this->assertEquals(
            [$multiples[1]],
            $filteredNumbers[7],
            'Not filtering multiple'
        );
        $this->assertEquals(
            $multiples,
            $filteredNumbers[11],
            'Not filtering more than one multiple'
        );
    }
}