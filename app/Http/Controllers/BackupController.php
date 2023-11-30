<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\Events\BackupWasSuccessful;


class BackupController extends Controller
{
    public function index()
    {
        // Obtener la lista de copias de seguridad almacenadas
        $backups = collect(
            BackupDestination::create('nombre_del_archivo')
                ->backups()
        )->reverse();
    
        return view('admin.backups.index', compact('backups'));
    }

    // Otros métodos del controlador según tus necesidades
}

