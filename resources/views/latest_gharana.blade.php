<!DOCTYPE html>
<html lang="en">

<head>
	   <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hammad Akram</title>
    <style>
    	table{
    		border: 1px solid #000;
    		border-collapse: collapse;



    	}
    	tr,td{
    		border: 1px solid;
			padding: 0px 5px;

    	}
    	img{
    		object-fit: contain;
    	}

</style>

</head>
<body>


	<div class="vote-wrap"  id="content" style="width:100%; max-width: 900px; margin: 0 auto;">
		<br><br>
        @foreach ($models as $model)


		<table style="width:100%;font-size:12px;" cellpadding="5" >
			<tr>
				<td style="width:20%;">
					<img src="{{ asset("symbolleft.jpg") }}" width="100%" height="200px"/>
				</td>
				<td style="vertical-align: top; width: 60%; padding: 0px;">
					<table cellpadding="5" style="text-align: right;">
						<tr>
							<td style="width:30%;"><img src="{{ asset('voter1/'.$model->cnic."__fathername.png") }}" width="100%" /></td>
							<td style="width:20%;"><b>والد/ شوہر کا نام</b></td>
							<td style="width:30%;"><img src="{{ asset('voter1/'.$model->cnic."__name.png") }}" width="100%"/></td>
							<td style="width:20%;"><p><b>نام</b></p></td>
						</tr>
						<tr>
							<td style="width:30%;">{{$model->cnic}}</td>
							<td style="width:20%;"> <b>شناختی کارڈ</b></td>
							<td style="width:30%;">{{$model->silsla}}</td>
							<td style="width:20%;"><p><b> سلسلہ نمبر</b></p></td>
						</tr>
						<tr>
							<td style="width:30%;">{{$model->block}}</td>
							<td style="width:20%;"><b>بلاک کوڈ</b></td>
							<td style="width:30%;">{{$model->gharana}}</td>
							<td style="width:20%;"><p><b>گھرانہ نمبر</b></p></td>
						</tr>
						<tr>
                            <td colspan="3"><img src="{{ asset('voter1/'.$model->cnic."__address.png") }}" width="auto" height="30px" /></td>

                            <td style="width:20%;"><b>پتہ</b></td>
						</tr>
						<tr>
							@if($model->gender==0)

                            <td colspan="4"><img src="{{ asset('block/'.$model->block."_M.png") }}" width="80%" height="30px"/></td>
                            @else

                                <td colspan="4"><img src="{{ asset('block/'.$model->block."_F.png") }}" width="80%" height="30px"/></td>
                            @endif
                        </tr>
					</table>
				</td>
				<td style="width:20%;">
					<img src="{{ asset("symbolright.jpg") }}" width="100%" height="200px" />
				</td>
			</tr>

		</table>
		<hr>
        @endforeach

	</div>


</body>


</html>
