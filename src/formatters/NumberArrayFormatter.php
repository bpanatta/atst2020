<?php namespace bpanatta\formatters;

use bpanatta\formatters\FormatterInterface;

/**
 * @property string $glue
 * 
 * @author Bruno Panatta <brunopanatta@gmail.com>
 */
class NumberArrayFormatter implements FormatterInterface
{
    protected $glue;

    /**
     * @param string $glue To join array values
     */
    public function __construct($glue='And')
    {
        $this->glue = $glue;
    }

    /**
     * @return string The value used to join array values
     */
    public function getGlue()
    {
        return $this->glue;
    }

    /**
     * @inheritdoc
     */
    public function format($value)
    {
        // Join the labels with the glue
        return implode(
            $this->getGlue(),
            $this->convertNumbersToLabel( $value )
        );
    }

    /**
     * Convert array of Numbers into array of strings.
     * @param \bpanatta\models\Number[] $numbers Array of numbers to convert
     * @return string[] Array of number labels.
     */
    private function convertNumbersToLabel( $numbers )
    {
        return array_map(
            function( $number ) {
                return $number->getLabel();
            },
            $numbers
        );
    }
}
