<footer class="page-footer font-small mdb-color pt-4">
    <div class="container text-center text-md-left">
        <div class="row text-center text-md-left mt-3 pb-3">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">
                    <?php echo $title; ?>
                </h6>
                <p>
                    <?php echo $footer_text; ?>
                </p>
            </div>
            <hr class="w-100 clearfix d-md-none" />
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold"><?php echo $technologies; ?></h6>
                <p>
                    <a href="https://mdbootstrap.com">MDBootstrap</a>
                </p>
                <p>
                    <a href="https://vuejs.org">VueJS</a>
                </p>
                <p>
                    <a href="https://vuematerial.io">Vue Material</a>
                </p>
                <p>
                    <a href="https://www.php.net">PHP 7</a>
                </p>
            </div>
            <hr class="w-100 clearfix d-md-none" />
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">
                    <?php echo $useful_links; ?>
                </h6>
                <p>
                    <a href="profile.php"><?php echo $your_account; ?></a>
                </p>
                <p>
                    <a href="about_us.php"><?php echo $about; ?></a>
                </p>
                <p>
                    <a href="news.php"><?php echo $blog ?></a>
                </p>
                <p>
                    <a href="privacy.php"><?php echo $privacy; ?></a>
                </p>
                <p>
                    <a href="tos.php"><?php echo $tos; ?></a>
                </p>
            </div>
            <hr class="w-100 clearfix d-md-none" />
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold"><?php echo $contacts; ?></h6>
                <p><i class="fas fa-home mr-3"></i> <?php echo $address; ?></p>
                <p><i class="fas fa-envelope mr-3"></i> devit@gmail.com</p>
                <p><i class="fas fa-phone mr-3"></i> +359 000 000 000</p>
            </div>
        </div>
        <hr />
        <div class="row d-flex align-items-center">
            <div class="col-md-7 col-lg-8">
                <p class="text-center text-md-left">
                    © <?php echo date("Y") ?> <?php echo $copyright; ?>
                    <strong> <?php echo $title; ?></strong>
                </p>
            </div>
            <div class="col-md-5 col-lg-4 ml-lg-0">
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="https://facebook.com" class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://twitter.com" class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://accounts.google.com/signin"
                                class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="https://www.linkedin.com" class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>