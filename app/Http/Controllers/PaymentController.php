<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Enrollment;
use App\Models\Order;
use App\Models\ShowOrder;
use App\Models\Item;
use App\Models\Invoice;
use App\Models\Transaction;


class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $string)
    {
      switch ($string) {
        case 'order':
          $order = Order::all();
          return view('payment.index', compact('order'));
          break;
        case 'transaction':
          $result[] = 'transaction';
          $result['transaction'] = Transaction::all();
          //return $result;
          return view('payment.transaction.index', compact('result'));
          break;
        default:
          $order = '';
          break;
      }
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $result[] = 'payment';
      $result['order'] = ShowOrder::where('id', $id)->get();
      $result['student'] = Enrollment::where('email', $result['order'][0]['email'])->get();
      $result['item'] = Item::where('order_id', $result['order'][0]['order_id'])->get();
      $result['invoice'] = Invoice::where('order_id', $result['order'][0]['order_id'])->get();
      $result['transaction'] = Transaction::where('order_id', $result['order'][0]['order_id'])->get();
      //return $result;
      return view('payment.section.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
