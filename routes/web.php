<?php

/*
|--------------------------------------------------------------------------
| Rutas web
|--------------------------------------------------------------------------
|
| Aquí registramos las rutas de la página web de DóndePauto.
| Estas rutas se cargan dentro del Proveedor dentro del grupo "web".
|
*/

Route::get('', function() {
    return view('dondepauto::index');
})->name('home');

// Hojas de estilo y scripts globales
Route::get('style.css', function() {
    $assets = realpath(__DIR__.'/../dist/assets.json');
    if( $assets )
        $style = json_decode(file_get_contents($assets), true)['styles/main.css'];
    else
        $style = 'styles/main.css';

    $style = file_get_contents(realpath(__DIR__.'/../dist/'.$style));
    return response($style)->header('Content-Type', 'text/css');
});
Route::get('script.js', function() {
    $assets = realpath(__DIR__.'/../dist/assets.json');
    if( $assets )
        $script = json_decode(file_get_contents($assets), true)['scripts/main.js'];
    else
        $script = 'scripts/main.js';

    $script = file_get_contents(realpath(__DIR__.'/../dist/'.$script));
    return response($script)->header('Content-Type', 'text/css');
});

// Imágenes
Route::get('images/{path}', function($path) {
    $path = realpath(__DIR__.'/../resources/assets/images/'.$path);
    if( !$path )
        return redirect()->away(env('APP_URL'));
    return response()->file($path);
})->where('path', '.+');
