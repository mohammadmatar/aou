

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<script type="text/javascript">
          function myFunction() {
    window.print();
}
        </script>
<!------ Include the above in your HEAD tag ---------->
<title>Aou</title>
<div class="container" id="box" style="margin-top: 50px;">
  <div class="row well">
    <center><h3>course Book Cancelation</h3></center>
    <center><img src="/img/{{$app->inv_img}}" style="height: 150px; width: 200px;"></center>
                  <label style="color: green;">Cancelation Date: </label>  
                  {{$app->updated_at}}<br>
                  <label style="color: green;">Name: </label>  {{App\Student::where('id','=',$app->student_id)->first()->name}}<br>
                  <label style="color: green;">Branch: </label> 
                  <?php $b_id=App\Course::find($app->course_id)->branch_id; ?> 
                  {{App\Branch::where('id','=',$b_id)->first()->name}}<br>
                  <label style="color: green;">Invoice#: </label>  
                  {{$app->inv_no}}<br>
                  <label style="color: green;">Account#: </label>  
                  {{$app->acc_no}}<br>
                  <label style="color: green;">Bank name: </label>  
                  {{$app->bank_name}}<br>
                  <label style="color: green;">Description: </label> {{App\Course::find($app->course_id)->summary}}<br>
                  <br>
                  <label style="color: green;">Notes: </label>  
                  {{$app->notes}}<br>

        
         <center>
             <button class="btn btn-primary hidden-print" onclick="myFunction()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> Print</button>
      </center>
        
  </div>
</div>