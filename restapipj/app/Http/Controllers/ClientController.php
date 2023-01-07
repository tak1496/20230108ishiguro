<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Contact;

class ClientController extends Controller
{
    public function index(Request $request) {
        return view('index');
    }

    public function post(ClientRequest $request) {
        return view('confirm', $request);
    }

    public function create(Request $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Contact::create($form);
        return view('thanks');
    }

    public function
    management(Request $request) {
        $request->session()->flash('name', $request->name);
        $request->session()->flash('date1', $request->date1);
        $request->session()->flash('date2', $request->date2);
        $request->session()->flash('email', $request->email);
        $request->session()->flash('gender', $request->gender);

        $query = Contact::query();
        if (!empty($request->name)) {
            $query->where('fullname', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->gender)) {
            $query->where('gender', $request->gender);
        }
        if (!empty($request->email)) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }

        if (!empty($request->date1) && !empty($request->date2)) {
            $query->whereBetween('created_at', [$request->date1, $request->date2 . ' 23:59:59']);
        } elseif (!empty($request->date1)) {
            $query->where('created_at', '>', $request->date1);
        } elseif (!empty($request->date2)) {
            $query->where('created_at', '<', $request->date2 . ' 23:59:59');
        }

        $items = $query->Paginate(10);
        return view('management', ['items' => $items]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
    }
}
