<?php

namespace Code\Sistema\Mapper;

use Code\Sistema\Entity\Cliente;

class ClienteMapper
{

    public function insert(Cliente $cliente)
    {

        return [
            'nome'=>'Cliente X',
                'email' => 'email@clientex.com'
        ];
    }

    public function fetchAll()
    {
        $dados[0]['nome'] = "Cliente XPTO";
        $dados[0]['email'] = "clientexpto@gmail.com";

        $dados[1]['nome'] = "Cliente Y";
        $dados[1]['email'] = "clientey@gmail.com";

        return $dados;

    }

}