<?= $this->extend("layouts/app") ?>
<?= $this->section("content") ?>
<div id="post-header" class="page-header">
    <div class="background-img"
         style="background-image: url('<?= site_url() ?>public/assets/img/post-page.jpg');"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="post-meta">
                    <a class="post-category cat-2" href="category.html">JavaScript</a>
                    <span class="post-date">
                        <?= date('M d, Y', strtotime($new->created_at)) ?>
                    </span>
                </div>
                <h1> <?= $new->title ?></h1>
            </div>
        </div>
    </div>
</div>
</header>


<div class="section">

    <div class="container">

        <div class="row">

            <div class="col-md-8">
                <div class="section-row sticky-container">
                    <div class="main-post">
                        <h3><?= $new->title ?></h3>
                        <p><?= $new->description ?></p>

                        <figure class="figure-img">
                            <img class="img-responsive" src="<?= site_url() ?>public/assets/img/posts/<?= $new->postImage?>" alt="">
                            <figcaption>RCL TV</figcaption>
                        </figure>
                    </div>
                    <div class="post-shares sticky-shares">
                        <a href="#" class="share-facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="share-twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="share-google-plus"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="share-linkedin"><i class="fa fa-linkedin"></i></a>
                        <a href="#"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>

                <div class="section-row text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="img/ad-2.jpg" alt="">
                    </a>
                </div>


<!--                <div class="section-row">-->
<!--                    <div class="post-author">-->
<!--                        <div class="media">-->
<!--                            <div class="media-left">-->
<!--                                <img class="media-object" src="img/author.png" alt="">-->
<!--                            </div>-->
<!--                            <div class="media-body">-->
<!--                                <div class="media-heading">-->
<!--                                    <h3>John Doe</h3>-->
<!--                                </div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor-->
<!--                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud-->
<!--                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
<!--                                <ul class="author-social">-->
<!--                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
<!--                                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
<!--                                </ul>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!---->
<!--                <div class="section-row">-->
<!--                    <div class="section-title">-->
<!--                        <h2>3 Comments</h2>-->
<!--                    </div>-->
<!--                    <div class="post-comments">-->
<!---->
<!--                        <div class="media">-->
<!--                            <div class="media-left">-->
<!--                                <img class="media-object" src="img/avatar.png" alt="">-->
<!--                            </div>-->
<!--                            <div class="media-body">-->
<!--                                <div class="media-heading">-->
<!--                                    <h4>John Doe</h4>-->
<!--                                    <span class="time">March 27, 2018 at 8:00 am</span>-->
<!--                                    <a href="#" class="reply">Reply</a>-->
<!--                                </div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor-->
<!--                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud-->
<!--                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
<!---->
<!--                                <div class="media">-->
<!--                                    <div class="media-left">-->
<!--                                        <img class="media-object" src="img/avatar.png" alt="">-->
<!--                                    </div>-->
<!--                                    <div class="media-body">-->
<!--                                        <div class="media-heading">-->
<!--                                            <h4>John Doe</h4>-->
<!--                                            <span class="time">March 27, 2018 at 8:00 am</span>-->
<!--                                            <a href="#" class="reply">Reply</a>-->
<!--                                        </div>-->
<!--                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod-->
<!--                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,-->
<!--                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo-->
<!--                                            consequat.</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        <div class="media">-->
<!--                            <div class="media-left">-->
<!--                                <img class="media-object" src="img/avatar.png" alt="">-->
<!--                            </div>-->
<!--                            <div class="media-body">-->
<!--                                <div class="media-heading">-->
<!--                                    <h4>John Doe</h4>-->
<!--                                    <span class="time">March 27, 2018 at 8:00 am</span>-->
<!--                                    <a href="#" class="reply">Reply</a>-->
<!--                                </div>-->
<!--                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor-->
<!--                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud-->
<!--                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
<!--                </div>-->
<!---->
<!---->
<!--                <div class="section-row">-->
<!--                    <div class="section-title">-->
<!--                        <h2>Leave a reply</h2>-->
<!--                        <p>your email address will not be published. required fields are marked *</p>-->
<!--                    </div>-->
<!--                    <form class="post-reply">-->
<!--                        <div class="row">-->
<!--                            <div class="col-md-4">-->
<!--                                <div class="form-group">-->
<!--                                    <span>Name *</span>-->
<!--                                    <input class="input" type="text" name="name">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-4">-->
<!--                                <div class="form-group">-->
<!--                                    <span>Email *</span>-->
<!--                                    <input class="input" type="email" name="email">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-4">-->
<!--                                <div class="form-group">-->
<!--                                    <span>Website</span>-->
<!--                                    <input class="input" type="text" name="website">-->
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="col-md-12">-->
<!--                                <div class="form-group">-->
<!--                                    <textarea class="input" name="message" placeholder="Message"></textarea>-->
<!--                                </div>-->
<!--                                <button class="primary-button">Submit</button>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </form>-->
<!--                </div>-->

            </div>


            <div class="col-md-4">

                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="img/ad-1.jpg" alt="">
                    </a>
                </div>


                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Les plus lues</h2>
                    </div>
                    <?php foreach ($most_reads as $item): ?>
                        <div class="post post-widget">
                            <a class="post-img" href="<?= site_url('post-detail/' . $item->slug) ?>"><img
                                        src="<?= site_url() ?>public/assets/img/posts/<?= $item->postImage ?>"
                                        alt=""></a>
                            <div class="post-body">
                                <h3 class="post-title"><a
                                            href="<?= site_url('post-detail/' . $item->slug) ?>"><?= $item->title ?></a>
                                </h3>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="aside-widget">
                    <div class="section-title">
                        <h2>Categories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            <?php foreach ($categories as $category): ?>
                                <li><a href="<?= site_url('posts-by-category/' . $category->category_slug) ?>"
                                       class="cat-<?= $category->category_color ?>"><?= $category->name ?>
                                        <span><?= $category->nb_categories ?></span></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>


<!--                <div class="aside-widget">-->
<!--                    <div class="tags-widget">-->
<!--                        <ul>-->
<!--                            <li><a href="#">Chrome</a></li>-->
<!--                            <li><a href="#">CSS</a></li>-->
<!--                            <li><a href="#">Tutorial</a></li>-->
<!--                            <li><a href="#">Backend</a></li>-->
<!--                            <li><a href="#">JQuery</a></li>-->
<!--                            <li><a href="#">Design</a></li>-->
<!--                            <li><a href="#">Development</a></li>-->
<!--                            <li><a href="#">JavaScript</a></li>-->
<!--                            <li><a href="#">Website</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->


<!--                <div class="aside-widget">-->
<!--                    <div class="section-title">-->
<!--                        <h2>Archive</h2>-->
<!--                    </div>-->
<!--                    <div class="archive-widget">-->
<!--                        <ul>-->
<!--                            <li><a href="#">January 2018</a></li>-->
<!--                            <li><a href="#">Febuary 2018</a></li>-->
<!--                            <li><a href="#">March 2018</a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->

            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>
