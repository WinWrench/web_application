<!DOCTYPE html>
<?php 
//$level=$this->session->userdata('userlevel');
//echo $level;
?>
<html>
<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/font.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/font-awesome.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/normalize.css"/>
    <!--css plugin-->
    <link rel="stylesheet" href="<?php echo base_url();?>css/flexslider.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery.nouislider.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/jquery.popupcommon.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/style.css"/>
    <!--[if IE 9]>
    <link rel="stylesheet" href="../css/ie9.css"/>
    <![endif]-->
    <!--[if lte IE 8]>
    <link rel="stylesheet" href="../css/ie8.css"/>
    <![endif]-->

    <link rel="stylesheet" href="<?php echo base_url();?>css/res-menu.css"/>
    <link rel="stylesheet" href="<?php echo base_url();?>css/responsive.css"/>
    <!--[if lte IE 8]>
    <script type="text/javascript" src="../js/html5.js"></script>
    <![endif]-->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-53961033-1', 'auto');
        ga('send', 'pageview');
function sub()
{
   var sys_email=document.getElementById('sys_mail').value;
   var sys_pass=document.getElementById('pass').value;

   $.ajax({
      url:'<?php echo base_url();?>home/validate',
      type:'post',
      async:false,
      data:{sys_email:sys_email,
           sys_pass:sys_pass},
      success:function(data){
            location.href='<?php echo base_url();?>home';
    },
   });
}
    </script>

</head>
<body class=""><!--<div class="alert_w_p_u"></div>-->
    <!--test-->
<div class="container-page">
<div class="mp-pusher" id="mp-pusher">
<?php include 'header.php';?>
<?php include 'mobile-nav.php';?>
<!--<?php //include 'banner.php';?>-->
<div class="grid_frame page-content">
    <?php include 'subscription.php'; ?>
</div>
<?php include 'filter.php';?>
 <link rel="stylesheet" href="<?php echo base_url();?>css/Date.css">
<script src="<?php echo base_url();?>js/jquery-1.10.2.js"></script>
<script src="<?php echo base_url();?>js/date.js"></script>
<script type="text/javascript">

 $(document).ready(function (){
 });
  $(function() {
     $("#date").datepicker({ dateFormat: 'dd-mm-yy',changeMonth: true,
      changeYear: true,yearRange: "-80:+1" });
 });
</script>


<div class="grid_frame page-content">
<div class="container_grid">
<div class="mod-grp-coupon block clearfix">
    <div class="grid_12">
        <h3 class="title-block has-link">
            New Coupons
            <a href="#" class="link-right">See all <i class="pick-right"></i></a>
        </h3>
    </div>
    <div class="block-content list-coupon clearfix">
        <?php  foreach ($coupens as $data) { 
           
         $val   =  json_decode($data->coupen_images);
            $coupenpicname =  array_pop($val);
            $coupenurl= base_url()."coupenimages/$coupenpicname";
             $startdate=$data->startdate;
            $enddate=$data->enddate;
            $date1 = new DateTime("$startdate");
           $date2 = new DateTime("$enddate");
           $interval = $date1->diff($date2);?>
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo $coupenurl;?>" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand"><?php echo $data->coupen_title;?> </div>
                    <div class="coupon-desc"><?php echo $data->coupen_description;?></div>
                    <div class="time-left"><?php echo $interval->days;?></div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <?php } ?>
        <!--<div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php //echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
       
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php //echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
       
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php// echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>-->
      
    </div>
</div>
<!--end block: New Coupons-->
<div class="mod-grp-coupon block clearfix">
    <div class="grid_12">
        <h3 class="title-block has-link">
            Featured Coupons
            <a href="#" class="link-right">See all <i class="pick-right"></i></a>
        </h3>
    </div>
    <div class="block-content list-coupon clearfix">
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
        <div class="coupon-item grid_12">
            <div class="coupon-content">
                <div class="img-thumb-center grid_8">
                    <div class="wrap-img-thumb">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_01.jpg" alt="$COUPON_TITLE"></a>
                    </div>
                </div>
                <div class="grid_4"><div class="coupon-price">$2.00 Off</div>
                    <div class="coupon-brand">Wallmart</div>
                    <div class="coupon-desc">Find Parts for All Major Brands at Sears PartsDirect</div>
                    <div class="time-left">9 days 4 hours left</div></div>
                <a class="btn btn-blue btn-take-coupon grid_4" href="#">Grab it!</a>
            </div>
            <i class="stick-lbl hot-sale"></i>
        </div>
        <!--end: .coupon-item -->
    </div>
    <a class="grid_6 btn btn-orange btn-load-more" href="#">Load more coupon</a>
</div>
<!--end block: Featured Coupons-->
<div class="mod-brands block clearfix">
    <div class="grid_12">
        <h3 class="title-block has-link">
            POPULAR BRANDS (129)
            <a href="#" class="link-right">See all <i class="pick-right"></i></a>
        </h3>
    </div>
    <div class="block-content list-brand clearfix">
        <div class="brand-item grid_4">
            <div class="brand-content">
                <div class="brand-logo">
                    <div class="wrap-img-logo">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_07.jpg" alt="$BRAND_TITLE"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--end: .brand-item -->
        <div class="brand-item grid_4">
            <div class="brand-content">
                <div class="brand-logo">
                    <div class="wrap-img-logo">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_07.jpg" alt="$BRAND_TITLE"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--end: .brand-item -->
        <div class="brand-item grid_4">
            <div class="brand-content">
                <div class="brand-logo">
                    <div class="wrap-img-logo">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_07.jpg" alt="$BRAND_TITLE"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--end: .brand-item -->
        <div class="brand-item grid_4">
            <div class="brand-content">
                <div class="brand-logo">
                    <div class="wrap-img-logo">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_07.jpg" alt="$BRAND_TITLE"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--end: .brand-item -->
        <div class="brand-item grid_4">
            <div class="brand-content">
                <div class="brand-logo">
                    <div class="wrap-img-logo">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_07.jpg" alt="$BRAND_TITLE"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--end: .brand-item -->
        <div class="brand-item grid_4">
            <div class="brand-content">
                <div class="brand-logo">
                    <div class="wrap-img-logo">
                        <span class="ver_hold"></span>
                        <a href="#" class="ver_container"><img src="<?php echo base_url();?>images/ex/01_07.jpg" alt="$BRAND_TITLE"></a>
                    </div>
                </div>
            </div>
        </div>
        <!--end: .brand-item -->
    </div>
</div>
<!--end: .mod-brand -->
</div>
</div>
<?php include 'footer.php'; ?>
</div>
</div>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.10.2.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.nouislider.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.popupcommon.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/html5lightbox.js"></script>
<!--//js for responsive menu-->
<script type="text/javascript" src="<?php echo base_url();?>js/modernizr.custom.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/classie.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/mlpushmenu.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/script.js"></script>

<!--[if lte IE 9]>
<script type="text/javascript" src="../js/jquery.placeholder.js"></script>
<script type="text/javascript" src="../js/create.placeholder.js"></script>
<![endif]-->
<!--[if lte IE 8]>
<script type="text/javascript" src="../js/ie8.js"></script>
<![endif]-->

</body>

</html>