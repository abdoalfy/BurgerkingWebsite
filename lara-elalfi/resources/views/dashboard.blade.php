@extends('layouts.main')
@section('content')


<section class="cart container mt-2 my-3 py-5">

<div class="container mt-2 text-center">
<h4 style="line-height:30px";>your profile</h4>
<p style="line-height:30px";>{{Auth::user()->name}}</p>
<p style="line-height:30px";>{{Auth::user()->email}}</p>
<form method="POST" action="{{route('logout')}}">
@csrf
<input type="submit" class="btn btn-danger" value="logout">
</form>
 <div class="mt-3"style="margin-top:20px"> 
 <a href="{{route('user_orders')}}" class="btn btn-warning">your orders</a>
 </div>
</div>


</section>
@endsection