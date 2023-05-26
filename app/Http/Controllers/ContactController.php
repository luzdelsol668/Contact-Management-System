<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{


    /**
     * Login User
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {


            $validatedRequest = $request->validate([

                'email' => 'required|email',
                'password' => 'required',
            ]);

            // Checking and validating with default demoadmin password
            if ($validatedRequest['password'] == "demoadmin") {

                // We check email availability match in database
                $contact = DB::table('contacts')
                    ->where('email', $validatedRequest['email'])
                    ->select('id')
                    ->first();

                if ($contact){

                   Auth::loginUsingId($contact->id);

                   return redirect(route('home_page'));

                }

                return redirect()->back()->with("error", "Login detail is incorrect");

            }

            return redirect()->back()->with("error", "Login detail is incorrect");

        }

        return view('contact_manager_views.login');


    }

    /**
     * Log user out
     *
     * @return \Illuminate\Http\Response
     */

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect(route('home_page'));


    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contacts = Contact::whereNull('deleted_at')->get();

        if (Auth::check()){

            $name = Auth::user()->name;

            return view('contact_manager_views.index', compact(['contacts', 'name']));

        }
        return view('contact_manager_views.index', compact(['contacts']));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('contact_manager_views.add_contact');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedRequest = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|max:9',
        ]);

        $existing_data_checker = DB::table('contacts')
            ->where('email', $validatedRequest['email'])
            ->orWhere('contact', $validatedRequest['contact'])
            ->first();

        if ($existing_data_checker) {
            return redirect(route('add_new_contact'))->with('error', 'Contact already exists with the same email or phone.');
        }

        DB::table('contacts')->insert([
            'name' => $validatedRequest['name'],
            'email' => $validatedRequest['email'],
            'contact' => $validatedRequest['contact'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect(route('home_page'))->with('success', $validatedRequest['name'] . " Contact created successfully.");


    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $contact = DB::table('contacts')->find($id);

        return view('contact_manager_views.show_contact', compact('contact'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $contact = DB::table('contacts')->find($id);

        return view('contact_manager_views.edit_contact', compact('contact'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required|max:9',
        ]);

        DB::table('contacts')
            ->where('id', $id)
            ->update([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'contact' => $validatedData['contact'],
                'updated_at' => now(),
            ]);

        return redirect()->back()->with('success', 'Contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect(route('home_page'))->with('delete', 'Contact deleted successfully.');

    }
}
