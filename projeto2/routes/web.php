<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin'],function(){

    // Rota principal do administrador
    Route::get('/home', 'UsuarioController@index')->name('admin');

    //Rotas de cadastro
    Route::group(['prefix'=>'cadastrar'],function(){

        Route::get('usuario', 'UsuarioController@create')->name('usuario.create');
        Route::post('usuario', 'UsuarioController@store')->name('usuario.store');

        Route::get('turma', 'TurmaController@create')->name('turma.create');
        Route::post('turma', 'TurmaController@store')->name('turma.store');

         Route::get('disciplina', 'DisciplinaController@create')->name('disciplina.create');
        Route::post('disciplina', 'DisciplinaController@store')->name('disciplina.store');
    });

    // Rotas de controle
    Route::group(['prefix'=>'controle'],function(){

        Route::get('usuario', 'UsuarioController@show')->name('usuario.show');

        Route::get('turma', 'TurmaController@show')->name('turma.show');

         Route::get('disciplina', 'DisciplinaController@show')->name('disciplina.show');
    });

    // Rotas de Edição
    Route::group(['prefix'=>'editar'],function(){

        Route::get('usuario/{id}','UsuarioController@edit')->name('usuario.edit');
        Route::put('usuario/{id}', 'UsuarioController@update')->name('usuario.update');

        Route::get('turma/{id}','TurmaController@edit')->name('turma.edit');
        Route::put('turma/{id}', 'TurmaController@update')->name('turma.update');

        Route::get('disciplina/{id}','DisciplinaController@edit')->name('disciplina.edit');
        Route::put('disciplina/{id}', 'DisciplinaController@update')->name('disciplina.update');
    });

    //Rotas para deletar

    Route::group(['prefix'=>'deletar'],function(){

        Route::get('usuario/{id}', 'UsuarioController@delete')->name('usuario.delete');

        Route::get('turma/{id}', 'TurmaController@delete')->name('turma.delete');

        Route::get('disciplina/{id}', 'DisciplinaController@delete')->name('disciplina.delete');
    });

});
