@extends('contact_manager_views.master')

@section('title', 'Edit Contact')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="text-center pt-5">
                    <h3>Edit Contact</h3>
                </div>
                <div>
                    <a class="text-decoration-none" href="{{ route('home_page') }}"> <i class="fa-solid fa-arrow-left"></i> Return Home</a>
                </div>


                <div class="mt-5">

                    <div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                <span class="small">{{ session()->get('success') }}</span>
                            </div>
                        @endif
                    </div>

                    <form  method="post">

                       @csrf
                        <div class="mb-3">

                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input value="{{ $contact->name }}" required   name="name" id="name" type="text" class="form-control" placeholder="Contact Name">

                        </div>

                        <div class="mb-3">

                            <label for="contact">Conatact: <span class="text-danger">*</span></label>
                            <input required value="{{ $contact->contact }}" name="contact" id="contact" type="tel" class="form-control" placeholder="289 692 104">

                        </div>

                        <div class="mb-3">

                            <label for="email">Email: <span class="text-danger">*</span></label>
                            <input required value="{{ $contact->email }}" name="email" id="email" type="email" class="form-control" placeholder="your@email.com">

                        </div>

                        <div class="mt-5">

                            <button class="btn btn-success">Update Contact</button>

                        </div>

                    </form>

                </div>
            </div>


        </div>
    </div>

@stop

@section('js')



    @stop
