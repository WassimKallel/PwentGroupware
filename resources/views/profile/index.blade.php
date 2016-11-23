{!! Html::style('vendor/bootstrap/css/bootstrap.min.css') !!}


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <img src="uploads/profiles/avatars/{{$user->avatar_path}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
            <h2>{{ $user->name }}'s Profile</h2>
            
        </div>
    </div>
</div>




<div class="container">
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update avatar</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update avatar</h4>
        </div>
        <div class="modal-body">
          <form enctype="multipart/form-data" action="/profile" method="POST">
                <label>Update Profile Image</label>
                <input type="file" name="avatar">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
        </div>
        <div class="modal-footer">
        <input type="submit" class="btn btn-sm btn-primary">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
        </form>
      </div>
      
    </div>
  </div>
  
</div>

    <!-- jQuery -->
    <script src=""></script>
    {!! Html::script('vendor/jquery/jquery.min.js') !!}
    <!-- Bootstrap Core JavaScript -->
    <script src=""></script>
    {!! Html::script('vendor/bootstrap/js/bootstrap.min.js') !!}
</body>
</html>