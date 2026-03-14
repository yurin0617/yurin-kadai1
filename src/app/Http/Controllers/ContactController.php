<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail']);
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        return view('confirm', compact('contact'));
    }
    public function store(Request $request)
    {
        if ($request->input('action') === 'back') {
            return redirect()->route('contacts.index')->withInput(); // ★入力内容を持って戻る！
        }

        Contact::create($request->all());
        return view('thanks');
    }
    public function thanks()
    {
        return view('thanks');
    }

    public function admin(Request $request)
    {
        $query = \App\Models\Contact::query();

        if ($request->keyword) {
            $query->where(function ($q) use ($request) {
                $q->where('first_name', 'LIKE', "%{$request->keyword}%")
                    ->orWhere('last_name', 'LIKE', "%{$request->keyword}%")
                    ->orWhere('email', 'LIKE', "%{$request->keyword}%");
            });
        }

        if ($request->gender) {
            $query->where('gender', $request->gender);
        }

        if ($request->category_id) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->date) {
            $query->whereDate('created_at', $request->date);
        }

        $contacts = $query->paginate(7);

        $param = [
            'input' => $request->keyword,
            'contacts' => $contacts,
            'categories' => \App\Models\Category::all(),
            'request' => $request
        ];

        return view('admin.index', $param);
    }
    public function show(Request $request)
    {
        $contact=Contact::find($request->id);
        return view('admin.show', compact('contact'));
    }
}
