@extends ('layouts.app')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-4">
				<div class="profile">
					<img src="img/profile.jpg">
					<h2>{{ Auth::user()->name}} {{Auth::user()->surname}}</h2>
					<h2>{{ Auth::user()->email}}</h2>
				</div>
			</div>
			<div class="col-8">
				<div class="outp">
					<table class="table">
					  <thead class="thead">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Название</th>
					      <th scope="col">Тип курса</th>
					      <th scope="col">Цена</th>
					      <th scope="col">Количество</th>
					      <th scope="col">Итого</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@php $total = 0;
					  		$num = 1
					  	@endphp
					  	@foreach($order as $key => $val)
					  	@if($val->uid == Auth::user()->id)
					    <tr>
					      <td scope="row">{{ $num }}</td>
					      <td>{{$val->name}}</td>
					      <td>{{$val->size}}</td>
					      <td>{{$val->price}}</td>
					      <td>
					      	{{$val->amount}}
					      	<a class="btn inc btn-success" href="{{route('basket/inc', $val->id)}}">&nbsp&nbsp</a>
					      	<a class="btn inc btn-danger" href="{{route('basket/dec', $val->id)}}">&nbsp&nbsp</a>
					      </td>
					      <td>{{$val->price * $val->amount}}</td>					  
					    </tr>
					    @php $total = $total + $val->price * $val->amount;
					    	$num = $num + 1
					    	 @endphp
					    @endif
					    @endforeach
					    <tr>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td></td>
					    	<td>Итого:</td>
					    	<td>
					    		{{$total}}
					    	</td>
					    </tr>
					  </tbody>
					</table>
				</div>
			</div>
		</div>
		

	</div>


@endsection