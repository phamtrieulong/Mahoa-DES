<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Khôi phục khóa</title>
</head>

<body>
    <p class="h2 mt-4" style="text-align: center">Chương trình chia sẻ khóa bí mật dựa vào sơ đồ tín ngưỡng Shamir
    </p>

    <form class="mt-5 mx-5" action="{{ url('khoiphuckhoa') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="tvtoithieu" class="">Số thành viên tối thiểu để mở khóa</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="tvtoithieu" id="tvtoithieu">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="x" class="">Nhập xi của từng người cách nhau bằng dấu cách</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="x" id="x">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="y" class="">Nhập Pi của từng người cách nhau bằng dấu cách</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="y" id="y">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="p" class="">Giá trị p</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="p" id="p">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Khôi phục khóa</button>

    </form>

    @isset($k)
        <div class="h3 mt-5 mx-5">Khóa: {{ $k }}</div>
    @endisset
    
    

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
</body>

</html>
