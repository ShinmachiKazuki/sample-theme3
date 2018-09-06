<?php get_header(); ?>

<nav class="nav-breadcrumb">
	<?php
		if ( shortcode_exists( 'wp-structuring-markup-breadcrumb' ) ) {
			echo do_shortcode( '[wp-structuring-markup-breadcrumb]' );
	}
	?>
</nav>

<div class="contents">
	<main>
		<section>
			<?php
				the_archive_title( '<h2>', '</h2>' );
				the_archive_description( '<p>', '</p>' );
			?>
			<ul class="contents-news">
				<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
				<li>
					<time datetime="<?php the_time( 'Y-m-d' ); ?>">
						<?php the_time( get_option( 'date_format' ) ); ?>
					</time>
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</li>

			<?php endwhile; ?>
			<?php endif; ?>
			</ul>

		</section>
	</main>

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
