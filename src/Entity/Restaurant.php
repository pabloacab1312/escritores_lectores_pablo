<?php
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

    #[ORM\Entity]
    #[ORM\Table(name: 'restaurants')]
    class Restaurant{
        #[ORM\Id]
        #[ORM\Column(type: 'integer')]
        #[ORM\GeneratedValue]
        private $codRes;
        #[ORM\Column(type: 'string')]
        private $mail;
        #[ORM\Column(type: 'string')]
        private $password;
        #[ORM\Column(type: 'string')]
        private $country;
        #[ORM\Column(type: 'integer', name: 'P.C.')]
        private $postalCode;
        #[ORM\Column(type: 'string')]

        private $addres;
        #[ORM\Column(type: 'string')]
        private $city;
        #[ORM\Column(type: 'integer')]
        private $role;
        
         

        
    }

