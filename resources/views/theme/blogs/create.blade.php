@extends('theme.master')
@section('title','Create Blog')
@section('content')
  <!--================ Hero sm banner start =================-->
    @include('theme.partials.hero',['title'=>'Add New Blog'])
  <!--================ Hero sm banner end =================-->

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <form action="{{ route('blogs.store') }}" class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
              @csrf
            <div class="row">
              <div class="col-12">
                <div class="form-group">
                  <input class="form-control border" name="title" id="title" type="text"  value="{{ old('title') }}" placeholder="Enter blog title">
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3">
                  <input class="form-control border" name="image" id="image" type="file"  value="{{ old('image') }}">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
              </div>
                <div class="col-12">
                    <div class="form-group mt-3">
                        <select class="form-control border" name="category_id" id="category_id">
                            <option value="">Select Category</option>
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                    <option value="{{ old('category_id') }}">{{ $category->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('category_id')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control different-control w-100" name="description" id="description" cols="30" rows="5" placeholder="Enter description">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group text-center text-md-right mt-3">
              <button type="submit" class="button button--active button-contactForm">Add Blog</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
@endsection
