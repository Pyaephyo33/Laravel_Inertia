<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

use function PHPSTORM_META\map;

class CustomerController extends Controller
{
    public function index(){
        return Inertia::render('index',[
            'customers'=>Customer::all()->map(function($customer){
                return [
                    'id' => $customer -> id,
                    'name' => $customer -> name,
                ];
            })
        ]);
    }
    public function create(){
        return inertia::render('create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:customers',
            'phone' => 'required|unique:customers|max:14|min:10',
        ]);

        Customer::create($validated);

        return Redirect::route('customers.index')->with('message','customer successfully created!');
    }

    // public function edit($id){
    //     $customer = Customer::find($id);
    //     return $customer;
    // }

    public function edit(Customer $customer){
        return Inertia::render('edit',[
            'customer'=>$customer
        ]);
    }

    public function update(Request $request, Customer $customer){
        $validated = $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required|max:14|min:10',
        ]);

        $customer->update($validated);

        return Redirect::route('customers.index')->with('message','Customer successfully updated!');
    }

    public function destory($customer){
        $customer = Customer::findOrFail($customer)->delete();
        return Redirect::route('customers.index')->with('message','Customer successfully deleted!');
    }
}
