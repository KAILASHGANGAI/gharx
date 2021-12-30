@extends('admin/layout/admin_layout')
@section('content')
<section>
    <h1>Dashboard</h1>

    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="box bg-success">
               <h4>Orders</h4>
                <span>Total Orders : 55</span>
               </div>
            </div>
            <div class="col-sm-3">
                <div class="box bg-info">
               <h4>Users</h4>
                <span>Total  : 55</span>
               </div>
            </div>
            <div class="col-sm-3">
              <div class="box bg-warning">
               <h4>Uploads For Rents</h4>
                <span>Room: 55</span> <span>House : 55</span> <span>Flats : 33</span>
               </div>
            </div>
            <div class="col-sm-3">
            <div class="box bg-danger">
               <h4>House Dessign </h4>
                <span>Total Orders : 55</span>
               </div>
            </div>
        </div>
    </div>
</section>

@stop