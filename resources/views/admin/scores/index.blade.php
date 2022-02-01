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
                    <div class="card-header bg-primary text-light">score</div>
                    <div class="card-body">
                        <a href="#" class="btn btn-primary btn-sm" title="Add New score">
                             Submitted Assignments
                        </a>

                        <form method="GET" action="{{ url('/admin/score') }}" accept-charset="UTF-8" class="form-inline my-2 my-lg-0 float-right" role="search">
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
                                        <th>User Code</th><th>Assignment ID</th><th>Score</th><th>Time Taken</th><th>Comment</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($score as $item)
                                    <tr>
                                        <td>{{ $item->user_code }}</td>
                                        <td>{{ $item->assignment_id }}</td>
                                        <td>{{ $item->score }}</td>
                                        <td>{{ $item->time_taken }}</td>
                                        <td>
                                        @if($item->comments=='no comment')
                                            <a href="{{ url('/admin/score/' . $item->id . '/edit') }}" title="Edit score"><i class="mdi mdi-email menu-icon text-dark fs-5" title="comment on this mark"></i></a>
                                            @else
                                            <a href="{{ url('/admin/score/' . $item->id . '/edit') }}" title="Edit score" style="text-decoration:none">{{$item->comments}}</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $score->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection