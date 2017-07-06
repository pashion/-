

    $(function () {

        getDesignScheme();
    })


    function getDesignScheme ()
    {

        $.get('getDesign?num=' + 8 , function (data) {

            var str = '<div class="i_title">场景方案</div><div class="clear"></div><div class="c_main">';

            str += '<div class="c_mianbox1 mar_14"><div class="c_tips">';

            for (a in data['Area']) {
                var aa = data['Area'][a]['id'];
                str += '<a href="#" >'+data['Area'][a]['name']+'</a>';
            }
            str += '</div><div class="c_pic"> <a href="scene/'+data['Design'][0]['id']+'"><img src="designPic/'+data['Design'][0]['pic']+'" /></a> </div></div>';

            str += '     <div class="c_mianbox1 mar_14"><div class="c_pic"><a href="scene/'+data['Design'][1]['id']+'"><img src="designPic/'+data['Design'][1]['pic']+'" /></a></div> ' +
                    '<div class="c_pic"><a href="scene/'+data['Design'][2]['id']+'"><img src="designPic/'+data['Design'][2]['pic']+'" /></a></div></div>' +
                '<div class="c_mianbox2 mar_14"><a href="scene/'+data['Design'][3]['id']+'"><img src="designPic/'+data['Design'][3]['pic']+'" /></a> </div>';

            str +=' <div class="c_mianbox1 mar_14"> <div class="c_pic">' +
                '<a href="scene/'+data['Design'][4]['id']+'"><img src="designPic/'+data['Design'][4]['pic']+'" /></a> </div> ' +
            '<div class="c_pic"><a href="scene/'+data['Design'][5]['id']+'"><img src="designPic/'+data['Design'][5]['pic']+'" /></a></div></div>' +
            '<div class="c_mianbox1"><div class="c_pic"> <a href="scene/'+data['Design'][6]['id']+'"><img src="designPic/'+data['Design'][6]['pic']+'" /></a>' +
            '</div><div class="c_pic"><a href="scene/'+data['Design'][7]['id']+'"><img src="designPic/'+data['Design'][7]['pic']+'" /></a> </div> </div>'

            $('#designMode').html(str);

        }, 'json')
    }