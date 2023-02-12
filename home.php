<?php
/*
Template Name: home
*/
?>

<?php get_header(); ?>

<section class="services">
	<div class="container">
		<h2 class="title">НАШИ УСЛУГИ</h2>
		<div class="services__inner">
			<div class="services__content">
				<div class="services__content-box">
					<? the_field('service-text'); ?>
					<a class="button button--decor" href="#">КОНСУЛЬТАЦИЯ ЭКСПЕРТА</a>
				</div>
			</div>
			<? the_field('service-item'); ?>
		</div>
	</div>
</section>

<section class="benefits">
	<div class="container">
		<div class="benefits__inner">
			<img data-wow-delay="2s" class="benefits__images wow animate__fadeInUp" src="<?php the_field('benefits-img'); ?> " alt="car">
			<div class="benefits__content">
				<h2 class="title benefits__title">ПОЧЕМУ МЫ?</h2>
				<? the_field('benefits-text'); ?>
			</div>
		</div>
	</div>
</section>

<section class="carousel">
	<div class="container">
		<h2 class="title">
			ПРИГНАННЫЕ НАМИ АВТО
		</h2>
		<div class="carousel__inner">

			<?php
			global $post;

			$myposts = get_posts([
				'numberposts' => -1,
			]);

			if ($myposts) {
				foreach ($myposts as $post) {
					setup_postdata($post);
			?>
					<!-- Вывод постов, функции цикла: the_title() и т.д. -->
					<div class="carousel__item">
						<div class="carousel__item-box">

							<? the_post_thumbnail(
								array(380, 250),
								array(
									'class' => 'carousel__item-img'
								),
							); ?>
							<h4 class="carousel__item-title"><? the_title(); ?></h4>
							<p class="carousel__item-text"><? the_content() ?></p>
						</div>
					</div>
			<?php
				}
			}
			wp_reset_postdata(); // Сбрасываем $post
			?>

		</div>
	</div>
</section>

<section class="contacts">
	<div class="container">
		<div class="contacts__inner">
			<div class="contacts__info">
				<h2 class="title">
					КОНТАКТЫ
				</h2>
				<ul class="contacts__list">
					<li class="contacts__item">
						<p class="contacts__item-title">Адрес</p>
						<p class="contacts__item-text">
							<? the_field('adress'); ?>
						</p>
					</li>
					<li class="contacts__item">
						<p class="contacts__item-title">Время работы</p>
						<p class="contacts__item-text">
							<? the_field('working-hours'); ?>
						</p>
					</li>
					<li class="contacts__item">
						<p class="contacts__item-title">Телефон</p>
						<p class="contacts__item-text">
							<a href=<?php the_field('phone-number') ?>><?php the_field('phone') ?></a>
						</p>
					</li>
				</ul>
			</div>
			<form class="contacts__form">
				<h2 class="title contacts__title">Оставить заявку</h2>
				<?php echo do_shortcode('[contact-form-7 id="31" title="Контактная форма"]') ?>
			</form>
		</div>
	</div>
</section>


<?php get_footer(); ?>