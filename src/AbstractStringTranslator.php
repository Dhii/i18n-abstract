<?php

namespace Dhii\I18n;

use Dhii\Data\ValueAwareInterface as Value;
use Dhii\Util\String\StringableInterface as Stringable;
use Dhii\I18n\Exception\StringTranslationExceptionInterface;
use Dhii\I18n\Exception\I18nExceptionInterface;
use Exception as RootException;

/**
 * Common functionality for translators that can translate whole strings.
 *
 * @since 0.1
 */
abstract class AbstractStringTranslator extends AbstractTranslator
{
    /**
     * Translates a string.
     *
     * @since 0.1
     *
     * @param string|Stringable $string  The string to translate.
     * @param string|Value      $context The context for the string, if any.
     *
     * @throws TranslationExceptionInterface If problem translating.
     * @throws I18nExceptionInterface        If a problem not directly related to translating occurs.
     *
     * @return string The translated string.
     */
    protected function _translate($string, $context = null)
    {
        $string = $this->_translateString($string, $context);

        return $string;
    }

    /**
     * Translates a string value.
     *
     * @since 0.1
     *
     * @param string|Stringable $string  The value to translate.
     * @param string|Value      $context The context for the string.
     *
     * @throws TranslationExceptionInterface If problem translating.
     * @throws I18nExceptionInterface        If a problem not directly related to translating occurs.
     *
     * @return string|Stringable The translated string value.
     */
    abstract protected function _translateString($string, $context = null);

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
     *
     * @return StringTranslationExceptionInterface The new exception.
     */
    abstract protected function _createStringTranslationException(
            $message,
            $code = 0,
            RootException $previous = null,
            $subject = null,
            $context = null);
}
