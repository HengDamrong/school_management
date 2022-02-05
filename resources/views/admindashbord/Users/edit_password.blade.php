@extends('admindashbord.admin_master')
@section('admin')
<div class="content-wrapper">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Chang Password</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">

                        <form method="post" action="{{route('password.update')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Old Password<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="" type="password" name="oldpassword" id="password" class="form-control">
                                                </div>
                                                @error('oldpassword')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>New Password<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="" type="password" name="password" id="password" class="form-control">
                                                </div>
                                                @error('password')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h5>Comfrime Password<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="" type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                                </div>
                                                @error('password_confirmation')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div> <!-- End Row -->
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info mb-5" value="Update">
                                    </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
</div>
@endsection
