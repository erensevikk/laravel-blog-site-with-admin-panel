<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .div_center {
            text-align: center;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
        }
    </style>
</head>

<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')
    <!-- Sidebar Navigation end-->
    <div class="page-content">
        @if(session()->has('message'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert"
                        aria-hidden="true">X</button>
                {{session()->get('message')}}
            </div>
        @endif
        <h1 class="post_title">Update Blog</h1>


        <form action="{{route('admin.post.update',$post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="div_center">

                <label>Blog Title</label>
                <input type="text" name="title" value="{{$post->title}}">

            </div>

            <div class="div_center">

                <label>Blog Description</label>
                <textarea name="description">{{$post->description}}</textarea>

            </div>

            <div class="div_center">

                <label>Old image</label>
                <img style="margin:auto" ; height="100px" width="150px" src="/postimage/{{$post->image}}">

            </div>

            <div class="div_center">

                <label>Update Image</label>
                <input type="file" name="image" value="">

            </div>

            <div class="div_center">

                <input type="submit" class="btn btn-primary">

            </div>

        </form>
    </div>
    @include('admin.footer')
</div>
</div>
<!-- JavaScript files-->
<script src="admincss/vendor/jquery/jquery.min.js"></script>
<script src="admincss/vendor/popper.js/umd/popper.min.js"> </script>
<script src="admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="admincss/vendor/chart.js/Chart.min.js"></script>
<script src="admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="admincss/js/charts-home.js"></script>
<script src="admincss/js/front.js"></script>
</body>

</html>
