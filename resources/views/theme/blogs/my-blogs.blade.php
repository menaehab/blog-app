@extends('theme.master')
@section('title','Create Blog')
@section('content')
  <!--================ Hero sm banner start =================-->
    @include('theme.partials.hero',['title'=>'My Blogs'])
  <!--================ Hero sm banner end =================-->

  <!-- ================ contact section start ================= -->
  <section class="section-margin--small section-margin">
    <div class="container">
      <div class="row">
        <div class="col-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" width="5%">#</th>
                    <th scope="col">Title</th>
                    <th scope="col" class="text-center" width="15%">Actions</th>
                </tr>
                </thead>
                <tbody>
                @if(count($blogs) > 0)
                    @php($key = 0)
                    @foreach($blogs as $blog)
                        @php($key++)
                        <tr>
                            <th scope="row">{{ $key }}</th>
                            <td><a href="{{ route('blogs.show',$blog) }}" target="_blank">{{ $blog->title }}</a></td>
                            <td class="text-center">
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger ml-2">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            @if(count($blogs) > 0)
                {{ $blogs->render('pagination::bootstrap-5') }}
            @endif
        </div>
      </div>
    </div>
  </section>
	<!-- ================ contact section end ================= -->
@endsection
