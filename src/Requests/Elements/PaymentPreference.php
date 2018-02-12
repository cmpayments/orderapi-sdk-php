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
    /** @var string */
    private $profile;

    /** @var int */
    private $numberOfDaysToPay;

    /** @var array */
    private $periods = [];

    /** @var string */
    private $terminalId;

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