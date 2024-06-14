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
        $book->getAddress($data->setPhoneNo());
        $book->setAddress($data->getAddress());
        $book->setFunctionName($data->getFunctionName());
        $book->setFunctionLocation($data->getFunctionLocation());
        $book->setAmount($data->getAmount());

        $this->EM->persist($book);
        $this->EM->flush();
        return $book;
    }
}
