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

use App\Desenvolvedor;
use App\Projeto;
use App\Alocacao;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/desenvolvedor_projetos', function () {
    $desenvolvedores = Desenvolvedor::with("projetos")->get();
    foreach($desenvolvedores as $d) {
        echo "Nome do desenvolvedor: " . $d->nome . "<br>";
        echo "Cargo: " . $d->cargo . "<br>";
        if (count($d->projetos ) > 0) {
            echo "Projetos: <br>";
            echo "<ul>";
            foreach($d->projetos as $p) {
                echo "<li> Nome do projeto: " . $p->nome . " | ";
                echo "Horas do projeto: " . $p->estimativa_horas . " | ";
                echo "Horas trabalhadas pelo desenvolvedor: " . $p->pivot->horas_semanais . "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }
    //return $desenvolvedores->toJson();
});


Route::get('/projeto_desenvolvedores', function () {
    $projetos = Projeto::with("desenvolvedores")->get();
    foreach($projetos as $p) {
        echo "Nome do projeto: " . $p->nome . "<br>";
        echo "Estimativa de horas: " . $p->estimativa_horas . "<br>";
        if (count($p->desenvolvedores ) > 0) {
            echo "Desenvolvedores: <br>";
            echo "<ul>";
            foreach($p->desenvolvedores as $d) {
                echo "<li> Nome do desenvolvedor: " . $d->nome . " | ";
                echo "Cargo: " . $d->cargo . " | ";
                echo "Horas trabalhadas pelo desenvolvedor: " . $d->pivot->horas_semanais . "</li>";
            }
            echo "</ul>";
        }
        echo "<hr>";
    }
    //return $projetos->toJson();
});


Route::get('/alocar', function () {
    $proj = Projeto::find(4);
    if (isset($proj)) {
        // $proj->desenvolvedores()->attach(1, ['horas_semanais' => 50]);
        // $proj->desenvolvedores()->attach(2, ['horas_semanais' => 50]);
        // $proj->desenvolvedores()->attach(3, ['horas_semanais' => 50]);
        
        // ou

        $proj->desenvolvedores()->attach([
            1 => ['horas_semanais' => 40],
            2 => ['horas_semanais' => 50],
            3 => ['horas_semanais' => 60],
        ]);
        return "OK";
    }
    return "Projeto nao encontrado";
});


Route::get('/desalocar', function () {
    $proj = Projeto::find(4);
    if (isset($proj)) {
        $proj->desenvolvedores()->detach(1);
        $proj->desenvolvedores()->detach(2);
        $proj->desenvolvedores()->detach(3);
        return "OK";
    }
    return "Projeto nao encontrado";
});


