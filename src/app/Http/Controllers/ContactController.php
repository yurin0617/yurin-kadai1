<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Channel;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $channels = Channel::all();
        return view('index', compact('categories','channels'));
    }
    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['first_name', 'last_name', 'gender', 'email', 'tel1', 'tel2', 'tel3', 'address', 'building', 'category_id', 'detail', 'image_file']);
        $contact['tel'] = $request->tel1 . $request->tel2 . $request->tel3;
        $contact['image_file'] = $request->image_file->store('img', 'public');
        $channels = Channel::find($request->channel_ids);
        return view('confirm', compact('contact', 'channels'));
    }
    public function store(Request $request)
    {
        if ($request->input('action') === 'back') {
            return redirect()->route('contacts.index')->withInput(); // ★入力内容を持って戻る！
        }

        $contact=Contact::create($request->all());
        $contact->channels()->sync($request->channel_ids);
        return view('thanks');
    }

    public function admin(Request $request)
    {
        $query = Contact::query();

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
        $channels = $contact->channels;
        return view('admin.show', compact('contact','channels'));
    }
}
