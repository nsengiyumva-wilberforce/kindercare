@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="row">
      <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">Newsletter {{ $newsletter->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/newsletter') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/newsletter/' . $newsletter->id . '/edit') }}" title="Edit Newsletter"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('admin/newsletter' . '/' . $newsletter->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete Newsletter" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $newsletter->id }}</td>
                                    </tr>
                                    <tr><th> Title </th><td> {{ $newsletter->title }} </td></tr><tr><th> Description </th><td> {{ $newsletter->description }} </td></tr><tr><th> Image </th><td> {{ $newsletter->image }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
