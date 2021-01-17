<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Exception;
use App\Models\Customer;


class CustomerController extends Controller
{
    public function __construct()
    {
    }


    public function customers()
    {

        try {
            if (Schema::hasTable('customer')) {
                //lets get the list of all customers and combine the first and lastname as fullname
                $customer = Customer::select(DB::raw("CONCAT(first, ' ', last) AS fullname, email, country"))->get();
                return response()->json($customer);
            } else {
                return response()->json(["error" => "Please run the migration first."]);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function customer(Request $request)
    {
        try {
            $id = $request->id;
            if (Schema::hasTable('customer')) {
                //lets get the single customer using the id and combine the first and lastname as fullname
                $customer = Customer::select(DB::raw("CONCAT(first, ' ', last) AS fullname, email, username, gender, country, city, phone"))->find($id);
                return response()->json($customer);
            } else {
                return response()->json(["error" => "Please run the migration first."]);
            }
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function seed_customer()
    {
        //lets create an example that the import can be access in the controller
        $seeder = new \Database\Seeders\CustomerTableSeeder();
        $seeder->run();
    }
}
