<?php


namespace Code\Sistema\Service;

use Code\Sistema\Entity\Cliente as ClienteEntity;
use Doctrine\ORM\EntityManager;

class ClienteService
{

    private $em;

    public function __construct(EntityManager $em)
    {

        $this->em = $em;

    }

    public function insert(array $data)
    {
        $clienteEntity = new ClienteEntity;
        $clienteEntity->setNome($data['nome']);
        $clienteEntity->setEmail($data['email']);

        $this->em->persist($clienteEntity);
        $this->em->flush();

        return $clienteEntity;

    }

    public function update($id, array $array)
    {
        $cliente = $this->em->getReference("Code\Sistema\Entity\Cliente", $id);

        $cliente->setNome($array['nome']);
        $cliente->setEmail($array['email']);

        $this->em->persist($cliente);
        $this->em->flush();

        return $cliente;
    }

    public function fetchAll()
    {
        $repo = $this->em->getRepository("Code\Sistema\Entity\Cliente");
        $result = $repo->findAll();

        return $result;

    }

    public function find ($id)
    {
        $repo = $this->em->getRepository("Code\Sistema\Entity\Cliente");
        return $repo->find($id);

    }

   public function delete($id)
   {
       $cliente = $this->em->getReference("Code\Sistema\Entity\Cliente", $id);
       $this->em->remove($cliente);
       return true;

   }
}