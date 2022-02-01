@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
    <div class="row mb-5">
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box text-center" style="background-color:blue">
                <h1 class="font-light text-light">
                <i class="mdi mdi-account"></i>
                </h1>
                    <p class="font-light text-white">
                        {{ $pupils }}
                  </p>
                    <h6 class="text-white">Total Pupils</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xlg-3">
            <div class="card card-hover">
                <div class="box text-center" style="background-color:blue">
                <h1 class="font-light text-light">
                <i class="mdi mdi-account"></i>
                </h1>
                    <p class="font-light text-white">
                        {{ $activePupils }}
</p>
                    <h6 class="text-white">Active Pupils</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box text-center" style="background-color:blue">
                <h1 class="font-light text-light">
                <i class="mdi mdi-account"></i>
                </h1>
                    <p class="font-light text-white">
                        {{ $deactivePupils }}
</p>
                    <h6 class="text-white">Deactivated Pupils</h6>
                </div>
            </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box text-center" style="background-color:blue">
                <h1 class="font-light text-light">
                <i class="mdi mdi-book-open-variant"></i>
                </h1>
                    <p class="font-light text-white">
                        {{ $assignments }}
</p>
                    <h6 class="text-white">Total Assignments</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xlg-3">
            <div class="card card-hover">
                <div class="box text-center" style="background-color:blue">
                <h1 class="font-light text-light">
                <i class="mdi mdi-book-open-variant"></i>
                </h1>
                    <p class="font-light text-white">
                        {{ $notYetDeadline }}
</p>
                    <h6 class="text-white">Due Assignments</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <div class="card card-hover">
                <div class="box text-center" style="background-color:blue">
                <h1 class="font-light text-light">
                <i class="mdi mdi-book-open-variant"></i>
                </h1>
                    <p class="font-light text-white">
                        {{ $overdue }}
</p>
                    <h6 class="text-white">Over Due</h6>
                </div>
            </div>
        </div>
        </div>
    </div>
    
    </div>
@endsection