<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Endereco;
use App\Cliente;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/inserir', function () {
    $cli = new Cliente();
    $cli->nome = "Jose Almeida";
    $cli->telefone = "11 98154-5645";
    $cli->save();
    $end = new Endereco();
    $end->rua = "Av. do Estado";
    $end->numero = 400;
    $end->bairro = "Centro";
    $end->cidade = "Sao Paulo";
    $end->uf = "SP";
    $end->cep = "13010-654";
    $cli->endereco()->save($end);

    $cli = new Cliente();
    $cli->nome = "Marcos Silva";
    $cli->telefone = "22 98444-2222";
    $cli->save();
    $end = new Endereco();
    $end->rua = "Av. Brasil";
    $end->numero = 100;
    $end->bairro = "Jardim Olivia";
    $end->cidade = "Sao Paulo";
    $end->uf = "SP";
    $end->cep = "13222-222";
    $cli->endereco()->save($end);

    return "OK";
});


Route::get('/clientes', function () {
    $clientes = Cliente::all();
    foreach($clientes as $c) {
        echo "<p>ID:       " . $c->id . "</p>";
        echo "<p>Nome:     " . $c->nome . "</p>";
        echo "<p>Telefone: " . $c->telefone . "</p>";
        echo "<p>Rua:      " . $c->endereco->rua . "</p>";
        echo "<p>Numero:   " . $c->endereco->numero . "</p>";
        echo "<p>Bairro:   " . $c->endereco->bairro . "</p>";
        echo "<p>Cidade:   " . $c->endereco->cidade . "</p>";
        echo "<p>UF:       " . $c->endereco->uf . "</p>";
        echo "<p>Cidade:   " . $c->endereco->cidade . "</p>";
        echo "<p>CEP:      " . $c->endereco->cep . "</p>";
        echo "<hr>";
    }
});


Route::get('/clientes/json', function () {
    // $clientes = Cliente::all();
    $clientes = Cliente::with(['endereco'])->get();
    return $clientes->toJson();
});


Route::get('/enderecos/json', function () {
    $enderecos = Endereco::with(['cliente'])->get();
    return $enderecos->toJson();
});






