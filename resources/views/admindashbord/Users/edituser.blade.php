@extends('admindashbord.admin_master')
@section('admin')
<div class="content-wrapper">
    <section class="content">
        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Update User</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">

                        <form method="post" action="{{route('user.update',$users->id)}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>User Role <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="usertype" id="role" required="" class="form-control">
                                                        <option value="" selected="" disabled="">Select Role</option>
                                                        <option value="Admin" {{($users->usertype == "Admin" ? "selected": " ")}}>Admin</option>
                                                        <option value="User" {{ ($users->usertype == "User" ? "selected": "") }}>User</option>
                                                        <option value="Operator" {{ ($users->usertype == "Operator" ? "selected": "") }}>Operator</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> <!-- End Col Md-6 -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>User Name <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" value="{{$users->name}}" name="name" class="form-control" required="username">
                                                </div>

                                            </div>

                                        </div><!-- End Col Md-6 -->


                                    </div> <!-- End Row -->



                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h5>User Email <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input value="{{$users->email}}" type="email" name="email" class="form-control" required="">
                                                </div>
                                            </div>
                                        </div> <!-- End Col Md-6 -->

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
