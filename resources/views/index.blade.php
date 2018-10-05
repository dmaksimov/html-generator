<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HTML Generator</title>

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h1 class="text-center">HTML Generator</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <p>Whoops, there was an error with your input</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>CSV File</label>
                    <input class="form-control-file" type="file" name="file">
                </div>
                
                <div class="form-group">
                    <label for="template">Template</label>
                    <textarea name="template" cols="30" rows="20" class="form-control">{{ old('template') }}</textarea>
                    <div class="form-text text-muted">Use double curly braces for variables (e.g. @{{my column}})</div>
                </div>

                <button class="btn-primary">Submit</button>
            </form>
        </div>
    </body>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.bundle.min.js" integrity="sha384-pjaaA8dDz/5BgdFUPX6M/9SUZv4d12SUPF0axWc+VRZkx5xU3daN+lYb49+Ax+Tl" crossorigin="anonymous"></script>
</html>
