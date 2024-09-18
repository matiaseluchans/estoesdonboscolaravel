<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class LogViewerController extends Controller
{
    public function index()
    {
        // Ruta del archivo de log
        $logFile = storage_path('logs/laravel.log');

        // Verificar si el archivo existe
        if (File::exists($logFile)) {
            // Leer el contenido del archivo
            $logs = File::get($logFile);
            return view('log-viewer', compact('logs'));
        } else {
            return response()->json(['error' => 'Archivo de log no encontrado'], 404);
        }
    }
}
