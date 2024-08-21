@extends('theme.master')
@section('title','Single Blog')
@section('content')
  <!--================ Hero sm Banner start =================-->
    @include('theme.partials.hero',['title'=>$blog->title])
  <!--================ Hero sm Banner end =================-->

  <!--================ Start Blog Post Area =================-->
  <section class="blog-post-area section-margin">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
            <div class="main_blog_details">
                <img class="img-fluid" src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt="">
                <a href="#"><h4>{{ $blog->title }}</h4></a>
                <div class="user_details">
                  <div class="float-right mt-sm-0 mt-3">
                    <div class="media">
                      <div class="media-body">
                        <h5>{{ $blog->user->name }}</h5>
                        <p>{{$blog->created_at->format('d M Y')}}</p>
                      </div>
                      <div class="d-flex">
                        <img width="42" height="42" src="{{ asset('assets') }}/img/avatar.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                <p>{{ $blog->description }}</p>
              </div>
              <div class="comments-area">
                  @if(count($comments) > 0)
                  <h4>{{ count($comments) }} Comments</h4>
                      @foreach($comments as $comment)
                          <div class="comment-list">
                              <div class="single-comment justify-content-between d-flex">
                                  <div class="user justify-content-between d-flex">
                                      <div class="thumb">
                                          <img src="{{ asset('assets') }}/img/avatar.png" width="50px">
                                      </div>
                                      <div class="desc">
                                          <h5><a href="#">{{ $comment->name }}</a></h5>
                                          <p class="date">{{ $comment->created_at->format('d M Y') }}</p>
                                          <p class="comment">
                                              {{ $comment->message }}
                                          </p>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      @endforeach
                  @endif
              </div>

              <div class="comment-form">
                  <h4>Leave a Reply</h4>
                  @if(session('success'))
                      <div class="alert alert-success">{{ session('success') }}</div>
                  @endif
                  <form action="{{ route('comment.store') }}" id="comment-form" method="post">
                      @csrf
                      <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                      <div class="form-group form-inline">
                        <div class="form-group col-lg-6 col-md-6 name">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group col-lg-6 col-md-6 email">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                      </div>
                      <div class="form-group">
                          <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                          @error('subject')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="form-group">
                          <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                          @error('message')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <a href="javascript:document.getElementById('comment-form').submit();" class="button submit_btn">Post Comment</a>
                  </form>
              </div>
        </div>

        <!-- Start Blog Post Siddebar -->
            @include('theme.partials.sidebar')
        <!-- End Blog Post Siddebar -->
      </div>
    </div>
  </section>
  <!--================ End Blog Post Area =================-->
@endsection
