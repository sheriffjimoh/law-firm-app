<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use DB;
use Excel;
use App\Models\Client_record;
use App\Mail\RecordCreationMail;
use App\Mail\NotificationMail;

class Notification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notification:threedays';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notification to client that have not provided their profile pic in  every three days time';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

          $data = Client_record::where('profile_pic', null)->get();
          if ($data) {
        
         foreach ($data as $value) {

            $details = ['firstname'=>$value->first_name];
            Mail::to($value->email)->send(new NotificationMail($details));
                if (!Mail::failures()) {
                 $message =  'sent notification Successfully';
                }else{
                    $message = 'unable to send';
                }
        }
    }

        
          $this->info($message);
    }
}
