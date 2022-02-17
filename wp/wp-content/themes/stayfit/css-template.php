<?php /**
 *
 *  Copyright (C) 2018 Stay Fit - All rights reserved
 *
 *  Template Name: CSS
 *	Description: Podgląd css szablonu
 *  Author: Administrator
 *
 */
?>
<!doctype html>
<html>
	<head>

		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,900|Muli:400,700,900&amp;subset=latin-ext" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Arimo:400,700|Hind:400,700" rel="stylesheet">

		<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme/general.css" type="text/css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme/layout.css" type="text/css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme/typograph.css" type="text/css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme/grids.css" type="text/css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme/form.css" type="text/css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme/buttons.css" type="text/css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme/navigations.css" type="text/css" rel="stylesheet">
		<link href="<?php echo get_template_directory_uri(); ?>/assets/css/theme/alerts.css" type="text/css" rel="stylesheet">
	</head>
	<body>
	
		<div id="screen">
			<div class="row no-gutters">
				<div class="col sm-5 sm-offset-2">
					<div class="site-content">
						<header class="mt-3 mb-4">
							<h2>Logowanie</h2>
						</header>
						<form action="#">
								<div class="form-group">
									<label for="name2">Nazwa użytkownika</label>
									<input type="text" id="name2" placeholder="Nazwa użytkownika">
								</div>
								<div class="form-group">
									<label for="pwd2">Hasło</label>
									<input type="password" id="pwd2" placeholder="hasło">
								</div>
								<div class="form-group form-check">
									<input class="form-check-input" type="checkbox" id="rm">
									<label class="form-check-label"for="rm">Nazwa użytkownika <div class="form-checkmark"></div> </label>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
								</div>
							</form>
					</div>
				</div>
				<div class="col sm-4 sm-offset-1">
					<picture class="cover" style="height: 100vh;">
						<img src="<?php echo get_template_directory_uri() . '/nature-3199166.jpg'; ?>" style="position:absolute;top: -90%;left:-200%;">
					</picture>
				</div>
			</div>
		</div>

		<div id="overmain" class="site-wrapper site-content site-content-spaced">
			<div class="row">
				<div class="col md-6">
					<div class="row">
						<div class="col sm-10 md-offset-1">
							<form action="#">
								<div class="form-group">
									<label for="name2">Nazwa użytkownika</label>
									<input type="text" id="name2" placeholder="Nazwa użytkownika">
								</div>
								<div class="form-group">
									<label for="pwd2">Nazwa użytkownika</label>
									<input type="password" id="pwd2" placeholder="hasło">
								</div>
								<div class="form-group form-check">
									<input class="form-check-input" type="checkbox" id="rm">
									<label class="form-check-label"for="rm">Nazwa użytkownika <div class="form-checkmark"></div> </label>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-primary">Zapisz zmiany</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col md-6">
					<h1><strong>Lorem</strong> Ipsum</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In adipisci animi neque numquam corporis? Aperiam, amet fugit. Temporibus accusantium, vel unde totam, at facilis placeat illum expedita vitae laudantium excepturi.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In adipisci animi neque numquam corporis? Aperiam, amet fugit. Temporibus accusantium, vel unde totam, at facilis placeat illum expedita vitae laudantium excepturi.</p>
				</div>
			</div>	
		</div>
		
		<div id="main" class="site-wrapper site-content site-content-spaced">
			<div class="row">
				<div class="col sm-4">
					<ul class="list list-normal">
						<li><p>First element of <strong>Normal list</strong></p></li>
						<li><p>Second element of <strong>Normal list</strong></p></li>
						<li><p>Third element of <strong>Normal list</strong></p></li>
					</ul>
					<ul class="list list-dotted">
						<li><p>First element of <strong>Dotted list</strong></p></li>
						<li><p>Second element of <strong>Dotted list</strong></p></li>
						<li><p>Third element of <strong>Dotted list</strong></p></li>
					</ul>
					<ul class="list list-square">
						<li><p>First element of <strong>Square list</strong></p></li>
						<li><p>Second element of <strong>Square list</strong></p></li>
						<li><p>Third element of <strong>Square list</strong></p></li>
					</ul>
					<ul class="list list-order-roman">
						<li><p>First element of order <strong>Roman list</strong></p></li>
						<li><p>Second element of order <strong>Roman list</strong></p></li>
						<li><p>Third element of order <strong>Roman list</strong></p></li>
					</ul>
					<ul class="list list-order-alpha">
						<li><p>First element of order <strong>Alpha list</strong></p></li>
						<li><p>Second element of order <strong>Alpha list</strong></p></li>
						<li><p>Third element of order <strong>Alpha list</strong></p></li>
					</ul>
				</div>
				<div class="col sm-12">
					<nav class="navbar navbar-horizontal" >
						<a href="" class="navbar-item current-item">First item</a>
						<a href="" class="navbar-item">Second item</a>
						<a href="" class="navbar-item">Third item</a>
						<a href="" class="navbar-item">Fourth item</a>
						<a href="" class="navbar-item">Fifth item</a>
					</nav>
					<nav class="navbar navbar-horizontal clearfix">
						<h5 class="navbar-logotype">Logotype</h5>
						<ul class="navbar-nav">
							<li class="current-item"><a href="#">First element</a></li>
							<li><a href="#">Second element</a></li>
							<li><a href="#">Third element</a></li>
							<li><a href="#">Fourth element</a></li>
							<li><a href="#">Fifth element</a></li>
						</ul>
					</nav>
					<nav class="navbar navbar-horizontal clearfix">
<!-- 						<picture class="navbar-logotype">
							<img src="https://www.freeiconspng.com/uploads/courses-icon-10.png" alt="">
						</picture> -->
						<h5 class="navbar-logotype"><a href="#">Logotype</a></h5>
						<ul class="navbar-nav">
							<li class="current-item"><a href="#">First element</a></li>
							<li><a href="#">Second element</a></li>
							<li><a href="#">Third element</a></li>
							<li><a href="#">Fourth element</a></li>
							<li><a href="#">Fifth element</a></li>
						</ul>
					</nav>

					<div class="col sm-4">
						<nav class="navbar navbar-vertical clearfix">
<!-- 							<picture class="navbar-logotype">
								<img src="https://www.freeiconspng.com/uploads/courses-icon-10.png" alt="">
							</picture> -->
							<h5 class="navbar-logotype"><a href="#">Logotype</a></h5>
							<ul class="navbar-nav">
								<li class="current-item"><a href="#">First element</a></li>
								<li><a href="#">Second element</a></li>
								<li><a href="#">Third element</a></li>
								<li><a href="#">Fourth element</a></li>
								<li><a href="#">Fifth element</a></li>
							</ul>
						</nav>
					</div>
					<div class="col sm-4">
						<nav class="navbar navbar-vertical navbar-reverse clearfix">
<!-- 							<picture class="navbar-logotype">
								<img src="https://www.freeiconspng.com/uploads/courses-icon-10.png" alt="">
							</picture> -->
							<h5 class="navbar-logotype"><a href="#">Logotype</a></h5>
							<ul class="navbar-nav">
								<li class="current-item"><a href="#">First element</a></li>
								<li><a href="#">Second element</a></li>
								<li><a href="#">Third element</a></li>
								<li><a href="#">Fourth element</a></li>
								<li><a href="#">Fifth element</a></li>
							</ul>
						</nav>
					</div>
					<div class="col sm-4">
						<nav class="navbar navbar-vertical navbar-reverse clearfix">
<!-- 							<picture class="navbar-logotype">
								<img src="https://www.freeiconspng.com/uploads/courses-icon-10.png" alt="">
							</picture> -->
							<h5 class="navbar-logotype"><a href="#">Logotype</a></h5>
							<ul class="navbar-nav navbar-nav-arrow">
								<li class="current-item"><a href="#">First element</a></li>
								<li><a href="#">Second element</a></li>
								<li><a href="#">Third element</a></li>
								<li><a href="#">Fourth element</a></li>
								<li><a href="#">Fifth element</a></li>
							</ul>
						</nav>
					</div>

				</div>

				<div class="col sm-12 ">
					<button class="btn btn-primary">Przycisk normalny</button>
					<button class="btn btn-info">Przycisk informacyjny</button>
					<button class="btn btn-danger">Przycisk zagrożenia</button>
					<button class="btn btn-success">Przycisk sukces</button>
					<button class="btn btn-disabled">Przycisk zablokowany</button>
				</div>
				<div class="col sm-12 site-content-spaced">
					<div class="form-group form-check">
						<input class="form-check-input" type="checkbox" id="checkbox1">
						<label class="form-check-label" for="checkbox1">Label w grupie checkbox
							<span class="form-checkmark"></span>
						</label>
					</div>
					<div class="form-group form-check">
						<input class="form-check-input" type="radio" id="radio1">
						<label class="form-check-label" for="radio1">Label w grupie checkbox</label>
					</div>
				</div>
				<div class="col sm-6">
					
					<div class="form-group">
						<div class="row">
							<label for="input-text1" class="col sm-12">Input text</label>
							<div class="col sm-12">
								<input class="form-input" type="text" name="form-checkbox" id="input-text1">
								<p class="form-input-label">Input custom label</p>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="input-pass1" class="col sm-12">Input password</label>
							<div class="col sm-12">
								<input class="form-input" type="password" name="form-checkbox" id="input-pass1">
								<p class="form-input-label">Input custom label</p>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="input-num1" class="col sm-12">Input number</label>
							<div class="col sm-12">
								<input class="form-input" type="number" name="form-checkbox" id="input-num1">
								<p class="form-input-label">Input custom label</p>
							</div>
						</div>
					</div>

				</div>
				<div class="col sm-6">
					
					<div class="form-group">
						<div class="row">
							<label for="input-text1" class="col sm-3">Input text</label>
							<div class="col sm-7">
								<input class="form-input" type="text" name="form-checkbox" id="input-text1">
								<p class="form-input-label">Input custom label</p>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="input-pass1" class="col sm-3">Input password</label>
							<div class="col sm-7">
								<input class="form-input" type="password" name="form-checkbox" id="input-pass1">
								<p class="form-input-label">Input custom label</p>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<label for="input-num1" class="col sm-3">Input number</label>
							<div class="col sm-7">
								<input class="form-input" type="number" name="form-checkbox" id="input-num1">
								<p class="form-input-label">Input custom label</p>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<select name="" id="">
								<option value="">Opcja #1</option>
								<option value="">Opcja #2</option>
								<option value="">Opcja #3</option>
								<option value="">Opcja #4</option>
								<option value="">Opcja #5</option>
							</select>
						</div>
					</div>

				</div>

			</div>
		</div>

		<div id="main" class="site-wrapper site-content">
			<div class="row">

				<div class="col sm-6"><h1>
					<div><strong>H1</strong></div> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati, commodi, sint possimus atque consectetur consequuntur repellendus nulla unde quam ab, magnam quos nemo, enim omnis eligendi hic nisi. Minima!</h1></div>
				<div class="col sm-6"><h2>
					<div><strong>H2</strong></div> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati, commodi, sint possimus atque consectetur consequuntur repellendus nulla unde quam ab, magnam quos nemo, enim omnis eligendi hic nisi. Minima!t</h2></div>
				<div class="clearfix"></div>
				<div class="col sm-6"><h3>
					<div><strong>H3</strong></div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati, commodi, sint possimus atque consectetur consequuntur repellendus nulla unde quam ab, magnam quos nemo, enim omnis eligendi hic nisi. Minima!</h3></div>
				<div class="col sm-6"><h4>
					<div><strong>H4</strong></div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati, commodi, sint possimus atque consectetur consequuntur repellendus nulla unde quam ab, magnam quos nemo, enim omnis eligendi hic nisi. Minima!</h4></div>
				<div class="clearfix"></div>
				<div class="col sm-6"><h5>
					<div><strong>H5</strong></div>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati, commodi, sint possimus atque consectetur consequuntur repellendus nulla unde quam ab, magnam quos nemo, enim omnis eligendi hic nisi. Minima!</h5></div>
				<div class="col sm-6"><h6>
					<div><strong>H6</strong></div> 
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati, commodi, sint possimus atque consectetur consequuntur repellendus nulla unde quam ab, magnam quos nemo, enim omnis eligendi hic nisi. Minima!</h6></div>

			</div>

			<div id="mainless" class="site-wrapper site-content">
				<span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi incidunt tempora ea, libero, repudiandae accusantium reprehenderit enim ducimus? Nesciunt odio veritatis accusantium aperiam, fugiat nihil vitae. Consequuntur, sed atque officia!</span>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero consequatur ut, a veritatis suscipit sunt sed quae voluptate, quis voluptatem enim ea iusto facere quas nam provident nulla, fuga distinctio.</p>
				<main>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. In obcaecati, commodi, sint possimus atque consectetur consequuntur repellendus nulla unde quam ab, magnam quos nemo, enim omnis eligendi hic nisi. Minima!</p>
					<a href="#">Lorem ipsum !</a>
					<p>Lorem ipsum dolor sit amet, <a href="#">consectetur adipisicing elit</a>. Assumenda doloremque dicta aliquid quasi, culpa unde impedit ipsum aspernatur quod excepturi ea? Veritatis rem maiores laboriosam quasi, vel, praesentium tenetur amet.</p>
				</main>
				<picture></picture>
				<picture class="small"></picture>
				<picture class="normal"></picture>
				<picture class="large"></picture>
			</div>

		</div>

	</body>
</html>