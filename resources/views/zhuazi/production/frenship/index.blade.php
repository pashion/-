@extends('zhuazi.layout.master');
@section('title' ,'友情链接首页')
@section('content')
    <table class="table" id="myTable">
        <tr>
            <th>链接id</th>
            <th>链接名</th>
            <th>是否显示</th>
            <th>链接地址</th>
            <th>链接logo</th>
            <th>创建时间</th>
            <th>修改时间</th>
            <th>操作</th>
        </tr>
        <?php
        $type=array(0=>'显示',1=>'不显示');
//        foreach ($urlData as $v){
//            echo "<tr>";
//            echo "<td>{$v['id']}</td>";
//            echo "<td>{$v['name']}</td>";
//            echo "<td>{$type[$v["type"]]}</td>";
//            echo "<td>{$v['url']}</td>";
//            echo "<td>{$v['image']}</td>";
//            echo "<td>{$v['created_at']}</td>";
//            echo "<td>{$v['updated_at']}</td>";
//            echo "<td>
//                        <a href='edit.blade.php?id={$v['id']}'>编辑</a>
//                        <a href=''>删除</a>
//                    </td>";
//            echo "</tr>";
//        }
        ?>
        @foreach($urlData as $v)
            <tr id="tr_{{$v['id']}}">
                <td>{{$v['id']}}</td>
                <td>{{$v['name']}}</td>
                <td>{{$type[$v["type"]]}}</td>
                <td>{{$v['url']}}</td>
                <td><img src='{{url('uploads')}}/_s{{$v->image}}'></td>
                <td>{{$v['created_at']}}</td>
                <td>{{$v['created_at']}}</td>
                <td>
                    <a href="frenship/{{$v->id}}/edit">编辑</a>
                    <a href="javascript:;" onclick="delData('{{$v->id}}')">删除</a>
                </td>
            </tr>
        @endforeach

    </table>
    {!! $urlData->links() !!}




@endsection


