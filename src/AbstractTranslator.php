<?php

namespace Dhii\I18n;

use Dhii\I18n\Exception\I18nExceptionInterface;
use Dhii\I18n\Exception\TranslationExceptionInterface;
use Dhii\Util\String\StringableInterface as Stringable;
use Exception as RootException;

/**
 * Common functionality for translators.
 * 
 * @since 0.1
 */
abstract class AbstractTranslator
{
    /**
     * Parameter-less constructor.
     *
     * Invoke this in actual constructor.
     *
     * @since 0.2
     */
    protected function _construct()
    {
    }

    /**
     * Translates a subject.
     *
     * @since 0.1
     *
     * @param mixed $subject The subject to translate.
     *
     * @throws TranslationExceptionInterface If could not translate string.
     * @throws I18nExceptionInterface        If a problem occurs that is not directly related to the translation process.
     *
     * @return mixed The translated subject.
     */
    abstract protected function _translate($subject);

    /**
     * Creates a new instance of an internationalization exception.
     *
     * @since 0.1
     * @see RootException::__construct()
     *
     * @param string|Stringable $message
     * @param int               $code
     * @param RootException     $previous
     *
     * @return I18nExceptionInterface The new exception.
     */
    abstract protected function _createI18nException($message, $code = 0, RootException $previous = null);

    /**
     * Creates a new instance of a translation exception.
     *
     * @since 0.1
     * @see RootException::__construct()
     *
     * @param string|Stringable $message
     * @param int               $code
     * @param RootException     $previous
     * @param mixed             $subject  The subject which is being translated, if any.
     *
     * @return TranslationExceptionInterface The new exception.
     */
    abstract protected function _createTranslationException($message, $code = 0, RootException $previous = null, $subject = null);
}
