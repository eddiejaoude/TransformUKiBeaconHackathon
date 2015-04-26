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
 * Class LoadReadingRoomMappingData
 * @package Quickstart\Bundle\AppBundle\DataFixtures\ORM
 */
class LoadReadingRoomMappingData implements FixtureInterface
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
        $parkingSpace = new ParkingSpace();
        $parkingSpace->setName('1A');
        $parkingSpace->setCarPark('Reading Room');
        $parkingSpace->setUid('e669a773c7fc');
        $parkingSpace->setX(-0.162831984522726);
        $parkingSpace->setY(-1.97208331763145);
        $parkingSpace->setOrientation(346.114298502604);

        $this->manager->persist($parkingSpace);
    }

    public function addParkingSpace2WithCar()
    {
        $car = new Car();
        $car->setUid('abcdefg');
        $car->setCreatedOn(new \DateTime());

        $parkingSpace = new ParkingSpace();
        $parkingSpace->setName('1B');
        $parkingSpace->setCarPark('Reading Room');
        $parkingSpace->setCar($car);
        $parkingSpace->setAvailable(false);
        $parkingSpace->setUid('d62963a73f2f');
        $parkingSpace->setX(-1.30115592843365);
        $parkingSpace->setY(0.1602604064794);
        $parkingSpace->setOrientation(76.6375495062934);

        $this->manager->persist($parkingSpace);
    }

    public function addParkingSpace3WithCar()
    {
        $car = new Car();
        $car->setUid('hijklmno');
        $car->setCreatedOn(new \DateTime());

        $parkingSpace = new ParkingSpace();
        $parkingSpace->setName('1C');
        $parkingSpace->setCarPark('Reading Room');
        $parkingSpace->setCar($car);
        $parkingSpace->setAvailable(false);
        $parkingSpace->setUid('df10d71c3772');
        $parkingSpace->setX(-0.698570225339638);
        $parkingSpace->setY(1.77540707972113);
        $parkingSpace->setOrientation(162.769168429905);

        $this->manager->persist($parkingSpace);
    }

    public function addParkingSpace4()
    {
        $parkingSpace = new ParkingSpace();
        $parkingSpace->setUid('1D');
        $parkingSpace->setCarPark('Reading Room');
        $parkingSpace->setUid('c5bbcd393057');
        $parkingSpace->setX(0.909436368827841);
        $parkingSpace->setY(0.611016939058266);
        $parkingSpace->setOrientation(251.725128173828);

        $this->manager->persist($parkingSpace);
    }
}
