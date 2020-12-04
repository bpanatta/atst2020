<?php namespace bpanatta\views;

use bpanatta\formatters\FormatterInterface;

/**
 * @author Bruno Panatta <brunopanatta@gmail.com>
 */
class ArrayView extends View
{
    /**
     * @inheritdoc
     */
    public function render($data)
    {
        foreach ( $data as $value ) {
            print_r( $this->formatter->format( $value ) . "\n" );
        }
    }
}
