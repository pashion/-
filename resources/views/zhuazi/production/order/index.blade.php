
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div>
        <form id="demo-form" data-parsley-validate action="{{url('images')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <label for="image">链接logo * :</label>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" name="image" /><br>
            <input type="submit" class="btn btn-success">

        </form>
    </div>
</body>
</html>