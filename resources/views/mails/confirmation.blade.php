Hi {{$student->name}}
<p> Your registration is completed. Please click to get access .</p>

{{route('confirmation',$student->token)}}
