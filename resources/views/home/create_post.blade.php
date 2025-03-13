<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    <style type="text/css">
        .div_deg {
            text-align: center;
            padding: 50px 80px 80px 80px;
        }

        .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: white;
        }

        label {
            display: inline-block;
            width: 200px;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .field_deg {
            padding: 25px;
        }
    </style>
    <!-- basic -->
    @include('home.homecss')
</head>

<body>
@include('sweetalert::alert')
<!-- header section start -->
<div class="header_section">
    @include('home.header')
    <div class="div_deg">
        <h3 class="title_deg">Add Post</h3>
        <form action="{{route('my-posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="field_deg">
                <label>Blog Title</label>
                <input type="text" name="title">
            </div>
            <div class="field_deg">
                <label>Blog Description</label>
                <textarea name="description"></textarea>
            </div>
            <div class="field_deg">
                <label>Blog Image</label>
                <input type="file" name="image">
            </div>
            <div class="field_deg">
                <input type="submit" value="Add Post" class="btn btn-outline-secondary">
            </div>
        </form>
    </div>
    <!-- footer section start -->
@include('home.footer')
</body>

</html>
