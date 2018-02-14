<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class Quantity
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class Quantity
{

    const UNIT_OF_MEASUREMENT_PCS = 'PCS';
    const UNIT_OF_MEASUREMENT_SEC = 'SEC';
    const UNIT_OF_MEASUREMENT_BYT = 'BYT';
    const UNIT_OF_MEASUREMENT_KB = 'KB';

    /** @var  string */
    private $unitOfMeasure = 'PCS';

    /** @var int */
    private $quantity;

    /**
     * @return string
     */
    public function getUnitOfMeasure()
    {
        return $this->unitOfMeasure;
    }

    /**
     * Unit of measurement. The attribute can have the following values:
     * PCS - pieces SEC- seconds BYT - bytes KB - kilobytes
     *
     * @param string $unitOfMeasure
     * return $this;
     */
    public function setUnitOfMeasure(string $unitOfMeasure)
    {
        $unitOfMeasure = strtoupper($unitOfMeasure);
        $units = [
            self::UNIT_OF_MEASUREMENT_PCS,
            self::UNIT_OF_MEASUREMENT_SEC,
            self::UNIT_OF_MEASUREMENT_BYT,
            self::UNIT_OF_MEASUREMENT_KB
        ];
        if (!in_array($unitOfMeasure, $units, true)) {
            throw new Exception('Invalid unit of measure');
        }
        $this->unitOfMeasure = $unitOfMeasure;

        return $this;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     *
     * @return $this
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @param int $pieces
     *
     * @return Quantity
     */
    public static function pieces(int $pieces)
    {
        $quantity = new Quantity();
        $quantity->setUnitOfMeasure(self::UNIT_OF_MEASUREMENT_PCS);
        $quantity->setQuantity($pieces);
        return $quantity;
    }

    /**
     * @param int $seconds
     *
     * @return Quantity
     */
    public static function seconds(int $seconds)
    {
        $quantity = new Quantity();
        $quantity->setUnitOfMeasure(self::UNIT_OF_MEASUREMENT_SEC);
        $quantity->setQuantity($seconds);
        return $quantity;
    }

    /**
     * @param int $bytes
     *
     * @return Quantity
     */
    public static function bytes(int $bytes)
    {
        $quantity = new Quantity();
        $quantity->setUnitOfMeasure(self::UNIT_OF_MEASUREMENT_BYT);
        $quantity->setQuantity($bytes);
        return $quantity;
    }

    /**
     * @param int $kilobytes
     *
     * @return Quantity
     */
    public static function kilobytes(int $kilobytes)
    {
        $quantity = new Quantity();
        $quantity->setUnitOfMeasure(self::UNIT_OF_MEASUREMENT_KB);
        $quantity->setQuantity($kilobytes);
        return $quantity;
    }
}
