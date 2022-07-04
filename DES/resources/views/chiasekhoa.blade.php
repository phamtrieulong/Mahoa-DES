<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Chia sẻ khóa</title>
</head>

<body>
    <p class="h2 mt-4" style="text-align: center">Chương trình chia sẻ khóa bí mật dựa vào sơ đồ tín ngưỡng Shamir
    </p>

    <form class="mt-5 mx-5" action="{{ url('chiasekhoa') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="khoa" class="">Khóa cần chia sẻ</label>
            <div class="col-sm-5 ">
                <input type="text" class="form-control" name="khoa" id="khoa" value="{{ old('khoa') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tvgiukhoa" class="">Số thành viên giữ khóa</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="tvgiukhoa" id="tvgiukhoa" value="{{ old('tvgiukhoa') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="tvtoithieu" class="">Số thành viên tối thiểu để mở khóa</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="tvtoithieu" id="tvtoithieu" value="{{ old('tvtoithieu') }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="p" class="">Giá trị p</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="p" id="p" value="{{ old('p') }}">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Chia sẻ</button>

    </form>
    <table class="table mt-5 mx-5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">xi</th>
                <th scope="col">pi</th>
            </tr>
        </thead>
        <tbody>
            @isset($y)
                @foreach ($y as $key => $value)
                <tr>
                    <th scope="row">{{ $key }}</th>
                    <td>{{ $key }}</td>
                    <td>{{ $value }}</td>
                </tr>
            @endforeach
            @endisset
            
        </tbody>
    </table>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
</body>

</html>
