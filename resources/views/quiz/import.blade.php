<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Import Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
​
</head>
<body>
    <div class="container">
        <div class="row" style="padding-top: 20px">
            <div class="col-md-6">
                <form action="{{route('quiz.save-import')}}" enctype="multipart/form-data" method="post">
                    @csrf
​
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
​
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="">Import Data</label>
                        <input type="file" accept=".csv" name="file" class="form-control {{ $errors->has('file') ? 'is-invalid':'' }}" required>
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-danger btn-sm">Import</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
