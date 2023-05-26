@extends('contact_manager_views.master')

@section('title', 'Contact List')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="text-center pt-5">
                    <h3>Contact Management System</h3>
                </div>


            </div>

        </div>
        <div class="row mt-4 justify-content-center">

            <div class="col-md-5">

                <div class="card">

                   <div class="card-body">

                       <div class="text-center">
                           <h5>Login Page</h5>
                           <div>
                               <span style="font-size: smaller">
                                   User static email: <b>luzkoumedzrolv@demo.com</b> and password: <b>demoadmin</b> to first login
                               </span>
                           </div>
                       </div>
                       <form action="{{route('login')}}"  method="post">

                           @csrf

                           <div>
                               @if(session()->has('error'))
                                   <div class="alert alert-danger">
                                       <span class="small">{{ session()->get('error') }}</span>
                                   </div>
                               @endif
                           </div>

                           <div class="mb-3">
                               <label for="">Email: <span class="text-danger">*</span></label>
                               <input type="email" placeholder="your@email.com" required name="email" class="form-control">
                           </div>

                           <div class="mb-3">
                               <label for="">Password: <span class="text-danger">*</span></label>
                               <input type="password" required name="password" class="form-control">
                           </div>



                           <div class="d-grid">
                               <button class="btn btn-primary">Login</button>
                           </div>

                       </form>
                   </div>

                </div>


            </div>

        </div>
    </div>

@stop

@section('js')


    @stop
