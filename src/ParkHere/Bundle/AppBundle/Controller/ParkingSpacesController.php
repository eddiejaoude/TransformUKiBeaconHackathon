<?php

namespace ParkHere\Bundle\AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use ParkHere\Bundle\AppBundle\Entity\Car;
use Symfony\Component\HttpFoundation\Request;

class ParkingSpacesController extends FOSRestController
{

    /**
     * @param Request $request
     * @param         $uid
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getParkingSpacesAction(Request $request, $uid)
    {
        // find beacon
        /** @var \ParkHere\Bundle\AppBundle\Entity\ParkingSpace $parkingSpace */
        $parkingSpace = $this->getDoctrine()
                              ->getRepository('ParkHereAppBundle:ParkingSpace')
                              ->findOneBy(
                                  array(
                                      'uid' => $uid
                                  )
                              );

        // find all spaces by car park
        $parkingSpaces = $this->getDoctrine()
                              ->getRepository('ParkHereAppBundle:ParkingSpace')
                              ->findBy(
                                  array(
                                      'carPark' => $parkingSpace->getCarPark()
                                  )
                              );

        return $this->handleView(
            $this->view($parkingSpaces, 200)
        );
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postParkingCheckInAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        // create car
        $car = new Car();
        $car->setUid($data['phone']['uid']);
        $car->setCreatedOn(new \DateTime());

        // get parking space
        $parkingSpace = $this->getDoctrine()
             ->getRepository('ParkHereAppBundle:ParkingSpace')
             ->findOneBy(
                 array(
                     'uid' => $data['beacon']['uid']
                 )
             );

        if (null === $parkingSpace) {
            return $this->handleView(
                $this->view(array('message' => 'Parking Space not found'), 404)
            );
        }

        if (0 == $parkingSpace->isAvailable()) {
            return $this->handleView(
                $this->view(array('message' => 'Parking Space already taken'), 400)
            );
        }

        $parkingSpace->setCar($car);
        $parkingSpace->setAvailable(0);

        $this->getDoctrine()
            ->getEntityManager()
            ->persist($parkingSpace);
        $this->getDoctrine()
            ->getEntityManager()
            ->flush();

        return $this->handleView(
            $this->view($parkingSpace, 200)
        );
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postParkingCheckOutAction(Request $request)
    {
        $data = json_decode($request->getContent(), true);

        // get parking space
        $parkingSpace = $this->getDoctrine()
                             ->getRepository('ParkHereAppBundle:ParkingSpace')
                             ->findOneBy(
                                 array(
                                     'uid' => $data['beacon']['uid']
                                 )
                             );

        if (null === $parkingSpace) {
            return $this->handleView(
                $this->view(array('message' => 'Parking Space not found'), 404)
            );
        }

        if (1 == $parkingSpace->isAvailable()) {
            return $this->handleView(
                $this->view(array('message' => 'Parking Space not used'), 400)
            );
        }

        if ($parkingSpace->getCar()->getUid() != $data['phone']['uid']) {
            return $this->handleView(
                $this->view(array('message' => 'Not your car!'), 400)
            );
        }

        /** @var \ParkHere\Bundle\AppBundle\Entity\ParkingSpace $checkout */
        $checkout = $parkingSpace;

        $duration = $checkout->getCar()
                             ->getCreatedOn()
                             ->diff(new \DateTime());

        $checkout->setDuration(
            $duration->format('%h hour(s) %i minute(s)')
        );
        $minutes = (int) $duration->format('%i') == 0 ? 1 : (int) $duration->format('%i');
        $hours = (int) $duration->format('%h') == 0 ? 1 : (int) $duration->format('%h');
        $checkout->setTotalCost(
            $checkout->getMinuteCost() *
            ( $minutes  * ($hours * 60) )
        );

        $parkingSpace->setCar(null);
        $parkingSpace->setAvailable(1);

        $this->getDoctrine()
             ->getEntityManager()
             ->persist($parkingSpace);
        $this->getDoctrine()
             ->getEntityManager()
             ->flush();

        return $this->handleView(
            $this->view($checkout, 200)
        );
    }
}
