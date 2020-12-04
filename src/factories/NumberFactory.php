<?php namespace bpanatta\factories;

use bpanatta\models\Number;

/**
 * @author Bruno Panatta <brunopanatta@gmail.com>
 */
class NumberFactory
{
    /**
     * Create an array containing a range of Number objects.
     * @param mixed $start First number value of the sequence
     * @param mixed $end The range will halt when this value is reached or surpassed
     * @param int $step Will be used as an increment. Must be a positive integer. Defaults to 1
     * @return \bpanatta\models\Number[] Array of Number objects.
     */
    public static function createRange($start, $end, $step = 1)
    {
        $numbers = [];
        for ( $val = $start; $val <= $end; $val = $val + $step ) {
            $numbers[] = new Number( $val, $val );
        }
        return $numbers;
    }
}
