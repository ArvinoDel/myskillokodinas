<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class DatabaseController extends Controller
{
    public function index(){
        $files = Storage::disk('local')->allFiles('backup');
        $data = ([
            "files" => $files
        ]);
        return view("administrator.database", $data);
    }

    public function database_backup(){
        // Artisan::call("database:backup");
        // $backup_file_name ="backup-" . Carbon::now()->format('Y-m-d-H-i') . ".sql";
        // session()->flash('msg_status', 'success');
        // session()->flash('msg', "<strong>Berhasil</strong> <br> Backup Basis Data Berhasil.");
        // return redirect()->route('administrator.database.index');

        $filename = 'backup-' . Carbon::now()->format('Y-m-d-H-i') . '.sql';
        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s --databases %s > %s',
            config('database.connections.mysql.username'),
            escapeshellarg(config('database.connections.mysql.password')),
            config('database.connections.mysql.host'),
            config('database.connections.mysql.database'),
            storage_path('app/backup/' . $filename)
        );

        $output = [];
        $returnVar = null;
        exec($command, $output, $returnVar);

        if ($returnVar !== 0) {
            session()->flash('msg_status', 'danger');
            session()->flash('msg', '<strong>Error!</strong> Backup gagal.');
        } else {
            session()->flash('msg_status', 'success');
            session()->flash('msg', '<strong>Berhasil!</strong> Backup database berhasil.');
        }

        return redirect()->route('administrator.database.index');
    }

    public function database_backup_download($file) {
        return response()->download(storage_path('app/backup/' . $file));
    }

    public function database_backup_remove($file){
        unlink(storage_path('app/backup/' . $file));
        session()->flash('msg_status', 'success');
        session()->flash('msg', "<strong>Berhasil</strong> <br> File Backup Basis Data Berhasil Dihapus.");
        return redirect()->route('administrator.database.index');
    }
}
