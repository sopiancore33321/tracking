@extends('layouts.master')
@section('content')


<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                            <form action="{{route('prakerin.update',$prakerin->id)}}" class="form-horizontal m-t-30" method="post">
                            @csrf
                            @livewireStyles
                            @livewire('tracking')
                            @livewireScripts
                            <div class="form-group">
                            <button type="submit" class="btn btn-info">Edit</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>


@endsection