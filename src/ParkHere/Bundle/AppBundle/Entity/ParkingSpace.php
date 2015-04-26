<?php
namespace ParkHere\Bundle\AppBundle\Entity;

/**
 * Class ParkingSpace
 * @package AppBundle\Controller
 */
class ParkingSpace
{

    /**
     * @var int
     */
    protected $id = 0;

    /**
     * @var string
     */
    protected $uid = '';

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $carPark = '';

    /**
     * @var Car
     */
    protected $car;

    /**
     * @var int
     */
    protected $available = 1;

    /**
     * @var float
     */
    protected $x = 0;

    /**
     * @var float
     */
    protected $y = 0;

    /**
     * @var float
     */
    protected $orientation = 0;

    /**
     * Pence
     *
     * @var int
     */
    protected $minuteCost = 1.6;

    /**
     * @var int
     */
    protected $totalCost = 0;

    /**
     * @var string
     */
    protected $duration = 0;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     *
     * @return ParkingSpace
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param string $uid
     *
     * @return ParkingSpace
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

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
     * @return ParkingSpace
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getCarPark()
    {
        return $this->carPark;
    }

    /**
     * @param string $carPark
     *
     * @return ParkingSpace
     */
    public function setCarPark($carPark)
    {
        $this->carPark = $carPark;

        return $this;
    }

    /**
     * @return ParkingSpace
     */
    public function getParkingSpace()
    {
        return $this->beacon;
    }

    /**
     * @param ParkingSpace $beacon
     *
     * @return ParkingSpace
     */
    public function setParkingSpace(ParkingSpace $beacon)
    {
        $this->beacon = $beacon;

        return $this;
    }

    /**
     * @return Car
     */
    public function getCar()
    {
        return $this->car;
    }

    /**
     * @param Car $car
     *
     * @return Car
     */
    public function setCar(Car $car = null)
    {
        $this->car = $car;

        return $this;
    }

    /**
     * @return int
     */
    public function isAvailable()
    {
        return $this->available;
    }

    /**
     * @param int $available
     *
     * @return ParkingSpace
     */
    public function setAvailable($available)
    {
        $this->available = $available;

        return $this;
    }

    /**
     * @return float
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param float $x
     *
     * @return ParkingSpace
     */
    public function setX($x)
    {
        $this->x = $x;

        return $this;
    }

    /**
     * @return float
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param float $y
     *
     * @return ParkingSpace
     */
    public function setY($y)
    {
        $this->y = $y;

        return $this;
    }

    /**
     * @return float
     */
    public function getOrientation()
    {
        return $this->orientation;
    }

    /**
     * @param float $orientation
     *
     * @return ParkingSpace
     */
    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinuteCost()
    {
        return $this->minuteCost;
    }

    /**
     * @param int $minuteCost
     *
     * @return ParkingSpace
     */
    public function setMinuteCost($minuteCost)
    {
        $this->minuteCost = $minuteCost;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotalCost()
    {
        return $this->totalCost;
    }

    /**
     * @param int $totalCost
     *
     * @return ParkingSpace
     */
    public function setTotalCost($totalCost)
    {
        $this->totalCost = $totalCost;

        return $this;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     *
     * @return ParkingSpace
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }
}
