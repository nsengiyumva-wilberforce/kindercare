@extends('layouts.app')

<style>
    .button1{
        background-color: lightseagreen;
        color: white;
        height: 34px;
        width: 75px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }
    .button2{
        background-color: mediumseagreen;
        color: white;
        height: 34px;
        width: 75px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }
    .button3{
        background-color: seagreen;
        color: white;
        height: 34px;
        width: 85px;
        border-radius: 15px;
        border-color: green;
        shadow: none;
        font-weight: bold;
    }
    .button4{
        background-color: lightseagreen;
        color: white;
        height: 40px;
        width: 100px;
        border-radius: 5px;
        border-color: lightseagreen;
        shadow: none;
        font-weight: bold
    }
</style>
@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header bg-primary text-light">Pupil</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/pupil/create') }}" class="btn btn-primary btn-sm" title="Add New pupil">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <form method="GET" action="{{ url('/admin/pupil') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span style="margin-left:5px">
                                    <button class="btn btn-primary" type="submit" style="height:34px">
                                        Search
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User Code</th><th>First Name</th><th>Last Name</th><th>Phone Number</th><th>Status</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($pupil as $item)
                                    <tr>
                                        <td>{{ $item->user_code }}</td>
                                        <td>{{ $item->first_name }}</td>
                                        <td>{{ $item->last_name }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        @if($item->status==True)
                                        <td>
                                        <form action="/activate/{{$item->id}}" method="post">
                                        {{ method_field('PATCH') }}
                                              {{ csrf_field() }}
                                              <button type="submit" title="Deactivate the student" style="border:0px; font-size: 15px;color:green;">Active</button>
                                        </form>
                                    </td>
                                        @else
                                        <td style="color:red;font-weight:bold;">
                                        <form action="/activate/{{$item->id}}" method="post">
                                        {{ method_field('PATCH') }}
                                              {{ csrf_field() }}
                                              <button type="submit" title="Activate the student" style="border:0px; font-size: 15px;color:red;">Deactive</button>
                                        </form>
                                    </td>
                                        @endif
                                        <td>
                                            <a href="{{ url('/admin/pupil/' . $item->id) }}" title="View pupil"><button class="button2"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            <a href="{{ url('/admin/pupil/' . $item->id . '/edit') }}" title="Edit pupil"><button class="button1"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                                            <form method="POST" action="{{ url('/admin/pupil' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('DELETE') }}
                                                {{ csrf_field() }}
                                                <button type="submit" class="button3" title="Delete pupil" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $pupil->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection