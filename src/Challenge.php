<?php namespace bpanatta;

use bpanatta\factories\NumberFactory;
use bpanatta\filters\NumberFilter;
use bpanatta\formatters\NumberArrayFormatter;
use bpanatta\models\Number;
use bpanatta\views\ArrayView;

/**
 * Main code of the challenge
 * 
 * @property \bpanatta\models\Number[] $numbers
 * @property \bpanatta\models\Number[] $multiples
 * 
 * @author Bruno Panatta <brunopanatta@gmail.com>
 */
class Challenge
{
    private $numbers;
    private $multiples;

    /**
     */
    public function __construct()
    {
        // Values required for the challenge
        $this->numbers = NumberFactory::createRange( 1, 100 );
        $this->multiples = [
            new Number( 3, 'Three' ),
            new Number( 5, 'Five' ),
        ];
    }

    /**
     * Execute the Challenge.
     */
    public function run()
    {
        try {
            // Filter numbers
            $numbersMultiples = NumberFilter::filterMultiplesFromArray( $this->numbers, $this->multiples );
    
            // Prepare content for rendering
            $formatter = new NumberArrayFormatter( 'And' );
            $arrayView = new ArrayView( $formatter );
    
            $arrayView->render( $numbersMultiples );

        } catch ( \Exception $e ) {
            print_r( 'There was an error processing the data. Please reset to the repository values and try again.' );
        }
    }
}
