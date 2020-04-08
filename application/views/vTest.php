<!DOCTYPE html>
<html lang="en">

<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DEDEV-TESTER</title>

  <!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote.min.js"></script>



</head>
<body style="background-color: #002C76;">
<h1 style="color:#fff; text-align:center;">TESTS</h1>
</br>
</br>
</br>
<form method="post">
  <textarea id="summernote" name="editordata"></textarea>
  <input id="save" type="submit" class="btn btn-success" value="Save" />
</form>

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summe
        });
    });
    $(save).click(function(e){
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "cTest/Process",
            data: {
                d: $('#summernote').summernote('code')
            },
            success: function(response) {
                var jsonData = JSON.parse(response);
                alert(jsonData.success);
            },
            error: function(){
                alert($('#summernote').summernote('code'));
            }
       });
    })
  </script>
</body>
</html>