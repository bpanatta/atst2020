<?php namespace bpanatta\formatters;

use bpanatta\formatters\FormatterInterface;

/**
 * @author Bruno Panatta <brunopanatta@gmail.com>
 */
class NumberFormatter implements FormatterInterface
{
    /**
     * @inheritdoc
     */
    public function format($value)
    {
        return $value->getLabel();
    }
}
