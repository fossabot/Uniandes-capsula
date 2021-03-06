<?php

namespace App\Console;

use App\User;
use App\Correo;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Mail;
use App\Mail\CapsulaMjml;

use Illuminate\Http\File;
use Spatie\Dropbox\Client;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $schedule->call(function () {
        $this->enviarPods();
          //
      })->dailyAt('10:20');
    }

    public function enviarPods(){
        $hoy = Carbon::now();
        $hoy->subDays(365);
        $pods = Correo::whereYear('created_at',$hoy->year)
                        ->whereMonth('created_at',$hoy->month)
                        ->whereDay('created_at','=',$hoy->day)
                        ->whereNull('estado')
                        ->get();

        foreach ($pods as $capsula) {
          $rutaImg  = $capsula->darRutaImagen();
          if( ! Storage::disk('local') -> exists('public/'.$rutaImg) ){
            $image = Storage::disk('dropbox')->get($rutaImg);
            Storage::disk('local')->put('public/'.$rutaImg, $image);
          }
          $usuario = User::where('id', $capsula->usuario_id)->first();

          Mail::to($usuario)->send(new CapsulaMjml( $rutaImg, $capsula ));
          $capsula->estado = 2;
          $capsula->save();
        }
    }
    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
