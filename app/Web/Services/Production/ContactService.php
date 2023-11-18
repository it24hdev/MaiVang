<?php

namespace App\Web\Services\Production;

use App\Admin\Models\ProductCategory;
use App\Admin\Models\Customer;
use App\Admin\Models\Menu;
use App\Admin\Models\Order;
use App\Admin\Models\Position;
use App\Admin\Models\Product;
use App\Admin\Models\Quote;
use App\Web\Services\Interfaces\ContactServiceInterface;
use Carbon\Carbon;

class ContactService extends BaseService implements ContactServiceInterface
{
    public function index()
    {
        $products = Product::where('show',1)->get();
        $menu = Menu::get();
        $position = Position::where('type','menu')->get();
        $active = route('contact');
        $quotes = ProductCategory::where('show', 1)->where('offer',1)->get();
        $animationProduct = Product::where('show',1)->inRandomOrder()->take(20)->get()->pluck('name');
        return view('web.content.contact_us',compact('products','menu','position','active','quotes','animationProduct'));
    }

    public function booking($request)
    {
        $customer = Customer::where('phone', $request->phone)->first();

        if (!$customer) {
            $input = [
                'name' => $request->name ?? "",
                'phone' => $request->phone,
                'email' => $request->email ?? "",
            ];
            $customer = Customer::create($input);
        }

        $address = $request->address ?? "Tại cửa hàng";
        $booking_date = $request->booking_date ?? Carbon::now();
        $note = $request->name . ' | ' . $booking_date . ' | ' . $address . ' | ' . $request->note;

        $orderMax = Order::orderBy('id', 'desc')->first();
        if ($orderMax) {
            $id = $orderMax->id + 1;
        } else {
            $id = 1;
        }
        $orderCode = 'DH' . str_pad($id, 7, '0', STR_PAD_LEFT);

        $inputOrder = [
            'code' => $orderCode,
            'customers_id' => $customer->id,
            'note' => $note,
            'status' => 1,
        ];

        $order = Order::create($inputOrder);
        $product = Product::find($request->product_id);
        if ($product) {
            $order->Products()->attach($product->id, ['quantity' => 1, 'price' => $product->price ?? 0]);
            $order->update(['total' => $product->price ?? 0]);
        }

        $this->orderAPI($order);

        return response()->json(['success' => true]);
    }

    public function orderAPI($order)
    {
        $customer = Customer::find($order->customers_id);
        $customer_info = [
            'customer_name' => $customer->name ?? '',
            'phone_number' => $customer->phone ?? '',
        ];

        $order_info = [
            'code' => $order->code,
            'sale_status' => $order->status ?? 0,
            'payment_status' => $order->status_payment ?? 1,
            'order_discount' => $order->discount_order ?? 0,
            'grand_total' => $order->total ?? 0,
            'note' => $order->note,
        ];

        $order_items = [];

        foreach ($order->Products as $item) {
            $order_items[] = [
                'product_code' => $item->code,
                'product_name' => $item->name,
                'quantity' => $item->pivot->quantity ?? 1,
                'price' => $item->pivot->price ?? 0,
                'discount' => $item->pivot->discount ?? 0,
                'subtotal' => $item->pivot->total ?? 0,
            ];
        }

        $result = [
            'customer' => $customer_info,
            'order' => $order_info,
            'order_items' => $order_items,
            'success' => true
        ];

        return response()->json($result);
    }
}
