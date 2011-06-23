<?php

namespace Desymfony\DesymfonyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Desymfony\DesymfonyBundle\Validator\DNI;

/**
* @ORM\Table(name="usuario")
* @ORM\Entity()
* @UniqueEntity(fields = "email")
*/
class Usuario
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MinLength(3)
     * @Assert\MaxLength(20)
     */
    protected $nombre;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MinLength(3)
     * @Assert\MaxLength(20)
     */
    protected $apellidos;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @DNI()
     */
    protected $dni;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     */
    protected $direccion;

    /**
     * @ORM\Column(type="string")
     */
    protected $telefono;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email()
     */
    protected $email;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\MinLength(5)
     * @Assert\MaxLength(10)
     */
    protected $password;

    /**
     * @ORM\ManyToMany(targetEntity="Ponencia", mappedBy="usuario")
     */
    protected $ponencias;

    public function __construct()
    {
        $this->ponencias = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * Get nombre
     *
     * @return string $nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidos
     *
     * @param string $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * Get apellidos
     *
     * @return string $apellidos
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set dni
     *
     * @param string $dni
     */
    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    /**
     * Get dni
     *
     * @return string $dni
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * Get direccion
     *
     * @return string $direccion
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    /**
     * Get telefono
     *
     * @return string $telefono
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string $password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Add ponencias
     *
     * @param Desymfony\DesymfonyBundle\Entity\Ponencia $ponencias
     */
    public function addPonencias(\Desymfony\DesymfonyBundle\Entity\Ponencia $ponencias)
    {
        $this->ponencias[] = $ponencias;
    }

    /**
     * Get ponencias
     *
     * @return Doctrine\Common\Collections\Collection $ponencias
     */
    public function getPonencias()
    {
        return $this->ponencias;
    }
}
