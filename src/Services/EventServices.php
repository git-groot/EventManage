<?php

namespace App\Services;

use App\Entity\EventBooking;
use App\Entity\EventBookingList;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use DateTime;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\VarDumper\Cloner\Data;

class EventServices
{

    private $EM;
    public function __construct(EntityManagerInterface $EM)
    {
        $this->EM = $EM;
    }
    // post     
    public function bookevent($request)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        $data = $serializer->deserialize($content, EventBooking::class, 'json');

        $book = new EventBooking;
        $book->setName($data->getName());
        $book->setPhoneNo($data->getPhoneNo());
        $book->setAddress($data->getAddress());
        $book->setEmail($data->getEmail());
        $book->setFunctionName($data->getFunctionName());
        $book->setFunctionLocation($data->getFunctionLocation());
        $book->setAmount($data->getAmount());

        $fundate = new \DateTime($data->getfunctiondatestr());
        $book->setFunctionDate($fundate);
        $funtime =($data->getfunctiontimestr());
        $book->setFunctionTime($funtime);

        $this->EM->persist($book);
        $this->EM->flush();
        return $book;
    }
    // update
    public function updateEven($request, $id)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        $data = $serializer->deserialize($content, EventBooking::class, 'json');

        $bookrepo = $this->EM->getRepository(EventBooking::class);
        $bookingupd = $bookrepo->findOneBy(['id' => $id]);
        if ($bookingupd == null) {
            return 'invalide booking id';
        }

        $bookname = $data->getName('Name');
        if ($bookname) {
            $bookingupd->setName($bookname);
        }
        $phone = $data->getPhoneNo('PhoneNo');
        if ($phone) {
            $bookingupd->setPhoneNo($phone);
        }
        $address = $data->getAddress('Address');
        if ($address) {
            $bookingupd->setAddress($address);
        }
        $functionname = $data->getFunctionName('FunctionName');
        if ($functionname) {
            $bookingupd->setFunctionName($functionname);
        }
        $location = $data->getFunctionLocation('FunctionLocation');
        if ($location) {
            $bookingupd->setFunctionLocation($location);
        }
        $amount = $data->getAmount('Amount');
        if ($amount) {
            $bookingupd->setAmount($amount);
        }
        $email = $data->getEmail('Email');
        if ($email) {
            $bookingupd->setEmail($email);
        }
        $datestr = $data->getfunctiondatestr();
        if ($datestr) {
            $date = new DateTime($datestr);
            if ($date) {
                $bookingupd->setFunctionDate($date);
            }
        }
        $timestr = $data->getfunctiontimestr();
        if ($timestr) {
            $time = new DateTime($timestr);
            if ($time) {
                $bookingupd->setFunctionTime($time);
            }
        }
        $this->EM->persist($bookingupd);
        $this->EM->flush();
        return $bookingupd;
    }
    //getsingle
    public function getsinglebookevent($id)
    {

        $bookrepo = $this->EM->getRepository(EventBooking::class);
        $eventbookid = $bookrepo->findOneBy(['id' => $id]);
        if ($eventbookid == null) {
            return 'invalide booking id';
        }
        return $eventbookid;
    }
    // getall
    public function getallbookevent()
    {

        $bookrepo = $this->EM->getRepository(EventBooking::class);
        $allbooking = $bookrepo->findAll();
        return $allbooking;
    }
    // delete
    public function deletebookevent($id)
    {

        $evenrepo = $this->EM->getRepository(EventBooking::class);
        $dele = $evenrepo->findOneBy(['id' => $id]);
        if ($dele == null) {
            return 'invalide booking id';
        }
        // dd($dele);
        $this->EM->remove($dele);
        $this->EM->flush();
        return 'delete successfully';
    }

    // booking list
    // post     
    public function bookeventlist($request)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        $data = $serializer->deserialize($content, EventBookingList::class, 'json');

        $listrepo = $this->EM->getRepository(EventBooking::class);
        $bookingid = $listrepo->findOneBy(['id' => $data->getEventsbookid()]);
        if ($bookingid == null) {
            return 'invalide booking id';
        }

        $list = new EventBookingList;
        $list->setEvenetBookin($bookingid);
        $list->setEvents($data->getEvents());
        $list->setCount($data->getCount());

        $this->EM->persist($list);
        $this->EM->flush();
        return $list;
    }
    // update
    public function updateEvenlist($request, $id)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        $data = $serializer->deserialize($content, EventBookingList::class, 'json');

        $listrepo = $this->EM->getRepository(EventBookingList::class);
        $updatelist = $listrepo->findOneBy(['id' => $id]);
        if ($updatelist == null) {
            return 'invalide evenlist id';
        }

        $events = $data->getEvents('Events');
        if ($events) {
            $updatelist->setEvents($events);
        }

        $count = $data->getCount('Count');
        if ($count) {
            $updatelist->setCount($count);
        }
        $eventbook = $data->getEventsbookid();
        if ($eventbook) {
            $bookinid = $this->EM->getRepository(EventBooking::class)->find($eventbook);
            if ($bookinid) {
                $updatelist->setEvenetBookin($bookinid);
            }
        }

        $this->EM->persist($updatelist);
        $this->EM->flush();
        return $updatelist;
    }
    // getsingle
    public function getsinglebookeventlist($id)
    {

        $bookrepo = $this->EM->getRepository(EventBookingList::class);
        $eventbookid = $bookrepo->findOneBy(['id' => $id]);
        if ($eventbookid == null) {
            return 'invalide bookinglistid id';
        }
        return $eventbookid;
    }
    // // getall
    public function getallbookeventlist()
    {

        $bookrepo = $this->EM->getRepository(EventBookingList::class);
        $allbooking = $bookrepo->findAll();
        return $allbooking;
    }
    // // delete
    public function deletebookeventlist($id)
    {

        $evenrepo = $this->EM->getRepository(EventBookingList::class);
        $dele = $evenrepo->findOneBy(['id' => $id]);
        if ($dele == null) {
            return 'invalide booking id';
        }
        // dd($dele);
        $this->EM->remove($dele);
        $this->EM->flush();
        return 'delete successfully';
    }
}
