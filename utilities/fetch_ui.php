<?php
    if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
        header("Location: ../403.php");
    }
    //Navigation
    require("ui/navigation.php");

    //Footer
    require("ui/footer.php");

    //Index page
    require("ui/index_page.php");

    //Listing
    require("ui/listing.php");

    //404
    require("ui/404.php");

    //About us
    require("ui/about_us_page.php");

    //Contacts
    require("ui/contacts_page.php");

    //Privacy
    require("ui/privacy.php");

    //Terms of Service
    require("ui/tos.php");

    //All posts search
    require("ui/all_posts_search.php");

    //Create listing
    require("ui/create_listing.php");

    //Sign in
    require("ui/sign_in.php");

    //Register
    require("ui/register.php");

    //Edit profile
    require("ui/edit_profile.php");

    //Edit post
    require("ui/edit_post.php");

    //Profile page
    require("ui/profile_page.php");

    //Post page
    require("ui/post_page.php");

    //Message page
    require("ui/message_page.php");

    //Dashboard
    require("ui/dashboard.php");