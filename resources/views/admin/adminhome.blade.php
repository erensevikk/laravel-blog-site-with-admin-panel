<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
</head>

<body>
@include('admin.header')
<div class="d-flex align-items-stretch">
    <!-- Sidebar Navigation-->
    @include('admin.sidebar')


    <!-- Sidebar Navigation end-->
    <div class="page-content">
        <h1 class="admin-panel-title">WELCOME TO THE BLOG SITE ADMIN PANEL</h1>
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
