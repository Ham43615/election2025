<!DOCTYPE html>
<html lang="en">
    <head>
        <title>hammad</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      </head>

      <style>
        body {
          background:rgb(231, 223, 223);
        }
        </style>
<body>

    <br>
    <div class="card">
        <div class="container mt-5">
            <h2><b>Gharana with Block</b></h2>
            <form method="POST" action="{{url('gharana')}}"  target="_blank">@csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gharana">Gharana:</label>
                        <input type="text" id="gharana" name="gharana" class="form-control" pattern="[0-9,]+" title="Please enter only numbers and commas" placeholder="e.g 1,2,3 or 1" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="color">Select block:</label>
                        <select name="block" id="block" class="form-control" required>
                            <option value="" >Select Block Code</option>
                            @foreach($models as $model)
                            <option value={{$model}}>{{$model}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="container mt-5" style="margin-top: 15px;">
                <!-- Add more rows as needed -->
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <hr>
        </div>
    </div>
    <div class="card">
        <div class="container mt-5">
            <h2><b>CNIC with All Gharana</b></h2>
            <form method="POST" action="{{url('cnic')}}"  target="_blank">@csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gharana">CNIC No:</label>
                        <input  class="form-control"  type="text" pattern="[0-9]{13}" maxlength="13" id="cnic" name="cnic"  title="Please enter only numbers and 14 digit" placeholder="e.g 3310112345678" required>
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-6 mb-3">
                        <br><label for="color">All against this cnic:</label>
                        <input type="checkbox" name="remember" style="    margin: 10px;height: 12px;">
                    </div>
                </div> --}}
            </div>
            <div class="container mt-5" style="margin-top: 15px;">
                <!-- Add more rows as needed -->
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <hr>
        </div>
    </div>


    


    <div class="card">
        <div class="container mt-5">
            <h2><b>Multiple CNIC</b></h2>
            <form method="POST" action="{{url('multi-cnic')}}"  target="_blank">@csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cnic">Multi / single CNIC no:</label>
                        <input  class="form-control" type="text" id="cnic" name="cnic"  pattern="[0-9,]+"  title="Please enter only numbers and commas" placeholder="e.g 3310112345678 or 3310112345678,3310112345678 " required >
                    </div>
                </div>
            </div>
            <div class="container mt-5" style="margin-top: 15px;">
                <!-- Add more rows as needed -->
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <hr>
        </div>
    </div>






</body>
</html>
