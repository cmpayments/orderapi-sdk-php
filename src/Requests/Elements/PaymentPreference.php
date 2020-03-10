<?php

namespace CMPayments\OrderApi\Requests\Elements;

/**
 * Class PaymentPreference
 *
 * @package CMPayments\OrderApi\Requests\Elements
 * @author  Michel Westerink <michel.westerink@cmtelecom.com>
 */
class PaymentPreference
{
    const EXPIRE_AFTER_UNIT_MINUTES = 'MINUTES';
    const EXPIRE_AFTER_UNIT_HOURS = 'HOURS';
    const EXPIRE_AFTER_UNIT_DAYS = 'DAYS';

    /** @var string */
    private $profile;

    /** @var int */
    private $numberOfDaysToPay;

    /** @var array */
    private $periods = [];

    /** @var string */
    private $terminalId;

    /** @var string */
    private $expireAfterUnit;

    /** @var integer */
    private $expireAfterDuration;

    public function addPeriod(int $numberOfDays, string $profile = null)
    {
        $period = ['numberOfDays' => $numberOfDays];
        if ($profile !== null) {
            $period['profile'] = $profile;
        }

        $this->periods[] = $period;

        return $this;
    }

    /**
     * Unit could be 'MINUTES', 'HOURS', or 'DAYS'
     *
     * @param string $unit
     * @param int    $duration
     *
     * @return $this
     */
    public function setExpireAfter(string $unit, int $duration)
    {
        $this->expireAfterUnit = $unit;
        $this->expireAfterDuration = $duration;

        return $this;
    }

    /**
     * @return string
     */
    public function getExpireAfterUnit()
    {
        return $this->expireAfterUnit;
    }

    /**
     * @return int
     */
    public function getExpireAfterDuration()
    {
        return $this->expireAfterDuration;
    }

    /**
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param string $profile
     *
     * @return $this
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * @return int
     */
    public function getNumberOfDaysToPay()
    {
        return $this->numberOfDaysToPay;
    }

    /**
     * @param int $numberOfDaysToPay
     *
     * @return $this
     */
    public function setNumberOfDaysToPay($numberOfDaysToPay)
    {
        $this->numberOfDaysToPay = $numberOfDaysToPay;

        return $this;
    }

    /**
     * @return array
     */
    public function getPeriods()
    {
        return $this->periods;
    }

    /**
     * @param array $periods
     *
     * @return $this
     */
    public function setPeriods($periods)
    {
        $this->periods = $periods;

        return $this;
    }

    /**
     * @return string
     */
    public function getTerminalId()
    {
        return $this->terminalId;
    }

    /**
     * @param $terminalId
     *
     * @return $this
     */
    public function setTerminalId($terminalId)
    {
        $this->terminalId = $terminalId;

        return $this;
    }
}
