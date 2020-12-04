<?php namespace bpanatta\views;

use bpanatta\formatters\FormatterInterface;

/**
 * @property \bpanatta\formatters\FormatterInterface $formatter
 * 
 * @author Bruno Panatta <brunopanatta@gmail.com>
 */
class View
{
    protected $formatter;

    /**
     * @param \bpanatta\formatters\FormatterInterface $formatter Data formatter
     */
    public function __construct(FormatterInterface $formatter)
    {
        $this->formatter = $formatter;
    }

    /**
     * Print data to interface.
     * @param mixed $data Data to render
     */
    public function render($data)
    {
        print_r( $this->formatter->format( $data ) );
    }
}
