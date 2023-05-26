@extends('contact_manager_views.master')

@section('title', 'Contact List')

@section('content')

    <div class="container">
        <div class="row">

            <div class="col-md-12">

                <div class="text-center pt-5">
                    <h3>Contact Management System</h3>
                </div>

                <div class="text-end">
                    <a  class="btn btn-primary" href="{{ route('add_new_contact') }}">Add new Contact</a>
                </div>

            </div>

        </div>
        <div class="row">

            <div class="col-md-12">
                @auth
                <div>
                   <b>{{$name}}</b> is connected  <span><a href="{{ route('logout') }}">Log Out</a> </span>
                </div>
                @endauth

                <div class="pt-5">

                    <div>
                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                <span class="small">{{ session()->get('success') }}</span>
                            </div>
                        @endif
                        @if(session()->has('delete'))
                            <div class="alert alert-warning">
                                <span class="small">{{ session()->get('delete') }}</span>
                            </div>
                        @endif
                    </div>

                    <table id="contactTable">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contacts as $contact)
                            <tr>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->contact }}</td>
                                <td class="justify-content-around">
                                    <a style="font-size: smaller" class="btn btn-sm btn-primary " href="{{ route('show_contact', ['id' => $contact->id]) }}"><i class="fa-regular fa-eye"></i> Show</a>
                                    <a style="font-size: smaller" class="btn btn-sm btn-warning m-1" href="{{ route('edit_contact', ['id' => $contact->id]) }}"><i class="fa-regular fa-pen"></i> Edit</a>
                                    <a style="font-size: smaller" class="btn btn-sm btn-danger mx-1" href="{{ route('delete_contact', ['id' => $contact->id]) }}" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa-regular fa-trash"></i> Delete</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>

            </div>

        </div>
    </div>

@stop

@section('js')

    <script src="{{ asset('assets/bootstrap/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#contactTable').DataTable();
        });
    </script>

    @stop
