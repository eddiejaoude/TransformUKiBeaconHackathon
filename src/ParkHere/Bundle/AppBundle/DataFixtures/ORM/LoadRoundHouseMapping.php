<?php
namespace ParkHere\Bundle\AppBundle\DataFixtures\ORM;

use DashboardHub\Bundle\AppBundle\Entity\Dashboard;
use DashboardHub\Bundle\AppBundle\Entity\User;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ParkHere\Bundle\AppBundle\Entity\Beacon;
use ParkHere\Bundle\AppBundle\Entity\Car;
use ParkHere\Bundle\AppBundle\Entity\ParkingSpace;

/**
 * Class LoadRoundHouseMappingData
 * @package ParkHere\Bundle\AppBundle\DataFixtures\ORM
 */
class LoadRoundHouseMappingData implements FixtureInterface
{

    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $this->manager = $manager;

        $this->addParkingSpace1();
        $this->addParkingSpace2WithCar();
        $this->addParkingSpace3WithCar();
        $this->addParkingSpace4();
        $manager->flush();
    }

    public function addParkingSpace1()
    {
        $car = new Car();
        $car->setUid('pqrstuv');
        $car->setCreatedOn(
            (new \DateTime())
                ->sub(
                    new \DateInterval("PT7H")
                )
        );

        $parkingSpace = new ParkingSpace();
        $parkingSpace->setName('2A');
        $parkingSpace->setCarPark('Round House');
        $parkingSpace->setCar($car);
        $parkingSpace->setAvailable(0);
        $parkingSpace->setUid('43042-4898');
        $parkingSpace->setX(0.163142662696165);
        $parkingSpace->setY(2.41772976230547);
        $parkingSpace->setOrientation(180.654327392578);

        $this->manager->persist($parkingSpace);
    }

    public function addParkingSpace2WithCar()
    {
        $parkingSpace = new ParkingSpace();
        $parkingSpace->setName('2B');
        $parkingSpace->setCarPark('Round House');
        $parkingSpace->setUid('56592-29785');
        $parkingSpace->setX(1.2629431022081);
        $parkingSpace->setY(0.573864024488673);
        $parkingSpace->setOrientation(267.886882435192);

        $this->manager->persist($parkingSpace);
    }

    public function addParkingSpace3WithCar()
    {
        $parkingSpace = new ParkingSpace();
        $parkingSpace->setName('2C');
        $parkingSpace->setCarPark('Round House');
        $parkingSpace->setUid('1677-51024');
        $parkingSpace->setX(0.9859191893535521);
        $parkingSpace->setY(-2.40721610130067);
        $parkingSpace->setOrientation(-0.942706021395597);

        $this->manager->persist($parkingSpace);
    }

    public function addParkingSpace4()
    {
        $car = new Car();
        $car->setUid('wxyzabc');
        $car->setCreatedOn(
            (new \DateTime())
                ->sub(
                    new \DateInterval("PT12H")
                )
        );

        $parkingSpace = new ParkingSpace();
        $parkingSpace->setName('2D');
        $parkingSpace->setCarPark('Round House');
        $parkingSpace->setCar($car);
        $parkingSpace->setAvailable(0);
        $parkingSpace->setUid('63959-62326');
        $parkingSpace->setX(-0.912536392113686);
        $parkingSpace->setY(-0.993263694012384);
        $parkingSpace->setOrientation(82.35563243519179);

        $this->manager->persist($parkingSpace);
    }
}
