<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')

    <style type="text/css">
        .title_deg {
            font-size: 30px;
            font-weight: bold;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .addbtn {
            display: flex;
            position: absolute;
            padding: 8px 40px;
            margin: 25px 0px 25px 50px;
        }

        .table_deg {
            border: 1px solid white;
            width: 80%;
            text-align: Center;
            margin-left: 120px;
        }

        .th_deg {
            background-color: skyblue;
        }

        .img_deg {
            height: 100px;
            width: 150px;
            padding: 10px;
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
        <div>
            <a href="{{route('admin.post.create')}}" class="btn btn-success addbtn">Add Post</a>
            <h1 class="title_deg">All Post</h1>
        </div>



        <table class="table_deg">
            <tr class="th_deg">
                <th>Post Title</th>
                <th>Description</th>
                <th>Post By</th>
                <th>Status</th>
                <th>UserType</th>
                <th>Image</th>
                <th>Status Accept</th>
                <th>Status Reject</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($posts as $p)

                <tr>
                    <td>{{$p->title}}</td>
                    <td>{{$p->description}}</td>
                    <td>{{$p->user->name}}</td>
                    <td>{{$p->status->value}}</td>
                    <td>{{$p->user->usertype}}</td>
                    <td>
                        <img class="img_deg" src="postimage/{{$p->image}}">
                    </td>
                    <td>
                        <form action="{{ route('admin.accept.post', $p->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Accept</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('admin.reject.post', $p->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </form>
                    </td>

                    <td>
                        <a href="{{route('admin.post.edit',$p->id)}}" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.post.delete', $p->id) }}" method="POST" onsubmit="return confirmation(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>
            @endforeach


        </table>

    </div>

    @include('admin.footer')
    <script type="text/javascript">
        function confirmation(event) {
            event.preventDefault();

            swal({
                title: "Are you sure to delete this?",
                text: "You won’t be able to revert this delete",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    event.target.submit();
                }
            });
        }

    </script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>
