@extends('zhuazi.layout.master');
@section('title' ,'链接的储存')
@section('content')
    <?php
        if ($data> 0){
            echo '添加成功';
//            dump($newName);
//        dump($file);
//        dump($path);
        dump($data);
//        dump($file);
//            dump($newName);
}

?>
@endsection
