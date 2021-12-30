@extends('layouts/front_layout')
@section('content')

    
    <section class="container py-5">
            <h1 class="heading-half">Let's Talk !</h1>
        <div class="row pt-4">
            <div class="col-sm-8">
                <form action="#" method="post">
                    <div class="card border-danger rounded-0">
                        <div class="card-header p-0">
                            <div class="bg-web text-white text-center py-2">
                                <h3><i class="fa fa-envelope"></i> Contact Us</h3>
                             
                            </div>
                        </div>
                        <div class="card-body p-3">

                            <!--Body-->
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-user text-info"></i></div>
                                    </div>
                                    <input type="text" class="form-control" id="nombre" name="name" placeholder="Your Full Name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                    </div>
                                    <input type="email" class="form-control" id="nombre" name="email" placeholder="example@gmail.com" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text"><i class="fa fa-comment text-info"></i></div>
                                    </div>
                                    <textarea class="form-control" rows="5" cols="13" placeholder="Message" name="message" required></textarea>
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" value="Send" name="submit" class="btn btn-info btn-block order-btn rounded-0 py-2">
                            </div>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </section>


@stop