<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Helpers\ResponseFormatter;
use Illuminate\Support\Facades\Validator;

class packageController extends Controller
{
    //
    public function index()
    {
        $package = Package::all();
        return ResponseFormatter::success([
            'package' => $package
        ],'Package Loaded!');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'customer_name' => 'required|max:255',
                'customer_address' => 'required|max:255',
                'customer_email' => 'required|max:255|email|unique:packages',
                'customer_phone' => 'required|max:255|min:12',
                'customer_address_detail' => 'required|max:255',
                'customer_zip_code' => 'required|max:255',
                'zone_code' => 'required|max:255'
            ]);

            if ($validator->fails()) {
                return ResponseFormatter::error(['error'=>$validator->errors()], 'Validation error', 401);
            }
            
            $data = $request->all();
            Package::create($data);

            $package = Package::where('customer_email', $request->customer_email)->first();

            return ResponseFormatter::success([
                'package' => $package
            ],'Package Inserted!');
            
        }
        catch(Exception $error){
            return $error;
        }
    }

    public function update(Request $request, $package)
    {
        try {
            $validator = Validator::make($request->all(), [
                'customer_name' => 'required|max:255',
                'customer_address' => 'required|max:255',
                'customer_email' => 'required|max:255|email|unique:packages',
                'customer_phone' => 'required|max:255|min:12',
                'customer_address_detail' => 'required|max:255',
                'customer_zip_code' => 'required|max:255',
                'zone_code' => 'required|max:255'
            ]);

            if ($validator->fails()) {
                return ResponseFormatter::error(['error'=>$validator->errors()], 'Validation error', 401);
            }

            $package = Package::find($package);
            $package->customer_name = $request->customer_name;
            $package->customer_address = $package->customer_address;
            $package->customer_email = $request->customer_email;
            $package->customer_phone = $request->customer_phone;
            $package->customer_address_detail = $request->customer_address_detail;
            $package->customer_zip_code = $request->customer_zip_code;
            $package->zone_code = $request->zone_code;
            $package->save();

            //retrieve updated data
            $package = Package::find($package);

            return ResponseFormatter::success([
                'package' => $package
            ],'Package Updated!');
        }
        catch(Exception $error){
            return $error;
        }  
    }

    public function destroy($package)
    {
        try {
            $package = Package::find($package);
            if($package == null)
            {
                return ResponseFormatter::error(['error'=>'Data not found'], 'Package delete error', 401);
            }
            $package->delete();
            return ResponseFormatter::success([
                'package' => $package
            ],'Package Deleted!');
        }
        catch(Exception $error){
            return ResponseFormatter::error(['error'=>$validator->errors()], 'Package delete error', 401);
        }
    }

    public function updateSpesific(Request $request, $package)
    {
        $package = Package::find($package);
        $package->zone_code = $request->zone_code;
        $package->save();

        return ResponseFormatter::success([
            'package' => $package
        ],'Zone Code Updated!');
    }
}

