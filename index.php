	<?php
	/**
	 * Code by Nguyen Huu Dat - https://www.facebook.com/dl2811
	 * Code được chia sẻ miễn phí tại J2TEAM Community - https://www.facebook.com/groups/j2team.community
	 * Website: https://trolyfacebook.com
	 * 
	 */

	error_reporting(0);

	function gettoken()
	{
		$headers = array();
		$headers[] = 'Content-Type: application/x-www-form-urlencoded';
		$headers[] = 'Host: graph.nhaccuatui.com';
		$headers[] = 'Connection: Keep-Alive';
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, "https://graph.nhaccuatui.com/v1/commons/token");
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($c, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($c, CURLOPT_POST, 1);
		curl_setopt($c, CURLOPT_POSTFIELDS, "deviceinfo=%7B%22DeviceID%22%3A%22dd03852ada21ec149103d02f76eb0a04%22%2C%22DeviceName%22%3A%22AppTroLyBeDieu%22%2C%22OsName%22%3A%22WINDOWS%22%2C%22OsVersion%22%3A%228.0%22%2C%22AppName%22%3A%22NCTTablet%22%2C%22AppTroLyBeDieu%22%3A%221.3.0%22%2C%22UserName%22%3A%220%22%2C%22QualityPlay%22%3A%22128%22%2C%22QualityDownload%22%3A%22128%22%2C%22QualityCloud%22%3A%22128%22%2C%22Network%22%3A%22WIFI%22%2C%22Provider%22%3A%22NCTCorp%22%7D&md5=ebd547335f855f3e4f7136f92ccc6955&timestamp=1499177482892");
		$page = curl_exec($c);
		curl_close($c);
		$infotoken = json_decode($page);
		$token = $infotoken->data->accessToken;
		return $token;}
	function getlink($idbaihat,$token)
	{	//echo $idbaihat;
		$linklist = 'https://graph.nhaccuatui.com/v1/songs/'.$idbaihat.'?access_token='.$token;
		$c = curl_init();
		curl_setopt($c, CURLOPT_URL, $linklist);
		curl_setopt($c, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($c, CURLOPT_SSL_VERIFYHOST,false);
		curl_setopt($c, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
		$page = curl_exec($c);
		curl_close($c);
		$data = json_decode($page);
		return $data;
	}

	?>



	<!DOCTYPE html>
	<html lang="en">
	  <head>


<script async src="https://www.googletagmanager.com/gtag/js?id=UA-150515253-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-150515253-1');
</script>



	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <meta property="og:description" content="site tải nhạc vip từ NhacCuaTui">
	    <meta property="og:title" content="Tải nhạc vip Lossless, 320kbs từ nhaccuatui">
	    <meta property="og:image" content="https://4.bp.blogspot.com/-2ALplrxWK2E/VuKej-1FkpI/AAAAAAAAAFg/06ztdmRWhBs9-2ULggEBrmeXNGsKF5LKw/s1600/get-link-nhaccuatui.com_.jpg" />
	    <meta name="author" content="">
	    <title>Download nhaccuatui không cần tài khoản vip</title>
	    <link href="http://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="audioplayerengine/initaudioplayer-1.css">
	    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  </head>

	  <body>

	    <div class="container">
			
		
			  <center><p class="title"><b>-Tool tải nhạc vip từ nhaccuatui-</b></p></center>
<hr>
<p class="tieude">Chỉ tải được các bài hát chứ không tải được video hoặc album nhé.<br>Có thể tải được nhạc bản quyền và nhạc Lossless, 320kbps</p>
 
			    <form class="form" action="" method="POST">
					<div class="form-group">
					  <div class="col-md-10">
					  <input id="url" name="url" placeholder="Nhập link Bài hát của NhacCuaTui" class="nhaplink"  type="text">
					  </div>
					  <div class="col-md-2">
					    <button class="btn btn-3" name="submit" value="submit" type="submit">Tải về</button>
					  </div>
					</div>
					</form>
					

				
				<div class="row">
					<div class="col-md-12" style="text-align: center;">
						<?php 
						if(isset($_POST['url']))
						{
							$url = $_POST['url'];
							$temp = explode(".",$url);
							$idbaihat = trim($temp[3]);
							if($idbaihat != "")
							{
								$token = gettoken();
								if($token != "")
								{
									$data = getlink($idbaihat,$token);

									$linkplay = $data->data->{7};
									$link128 = $data->data->{11};
									$link320 = $data->data->{12};
									$linklossless = $data->data->{19};
									$thumbnail = $data->data->{8};
									$tenbaihat = $data->data->{2};
									$casy = $data->data->{3};
									if($tenbaihat != "")
									{
										$tenfile = "$tenbaihat - $casy";
										$msg.= '<div style="margin:12px auto;">
											<div id="amazingaudioplayer-1" style="display:block;position:relative;width:300px;height:300px;margin:0px auto 0px;">
												<ul class="amazingaudioplayer-audios" style="display:none;">
													<li data-artist="" data-title="'.$tenbaihat.' - '.$casy.'" data-album="" data-info="" data-image="'.$thumbnail.'" data-duration="0">
														<div class="amazingaudioplayer-source" data-src="'.$linkplay.'" data-type="audio/mpeg" />
													</li>
												</ul>
											</div>
										</div>';

										$msg.= ' <a target="_banks" href="'.$link128.'"><button type="submit" class="btn btn-success"><i class="fa fa-cloud-download"></i> 128 Kbps</button></a> ';

										$msg.= ' <a target="_banks" href="'.$link320.'"><button type="submit" class="btn btn-success"><i class="fa fa-cloud-download"></i> 320 Kbps</button></a> ';

										$msg.= ' <a target="_banks" href="'.$linklossless.'"><button type="submit" class="btn btn-success"><i class="fa fa-cloud-download"></i> Lossless</button></a> ';

										echo $msg;
									}
									else
									{
										echo "Lỗi cmnr: Không thể get bài này!!";
									}
								}
								else
								{
									echo "Lỗi cmnr: tạo token!";
								}
							}
							else
							{
								echo "Lỗi cmnr: Không tìm thấy ID bài hát! Link phải có dạng: http://www.nhaccuatui.com/bai-hat/noi-nay-co-anh-son-tung-m-tp.JzDZ5BW4RSTI.html";
							}
							
						}

						?>
					</div>
				</div>
				
				
<p class="cp"><i class="fa fa-copyright" style="font-size:10px"></i><u> by Namxaocho</u></p>
				<!-- Global site tag (gtag.js) - Google Analytics -->



			  </div>

	     

	    </div> <!-- /container -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="audioplayerengine/amazingaudioplayer.js"></script>
	<script src="audioplayerengine/initaudioplayer-1.js"></script>
		
		
	<style type="text/css">

.meta {
text-align:center;
font-family:arial;
}
.title {
text-align:center;
font-family:arial;
padding-top:20px;
}
body {
			background: url(https://images.wallpaperscraft.com/image/pier_dock_sea_dusk_shore_118549_3840x2400.jpg) ;
		}
		.col-md-2 {
			margin: 0 auto;
		}
		.container {
			max-width: 600px;
  border-radius: 20px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 0 auto;
  padding-bottom: 20px;
  background-color: #f2f0f0;
 }

	/*Ipad ngang(1024 x 768)*/
	@media screen and (max-width: 1024px){
	    #wrapper{ width: 100%;}
	}
	/*Ipad dọc(768 x 1024)*/
	@media screen and (max-width: 768px){
	    #content{ width: 100%; float: none;}
	    #sidebar { width: 100%;float: none; padding-left: 0px;}
	}
	/*Tablet nhỏ(480 x 640)*/
	@media screen and (max-width: 480px){
	    
	}
	/*Iphone(480 x 640)*/
	@media screen and (max-width: 320px){
	    
	}
	/*Smart phone nhỏ*/
	@media screen and (max-width: 240px){
	    
	}
    .tieude{
    	padding: 20px 20px 0px 20px;
    	text-align: center;
    	font-family: arial;
    }

	.form {
	margin: 0 auto;
	padding:20px;
	}
	button {
		margin: 0 auto;
	}
	button[type=submit]{
	  margin-left: 0.5em;
	  height: 2.5em;
	 /* padding: 0.2em 1em 0.2em 2.25em;*/
	  font-size: 15px;
	  font-weight: bold;
	  text-transform: uppercase;
	  color: #696666;
	  background: url(https://i.imgur.com/Th606mh.png) width="7px" height="7px" no-repeat scroll 0.75em 0.07em transparent;
	  background-size: 54px 204px;
	  border-radius: 2em;
	  border: 0.15em solid #00BCD4;
	  cursor: pointer;
	  transition: all 0.3s ease 0s;
	}
	button[type="submit"]:hover {
	    color: #fff;
	    background-color: #94A9F4;
	    border-color: #94A9F4;
	    background-position: 0.75em bottom;
	    -webkit-transition: all 0.3s ease;
	    -ms-transition: all 0.3s ease;
	    transition: all 0.3s ease;
	}
	button[type="submit"]:focus {
	    background-position: 2em -4em;
	    -webkit-transition: all 0.3s ease;
	    -ms-transition: all 0.3s ease;
	    transition: all 0.3s ease;
	}
	/* Webfonts */

	@font-face {
	    font-family: 'Open Sans';
	    font-style: normal;
	    font-weight: 700;
	    src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://themes.googleusercontent.com/static/fonts/opensans/v8/k3k702ZOKiLJc3WVjuplzHhCUOGz7vYGh680lGh-uXM.woff) format('woff');
	}
	 input{
	    display: block;
	    border-bottom: 2px solid #00BCD4;
	    margin-top: 6px;
	    margin-bottom: 10px;
	    outline-style: none;
	    border-top: none;
	    border-left: none;
	    border-right: none;
	}
	input[type="text"] {
	    padding: 5px;
	    width: 70%;
	}
	 .cp{
padding: 0px 0px 0px 20px;
font-family: arial;
font-size: 10px;
	 }
	.button:hover:after {
	  -webkit-transform: translateX(-9%) translateY(-25%) rotate(45deg);
	  transform: translateX(-9%) translateY(-25%) rotate(45deg);
	}
	</style>
<script src="fix.js" type="text/javascript"></script>
	  </body>
	</html>





