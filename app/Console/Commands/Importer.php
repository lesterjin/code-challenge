<?php


namespace App\Console\Commands;

use Illuminate\Console\Command;


class Importer extends Command
{

    protected $signature = 'import:customer';
    protected $description = 'This will import the customers generated from the json response';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {



        if ($this->confirm('This will insert 100 customers record to the database? Please confirm')) {

            
            $seeder = new \Database\Seeders\CustomerTableSeeder();
            $seeder->run();
            $this->alert("Customer Successfully imported.");


        } else {
            $this->alert('Something went wrong, please try again.');
        }
    }
}
