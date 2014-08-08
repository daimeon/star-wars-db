<?php
/**
 * Created by PhpStorm.
 * User: dmoritz
 * Date: 06.08.14
 * Time: 15:34
 */
namespace dmoritz\StarWarsDb\Entity;

use Symfony\Component\Form\Extension\Validator\Constraints as Assert;

class Contact
{
    /**
     * @Assert\NotBlank()
     */
    private $sName;

    /**
     * @Assert\Email()
     */
    private $sEmail;

    /**
     * @Assert\NotBlank()
     */
    private $sSubject;

    /**
     * @Assert\NotBlank()
     */
    private $sMessage;

    public function getName()
    {
        return $this->sName;
    }

    public function setName($sName)
    {
        $this->sName = $sName;
    }

    public function getEmail()
    {
        return $this->sEmail;
    }

    public function setEmail($sEmail)
    {
        $this->sEmail = $sEmail;
    }

    public function getSubject()
    {
        return $this->sSubject;
    }

    public function setSubject($sSubject)
    {
        $this->sSubject = $sSubject;
    }

    public function getMessage()
    {
        return $this->sMessage;
    }

    public function setMessage($sMessage)
    {
        $this->sMessage = $sMessage;
    }
}