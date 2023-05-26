@extends('contact_manager_views.master')

@section('title', 'Show Contact')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="text-center pt-5">
                    <h3>Contact Detail</h3>
                </div>
                <div>
                    <a class="text-decoration-none" href="{{ route('home_page') }}"> <i class="fa-solid fa-arrow-left"></i> Return Home</a>
                </div>


                <div class="mt-5">

                    <div>
                        @if(session()->has('error'))
                            <div class="alert alert-danger">
                                <span class="small">{{ session()->get('error') }}</span>
                            </div>
                        @endif
                    </div>

                    <form >

                       @csrf
                        <div class="mb-3">

                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input readonly value="{{ $contact->name }}"   name="name" id="name" type="text" class="form-control" placeholder="Contact Name">

                        </div>

                        <div class="mb-3">

                            <label for="contact">Conatact: <span class="text-danger">*</span></label>
                            <input readonly value="{{ $contact->contact }}" name="contact" id="contact" type="tel" class="form-control" placeholder="289 692 104">

                        </div>

                        <div class="mb-3">

                            <label for="email">Email: <span class="text-danger">*</span></label>
                            <input readonly value="{{ $contact->email }}" name="email" id="email" type="email" class="form-control" placeholder="your@email.com">

                        </div>

                        <div class="row mt-5">

                            <div class="col">

                                <a class="btn btn-primary" href="{{ route('edit_contact', ['id' => $contact->id]) }}">Edit Contact</a>

                            </div>
                            <div class="col">
                                <a class="btn btn-danger" href="{{ route('delete_contact', ['id' => $contact->id]) }}"  onclick="return confirm('Are you sure you want to delete this item?');">Delete Contact</a>
                            </div>

                        </div>

                    </form>

                </div>
            </div>


        </div>
    </div>

@stop

@section('js')



    @stop
