 Mvp /  shop-laravel
取消关注
1
 
点赞
0
 
派生
0
文件
工单管理
0
合并请求
0
Wiki
仓库设置

 分支: three 
shop-laravel /  resources /  views /  web /  index.blade.php
index.blade.php 6.6 KB
永久链接
文件历史
原始文件
  
1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
33
34
35
36
37
38
39
40
41
42
43
44
45
46
47
48
49
50
51
52
53
54
55
56
57
58
59
60
61
62
63
64
65
66
67
68
69
70
71
72
73
74
75
76
77
78
79
80
81
82
83
84
85
86
87
88
89
90
91
92
93
94
95
96
97
98
99
100
101
102
103
104
105
106
107
108
109
110
111
112
113
114
115
116
117
118
119
120
121
122
123
124
125
126
127
128
129
130
131
132
133
134
135
136
137
138
139
140
141
142
143
144
145
146
147
148
149
150
151
152
153
154
155
156
157
158
159
160
161
162
163
164
165
166
167
168
169
170
171
172
173
174
175
176
177
178
179
@extends('web/layout/master')

@section('title','首页')

@section('content')
<script type="text/javascript">
$(document).ready(function(){
 $(".q_code ").hover(function(){
            $(this).find(".q_code_layer").addClass("hover").css("display","block");
        },function(){
            $(this).find(".q_code_layer").removeClass("hover").css("display","none");  

        }
    ); 
     $(".diagram ").hover(function(){
            $(this).addClass("hover");
        },function(){
            $(this).removeClass("hover");  

        }
    ); 
})
</script>
<body>

        {{--导入导航条--}}
        @include('web.layout.nav')

<!--banner轮播  s-->
<div class="fullSlide">
    <div class="bd">
        <ul style="position: relative; width: 1583px; height: 460px;">
            <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: none; background: url({{url('web')}}/images/banner01.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
            <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: list-item; background: url({{url('web')}}/images/banner02.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
            <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: list-item; background: url({{url('web')}}/images/banner03.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
            <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: none; background: url({{url('web')}}/images/banner01.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
            <li style="position: absolute; width: 1583px; left: 0px; top: 0px; display: none; background: url(images/banner03.jpg) 50% 0px no-repeat;"><a target="_blank" href="#"></a></li>
        </ul>
    </div>
    <div class="hd">
        <ul>
            <li class="">1</li>
            <li class="on">2</li>
            <li class="">3</li>
            <li class="">4</li>
            <li class="">5</li>
        </ul>
    </div>
</div>
<script type="text/javascript">
jQuery(".fullSlide").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });
</script>

<!--遍历模板  s-->
        @foreach($modeData as $v)

            <div class="wrap_p">
                <div class="p_title">
                    {{$v['modeName']}}
                </div>
                <div class="p_main">

             @include($v['file_name'])

                </div>
            </div>

        @endforeach


<!--关于我们  s-->
<div class="wrap_a bgcolor_f9">
    <div class="a_main">
        <div class="a_box_text">
            <p class="a_title"> 关于我们</p>
            <p class="a_text">这里是一个提倡分享与交流的社区，你可以这里：分享你喜欢的案例或者是自己参与设计的案例发帖和大家一起交流，发布自己的观点与设计态度，有机会获得更多的商业机会哦。互动的动态会及时更新到我们的官网微信社区与QQ群，并且一家一世界软装网会大力推广原创设计师的作品以及设计师，包括家居饰品的设计师哟；还可以认识很多与你志趣相投的新朋友，组织线下活动聚会。在这里你都可以找到归属。</p>
        </div>
        <div class="a_box2_pic">
            <img src="{{url('web')}}/images/a_img01.jpg" />
        </div>
    </div>
</div>
<!--关于我们  e-->

<!--服务流程  s-->
<div class="wrap_s">
    <div class="s_main">
        <div class="s_title">
          服务和流程
        </div>
        <div class="s_box1">
            <ul>
                <li>
                    <p><img src="{{url('web')}}/images/icon_s01.jpg" /></p>
                    <p class="s_tip">知识</p>
                    <p class="s_tip_text">软装饰细节，无论是从视觉到触觉，从感官到心里都彻底温暖起来。</p>
                </li>
                <li>
                    <p><img src="{{url('web')}}/images/icon_s02.jpg" /></p>
                    <p class="s_tip"c>实现</p>
                    <p class="s_tip_text">软装饰细节，无论是从视觉到触觉，从感官到心里都彻底温暖起来。</p>
                </li>
                <li>
                    <p><img src="{{url('web')}}/images/icon_s03.jpg" /></p>
                    <p class="s_tip">优势</p>
                    <p class="s_tip_text">软装饰细节，无论是从视觉到触觉，从感官到心里都彻底温暖起来。</p>
                </li>
                <li>
                    <p><img src="{{url('web')}}/images/icon_s04.jpg" /></p>
                    <p class="s_tip">服务</p>
                    <p class="s_tip_text">软装饰细节，无论是从视觉到触觉，从感官到心里都彻底温暖起来。</p>
                </li>
            </ul>
        </div>
        <div class="s_box2">
            <div class="s_box2_list">
                <p><img src="{{url('web')}}/images/icon_s05.jpg" /></p>
                <p>浏览场景</p>
            </div>
            <div class="s_box2_jt">
                <img src="{{url('web')}}/images/s_jt.jpg" />
            </div>
            <div class="s_box2_list">
                <p><img src="{{url('web')}}/images/icon_s06.jpg" /></p>
                <p>挑选方案</p>
            </div>
            <div class="s_box2_jt">
                <img src="{{url('web')}}/images/s_jt.jpg" />
            </div>
            <div class="s_box2_list">
                <p><img src="{{url('web')}}/images/icon_s07.jpg" /></p>
                <p>选择套餐</p>
            </div>
            <div class="s_box2_jt">
                <img src="{{url('web')}}/images/s_jt.jpg" />
            </div>
            <div class="s_box2_list">
                <p><img src="{{url('web')}}/images/icon_s08.jpg" /></p>
                <p>下单购买</p>
            </div>
            <div class="s_box2_jt">
                <img src="{{url('web')}}/images/s_jt.jpg" />
            </div>
            <div class="s_box2_list">
                <p><img src="{{url('web')}}/images/icon_s09.jpg" /></p>
                <p>物流配送</p>
            </div>
            <div class="s_box2_jt">
                <img src="{{url('web')}}/images/s_jt.jpg" />
            </div>
            <div class="s_box2_list">
                <p><img src="{{url('web')}}/images/icon_s010.jpg" /></p>
                <p>售后服务</p>
            </div> 
        </div>
    </div>
</div>
<!--服务流程  e-->

<!--二维码  s-->
<div class="ewm bgcolor_f9">
    <span>
        <p><img src="{{url('web')}}/images/ewm.jpg" /></p>
        <p>手机端访问</p>
    </span>
    <span>
        <p><img src="{{url('web')}}/images/ewm.jpg" /></p>
        <p>手机端访问</p>
    </span>
    <span>
        <p><img src="{{url('web')}}/images/ewm.jpg" /></p>
        <p>手机端访问</p>
    </span>
</div>
<!--二维码  e-->
@endsection



© 2017 Gogs 当前版本: 0.11.19.0609 页面: 144ms 模板: 1ms  简体中文  官方网站 Go1.8
