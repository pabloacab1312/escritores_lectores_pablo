<?php
// src/Entity/Text.php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\EntityRepository;

use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
#[ORM\Table(name: 'texts')]
 
class Texts 
{


    #[ORM\Id]
    #[ORM\Column(type: 'integer', name :'textId')]
    #[ORM\GeneratedValue]
    private $textId;
    #[ORM\Column(type: 'string', name :'Description')]
    private $description;
    #[ORM\Column(type: 'string', name :'Content')]
    private $content;
    #[ORM\Column(type: 'string', name :'Date' )]
    private $date;
    #[ORM\Column(type: 'integer', name :'UserId' )]
    private $userId;
    #[ORM\Column(type: 'string', name :'Genre')]
    private $genre;  
    #[ORM\Column(type: 'string', name :'Privacy')]
    private $privacy;  

    public function getuserId()
        {
                return $this->userId;
        }

        /**
         * Get the value of email
         */ 
        public function getDescription()
        {
                return (string) $this->description;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setDescription($description)
        {
                $this->description = $description;

                return $this;
        }

        /**
         * Get the value of password
         */ 
        public function getDate(): ?string
        {
                return (string) $this->date;
        }

        /**
         * Set the value of password
         *
         * @return  self
         */ 
        public function setDate($date)
        {
                $this->date = $date;

                return $this;
        }

        /**
         * Get the value of country
         */ 
        public function getGenre()
        {
                return $this->genre;
        }

        /**
         * Set the value of country
         *
         * @return  self
         */ 
        public function setGenre($genre)
        {
                $this->genre = $genre;

                return $this;
        }

        /**
         * Get the value of postalCode
         */  public function getPrivacy()
        {
                return $this->privacy;
        }

        /**
         * Set the value of postalCode
         *
         * @return  self
         */ 
        public function setPrivacy($privacy)
        {
                $this->privacy = $privacy;

                return $this;
        }

       
        public function getContent(): ?string
    {
        return $this->content;
    }
         
      
     

        /**
         * Set the value of city
         *
         * @return  self
         */ 
     
}
