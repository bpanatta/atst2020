<?php namespace bpanatta\filters;

/**
 * @author Bruno Panatta <brunopanatta@gmail.com>
 */
class NumberFilter
{
    /**
     * Filters a list of multiples from a single number.
     * @param \bpanatta\models\Number $number Number used as basis for comparison
     * @param \bpanatta\models\Number[] $multiples Numbers multiple to filter
     * @return \bpanatta\models\Number[] List of multiples of the number or the number if none where multiple.
     */
    public static function filterMultiplesFromNumber($number, $multiples)
    {
        // Array with only the multiples of the number
        $multiples = array_filter(
            $multiples,
            function ($multiple) use (&$number) {
                return $number->isMultiple( $multiple->getValue() );
            }
        );

        // 1 if
        if ( empty( $multiples ) ) {
            return [$number];
        }

        return array_values( $multiples );
    }

    /**
     * Filter multiple numbers from an array of Numbers.
     * @param \bpanatta\models\Number[] $numbers Array of numbers to filter
     * @param \bpanatta\models\Number[] $multiples Numbers to filter over $numbers array
     * @return \bpanatta\models\Number[] Filtered numbers array.
     */
    public static function filterMultiplesFromArray($numbers, $multiples)
    {
        return array_map(
            function ( $number ) use ( $multiples ) {
                return static::filterMultiplesFromNumber( $number, $multiples );
            },
            $numbers
        );
    }
}
