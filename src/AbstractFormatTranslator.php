<?php

namespace Dhii\I18n;

use Dhii\Data\ValueAwareInterface as Value;
use Dhii\Util\String\StringableInterface as Stringable;
use Dhii\I18n\Exception\TranslationExceptionInterface;
use Dhii\I18n\Exception\I18nExceptionInterface;
use Exception as RootException;

/**
 * Common functionality for format string translators.
 *
 * @since 0.1
 */
abstract class AbstractFormatTranslator extends AbstractStringTranslator
{
    /**
     * Translates a string format.
     *
     * @since 0.1
     *
     * @param string|Stringable $string  The string to translate.
     * @param string|Value|null $context The context for the string, if any.
     * @param array|null        $params  Format parameters for interpolation.
     *
     * @throws TranslationExceptionInterface If problem translating.
     * @throws I18nExceptionInterface        If a problem not directly related to translating occurs.
     *
     * @return string The translated string, with parameters interpolated.
     */
    protected function _translate($string, $context = null, $params = null)
    {
        $string = parent::_translate($string, $context);
        if (!is_null($params)) {
            $string = $this->_interpolateParams($string, $params);
        }

        return $string;
    }

    /**
     * Interpolates given parameters into the specified string.
     *
     * @since 0.1
     *
     * @param string|Stringable $string The string to interpolate parameters into.
     * @param array             $params The parameter map to interpolate into the string.
     * 
     * @throws I18nExceptionInterface If a problem not directly related to translating occurs.
     *
     * @return string The string with parameters interpolated into it.
     */
    abstract protected function _interpolateParams($string, $params);

    /**
     * Creates a new instance of a string translation exception.
     *
     * @since 0.1
     * @see RootException::__construct()
     *
     * @param string|Stringable $message
     * @param int               $code
     * @param RootException     $previous
     * @param mixed             $subject  The subject which is being translated, if any.
     * @param Value|null        $context  The string context, if any.
     * @param array|null        $params   The interpolation params, if any.
     *
     * @return StringTranslationExceptionInterface The new exception.
     */
    abstract protected function _createFormatTranslationException(
            $message,
            $code = 0,
            RootException $previous = null,
            $subject = null,
            $context = null,
            $params = null);
}
