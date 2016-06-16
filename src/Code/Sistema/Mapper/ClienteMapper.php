<?php

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{

   private $dados = [
     0 => [
         'id' => 0,
         'nome' => 'Cliente XPTO',
         'email' => 'clientexpto@gmail.com'
     ],

     1 => [
         'id' => 1,
         'nome' => 'Cliente Y',
         'email' => 'clientey@gmail.com'
     ],
   ];

    public function insert(Cliente $cliente)
    {

        return [
            'success'=> true
        ];
    }

    public function update ($id, array $array)
    {
        return [
            'success'=>true
        ];
    }

    public function find($id)
    {
        return $this->dados[$id];
    }
    
    public function fetchAll()
    {
       $dados = $this->dados;

        return $dados;

    }

}