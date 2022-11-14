<?php 

get_header()
?>
<?php

$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
?>

<div class="container">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8 col-md-offset-2">
			<div class="mainheading">
				<div class="row post-top-meta authorpage">
					<div class="col-md-10 col-xs-12">
						<h1>  <?php echo $curauth->display_name ?> </h1>
						<span class="author-description"> <?php echo $curauth->description ?></span>
						<div class="sociallinks"><a  target="_blank" href="https://www.facebook.com/wowthemesnet/"><i class="fa fa-facebook"></i></a> <span class="dot"></span> <a target="_blank" href="https://plus.google.com/s/wowthemesnet/top"><i class="fa fa-google-plus"></i></a></div>
						<a target="_blank" href="https://twitter.com/wowthemesnet" class="btn follow">Follow</a>
					</div>
					<div class="col-md-2 col-xs-12">
						<img class="author-thumb" src=" <?php echo $curauth->userpicprofile ?>" alt="Sal">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php

?>



    <div class="graybg authorpage">
	<div class="container">
		<div class="listrecent listrelated">

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  
			
				<div class="authorpostbox">
					<div class="card">
						<a href="author.html">
						<img class="img-fluid img-thumb" src=" <?php echo get_the_post_thumbnail_url() ?> " alt="">
						</a>
						<div class="card-block">
							<h2 class="card-title"><a href="post.html"> <?php the_title(); ?></a></h2>
              <h4 class="card-text"> <?php the_excerpt() ?></h4>
            	<div class="metafooter">
								<div class="wrapfooter">
									<span class="meta-footer-thumb">
									<a href=""><img class="author-thumb" src=" <?php echo get_the_author_meta('userpicprofile')  ?> " alt=""></a>
									</span>
									<span class="author-meta">
									<span class="post-name"><a href="">Sal</a></span><br/>
									<span class="post-date"> <?php the_time('d M Y'); ?> </span><span class="dot"></span><span class="post-read">6 min read</span>
									</span>
									<span class="post-read-more"><a href="<?php the_permalink() ?>" title="Read Story"><svg class="svgIcon-use" width="25" height="25" viewbox="0 0 25 25"><path d="M19 6c0-1.1-.9-2-2-2H8c-1.1 0-2 .9-2 2v14.66h.012c.01.103.045.204.12.285a.5.5 0 0 0 .706.03L12.5 16.85l5.662 4.126a.508.508 0 0 0 .708-.03.5.5 0 0 0 .118-.285H19V6zm-6.838 9.97L7 19.636V6c0-.55.45-1 1-1h9c.55 0 1 .45 1 1v13.637l-5.162-3.668a.49.49 0 0 0-.676 0z" fill-rule="evenodd"></path></svg></a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			

                <?php endwhile; else: ?>
        <p><?php _e('No posts by this author.'); ?></p>

    <?php endif; ?>

	
	
		</div>
	</div>
</div>

<?php 

get_footer()

?>