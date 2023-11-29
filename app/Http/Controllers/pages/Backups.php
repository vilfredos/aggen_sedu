<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backup;
use Spatie\Backup\Tasks\Backup\BackupJobFactory;
use Spatie\Backup\BackupDestination\BackupDestination;
use Spatie\Backup\BackupDestination\BackupDestinationFactory;
use Spatie\Backup\Tasks\Backup\Manifest;
use Spatie\Backup\Tasks\Backup\Tasks\BackupJob;

class Backups extends Controller
{
    
    public function index(){
        $backups = Backup::all();
        return view('panel.backups',['backups'=>$backups]);
    }
    public function create()
    {
        $backup = new Backup();
        $backup->status ='pending';
        $backup->url = 'https://www.google.com';
        $backup->save();

        return redirect()->route('pages-backups');
    }   

    public function deleteBackup($id)
    {
        // Lógica para eliminar un backup según su identificador ($id)
        // ...
    }
}
