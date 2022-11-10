{{-- @extends('admin.layouts.master')
@section('title',$pageName)
@section('styles')
@endsection
@section('content') --}}
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Data Tables</li>
                </ol>
            </div>
            {{-- <h4 class="page-title">Data Tables</h4> --}}
        </div>
    </div>   
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title">User create</h4>
                <div class="tab-content">
                    <div class="tab-pane show active">
                        <form  method="POST" action="{{$action}}" id="submitForm">
                            @csrf   
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom01">Name</label>
                                <input type="text" class="form-control" id="name" name='name' placeholder="name" required>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom02">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="email" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustomUsername">Mobile</label>
                                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="mobile"aria-describedby="inputGroupPrepend" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="validationCustom03">Password</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="enter password" required>
                            </div>
                            {{-- <div class="mb-3">
                                <label class="form-label" for="validationCustom04">Confirm Password</label>
                                <input type="text" class="form-control" id="confirm_password" name="confirm_password" placeholder="enter confirm password" required>
                            </div> --}}
                            <button class="btn btn-primary" type="submit" id="submitButton" >Submit</button>
                        </form>                        
                    </div> <!-- end preview-->
                </div> <!-- end tab-content-->
            </div> <!-- end card-body -->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div> 
{{-- @endsection  
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script type="text/javascript">
$.validator.addMethod("validemail",function(value){
       return /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(value);
      },"Please enter a valid email address.");
      $.validator.addMethod("strongpassword",function(value){
      return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(value);
        },"Minimum eight characters, at least one uppercase, one lowercase letter, one number and one special character");
    $('#submitForm').validate({
        rules:{
            name:{
                required:true
            },
                password:{
                    required:true,
                    strongpassword:true
                },
                confirm_password:{
                    required:true,
                        strongpassword:true,
                            equalTo : "#password"
                    },
                    email:{
                        required:true,
                        validemail:true,
                        // emailCheck:true    
                    },
            
        }
        
        });
</script>
@endsection  --}}