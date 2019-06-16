@extends('admin.layouts.main')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Update Admin User
                    <a href="{{ route('admin-admin-user-list') }}" class="btn btn-success btn-sm pull-right"><i class="fa fa-list"></i> Admin User List </a>
                </div>
                <div class="card-body">
                <form role="form" action="{{ route('admin-admin-user-edit-action', ['id'=>$AdminUser->id]) }}" method="POST">
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-body">

                        <?php 
                            if (old('name')) {
                                $name = old('name');
                            }
                            else{
                                $name = $AdminUser->name;
                            }
                        ?>
                        <div class="form-group">
                            <label class="">Name <span class="red">*</span> : </label>
                                <div class="">
                                        <input type="text" name="name" value="{{ $name }}" class="form-control " placeholder="">
                                </div>
                                <div class="red">{{ $errors->first('name') }}</div>
                        </div>

 
                        <?php 
                            if (old('email')) {
                                $email = old('email');
                            }
                            else{
                                $email = $AdminUser->email;
                            }
                        ?>
                        <div class="form-group">
                            <label class="">email <span class="red">*</span> : </label>
                                <div class="">
                                        <input type="text" name="email" value="{{ $email }}" class="form-control " placeholder="Email">
                                </div>
                                <div class="red">{{ $errors->first('email') }}</div>
                        </div>

 
                        <div class="form-group">
                            <label class="">Password <span class="red">*</span> : </label>
                                <div class="">
                                        <input type="password" name="password" value="" class="form-control " placeholder="Password">
                                </div>
                                <div class="help-block">Leave blank if you don't want to update the password</div>
                                <div class="red">{{ $errors->first('password') }}</div>
                        </div>

                        <?php 
                            if (old('status')) {
                                $status = old('status');
                            }
                            else{
                                $status = $AdminUser->status;
                            }
                        ?>                               

                        <div class="form-group">
                                <label class="">Status <span class="red">*</span> : </label>
                                <div class="">
                                    <div class="mt-radio-inline">
                                        <label class="mt-radio">
                                            <input type="radio" name="status" id="optionsRadios25" value="1" @if($status == 1) checked @endif> Enable
                                            <span></span>
                                        </label>
                                        <label class="mt-radio">
                                            <input type="radio" name="status" id="optionsRadios26" value="0" @if($status == 0) checked @endif> Disable
                                            <span></span>
                                        </label>
                                    </div>
                                    <div class="red">{{ $errors->first('status') }}</div>
                                </div>
                        </div>                                            

                        <div class="form-actions">
                                <button type="submit" class="btn blue">Submit</button>
                                <a href="{{ route('admin-admin-user-list') }}" class="btn default">Cancel</a>
                        </div>
                   </div> 
                </form>
            </div>
            </div>
        </div>

        
    </div>
<!-- Page Content-->
@stop


@section('custom_js')

@stop