<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contactService;
    protected $companyService;
        
    /**
     * __construct
     *
     * @param  mixed $contact
     * @param  mixed $company
     * @return void
     */
    public function __construct(Contact $contact, Company $company)
    {
        $this->middleware('auth');
        $this->contactService = $contact;
        $this->companyService = $company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts= $this->contactService->getAllContacts();
        $companyList = $this->companyService->getCompaniesDropDown();
        return view('contact.index')->with('contacts', $contacts)->with('companies', $companyList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact = new Contact();
        $companyList = $this->companyService->getCompaniesDropDown();
        return view('contact.create')->with('companies', $companyList)->with('contact', $contact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {
        $request->user()->contacts()->create($request->all());
        return redirect()->route('contacts.index')->with('success', 'You have successfully added a contact.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $companyList = $this->companyService->getCompaniesDropDown();
        return view('contact.view')->with('contact', $contact)->with('companies', $companyList);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     * Route Model Binding (Contact $id)
     */
    public function edit(Contact $contact)
    {
        $companyList = $this->companyService->getCompaniesDropDown();
        return view('contact.edit')->with('contact', $contact)->with('companies', $companyList);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(ContactRequest $request,Contact $contact)
    {        
        $contact->update($request->all());
        return redirect()->route('contacts.show', $contact->id)->with('success', 'You have successfully updated this contact.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Contact have been deleted successfully');
    }
}
