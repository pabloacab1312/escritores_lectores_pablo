<?php
namespace App\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;


    #[ORM\Entity]
    #[ORM\Table(name: 'users')]
    class Users  implements  UserInterface, PasswordAuthenticatedUserInterface{
        #[ORM\Id]
        #[ORM\GeneratedValue]
        #[ORM\Column]
        private ?int $id = null;
        #[ORM\Column(type: 'string', name :'Email')]
        private $email;
        #[ORM\Column(type: 'string', name :'Password')]
        private $password;
        #[ORM\Column(type: 'string', name :'Profile' )]
        private $profile;
        #[ORM\Column(type: 'string', name :'Name' )]
        private $name;
        #[ORM\Column(type: 'integer', name :'Role')]
        private $role;  
    
         

        public function getId(): string{
            return $this->id;
        }
     
        /**
         * Resturant constructor.
         */
        public function __construct()
        {
        }

        

        /**
         * Get the value of codRes
         */ 
     
        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
                return (string) $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
                $this->email = $email;

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
        public function getProfile()
        {
                return $this->profile;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */ 
        public function setProfile($profile)
        {
                $this->profile = $profile;

                return $this;
        }

        /**
         * Get the value of postalCode
         */  public function getName()
        {
                return $this->name;
        }

        /**
         * Set the value of postalCode
         *
         * @return  self
         */ 
        public function setPostalCode($name)
        {
                $this->name = $name;

                return $this;
        }

        /**
         * Get the value of addres
         */ 
       

        /**
         * Get the value of city
         */ 
     

        /**
         * Set the value of city
         *
         * @return  self
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
            return $this->email;
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

        /**
         * Get the value of role
         */ 
   
        /**
         * Set the value of role
         *
         * @return  self
         */ 
     
        /* UserInterface methods*/
 
