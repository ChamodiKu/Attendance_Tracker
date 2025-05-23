@extends('layouts.app')

@section('content')
    <section class="content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary mt-3">
                        <div class="card-header content-header">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="card-title">All Attendance</h3>
                                </div>
                                <!-- <div class="col-sm-6 text-black">
                                    <ol class="breadcrumb float-sm-right">
                                        <li>
                                            <button onclick="window.history.back();" class="btn btn-light back-btn">Go Back</button>
                                        </li>
                                        <li class="breadcrumb-item">
                                            <a href="/">Home</a>
                                        </li>
                                    </ol>
                                </div> -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                @include('common.alerts')
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col-sm-12 text-end mt-1">
                                <!-- @include('attendance.components.filters') -->
                                <a href="{{route('attendance.createui')}}">
                                    <button class="btn btn-dark mx-2" type="button">
                                        <i class="fa fa-edit"></i> create 
                                    </button>
                                </a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <table id="allAttendance" class="table table-striped ">
                                <thead>
                                    <tr>
                                        <th style="width:10px" id="id">Id</th>
                                        <th id="code">Code</th>
                                        <th id="name">Name</th>
                                        <th id="status">Status</th>
                                        <th class="action text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($attendance as $key =>$subject)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{$subject->code}}</td>
                                            <td>{{$subject->name}}</td>
                                            <td>{{$subject->status}}</td>
                                            <td>
                                                <a href="{{route('attendance.update',['id' => $subject->id])}}">
                                                    <button class="btn btn-warning mx-2 btn-sm" type="button">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </a>
                                                @include('attendance.components.remove')
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{$attendance->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@endsection