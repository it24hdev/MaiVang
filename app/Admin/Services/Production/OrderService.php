<?php

namespace App\Admin\Services\Production;

use App\Admin\Http\Helpers\Common;
use App\Admin\Models\City;
use App\Admin\Models\Customer;
use App\Admin\Models\District;
use App\Admin\Models\Order;
use App\Admin\Models\PaymentMethod;
use App\Admin\Models\Product;
use App\Admin\Models\ShippingMethod;
use App\Admin\Models\TransportFee;
use App\Admin\Models\User;
use App\Admin\Services\Interfaces\OrderServiceInterface;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderService extends BaseService implements OrderServiceInterface
{
    public function index($request)
    {
        $search = $request->search;
        $limit = $request->limit;
        $status = $request->status;
        $status_payment = $request->status_payment;
        $status_transport = $request->status_transport;
        if ($search . $limit . $status . $status_payment . $status_transport) {
            $orders = Order::select('orders.*')->leftjoin('users', 'orders.users_id', 'users.id')
                ->where(function ($query) use ($search) {
                    if ($search) {
                        $query->where('orders.code', 'like', '%' . $search . '%');
                    }
                })
                ->where(function ($query) use ($status) {
                    if ($status) {
                        $query->where('orders.status', $status);
                    }
                })
                ->where(function ($query) use ($status_payment) {
                    if ($status_payment) {
                        $query->where('orders.status_payment', $status_payment);
                    }
                })
                ->where(function ($query) use ($status_transport) {
                    if ($status_transport) {
                        $query->where('orders.status_transport', $status_transport);
                    }
                })
                ->paginate($limit ?? Common::page_limit());

            if ($search) {
                $orders->appends(['search' => $search]);
            }
            if ($limit) {
                $orders->appends(['limit' => $limit]);
            }
            if ($status) {
                $orders->appends(['status' => $status]);
            }
            if ($status_payment) {
                $orders->appends(['status_payment' => $status_payment]);
            }
            if ($status_transport) {
                $orders->appends(['status_transport' => $status_transport]);
            }

        } else {
            $orders = Order::paginate(Common::page_limit());
        }
        return view('admin.content.order.index', compact('orders'));
    }

    public function redirectCreated()
    {
        return redirect()->route('admin.orders.index')->with('success', 'Thêm mới thành công');
    }

    public function redirectUpdated()
    {
        return redirect()->route('admin.orders.index')->with('success', 'Cập nhật thành công');
    }

    public function store($request)
    {
        try {
            $orderMax = Order::orderBy('id', 'desc')->first();
            if ($orderMax) {
                $id = $orderMax->id + 1;
            } else {
                $id = 1;
            }
            $orderCode = 'DH' . str_pad($id, 7, '0', STR_PAD_LEFT);
            $input = [
                'code' => $orderCode,
                'customers_id' => $request->customers_id,
                'payment_methods_id' => $request->payment_methods_id,
                'shipping_methods_id' => $request->shipping_methods_id,
                'transport_fees_id' => $request->transport_fees_id,
                'cities_id' => $request->cities_id,
                'districts_id' => $request->districts_id,
                'address' => $request->address,
                'status' => $request->status,
                'status_payment' => $request->status_payment,
                'status_transport' => $request->status_transport,
                'note' => $request->note,
                'discount_order' => $request->discount_order,
                'users_id' => $request->users_id,
            ];
            $order = Order::create($input);
            $total = $grandTotal = 0;
            if ($request->order_detail) {
                foreach ($request->order_detail as $item) {
                    $subtotal = $item[1] * $item[2] - $item[3];
                    $total += $subtotal;
                    $order->Products()->attach($item[0], ['quantity' => $item[1], 'price' => $item[2], 'discount' => $item[3], 'total' => $subtotal]);
                }
            }
            if ($total > 0) {
                $grandTotal = $total - $request->discount_order;
            }
            $order->update(['total' => $grandTotal]);
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($request)
    {
        try {
            $order = Order::find($request->id);
            $order->Products()->detach();
            $order->delete();
            return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function edit($request)
    {
        $order = Order::find($request->id);
        if ($order) {
            $customers = Customer::get();
            $cities = City::get();
            $districts = District::get();
            $paymentMethods = PaymentMethod::get();
            $shippingMethods = ShippingMethod::get();
            $transportFees = TransportFee::get();
            $users = User::get();
            return view('admin.content.order.edit', compact('order', 'customers', 'cities', 'districts', 'paymentMethods', 'shippingMethods', 'transportFees', 'users'));

        } else {
            abort(404);
        }
    }

    public function create()
    {
        $customers = Customer::get();
        $cities = City::get();
        $districts = District::get();
        $paymentMethods = PaymentMethod::get();
        $shippingMethods = ShippingMethod::get();
        $transportFees = TransportFee::get();
        $users = User::get();
        return view('admin.content.order.create', compact('customers', 'cities', 'districts', 'paymentMethods', 'shippingMethods', 'transportFees', 'users'));
    }

    public function update($request)
    {
        try {
            $input = [
                'customers_id' => $request->customers_id,
                'payment_methods_id' => $request->payment_methods_id,
                'shipping_methods_id' => $request->shipping_methods_id,
                'transport_fees_id' => $request->transport_fees_id,
                'cities_id' => $request->cities_id,
                'districts_id' => $request->districts_id,
                'address' => $request->address,
                'status' => $request->status,
                'status_payment' => $request->status_payment,
                'status_transport' => $request->status_transport,
                'note' => $request->note,
                'discount_order' => $request->discount_order,
                'users_id' => $request->users_id,
            ];
        $order = Order::find($request->id);
        $order->update($input);
        $total = $grandTotal = 0;
        if ($request->order_detail) {
            $order->Products()->detach();
            foreach ($request->order_detail as $item) {
                $subtotal = $item[1] * $item[2] - $item[3];
                $total += $subtotal;
                $order->Products()->attach($item[0], ['quantity' => $item[1], 'price' => $item[2], 'discount' => $item[3], 'total' => $subtotal]);
            }
        }
        if ($total > 0) {
            $grandTotal = $total - $request->discount_order;
        }
        $order->update(['total' => $grandTotal]);
        return response()->json(['success' => true]);
        } catch (\Exception $exception) {
            return response()->json(['success' => false]);
        }
    }

    public function view($request)
    {
            $orders  = Order::select('orders.*',DB::raw('users.name as staff'), DB::raw('customers.name as customer'), DB::raw('customers.phone as phone'),
            DB::raw('customers.email as email'), DB::raw('districts.name as district'),DB::raw('cities.name as city'),
                DB::raw('payment_methods.name as payment_method'), DB::raw('shipping_methods.name as shipping_method'),
                DB::raw('transport_fees.fee as transport_fee'))
                ->leftjoin('users', 'users.id', 'orders.users_id')
                ->leftjoin('customers', 'customers.id', 'orders.customers_id')
                ->leftjoin('districts', 'districts.id', 'orders.districts_id')
                ->leftjoin('cities', 'cities.id', 'orders.cities_id')
                ->leftjoin('payment_methods', 'payment_methods.id', 'orders.payment_methods_id')
                ->leftjoin('shipping_methods', 'shipping_methods.id', 'orders.shipping_methods_id')
                ->leftjoin('transport_fees', 'transport_fees.id', 'orders.transport_fees_id')
                ->where('orders.id', $request->id)->first();

        $products = $orders->Products;
        $subtotal = $transport_fee = 0;
        foreach ($products as $item) {
            $subtotal += $item->pivot->price * $item->pivot->quantity;
            $item->setAttribute('pivot_price', $item->pivot->price);
            $item->setAttribute('pivot_quantity', $item->pivot->quantity);
        }
        $total = $subtotal + $orders->transport_fee;
        return response()->json(['success' => true, 'orders' => $orders, 'products' => $products, 'subtotal' => $subtotal, 'total' => $total]);
    }

    public function loadProduct($request)
    {
        $products = Product::get();
        return response()->json(['products' => $products]);
    }

    public function loadDistrict($request)
    {
        $districts = District::where('city_id', $request->city_id)->get();
        return response()->json(['districts' => $districts]);
    }
}
