<?php namespace bpanatta\formatters;

/**
 * @author Bruno Panatta <brunopanatta@gmail.com>
 */
interface FormatterInterface
{
    /**
     * Format a value.
     * @param mixed $value Value to format
     * @return mixed The formatted value.
     */
    public function format($value);
}
