<?php

namespace App\Services;

use App\Entity\EventBooking;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class EventServices
{

    private $EM;
    public function __construct(EntityManagerInterface $EM)
    {
        $this->EM = $EM;
    }

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

        $this->EM->persist($book);
        $this->EM->flush();
        return $book;
    }

    public function updateEven($request, $id)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $content = $request->getContent();
        // dd();
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
}
