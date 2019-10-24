<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			I love music.
			I have
			<?php 
			$song_count=1234;
			$total_play_hour=floor($song_count/10);
			print "$song_count total songs, which is over $total_play_hour hours of music!";
			?>
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
		
			<ol>
				<?php
				$newspages=5;
				if(isset($_GET["newspages"])){
					$newspages=$_GET["newspages"];
				}
				$iter=0;
			    for($new_pages=11;$iter<$newspages and $new_pages>=7;$new_pages--,$iter++){
					$s1='<li><a href="https://www.billboard.com/archive/article/2019';
					$s2='">2019-';
					$s3='</a></li>';
					print "$s1$new_pages$s2$new_pages$s3";
				}
				?>

			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
		
			<ol>
				<?php 
				$f_artist=file("favorite.txt");
				$f_with_us=array();
				for($i=0;$i<count($f_artist);$i++){
					$f_with_us[]=$f_artist[$i];
					for($j=0;$j<strlen($f_artist[$i]);$j++){
						if($f_artist[$i][$j]==" "){
							$f_with_us[$i][$j]='_';
						}
					}
				}

				for($i=0;$i<count($f_artist);$i++){ ?>
					<li><a href=<?="http://en.wikipedia.org/wiki/".$f_with_us[$i]?> ><?=$f_artist[$i]?></a></li>
				<?php } ?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<?php
				$song_list=glob("lab5/musicPHP/songs/*.mp3");
				$file_sizes=array();
				for($i=0;$i<count($song_list);$i++){
					$file_sizes[]=floor(filesize($song_list[$i])/1024);
				}
				for($i=0;$i<count($song_list)-1;$i++){
					for($j=$i+1;$j<count($song_list);$j++){
						if($file_sizes[$i]<$file_sizes[$j]){
							$temp=$file_sizes[$i];
							$file_sizes[$i]=$file_sizes[$j];
							$file_sizes[$j]=$temp;
							$temp=$song_list[$i];
							$song_list[$i]=$song_list[$j];
							$song_list[$j]=$temp;
						}
					}
				}

				for($i=0;$i<count($song_list);$i++){ ?>
					<li class="mp3item">
						<a href=<?=$song_list[$i]?> download><?=basename($song_list[$i])?></a>
						(<?=$file_sizes[$i]?> KB)
					</li>
				<?php } ?>
				<!-- Exercise 8: Playlists (Files) -->
				
				<?php
				$play_list=glob("lab5/musicPHP/songs/*.m3u");
				rsort($play_list);
				for($pl=0;$pl<count($play_list);$pl++){ ?>
					<li class="playlistitem"><?=basename($play_list[$pl])?>:
						<ul>
							<?php
							$text=file($play_list[$pl]);
							shuffle($text);
							for($i=0;$i<count($text);$i++){ 
								if($text[$i][0]=='#'){
									continue;
								} ?>
								<li><?=$text[$i]?></li>
							<?php } ?>
						</ul>

				<?php } ?>

			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
