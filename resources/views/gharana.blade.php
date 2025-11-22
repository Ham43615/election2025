<!DOCTYPE html>
<html>
<head>
    <title>hammad Akram 03205658188</title>

    <style>
      .column {
  float: left;

}

/* Clear floats after image containers */



    </style>


</head>
<body>


    @foreach ($models as $model)


    <div class="row">
        <div class="column">
            <img src="{{ asset("symbolleft.jpg") }}" alt="Forest" style="width:13% ;margin-bottom: 30px;" >
            <img src="{{ asset('voter/'.$model->images) }}" alt="Snow" style="width:65%">
            <img src="{{ asset("symbolright.jpg") }}" alt="Forest" style="width:17% ;    margin-bottom: 20px;">
            <hr>

        </div>

    </div>


{{--

    <div class="container">
        <div class="row">
          <div class="col-md-8">
            <img src="{{ asset('voter/'.$model->images) }}" >
          </div>
          <div class="col-md-4">
            <img src="{{ asset("symbol.jpg") }}" >
          </div>
        </div>
      </div> --}}
    @endforeach
</body>
</html>
