@extends('zhuazi.layout.master')

@section('content')

    {{old('name')}}

    <form class="form-inline" action="{{url('SecoundType')}}" method="post">
        <div class="form-group">
            <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
            <div class="input-group">
                <input type="text" class="form-control" name="name">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input type="hidden" name="path" value="0,">
                <input type="hidden" name="tid" value="0">
            </div>
        </div>
        <input type="submit" class="btn btn-primary">
    </form>
@endsection