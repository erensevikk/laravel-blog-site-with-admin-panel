<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .div_center {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
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
        <div>
            <p style="text-align: center; font-weight: bold; font-size: 40px" class="div_center">Blog Sitesinin Admin Paneline Hoşgeldiniz</p>
        </div>
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
