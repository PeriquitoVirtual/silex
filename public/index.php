<?php

require_once __DIR__.'/../bootstrap.php';

use Code\Sistema\Service\ClienteService;
use Code\Sistema\Entity\Cliente;
use Code\Sistema\Mapper\ClienteMapper;

use Symfony\Component\HttpFoundation\Request;

$app['clienteService'] = function (){
    $clienteEntity = new Cliente();
    $clienteMapper = new ClienteMapper();
    $clienteService = new ClienteService($clienteEntity, $clienteMapper);
    return $clienteService;
};

$app->get("/api/clientes", function () use ($app){
    $dados = $app['clienteService']->fetchAll();
    return $app->json($dados);
});

$app->get("/api/clientes/{id}", function($id) use ($app){

    $dados = $app['clienteService']->find($id);
    return $app->json($dados);
});

$app->post("/api/clientes", function (Request $request) use ($app){

    $dados['nome'] = $request->get('nome');
    $dados['email'] = $request->get('email');

    $result = $app['clienteService']->insert($dados);

    return $app->json($result);
});


$app->put("/api/clientes/{id}", function($id, Request $request) use ($app){


    $data['nome'] = $request->request->get('nome');
    $data['email'] = $request->request->get('email');

    $dados = $app['clienteService']->update($id, $data);
    return $app->json($dados);
});

$app->delete("/api/clientes{id}", function ($id) use ($app){
    $dados = $app['clienteService']->delete($id);
    return $app->json($dados);
});

$app->get("/", function() use ($app)  {

    return $app['twig']->render('index.twig',[]);
})->bind("index");

$app->get("/ola/{nome}", function ($nome) use ($app){
    return $app['twig']->render('ola.twig',['nome'=>$nome]);
});

$app->get("/clientes", function() use($app){
    
   $dados = $app['clienteService']->fetchAll();
    
    return $app['twig']->render('clientes.twig', ['clientes'=>$dados]);
    
})->bind("clientes");

$app->get("/cliente", function () use ($app) {

    $dados['nome'] = "Cliente";
    $dados['email'] = "email@cliente.com";

    $result = $app['clienteService']->insert($dados);

    return $app->json($result);

});

$app->run();