<?php

namespace App\Console\Commands;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Console\Command;

class Subscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $var = Post::all();
        for ($i=0; $i < count($var) ; $i++) { 
            if($var[$i]['subDuration'] != 0){
                $temp[$i] =  Post::where('id', $var[$i]->id)->decrement('subDuration', 1);

                
                if ($var[$i]['subDuration'] <= 10) {
                    $email[$i] = User::where('id', $var[$i]->admin_id)->get()->first();
                    $details = [ 
                        'title' => "Mail from MediClick",
                        'body' => 'Your subscription is running out!',
                    ];
            
                    $to = $email[$i]['email'];
                    
                    Mail::to($to)->send(new \App\Mail\TestMail($details));

                    
                }
            } 
        }
    }
}
