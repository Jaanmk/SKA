<base href="https://jaanmk.ddns.net/ska" />
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menyy" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>

    </div>







    <!-- Collect the nav links, forms, and other content for toggling -->

    <div class="collapse navbar-collapse" id="menyy">

		<ul class="nav navbar-nav">
			<?php
			if($page_title == 'Avaleht'){
				echo '<li class="active"><a href="/ska/index.php">Lisa Kasutaja<span class="sr-only"></span></a></li>';
			} else {
				echo '<li><a href="/ska/index.php">Lisa Kasutaja</a></li>';
			}
			if($page_title == 'Inimesed'){
				echo '<li class="active"><a href="/ska/lehed/vaadekasutaja.php">Kasutaja Muutmine<span class="sr-only"></span></a></li>';
			} else {
				echo '<li><a href="/ska/lehed/vaadekasutaja.php">Kasutaja Muutmine</a></li>';
			}
			if($page_title == 'Grupid'){
				echo '<li class="active"><a href="/ska/lehed/grupid.php">Grupid<span class="sr-only"></span></a></li>';
			} else {
				echo '<li><a href="/ska/lehed/grupid.php">Grupid</a></li>';
			}
            if($page_title == 'Tulemused'){
				echo '<li class="active"><a href="/ska/lehed/tulemused.php">Tulemused<span class="sr-only"></span></a></li>';
			} else {
				echo '<li><a href="/ska/lehed/tulemused.php">Tulemused</a></li>';
			}




			?>
		</ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
