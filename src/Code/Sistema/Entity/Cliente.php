<?php

namespace Code\Sistema\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/** @ORM\Entity(repositoryClass="Code\Sistema\Entity\ClienteRepository")
 * @ORM\Table(name="clientes")
 */

class Cliente
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @return mixed
     */


    /**
     * @ORM\OneToOne(targetEntity="Code\Sistema\Entity\ClienteProfile")
     * @ORM\JoinColumn(name="cliente_profiel", referencedColumnName="id")
     */
    private $profile;

    /**
     * @ORM\ManyToOne(targetEntity="Code\Sistema\Entity\Cupom")
     * @ORM\JoinColumn(name="cupom_id", referencedColumnName="id")
     */

    private $cupom;

    /**
     * @ORM\ManyToMany(targetEntity="Code\Sistema\Entity\Interesse")
     * @ORM\JoinTable(name="clientes_interesses",
     *          joinColumns={@ORM\JoinColumn(name="cliente_id", referencedColumnName="id")},
     *          inverseJoinColumns={@ORM\JoinColumn(name="interesse_id", referencedColumnName="id")}
     *          )
     */
    private $interesses;

    public function __construct()
    {
        $this->interesses = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getInteresses()
    {
        return $this->interesses;
    }

    /**
     * @param mixed $interesses
     */
    public function addInteresse($interesses)
    {
        $this->interesses->add($interesses);
    }

    /**
     * @return mixed
     */
    public function getCupom()
    {
        return $this->cupom;
    }

    /**
     * @param mixed $cupom
     */
    public function setCupom($cupom)
    {
        $this->cupom = $cupom;
    }

    /**
     * @return mixed
     */
    public function getProfile()
    {
        return $this->profile;
    }

    /**
     * @param mixed $profile
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}