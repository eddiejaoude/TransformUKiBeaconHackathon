<?php
namespace ParkHere\Bundle\AppBundle\Entity;

/**
 * Class Car
 * @package AppBundle\Controller
 */
class Car
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
     * @var \Datetime
     */
    protected $createdOn;

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
     * @return \Datetime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param \Datetime $createdOn
     */
    public function setCreatedOn(\Datetime $createdOn)
    {
        $this->createdOn = $createdOn;
    }
}
