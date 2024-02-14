<?php
namespace App\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


    #[ORM\Entity]
    #[ORM\Table(name: 'restaurants')]
    class Restaurant  implements  UserInterface, PasswordAuthenticatedUserInterface{
        #[ORM\Id]
        #[ORM\Column(type: 'integer', name :'CodRes')]
        #[ORM\GeneratedValue]
        private $codRes;
        #[ORM\Column(type: 'string', name :'Mail')]
        private $mail;
        #[ORM\Column(type: 'string', name :'Password')]
        private $password;
        #[ORM\Column(type: 'string', name :'Country' )]
        private $country;
        #[ORM\Column(type: 'integer', name: 'PC')]
        private $postalCode;
        #[ORM\Column(type: 'string', name :'Address')]

        private $addres;
        #[ORM\Column(type: 'string', name :'City')]
        private $city;
        #[ORM\Column(type: 'integer', name :'Role')]
        private $role;   
         
        /**
         * Resturant constructor.
         */
        public function __construct()
        {
        }

        

        /**
         * Get the value of codRes
         */ 
        public function getCodRes()
        {
                return $this->codRes;
        }

        /**
         * Get the value of mail
         */ 
        public function getMail()
        {
                return (string) $this->mail;
        }

        /**
         * Set the value of mail
         *
         * @return  self
         */ 
        public function setMail($mail)
        {
                $this->mail = $mail;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getPassword(): ?string
        {
                return (string) $this->password;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setPassword($password)
        {
                $this->password = $password;

                return $this;
        }

        /**
         * Get the value of country
         */ 
        public function getCountry()
        {
                return $this->country;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */ 
        public function setCountry($country)
        {
                $this->country = $country;

                return $this;
        }

        /**
         * Get the value of postalCode
         */  public function getPostalCode()
        {
                return $this->postalCode;
        }

        /**
         * Set the value of postalCode
         *
         * @return  self
         */ 
        public function setPostalCode($postalCode)
        {
                $this->postalCode = $postalCode;

                return $this;
        }

        /**
         * Get the value of addres
         */ 
        public function getAddres()
        {
                return $this->addres;
        }

        /**
         * Set the value of addres
         *
         * @return  self
         */ 
        public function setAddres($addres)
        {
                $this->addres = $addres;

                return $this;
        }

        /**
         * Get the value of city
         */ 
        public function getCity()
        {
                return $this->city;
        }

        /**
         * Set the value of city
         *
         * @return  self
         */ 
        public function setCity($city)
        {
                $this->city = $city;

                return $this;
        }

        /**
         * Get the value of role
         */ 
        public function getRole()
        {
                return $this->role;
        }

        /**
         * Set the value of role
         *
         * @return  self
         */ 
        public function setRole($role)
        {
                $this->role = $role;

                return $this;
        }
        /* UserInterface methods*/
        public function getUserIdentifier(): string{
            return $this->mail;
        }
        public function eraseCredentials(): void{
            //$this->password = null;
        }
        public function getRoles(): array{
            /* role 0 for normal user, 1 form admins
               admins are also users */
            if($this->role == 0) {
                return  ["ROLE_USER"];
            }else{
            /* alternative to this: confure role hierarchy in securit.yaml*/
                return ["ROLE_USER", "ROLE_ADMIN"];
            }
        }
        
    }

