<?php
/**
 * Template Name: Home page
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div class="home-contact">
		<!-- START CONTACT FORM -->
			<div class="row">
				<div class="col-md-6">
					<div class="contact-left">
						<h3>Projektujeme: 6/2016-2/2017</h3>
						<p>
							Stavební povolení: přepoklad 2/2017   
							Termín zahájení stavby: předpoklad 3/2017
							Termín dokončení stavby: předpoklad 4/2018
							Termín předání bytů: předpoklad 5/2018
						</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="contact-form">
						<form class="form-horizontal">
  <div class="form-group">
    <div class="col-sm-12">
      <textarea class="form-control" rows="3" placeholder="Mám zájem o bližší informace o ... " ></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-6">
      <input type="text" class="form-control" placeholder="Jmeno">
    </div>
    <div class="col-sm-6">
      <input type="text" class="form-control" placeholder="E-Mail nebo telefon">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-12">
      <button type="submit" class="btn btn-default btn-fluid">Odeslat</button>
    </div>
  </div>
</form>
					</div>
				</div>
			</div>
<!-- END CONTACT FORM -->

		</div>

		<!-- START MAP SECTION -->
<div class="row">
	<div class="col-md-12">
		<div class="section-map">
			<div id="map"></div>
		</div>
	</div>
</div>
<!-- END MAP SECTION -->
	</main><!-- .site-main -->

	<?php //get_sidebar( 'content-bottom' ); ?>

</div><!-- .content-area -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
