<!DOCTYPE html>
<html>
<head>
	<title>Login - PwentGroupware</title>{{-- 
	<link href="/css/app.css" rel="stylesheet"> --}}
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{!! Html::style('vendor/bootstrap/css/bootstrap.min.css') !!}
	<link rel="stylesheet" type="text/css" href="/css/login.css">
</head>
<body>
  <?php

  // The array that contains the configuration for the php side
  $config = [
    'divId'=>'chesscaptcha',
    'whitesquare'=>'#f0d9b5',
    'blacksquare'=>'#b58863',
    'matemode'=>'no', // yes or no
    'nojsfallback'=>'no', // yes or no; activate the fallback in case js is disabled
    'titleoverride'=>'Copy the position below', // text override
    'titlemateoverride'=>'Mate-In-One', // text override
    'helpoverride'=>'Drag the pieces into the board to copy the given position. To remove a piece drag it out of the board.', // text override
    'startoverride'=>'Start', // text override
    'clearoverride'=>'Clear', // text override
    'pieceImages'=>'../img/pieces/', // the path to images for the js part
    'pieceStyle'=>'wikipedia', // the name of the piece style to use or 'random', default is 'wikipedia'
  ];
    // Use composer's autoloader or create yours or include the files
    require_once("../vendor/autoload.php");
    $chesscaptcha = new \Elioair\ChessCaptcha\ChessCaptcha($config['whitesquare'], $config['blacksquare'], $config['matemode'], $config['nojsfallback'], $config['pieceStyle']);
  ?>
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-xs-12">
			<div id="page-title">PwentGroupware</div>
				<div class="panel panel-default">
					<div class="panel-heading">Login</div>
					<div class="panel-body">
						<form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
							{{ csrf_field() }}
	
							<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<label for="email" class="col-md-4 control-label">E-Mail Address</label>
	
								<div class="col-md-6">
									<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
	
									@if ($errors->has('email'))
										<span class="help-block">
											<strong>{{ $errors->first('email') }}</strong>
										</span>
									@endif
								</div>
							</div>
	
							<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<label for="password" class="col-md-4 control-label">Password</label>
	
								<div class="col-md-6">
									<input id="password" type="password" class="form-control" name="password" required>
	
									@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
									@endif
								</div>
							</div>
	
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
								<div id="chesscaptcha"><?php if($config['nojsfallback'] == 'yes'){ echo $chesscaptcha->noJsHtml($config['pieceImages']);}?></div>
									<div class="checkbox pull-left">
										<label>
											<input type="checkbox" name="remember"> Remember Me
										</label>
									</div>
									<div class="pull-right">
										<button type="submit" class="btn btn-primary">
											Login
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../js/jquery-1.10.1.min.js"></script>
  <script type="text/javascript">
  // The object containing the configuration for the js side
  var chessCaptchaParams = {
      cc_divId: '<?php echo $config['divId'];?>',
      cc_mateMode: '<?php echo $config['matemode']?>' === 'no' ? false : true,
      cc_whiteSquare: '<?php echo $config['whitesquare'];?>',
      cc_blackSquare: '<?php echo $config['blacksquare'];?>',
      cc_titleOverride: '<?php echo $config['titleoverride'];?>',
      cc_mateTitleOverride: '<?php echo $config['titlemateoverride'];?>',
      cc_helpOverride: '<?php echo $config['helpoverride'];?>',
      cc_startOverride: '<?php echo $config['startoverride'];?>',
      cc_clearOverride: '<?php echo $config['clearoverride'];?>',
      cc_sideToPlay: '<?php echo $chesscaptcha->chessCaptchaFenCode[2]; ?>',
      cc_challenge: '<?php echo $chesscaptcha->chessCaptchaChallenge; ?>',  // The image of the position
      cc_matechallenge: '<?php echo $chesscaptcha->chessCaptchaFenCode[0];?>',  // The fen code of matemode position
      cc_pathtoimg: '<?php echo $config['pieceImages'];?>',
      cc_piecestyle: '<?php echo $chesscaptcha->chessCaptchaPieceStyle;?>',
  };
  </script>
  <script type="text/javascript" src="../js/chesscaptcha.js"></script>
  <!-- Optional Ajax Validation -->
  <script type="text/javascript" src="../js/chesscaptcha-ajax-validation.js"></script>
</body>
</html>
