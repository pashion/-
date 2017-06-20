@extends('fitment.layout.master')


@section('content')


  <table class="table">
    <tr>

    </tr>
    @foreach($data as $v)

      <tr>
        <td>{{$v['goods']}}</td>
      </tr>

    @endforeach

  </table>


@endsection
