@extends('admin/layout/admin_layout')
@section('content')
<style>
    table, tr,td{
        border:1px solid black;
        padding:3px;
    }
</style>
<div class="container row">
    <div class="col-sm-4 mx-auto">
    <div>
    <h1>Profile Manage</h1> <hr>

    <table>
        <tr>
            <td>Name :</td>
            <td>{{$data->name}}</td>
        </tr>
        <tr>
            <td>Email :</td>
            <td>{{$data->email}}</td>
        </tr>
        <tr>
            <td>Joined At :</td>
            <td>{{$data->created_at}}</td>
        </tr>
       
    </table>
</div>
    </div>
</div>

@stop