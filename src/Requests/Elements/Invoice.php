<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class Invoice
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class Invoice
{
    /** @var  Name */
    private $shipToName;

    /** @var  Address */
    private $shipToaddress;

    /** @var Amount */
    private $totalNetAmount;

    /** @var [] */
    private $totalVatAmount;

    /** @var string */
    private $additionalDescription;

    /**
     * @var item[]
     */
    private $items = [];

    /**
     * @param Name $name
     * @param Address $address
     *
     * @return $this
     */
    public function setShipTo($name, $address)
    {
        $this->setShipToName($name);
        $this->setShipToAddress($address);
        
        return $this;
    }
    
    /**
     * @return Name
     */
    public function getShipToName()
    {
        return $this->shipToName;
    }

    /**
     * @param Name $shipToName
     *
     * @return $this
     */
    public function setShipToName($shipToName)
    {
        $this->shipToName = $shipToName;

        return $this;
    }

    /**
     * @return Address
     */
    public function getShipToAddress()
    {
        return $this->shipToaddress;
    }

    /**
     * @param Address $shipToaddress
     *
     * @return $this
     */
    public function setShipToAddress($shipToaddress)
    {
        $this->shipToaddress = $shipToaddress;

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
     * @return Vat
     */
    public function getTotalVatAmount()
    {
        return $this->totalVatAmount;
    }

    /**
     * @param Vat $totalVatAmount
     *
     * @return $this
     */
    public function addTotalVatAmount($totalVatAmount)
    {
        $this->totalVatAmount[] = $totalVatAmount;

        return $this;
    }

    /**
     * @return Amount
     */
    public function getTotalVatRate()
    {
        return $this->totalVatRate;
    }

    /**
     * @param int $totalVatRate
     *
     * @return $this
     */
    public function setTotalVatRate($totalVatRate)
    {
        $this->totalVatRate = $totalVatRate;

        return $this;
    }

    /**
     * @return string
     */
    public function getAdditionalDescription()
    {
        return $this->additionalDescription;
    }

    /**
     * @param string $additionalDescription
     *
     * @return $this
     */
    public function setAdditionalDescription($additionalDescription)
    {
        $this->additionalDescription = $additionalDescription;

        return $this;
    }

    /**
     * @return item[]
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * @param Item $item
     *
     * @return $this
     */
    public function addItem(Item $item)
    {
        $item->setNumber(count($this->getItems()) + 1);
        $this->items[] = $item;

        return $this;
    }
}
