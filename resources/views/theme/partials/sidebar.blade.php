@php
    use App\Models\Category;
    use App\Models\Blog;
    $categories = Category::all();
    $blogs = Blog::latest()->take(3)->get();
@endphp
<div class="col-lg-4 sidebar-widgets">
    <div class="widget-wrap">
        <div class="single-sidebar-widget newsletter-widget">
            <h4 class="single-sidebar-widget__title">Newsletter</h4>
            @if(session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <form action="{{ route('subscribe.store') }}" method="post">
                @csrf
                <div class="form-group mt-30">
                    <div class="col-autos">
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''"
                               onblur="this.placeholder = 'Enter email'">
                        @error('email')
                        <div class="text-danger mx-3 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="bbtns d-block mt-20 w-100">Subcribe</button>
            </form>
        </div>
        @if(count($categories) > 0)
        <div class="single-sidebar-widget post-category-widget">
            <h4 class="single-sidebar-widget__title">Catgory</h4>
            <ul class="cat-list mt-20">
                @foreach($categories as $category)
                <li>
                    <a href="{{ route('theme.category',$category->id) }}" class="d-flex justify-content-between">
                        <p>{{ $category->name }}</p>
                        <p>({{ count($category->blogs) }})</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        @if(count($blogs) > 0)
        <div class="single-sidebar-widget popular-post-widget">
            <h4 class="single-sidebar-widget__title">Recent Blogs</h4>
            <div class="popular-post-list">
                @foreach($blogs as $blog)
                        <div class="single-post-list">
                            <div class="thumb">
                                <img class="card-img rounded-0" src="{{ asset('storage') }}/blogs/{{ $blog->image }}" alt="">
                                <ul class="thumb-info">
                                    <li><a href="#">{{ $blog->user->name }}</a></li>
                                    <li><a href="#">{{ $blog->created_at->format('d M Y') }}</a></li>
                                </ul>
                            </div>
                            <div class="details mt-20">
                                <a href="{{ route('blogs.show',$blog) }}">
                                    <h6>{{ $blog->title }}</h6>
                                </a>
                            </div>
                        </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
</div>
