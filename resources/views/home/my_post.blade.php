<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <base href="/public">
    @include('home.homecss')

    <style type="text/css">
        .post_deg {
            text-align: center;
            padding: 30px;
            background-color: #062c33;
        }

        .title_deg {
            font-size: 30px;
            font-weight: bold;
            padding: 15px;
            color: white;
        }

        .description_deg {
            font-size: 18px;
            font-weight: bold;
            padding: 15px;
            color: whitesmoke;
        }

        .img_deg {
            height: 200px;
            width: 300px;
            padding: 30px;
            margin: auto;
        }
        .div_center
        {
            display: flex;
            justify-content: center;
            padding: 20px;
        }
    </style>
</head>

<body>
<!-- header section start -->
<div class="header_section">
    @include('home.header')
    @if(session()->has('message'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert"
                    aria-hidden="true">X</button>
            {{session()->get('message')}}
        </div>
    @endif
    @foreach($posts as $post)
        <div class="post_deg">
            <img class="img_deg" src="/postimage/{{$post->image}}">
            <h4 class="title_deg">{{$post->title}}</h4>
            <p class="description_deg">{{$post->description}}</p>
            <div class="d-flex align-items-center justify-content-center ">
            <a href="{{route('my-posts.edit',$post->id)}}" class="btn btn-success px-4 py-2" style="font-weight: bold; font-size: 20px;">Edit</a>
            <form action="{{route('my-posts.delete', $post->id) }}" method="POST" onsubmit="return confirmation(event)">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger px-4 py-2" style="font-weight: bold; font-size: 20px;">DELETE</button>
            </form>
            </div>
        </div>
    @endforeach
    <div class="div_center">
        {{$posts->links()}}

    </div>
</div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>
