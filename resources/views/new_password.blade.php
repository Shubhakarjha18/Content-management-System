@extends('layouts/main_layout')
@section('reset')
<form action="{{route('reset.password.post')}}" method="post" class="px-3" id="forgot-form">
    @csrf
    <div id="forgotAlert"></div>
    <input type="text" name="token" hidden value="{{$token}}">
    <div class="input-group input-group-lg form-group">
      <div class="input-group-prepend">
        <span class="input-group-text rounded-0"><i class="far fa-envelope fa-lg"></i></span>
      </div>
      <input type="email" id="femail" name="email" class="form-control rounded-0" placeholder="E-Mail" required />
    </div>
    <div class="input-group input-group-lg form-group">
        <div class="input-group-prepend">
          <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
        </div>
        <input type="password" id="rpassword" name="password" class="form-control rounded-0" minlength="5" placeholder="Password" required />
      </div>
      <div class="input-group input-group-lg form-group">
        <div class="input-group-prepend"> 
          <span class="input-group-text rounded-0"><i class="fas fa-key fa-lg fa-fw"></i></span>
        </div>
        <input type="password" id="cpassword" name="cpassword" class="form-control rounded-0" minlength="5" placeholder="Confirm Password" required />
      </div>
    <div class="form-group">
      <input type="submit" id="forgot-btn" value="Reset Password" class="btn btn-primary btn-lg btn-block myBtn" />
    </div>
  </form>
@endsection