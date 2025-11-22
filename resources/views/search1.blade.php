<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Hammad </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap JS -->
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    </head>

      <style>
        body {
          background:rgb(231, 223, 223);
        }
        .modal-content {
    background-color: #1e1b1b; /* Change to the desired background color */
}
        </style>
<body>

    <br>

<!-- Button to trigger modal -->
<button type="button" class="btn btn-primary" id="openModalBtn">Voter Details</button>


    {{-- <div class="card  border-5  " style="width: 60%;margin:auto" >
        <div class="container mt-5">
            <h2><b>Gharana with Block</b></h2>
            <form method="POST" action="{{url('gharana1')}}"  target="_blank" >@csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gharana">Gharana:</label>
                        <input type="text" id="gharana" name="gharana" class="form-control" pattern="[0-9,]+" title="Please enter only numbers and commas" placeholder="e.g 1,2,3 or 1" >
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
            <div class="container mt-5" style="margin: 15px 15px 15px 15px ">
                <!-- Add more rows as needed -->
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
           <br>
        </div>
    </div> --}}







    <div class="card  border-5  " style="width: 60%;margin:auto" >
        <div class="container mt-5">
            <h2><b>CNIC with All Gharana</b></h2>
            <form method="POST" action="{{url('cnic1')}}"  target="_blank">@csrf
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

    <br>
   <div class="card  border-5  " style="width: 60%;margin:auto" >
        <div class="container mt-5">
            <h2><b>CNIC with Block code</b></h2>
            <form method="POST" action="{{route('cnic-block')}}"  target="_blank">@csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gharana">Gharana no:</label>
                        <input  class="form-control"  type="text"   maxlength="13" id="gharana" name="gharana"  title="Please enter only numbers and 14 digit" placeholder="e.g 3310112345678" required>
                    </div>
                </div>
                 
                  <select name="block_code" id="options">
        @foreach ($options as $option)
            <option value="{{ $option }}">{{ $option }}</option>
        @endforeach
    </select>


            </div>
            <div class="container mt-5" style="margin-top: 15px;">
                <!-- Add more rows as needed -->
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <hr>
        </div>
    </div>

    <div class="card  border-5  " style="width: 60%;margin:auto" >
        <div class="container mt-5">
            <h2><b>Multiple CNIC</b></h2>
            <form method="POST" action="{{url('multi-cnic1')}}"  target="_blank">@csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="cnic">Multi / single CNIC no:</label>
                        <input  class="form-control" type="text" id="cnic" name="cnic"  pattern="[0-9,]+"  title="Please enter only numbers and commas" placeholder="e.g 3310112345678 or 3310112345678,3310112345678 " required >
                    </div>
                </div>
            </div>
            <div class="container mt-5" style="margin-top: 15px;">

                <button class="btn btn-primary" type="submit">Search</button>
            </form>
            <hr>
        </div>
    </div>







<!-- Modal -->
<div class="modal fade " id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color: white;text-align:center">PTI Voter Parchi </h5>
                <button type="button" class="btn-close btn-close-white"   data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-dark" id="data-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Block</th>
                            <th>Total Vote</th>
                            <th>issue vote</th>
                            <th>Total Vote Male</th>
                            <th>issue vote Male</th>
                            <th>Total Vote Female</th>
                            <th>issue vote Female</th>
                            <th>link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be dynamically inserted here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>










    <script>
        $(document).ready(function() {
            $('#openModalBtn').click(function() {
                // Show modal when the button is clicked
                $('#myModal').modal('show');
                    // AJAX request to fetch data
                $.ajax({
                    url: "{{ route('get-data') }}", // Route to your controller method
                    type: 'GET',
                    dataType: 'json',

                    success: function(response) {
                        // Clear existing table data
                        $('#data-table tbody').empty();
                         // Populate table with fetched data
                        $.each(response.counts, function(index, item) {

                            var total_block_vote= parseFloat(item.male_count)+ parseFloat(item.female_count)
                            var total_block_vote_status= parseFloat(item.male_count_status)+ parseFloat(item.female_count_status)

                            var rowData = '<tr><td>' + (index + 1) + '</td><td>' + item.block +
                                    '</td><td>' +total_block_vote +
                                    '</td><td>' + total_block_vote_status+
                                    '</td><td>'+ parseFloat(item.male_count)+
                                    '</td><td>'+ parseFloat(item.male_count_status)+
                                    '</td><td>'+ parseFloat(item.female_count)+
                                    '</td><td>'+ parseFloat(item.female_count_status)+
                                    '<td><button class="btn btn-primary open-url" data-url="' +'remaning/' + item.block + '">Open URL</button></td>'
                                    '</td></tr>';
                            $('#data-table tbody').append(rowData);
                        });

                        var newRow = '<tr><td colspan="2">Total Records:</td><td>' + response.stat.totalrecords +

                                    '</td><td>'+response.stat.total_issue_vote+
                                    '</td><td>'+response.stat.total_vote_male+
                                    '</td><td>'+response.stat.issue_vote_male+
                                    '</td><td>'+response.stat.total_vote_female+
                                    '</td><td>'+response.stat.issue_vote_female+'</td></tr>';
                        $('table tbody').append(newRow);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        // Handle error
                    }
                });
            });
            $(document).on('click', '.open-url', function() {
        var url = $(this).data('url');
        window.open(url, '_blank');
    });
        });
    </script>

</body>
</html>
