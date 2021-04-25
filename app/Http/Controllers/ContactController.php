<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function showContact(Request $request)
    {
        // $contacts = Contact::select('contacts.*', 'c.name AS condition_name', 'd.name AD design_name')
        //     ->where('contacts.status', 1)
        //     ->leftJoin('conditions AS c', 'contacts.condition_id', '=', 'c.id')
        //     ->leftJoin('designs AS d', 'contacts.design_id', '=', 'd.id')
        //     ->orderBy('contacts.created_at', 'DESC')
        //     ->get();

        $contacts = Contact::select('contacts.*','c.name AS condition_name','d.name AS design_name')
            ->where('contacts.status', 1)
            ->leftJoin('conditions AS c', 'contacts.condition_id','=','c.id')
            ->leftJoin('designs AS d', 'contacts.design_id','=','d.id')
            ->orderBy('contacts.created_at', 'DESC')
            ->get();

        return view('top')
            ->with('contacts', $contacts);
    }

    public function exportContactCsv()
    {

    }
}
