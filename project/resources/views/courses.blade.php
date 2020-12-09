@extends ('layouts.app')

@section('content')
<div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
       @foreach($courses as $pizz)
        <div class="col">
          <div class="card shadow-sm">
            <img src="data:image/png;base64,{{ chunk_split(base64_encode($pizz->image)) }}" class="pizPic"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

            <div class="card-body">
              <p class="card-text">
              	<h5 class="card-title">{{$pizz->name}}</h5>
				{{$pizz->description}}
              </p>
              <div class="d-flex justify-content-between align-items-center">
                <form method="GET" action="/courses/get">
	    <input type="hidden" name="coursesName" value="{{$pizz->name}}">
	    <div class="foo">
		<label for="size">Вид курса:</label>
		<select name="size" class="custom-select">
			@foreach($courses_type as $val)
  				<option>{{$val->size}}</option>
  			@endforeach 
  		</select>
  		<button type="submit" name="submit" class="btn bucket">Записаться</button>
  		</div>
	    </form>
              </div>
            </div>
          </div>
        </div>

@endforeach 
      </div>
    </div>
  </div>
	

	<script>
	    var msg = '{{Session::get('alert')}}';
	    var exist = '{{Session::has('alert')}}';
	    if(exist){
	      alert(msg);
	    }
  	</script>
  	
@endsection

