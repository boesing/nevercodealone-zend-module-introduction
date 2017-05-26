<?php

namespace NeverCodeAlone\Form;

use Zend\Form\Annotation;

/**
 * @author Max Bösing <max.boesing@check24.de>
 * @Annotation\Name("contact")
 * @Annotation\Hydrator(Zend\Hydrator\Reflection::class)
 */
class Contact
{

    /**
     * @var string
     * @Annotation\Type("text")
     * @Annotation\Options({
     *     "label": "Vorname"
     * })
     * @Annotation\Filter({"name": "StripTags"})
     */
    private $firstname;

    /**
     * @var string
     * @Annotation\Type("text")
     * @Annotation\Options({
     *     "label": "Nachname"
     * })
     * @Annotation\Filter({"name": "StripTags"})
     * @Annotation\Filter({"name": "StringTrim"})
     */
    private $lastname;

    /**
     * @var string
     * @Annotation\Type("email")
     * @Annotation\Options({
     *     "label": "E-Mail"
     * })
     * @Annotation\Filter({"name": "StripTags"})
     * @Annotation\Filter({"name": "StringTrim"})
     * @Annotation\Validator({"name": "emailaddress"})
     */
    private $email;

    /**
     * @var string
     * @Annotation\Type("textarea")
     * @Annotation\Options({
     *     "label": "Nachricht"
     * })
     * @Annotation\Filter({"name": "StripTags"})
     * @Annotation\Filter({"name": "StringTrim"})
     */
    private $message;

    /**
     * @var string
     * @Annotation\Type("csrf")
     */
    private $csrf;

    /**
     * @Annotation\Type("submit")
     * @Annotation\Attributes({
     *     "value": "Senden"
     * })
     */
    private $submit;
}
