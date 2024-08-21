@extends('theme.master')
@section('title','Edit Blog')
@section('content')
  <!--================ Hero sm banner start =================-->
    @include('theme.partials.hero',['title'=> $blog->title])
  <!--================ Hero sm banner end =================-->

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('blogs.update',$blog) }}" class="form-contact contact_form" method="post" id="contactForm" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <input class="form-control border" name="title" id="title" type="text"  value="{{ $blog->title }}" placeholder="Enter blog title">
                        @error('title')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                      <div class="form-group mt-3">
                          <input class="form-control border" name="image" id="image" type="file">
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
                                        <option value="{{ $category->id }}" @if($category->id == $blog->category_id) selected @endif>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control different-control w-100" name="description" id="description" cols="30" rows="5" placeholder="Enter description">{{ $blog->description }}</textarea>
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
