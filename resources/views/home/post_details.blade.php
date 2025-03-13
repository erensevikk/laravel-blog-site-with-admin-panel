<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.homecss')

</head>

<body>
<!-- header section start -->
<div class="header_section">
    @include('home.header')
</div>


<div class="col-md-12 text-center d-flex flex-column align-items-center">
    <div>
        <img style="padding: 20px; height: 300px; width: 550px;"
             src="postimage/{{$post->image}}">
    </div>
    <h4>{{$post->title}}</h4>
    <h4>{{$post->description}}</h4>
    <p>Post by <b>{{$post->name}}</b></p>
    @if(Route::has('login') && Auth()->check() && Auth()->user()->id == $post->user_id)
        <a href="{{route('my-posts.edit',$post->id)}}" class="btn btn-success px-4 py-2" style="font-weight: bold; font-size: 20px;">Edit</a>
        <form action="{{route('my-posts.delete', $post->id) }}" method="POST" onsubmit="return confirmation(event)">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger px-4 py-2" style="font-weight: bold; font-size: 20px;">DELETE</button>
        </form>
    @endif

</div>


<!-- choose section end -->
<!-- footer section start -->
@include('home.footer')
</body>
<script>
    function confirmation(event) {
        event.preventDefault();

        var form = event.target;

        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this post!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                form.submit();
            }
        });
    }
</script>
</html>
