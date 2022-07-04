<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <title>Mã hóa DES</title>
</head>

<body>
    <p class="h2 mt-4" style="text-align: center">Mã hóa DES
    </p>

    <form class="mt-5 mx-5" action="{{ url('mahoades') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
            <label for="thongtin" class="">Nhập thông tin</label>
            <div class="col-sm-5">
                <textarea type="text" class="form-control" name="thongtin" id="thongtin">{{ $data }}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="file" class="">File .txt</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="file" id="file" accept=".txt">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="filedoc" class="">File .doc</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="filedoc" id="filedoc" accept=".docx">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="khoades" class="">Nhập khóa</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="khoades" id="khoades">
            </div>
        </div>
        

        <button type="submit" class="btn btn-primary">Mã hóa</button>

    </form>

    @isset($ciphertext)
    <form class="mt-5 mx-5" action="{{ url('giaimades') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label for="banma" class="">Bản mã</label>
            <div class="col-sm-5">
                <textarea type="banma" class="form-control" name="banma" id="banma" >{{$ciphertext}}</textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="khoades" class="">Nhập khóa</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="khoades" id="khoades">
            </div>
        </div>
    <button type="submit" class="btn btn-primary">Giải mã</button>
    </form>
    @endisset
    
    @isset($text)
        <div class="mx-5 mt-5 mb-3 row">
            <label for="text" class="">Bản rõ</label>
            <div class="col-sm-5">
                <textarea type="text" class="form-control" name="" id="">{{$text}}</textarea>
            </div>
        </div>
    @endisset
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js">
</body>

</html>
