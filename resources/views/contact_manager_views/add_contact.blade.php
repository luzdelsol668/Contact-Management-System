@extends('contact_manager_views.master')

@section('title', 'Add New Contact')

@section('content')

    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="text-center pt-5">
                    <h3>Add New Contact</h3>
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

                    <form action="{{ route('save_new_contact') }}" method="post">

                       @csrf
                        <div class="mb-3">

                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input required name="name" id="name" type="text" class="form-control" placeholder="Contact Name">

                        </div>

                        <div class="mb-3">

                            <label for="contact">Conatact: <span class="text-danger">*</span></label>
                            <input required name="contact" id="contact" type="tel" class="form-control" placeholder="289 692 104">

                        </div>

                        <div class="mb-3">

                            <label for="email">Email: <span class="text-danger">*</span></label>
                            <input required name="email" id="email" type="email" class="form-control" placeholder="your@email.com">

                        </div>

                        <div class="mb-3">

                            <button class="btn btn-success" type="submit">Save Contact</button>

                        </div>

                    </form>

                </div>
            </div>


        </div>
    </div>

@stop

@section('js')



    @stop
