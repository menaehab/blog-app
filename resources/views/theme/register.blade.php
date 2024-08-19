@extends('theme.master')
@section('title','Register')
@section('content')
  <!--================ Hero sm banner start =================-->
    @include('theme.partials.hero',['title'=>'Register'])
  <!--================ Hero sm banner end =================-->

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('register.post') }}" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
              @csrf
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="name" id="name" type="text"  value="{{ old('name') }}" placeholder="Enter your name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-group">
                  <input class="form-control border" name="email" id="email" type="email"  value="{{ old('email') }}"placeholder="Enter email address">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                  <input class="form-control border" name="password" id="name" type="password" placeholder="Enter your password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                <div class="form-group">
                  <input class="form-control border" name="password_confirmation" type="password" placeholder="Enter your password confirmation">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
              </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
                <a class="px-3" href="{{ route('login') }}"> Already Registered?</a>
              <button type="submit" class="button button--active button-contactForm">Register</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
@endsection
