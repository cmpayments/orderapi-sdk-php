<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class Shopper
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class Shopper
{
    /** @var string */
    private $shopperId;

    /** @var  name */
    private $name;

    /** @var string */
    private $email;

    /** @var string */
    private $languageCode;

    /** @var string */
    private $gender;

    /** @var \DateTime */
    private $dateOfBirth;

    /** @var string */
    private $phoneNumber;

    /** @var string */
    private $mobilePhoneNumber;

    /** @var string */
    private $ipAddress;

    /**
     * @return string
     */
    public function getShopperId()
    {
        return $this->shopperId;
    }

    /**
     * @param string $shopperId
     *
     * @return $this
     */
    public function setShopperId($shopperId)
    {
        $this->shopperId = $shopperId;

        return $this;
    }

    /**
     * @return name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param name $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguageCode()
    {
        return $this->languageCode;
    }

    /**
     * @param string $languageCode
     *
     * @return $this
     */
    public function setLanguageCode($languageCode)
    {
        if (!in_array(
            strtolower($languageCode),
            [
                'nl',
                'en',
                'de',
                'cs',
                'da',
                'es',
                'fi',
                'fr',
                'hu',
                'it',
                'no',
                'pl',
                'pt',
                'sv',
                'tr'
            ],
            true
        )) {
            $languageCode = 'en';
        }

        $this->languageCode = strtolower($languageCode);

        return $this;
    }

    /**
     * @return string
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param string $gender
     *
     * @return $this
     */
    public function setGender($gender)
    {
        $this->gender = strtoupper($gender);

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @param \DateTime $dateOfBirth
     *
     * @return $this;
     */
    public function setDateOfBirth(\DateTime $dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     *
     * @return $this
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getMobilePhoneNumber()
    {
        return $this->mobilePhoneNumber;
    }

    /**
     * @param string $mobilePhoneNumber
     *
     * @return $this
     */
    public function setMobilePhoneNumber($mobilePhoneNumber)
    {
        $this->mobilePhoneNumber = $mobilePhoneNumber;

        return $this;
    }

    /**
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     *
     * @return $this
     */
    public function setIpAddress($ipAddress)
    {
        $this->ipAddress = $ipAddress;

        return $this;
    }
}
