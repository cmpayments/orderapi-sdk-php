<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class Item
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */

class Item
{
    /** @var int */
    private $number;

    /** @var string */
    private $name;

    /** @var string */
    private $code;

    /** @var Quantity */
    private $quantity;

    /** @var string */
    private $description;

    /** @var string */
    private $image;

    /** @var Amount */
    private $netAmount;

    /** @var Amount */
    private $grossAmount;

    /** @var Vat */
    private $vat;

    /** @var Amount */
    private $totalNetAmount;

    /** @var Amount */
    private $totalGrossAmount;

    /** @var Vat */
    private $totalVat;

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
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
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return $this
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     *
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param string $image
     *
     * @return $this
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return Amount
     */
    public function getNetAmount()
    {
        return $this->netAmount;
    }

    /**
     * @param Amount $netAmount
     *
     * @return $this
     */
    public function setNetAmount($netAmount)
    {
        $this->netAmount = $netAmount;

        return $this;
    }

    /**
     * @return Amount
     */
    public function getGrossAmount()
    {
        return $this->grossAmount;
    }

    /**
     * @param Amount $grossAmount
     *
     * @return $this
     */
    public function setGrossAmount($grossAmount)
    {
        $this->grossAmount = $grossAmount;

        return $this;
    }

    /**
     * @return Vat
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * @param Vat $vat
     *
     * @return $this
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * @return Amount
     */
    public function getTotalNetAmount()
    {
        return $this->totalNetAmount;
    }

    /**
     * @param Amount $totalNetAmount
     *
     * @return $this
     */
    public function setTotalNetAmount($totalNetAmount)
    {
        $this->totalNetAmount = $totalNetAmount;

        return $this;
    }

    /**
     * @return Amount
     */
    public function getTotalGrossAmount()
    {
        return $this->totalGrossAmount;
    }

    /**
     * @param Amount $totalGrossAmount
     *
     * @return $this
     */
    public function setTotalGrossAmount($totalGrossAmount)
    {
        $this->totalGrossAmount = $totalGrossAmount;

        return $this;
    }

    /**
     * @return Vat
     */
    public function getTotalVat()
    {
        return $this->totalVat;
    }

    /**
     * @param Vat $totalVat
     *
     * @return $this
     */
    public function setTotalVat(Vat $totalVat)
    {
        $this->totalVat = $totalVat;

        return $this;
    }

    /**
     * @return Quantity
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param Quantity $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }
}