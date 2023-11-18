<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\City;
use App\Admin\Models\Customer;
use App\Admin\Models\District;
use App\Admin\Services\Interfaces\CustomerServiceInterface;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CustomerService extends BaseService implements CustomerServiceInterface
{
    public function index($request)
    {
        $search = $request->search;
        $limit = $request->limit;
        $cities = $request->cities;
        if ($limit . $search . $cities) {
            $customers = Customer::where(function ($query) use ($search) {
                if ($search) {
                    return $query->where('name', 'like', '%' . $search . '%');
                }
            })
            ->where(function ($query) use ($cities) {
                if ($cities) {
                    return $query->where('cities_id', $cities);
                }
            })
            ->paginate($limit ?? Common::page_limit());
            if ($search) {
                $customers->appends(['search' => $search]);
            }
            if ($limit) {
                $customers->appends(['limit' => $limit]);
            }
            if ($cities) {
                $customers->appends(['cities' => $cities]);
            }
        } else {
            $customers = Customer::paginate(Common::page_limit());
        }
        $cities = City::get();
        $districts = District::get();
        return view('admin.content.customer.index', compact('customers', 'cities', 'districts'));
    }

    public function store($request)
    {
        $nameImage = Customer::noImage;
        if ($request->hasFile('image')) {
            $nameImage = Str::slug($request->name, '_') . '_' . time() . '.' . $request->image->extension();
        }
        try {
            $input = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'cities_id' => $request->cities_id,
                'districts_id' => $request->districts_id,
                'address' => $request->address,
                'company_name' => $request->company_name,
                'image' => $nameImage,
                'company_tax_code' => $request->company_tax_code,
                'note' => $request->note,
                'show' => $request->show,
            ];
            $customer = Customer::create($input);
            $folder = public_path('media/customers');
            File::ensureDirectoryExists($folder);
            if ($request->hasFile('image')) {
                Common::uploadImage($request->image, $nameImage, $folder);
            }
            if ($customer->City) {
                $customer->setAttribute('cities_name', $customer->City->name);
            }
            return response()->json(['success' => true, 'customer' => $customer]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        try {
            $customer = Customer::find($request->id);
            $customer->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function edit($request)
    {
        try {
            $customer = Customer::find($request->id);
            $districts = District::where('city_id',$customer->cities_id)->get();
            return response()->json(['success' => true, 'customer' => $customer,'districts' => $districts]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function update($request)
    {
        $customer = Customer::find($request->id);
        $nameOldImage = $customer->image;
        if ($request->hasFile('image')) {
            $nameImage = Str::slug($request->name, '_') . '_' . time() . '.' . $request->image->extension();
        } else {
            $nameImage = $nameOldImage;
        }
        try {
            $input = [
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'cities_id' => $request->cities_id,
                'districts_id' => $request->districts_id,
                'address' => $request->address,
                'company_name' => $request->company_name,
                'company_tax_code' => $request->company_tax_code,
                'note' => $request->note,
                'image' => $nameImage,
                'show' => $request->show,
            ];
            $customer->update($input);
            $folder = public_path('media/customers');
            File::ensureDirectoryExists($folder);
            if ($request->hasFile('image')) {
                Common::deleteImage($nameOldImage, $folder);
                Common::uploadImage($request->image, $nameImage, $folder);
            }
            if ($customer->City) {
                $customer->setAttribute('cities_name', $customer->City->name);
            }
            return response()->json(['success' => true, 'customer' => $customer]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function loadDistrict($request)
    {
        $districts = District::where('city_id', $request->city_id)->get();
        return response()->json(['districts' => $districts]);
    }
}
