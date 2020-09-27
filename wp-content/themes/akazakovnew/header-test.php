<?php
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class = "ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class = "ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
    <base href="<?=get_template_directory_uri()."/";?>"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <title><?php  the_title(); ?></title>
    <link href="/favicon.png" rel="shortcut icon" type="image/x-icon" />
    <?php wp_head(); ?>


    <style>
        * {
            margin: 0;
            padding: 0;
            font-size: 100%;

        }

        html {
            padding: 0;
        }

        ul {
            list-style: none;
        }

        .comments_block, .vk,.fb,.tw,.gp,.yo,.voskl,.tsutata,.arrow,.icon_name, .icon_email,.h-form .submit, .f-form .submit, .icon_date,.icon_category,.icon_comment{

        }

        html.webp .comments_block, html.webp .vk,html.webp .fb,html.webp .tw,html.webp .gp,html.webp .yo,html.webp .voskl,html.webp .tsutata,html.webp .arrow,html.webp .icon_name, html.webp .icon_email,html.webp .h-form .submit, html.webp .f-form .submit, html.webp .icon_date,html.webp .icon_category,html.webp .icon_comment,
        html.no-js .comments_block, html.no-js .vk,html.no-js .fb,html.no-js .tw,html.no-js .gp,html.no-js .yo,html.no-js .voskl,html.no-js .tsutata,html.no-js .arrow,html.no-js .icon_name, html.no-js .icon_email,html.no-js .h-form .submit, html.no-js .f-form .submit, html.no-js .icon_date,html.no-js .icon_category,html.no-js .icon_comment{
            background-image : url('https://alexandrkazakov.com/wp-content/webp-express/webp-images/doc-root/wp-content/themes/akazakov/images/sprite.png.webp');background-repeat:no-repeat;
        }
        html.no-webp .comments_block, html.no-webp .vk,html.no-webp .fb,html.no-webp .tw,html.no-webp .gp,html.no-webp .yo,html.no-webp .voskl,html.no-webp .tsutata,html.no-webp .arrow,html.no-webp .icon_name, html.no-webp .icon_email,html.no-webp .h-form .submit, html.no-webp .f-form .submit, html.no-webp .icon_date,html.no-webp .icon_category,html.no-webp .icon_comment{
            background-image : url('images/sprite.png'); background-repeat:no-repeat;
        }

        .vk{
            background-position: 0 -131px;
        }
        .fb{
            background-position:-33px -131px;
        }
        .tw{
            background-position:-65px -131px;
        }
        .single-head-wrap{
            background: url('images/bg_header_blok.png') top center no-repeat #f4f4f4;
        }

        header {
            width: 100%;
            min-width: 320px;
            z-index: 100;
        }
        .clear{
            clear:both;
        }
        .top-menu-head{
            word-wrap: break-word;
            z-index: 100;
            background: #f4f4f4;
        }

        .wrap-top-menu-head,.header-inforamation-wrap,
        .pre-footer, .footer_navigation_wrap,
        .post-footer-wrap,.head_story,main{
            width:80%;
            margin: 0 auto;
            max-width: 1008px;
        }
        .wrapper {
            margin: auto;
            font-family: "Open Sans",Arial, sans-serif;
            width: 100%;
            min-width: 320px;
        }
        .head-title {
            float: left;
            padding: 15px 0;
        }
        .head-title a,
        .head-title a span{
            font: bold 15px "Trebuchet MS", Arial, sans-serif;
            color: #2a2a2a;
            text-transform: uppercase;
            text-decoration: none;
        }
        .thumbnail{
            position:relative;
            min-height: 100px;
        }
        .thumbnail img{
            width:730px;
            max-height:335px !important;
            position: relative;
            left: 15px;

        }
        .one_post{
            margin-top:50px;
            display: table;
            position: relative;
        }
        .h_thumb {
            position: absolute;
            top: 0px;
            width: 100%;
            z-index: 1;
        }

        .h_thumb h1, .h_thumb h2{
            left: 15px;    width: 98%;
        }
        .attachment_header{
            text-align : center; padding : 250px 0 0;
        }
        .h_thumb h1, .h_thumb h2, .attachment_header h1 {
            background: none repeat scroll 0 0 rgba(55, 72, 80, 0.9);
            padding-bottom: 18px;
            padding-top: 1px;
            position: relative;
        }
        .h_thumb h1 span, .h_thumb h2 span{
            margin-left: 30px;
        }
        .h_thumb h1 span, .h_thumb h2 span, .attachment_header h1 span,
        .h_thumb h1, .h_thumb h2, .attachment_header h1{
            display:block;
            color: #fff;
            font-size: 18px;
            font-family: "Trebuchet MS";
            text-transform: uppercase;
            font-weight: bold;
            line-height: 22px;
            margin: 0;
            left: 0;
            padding: 10px 0 10px 16px;
        }
        .attachment_header h1 {
            display : inline-block; margin : auto; padding : 0 15px 18px;
        }
        .site-navigation {
            float: right;
            z-index: 100;
        }

        .site-navigation ul {
            margin: 0;
            display: block;
        }

        .site-navigation li {
            word-wrap: break-word;
            position: relative;
            z-index: 100;
            padding-right: 20px;
            padding-left:20px;
            border-right:1px solid #ccc;
            margin: 15px 0px 15px 0px;
            display: inline-block;
        }
        .site-navigation li a {
            font: 16px "Trebuchet MS", Arial, sans-serif;
            color: #374750;
            text-decoration: none;
            display: block;

        }
        .site-navigation li:last-child{
            padding-right: 0px;
            border-right:none;
        }
        .site-navigation li a:hover {
            color: #3c7f7f;
        }
        .site-navigation li a:active {
            color: #000;
        }

        .site-navigation .current_page_item a,
        .site-navigation .current_page-item a {
            border-bottom: 1px dotted #374750;
        }

        .arrow {
            background-position:-175px -132px;
            background-attachment:scroll;
            bottom: 10px;
            height: 30px;
            position: absolute;
            right: -43px;
            width: 70px;
        }


        .header-line{
            background: url(images/header-line.png) repeat-x;
            width: 100%;
            height:7px;
        }
        .head_p .h-form{
            float:left;
            margin-top: 22px;
        }
        .head_p .h-form input[type='text']{
            border:1px solid #b6b6b6;
        }
        .h-form{
            margin-left: 40px;
            width:220px;
            float: right;
        }
        .h-form input[type='text'], .f-form input[type='text']{
            background: none repeat scroll 0 0 #ECECEC;
            border: medium none;
            border-radius: 3px;
            font-size: 15px;
            height: 30px;
            margin-bottom: 12px;
            padding: 0 0 3px 33px;
            width: 190px;
        }
        .h-form div, .f-form div{
            position: relative;
        }
        .email .icon_email, .name .icon_name{
            height: 14px;
            left: 12px;
            position: absolute;
            top: 10px;
            width: 16px;
        }
        .icon_name{
            background-position:-161px -132px;
        }
        .icon_email{
            background-position:-161px -148px;
            top:13px !important;
        }
        .h-form .submit, .f-form .submit{
            border:none;
            background-position:-17px -164px;
            width:225px;
            height:42px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            text-shadow:0px 1px 0px #e5e5ee;
            filter: dropshadow(color=#e5e5ee,offX=0,offY=1);
            background-color:transparent;
        }
        .main_title{
            border-bottom: 1px dotted #000000;
            font-size: 24px;
            font-weight: bold;
            padding-bottom: 20px;
            text-transform: uppercase;
            width: 100%;

        }
        .site-content {
            float: left;
            width: 745px;
            margin-top: 10px;
        }

        .site-content a {
            font: 15px "Open Sans",Arial, sans-serif;
            color: #3d8fd5;
            text-decoration: none;
        }

        .site-content a:hover {
            text-decoration: underline;
        }
        .main-post-dot{
            border-bottom:1px dotted #999999;
            padding-bottom:20px;
        }
        .main-post-dot:last-child{
            border-bottom:none !important;
        }
        .camp-post-header {
            min-width: 0;
        }

        .camp-post-header .camp-post-title {
            font: 18px 'Trebuchet MS',Arial, sans-serif;
            font-weight: bold;
            color: #747474;
            padding: 25px 0 25px 0;
        }

        .camp-post-header .camp-post-title a {
            font: 18px 'Trebuchet MS',Arial, sans-serif;
            font-weight: bold;
            color: #747474;
            text-transform: uppercase;
        }

        .camp-post-header .camp-post-meta {
            font: 13px "Open Sans",Arial, sans-serif;
            color: #aaa;
            letter-spacing: -0.15px;
            padding: 0 0 19px 0;
        }

        .camp-post-header .camp-post-meta a {
            font: 13px "Open Sans",Arial, sans-serif;
            color: #aaa;
            margin-left: 4px;
            text-decoration: none;
        }
        .site-content p {
            font: 15px "Open Sans",Arial, sans-serif;
            color: #000 /*rep*/;
            line-height: 1.68;
            padding-bottom: 20px;
        }

        .site-content p a {
            /*	font: 13px "Open Sans",Arial, sans-serif;*/
            color: #3d8fd5;
            text-decoration: none;
        }
        .camp-post-meta > span{
            padding-right: 14px;
            border-right: 1px solid #cecece;
            padding-left: 10px;
            font-size:11px;
            color:#717171;
        }
        .camp-post-meta > span:first-child{
            padding-left:0;
        }
        .camp-post-meta > span:last-child{
            border:none;
        }

        .post_icon{
            display: inline-block;
            height: 16px;
            margin-right: 5px;
            position: relative;
            top: 2px;
            width: 16px;
        }
        .camp-post-meta > span a{
            text-decoration: none;
            font-size:11px;
            color:#717171;
        }
        .icon_date{
            background-position:-245px -132px;

        }
        .icon_category{
            background-position:-261px -132px;
        }
        .icon_comment{
            background-position:-277px -132px;
        }
        .icon_view{background-image:url(images/icon_view.png); background-repeat:no-repeat;}
        .post_content img {
            max-width:215px;
            height: auto;
            float: left;
            display: block;
        }
        .other_post{
            margin-left:30px;
            max-width: 500px;
            float: right;
        }
        aside {
            margin: 53px 0 0 40px;
            display: inline-block;
            width: 221px;
        }

        aside p {
            font: 15px "Open Sans",Arial, sans-serif;
            color: #000 /*rep*/;
        }

        aside ul {
            margin: 0;
        }

        aside li {
            list-style: none;
        }
        .widget {

            margin-bottom: 30px;
            word-wrap: break-word;
        }

        .widget li {
            list-style: none;
            margin-bottom: 8px;
        }

        .widget li:first-child {
            margin-top: 27px;
        }

        .widget .camp-select li:first-child {
            margin-top: 8px;
        }

        .widget li ul {
            margin-left: 20px;
        }

        .widget li ul li:first-child {
            margin-top: 5px;
        }

        .widget h2, .widget span.widgettitle, .related-posts .title{
            font-size: 23px;
            font-weight: bold;
            text-transform: uppercase;
            width: 100%;
            margin-bottom:22px;
            display: block;
            margin-block-start: 0;
            margin-block-end: 0.83em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
        }

        .widget a {
            font: 13px "Open Sans",Arial, sans-serif;
            color: #858585;
            margin-top: 8px;
            text-decoration: none;
        }

        .widget a:hover {
            color: #3d8fd5;
        }

        .widget img {
            max-width: 255px;
            height: auto;
        }
        .comments_block {
            background-position:0 -207px; background-color:rgba(0, 0, 0, 0); background-attachment:scroll;
            display: table;
            height: 37px;
            left: 2px;
            position: relative;
            top: -6px;
            width: 167px;
        }
        .comments_block span{
            color: #1a1a1a;
            font-size: 14px;
            font-family: "Trebuchet MS";
            text-transform: uppercase;
            margin-top: 15px;
            font-weight: bold;
            text-align: center;
            display:block;
        }

        .single_post_content{
            margin-top:30px;
        }
        .single_post_content h1{
            color:#333;
            font-size: 32px;
            margin-top:15px;
            margin-bottom: 35px;font-weight : bold;
        }
        .single_post_content h2{
            color:#333;
            font-size: 28px;
            margin-top:15px;
            margin-bottom: 35px;font-weight : bold;
        }
        .single_post_content h3{
            color:#333;
            font-size: 24px;
            margin-top:15px;
            margin-bottom: 35px; font-weight : bold;
        }
        @media only screen and (max-width: 1300px) {
            main{
                width: 95%;
            }
            img.alignleft{
                width: 19vw;
                max-width: 483px;
                height: auto;
                min-width: 180px;
            }
            img.aligncenter{
                width: 55vw;
                height: auto;
                max-width: 750px;
                min-width: 180px;
            }
        }
        @media only screen and (max-width: 1250px){
            .wrap-top-menu-head{
                width: 90%;
            }
            .site-navigation li{
                padding: 0 1%;
            }
            .head-title{
                width: 32%;
            }
            .site-navigation {
                width: 68%;
                white-space: nowrap;
                text-align: right;
            }
            .one_post{
                display: block;
            }
            main {
                width: 100%;
            }
            .thumbnail img{
                width: 65vw!important;
                min-width: 260px;
                height: auto;
                max-width: 730px;
            }
            .h_thumb h1, .h_thumb h2{
                width: 95%;
                min-width: 260px;
                text-align: center;
            }
            .sr-box{
                width: 225px!important;
            }
            aside{
                width: 22%;
                margin: 53px 0 0 0;
            }
            .site-content{
                width: 77%;
                margin-right: 3px;
            }
            .page_kontakty .site-content,
            .history_content{
                width: 100%;
            }
            .content_content{
                margin: 45px auto;
            }
            .post_content img{
                margin-right: 15px;
            }
            .other_post{
                max-width: 100%;
                float: none;
            }

        }
        @media only screen and (max-width: 1050px) {
            .wrap-top-menu-head{
                width: 95%;
            }
            .h_thumb {
                position: relative;
                top: 37px;
            }
        }
        @media only screen and (max-width: 992px) {
            .page .h-form{
                margin-left: 5px!important;
            }
            .info_p{
                width: 55%!important;
            }
            .page .head_p,
            .single .head_p{
                width: 80%;
                margin: auto;
            }
        }
        @media only screen and (max-width: 950px) {
            .thumbnail{
                text-align: center;
            }
            .thumbnail img{
                left: 0px!important;
            }
            .h_thumb h1, .h_thumb h2{
                width:100%!important;
                left: 0;
                padding:10px 16px!important;
            }
            .h_thumb{
                top: 0;
                margin: 0 0 15px 0;
                position:relative!important;
            }
            .head-title,.site-navigation{
                float: none;
                text-align: center;
                width: 100%;
            }
            aside{
                display: none;
            }
            .site-navigation {
                white-space: normal;
            }
            .icon-contact,
            .site-content a{
                display: inline-block;
                float: none;
            }
            .site-content{
                width: 100%;
            }
            .site-navigation li a{
                font-size: 25px;
            }
            .h-form{
                margin-left: 0;
            }
            .comments_block{
                display: none!important;
            }
        }
        @media only screen and (max-width: 920px) {
            .post_content img{
                margin-right: 10px;
            }
            .other_post{
                max-width: 100%;
                float: none;
            }
        }
        @media only screen and (max-width: 800px) {
            .attachment img{
                width: 84vw;
                height: auto;
                max-width: 628px;
                min-width: 280px;
            }
            .attachment .camp-post-meta{
                display: block;
            }

            #content > div:nth-child(2),
            #content > div > div:nth-child(1){
                margin-top: 15px;
            }
            #content > div:nth-child(2) > header > h3 {
                padding: 0 0 15px 0!important;
            }
            .page .header-inforamation-wrap,
            .single .header-inforamation-wrap{
                width: 100%;
            }
            .page .head_p,
            .single .head_p{
                width: 95%;
            }
            .camp-post-meta{
                display: none;
            }
            .header-inforamation-wrap {
                width: 90%;
            }
            .other_post {
                width: 100%;
                margin-left: 5px;
            }
        }
        @media only screen and (max-width:690px) {
            .single #content > div:nth-child(1) .thumbnail,
            .archive #content > div:nth-child(2) .thumbnail,
            .page_blog #content > div:nth-child(2) .thumbnail{display:none;}
            .page_blog .h-form,
            .single .h-form{
                margin: 30px auto;
                width: 100%;
            }
            .info_p {
                display: none;
            }
            main {
                width: 81%;
            }
        }
        @media only screen and (max-width:640px) {

            .attachment .head_proj{
                background: none;
                height: auto;
            }
            .attachment .navigation>div{
                padding: 0 12px;
            }
            .attachment .camp-post-meta>span, .arrow{
                display: none;
            }
            .attachment .navigation{
                white-space: nowrap;
            }
            .attachment .navigation a{
                font-size: 16px;
            }
            .attachment .attachment_header{
                padding: 50px 0 0 0;
            }
            .attachment.image-attachment{
                padding: 0 0 20px;
            }
            .wrap-top-menu-head{
                width: 90%;
            }

            .head-title{
                float: right;
                text-align: left;
                width: 81%;
                margin-left: 55px;
            }
            #main_title{
                font-size: 24px;
            }

            .site-navigation {
                width: 45px;
                padding: 5px 0;
                position: relative;
                top: 4px;
                border: solid 1px #efb32b;
                background: #efb32b url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACsAAAAqCAYAAAAqAaJlAAABfElEQVRYhe2ZPUsDQRCGDxTbYGVhEfxAbaz8C2kEGwtrG7nWSqztLG0s0gvC/YVDLGwVLG38AYKEVEIaxxnyLr7Z5jwS7kZuBx52s7tz+yQ3e1ckE5GMOFYelC9xGEFyRblv2aUyguwNPk+UK2VPWXVCn2X3lW9wJLNl4YEey96if+dArFL2Df1DB2KVshP0NxyIVcqG6DkQ65Zs09Ed2aZfAt2p2bZJsi5km47uyKZHVw2SbJKtK9t0dEc2PbpqkGRblx1grkR7DSxGNp9pyLTWSho/wXjIL9C+U45gntfNJZtjLo82NrmhbY6NSxoPOZvUv8RcQTnhurzPQmQzWjuzAW0cx4DXYF2c05psnkXhVdZu77NMb73d7oM/yFr9DuW3POaWjQtfJDoUdMAKulbJB4xkOcf6I6xfiKwHduE3/g+yF/B79C67rnzC79Sz7JryAjdrl1i2L+3/2WFsKefKB7ys3bYvwLIe41XZEfzaHmXHypNypiwLlcYPYVkGqDntOcMAAAAASUVORK5CYII=') 50% 50% no-repeat;
                border-top-left-radius: 7px;
                border-top-right-radius: 3px;
                border-bottom-right-radius: 7px;
                border-bottom-left-radius: 3px;
                height: 34px;
                min-height: 22px;
            }
            .site-navigation ul {
                padding: 5px 0 !important;
                position: absolute;
                top: 0;
                left: 0;
                background-color: #F4F4F4;
                text-align: left;
                box-shadow: 0 1px 2px rgba(0,0,0,.3);
                display: none ;
                width: 282px;
            }
            nav a {
                display: block;
                padding: 5px 5px 5px 32px;
                text-align: left;
            }
            .site-navigation .current_page_item a, .site-navigation .current_page-item a,
            .site-navigation li{
                border:none;
            }
            .site-navigation li a{
                white-space: nowrap;
            }
            .site-navigation li a:hover{
                color:#5B7BD5;
            }
        }
        @media only screen and (max-width:520px) {
            .single-head-wrap{
                background-image: none;
            }
            .h-form{
                width: 100%;
            }
            .home .sr-box{
                margin:0 auto;
            }
            .site-content form {
                padding-left: 5px;
            }
            main {
                width: 78%;
            }
        }
        @media only screen and (max-width:450px) {
            .sr-box,.page .h-form > form{
                margin: auto;
            }
            .alignleft{
                float: none;
            }
        }
        @media only screen and (max-width:351px) {
            .site-content form {
                padding-left: 0px;
            }
        }
        @media only screen and (max-width:392px) {
            .head-title{
                width: 170px;
                margin: 0 15% 0 0;
            }
            .site-navigation{
                top: 12px;
            }
        }
    </style>
    
    
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '533607070149898');
        fbq('track', 'PageView');
    </script>

    <noscript>
        <img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=533607070149898&ev=PageView&noscript=1"/>
    </noscript>
    <!-- End Facebook Pixel Code -->

    <!-- Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NLP49R7');</script>
    <!-- End Google Tag Manager -->
</head>

<body class="page_<?=$slug;?> <? if ( is_home() || is_front_page() ){ echo 'home';} else {echo 'inside';}?> <? if ( is_attachment() ){ echo 'attachment';} else if ( is_single() ){ echo 'single';} else if ( is_archive() ){ echo 'archive';} else if ( is_page() ){ echo 'page';} else {echo 'other';}?>">
<h2>header-test</h2>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NLP49R7" height="0" width="0" style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div class = "wrapper">

    <header>
        <div class = "top-menu-head">
            <div class="wrap-top-menu-head">
                <div class = "head-title">
                    <a href = "<?php echo home_url(); ?>" style = "color:#<?php header_textcolor(); ?>"><?php bloginfo( 'name' ); ?></a>
                </div>
                <nav class = "site-navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'head' ) );?>
                </nav>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </header>
    
    
    <!-- ManyChat -->
    <script src="//widget.manychat.com/150828645374452.js" async></script>

    <script data-ad-client="ca-pub-9774517044097767" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
