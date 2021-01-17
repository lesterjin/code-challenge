<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;


class CustomerTableSeeder extends Seeder
{


    public function run()
    {
        /* $randomCustomer = "https://randomuser.me/api/?nat=au&results=100"; //this is the actual URL
         * lets get 100 results and users from AU
         * I put the json file to storage/app/jsonfile/test.json, 
         * the file generated from https://randomuser.me/api/?nat=au&results=100 
         */


        $randomCustomer = storage_path('app/jsonfile/test.json');
        $jsonData = file_get_contents($randomCustomer);
        $jsonDecode = json_decode($jsonData);
        $results = $jsonDecode->results;
        $data = array();


        //lets create an array to insert in our customer table
        foreach ($results as $r) {


            $name = $r->name;
            $location = $r->location;
            $login = $r->login;


            /*  lets hash the password 
             * $password = Hash::make($login->password); //we can use this one for additional security
            */
            $password = md5($login->password); //we will use this one as defined in the instruction


            //lets match the json naming to our database fields
            $data[] = array(
                "first" => $name->first,
                "last" => $name->last,
                "email" => $r->email,
                "username" => $login->username,
                "gender" => $r->gender,
                "country" => $location->country,
                "city" => $location->city,
                "phone" => $r->phone,
                "password" => $password
            );
        }


        /* lets insert or update all the data using one query, 
         * if email exists, we will update the record
         * If no existing records, it will seed 100 customer

         */


        if (Customer::upsert($data, 'email')) {
        }
    }
}
