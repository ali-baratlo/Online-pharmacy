<?php
require_once '../connectDB/config.php';

@$customer = $_GET['customer'];
@$tel = $_GET['tel'];
@$address = $_GET['address'];
@$sumprice = $_GET['sumprice'];

if(isset($_POST['Purchase'])){

    @$customer = $_GET['customer'];
    @$tel = $_GET['tel'];
    @$address = $_GET['address'];
    @$sumprice = $_GET['sumprice'];

    $code = rand(10000000, 99999999);


    $session = $_SESSION;
    $cart = [];
    foreach ($session as $keySession => $value) {
        if (substr($keySession, 0, 5) == 'cart_') {
            $cart[$keySession] = $value;
        }
    }

    foreach ($cart as $item => $values):
        $sumprice += $values['price'];
    endforeach;


    $query = mysqli_query($connection, "Insert Into orders(customer,tel,address,priceCol,dateOrder,status,trackCode) values('$customer','$tel','$address','$sumprice','1400/08/30','پرداخت شده','$code')");
    foreach ($cart as $item => $values):
        {
            $productDT = $values['name'];
            $quantityDT = $values['quantity'];
            $priceDT = $values['price']/ $values['quantity'];
            $totalDT = $values['price'] ;
            $trackCodeDT = $code;
            $image = $values['image'];
            $queryDT = mysqli_query($connection, "Insert Into orderdetails(nameProduct,quantity,price,total,trackCode,image) values('$productDT','$quantityDT','$priceDT','$totalDT','$trackCodeDT','$image')");
        }
    endforeach;

    header("location: success.php");

}




if(isset($_POST['Cancel'])){

header("location: unsuccess.php");
}



?>



<!DOCTYPE html>
<html lang="fa_IR">

<!-- Mirrored from sep.shaparak.ir/OnlinePG/SendToken?token=7fc84b76d9bd400e98fdbf1dae4b6f46 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 14:34:29 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>

    <style>

        @font-face {
            font-family: MyFont;
            src: url('../fonts/Vazir-Bold.eot');
            src: url('../fonts/Vazir-Bold.ttf');
            src: url('../fonts/Vazir-Bold.woff');
            src: url('../fonts/Vazir-Bold.woff2');
        }
        *{
            font-family: MyFont,serif;
        }
        body{
            font-family: MyFont,serif;

        }
    </style>


    <title>درگاه پرداخت اینترنتی سِپ - پرداخت الکترونیک سامان</title>

    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge,10,11" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="pragma" content="no-cache" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

    <meta name="viewport" content="width=device-width, user-scalable=0, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="description" content="درگاه پرداخت اینترنتی سِپ" />

    <meta name="robots" content="noindex, nofollow" />
    <meta name="language" content="fa_IR" />

    <link rel="icon" type="image/png" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/favicon.ico" />
    <link rel="icon" type="image/png" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/favicon.png" />
    <link rel="shortcut icon" type="image/png" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/favicon.png" />
    <link rel="apple-touch-icon" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/apple-touch-icon.png">

    <link rel="icon" type="image/png" sizes="16x16" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/favicon-16x16.png" />
    <link rel="icon" type="image/png" sizes="32x32" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/favicon-32x32.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="https://sep.shaparak.ir/OnlinePG/bundle/fav/android-chrome-512x512.png">

    <!--[if !IE]>-->
    
<!--<script type="text/javascript">-->
<!--  var areaName = "OnlinePG", userSessionKey = "aCHQlQYS3Ag", userCellNumber = "", culture = "fa", hostAddress = "https://sep.shaparak.ir/OnlinePG", serverUrl = "https://sep.shaparak.ir/OnlinePG", actionUrl = "/OnlinePG/OnlinePG", removeEmailUrl = "/OnlinePG/OnlinePG/fa/Payment/RemoveEmail", autoHideMessageTimeOut = 1700, deActiveCardEnabled = "True";-->
<!--    var otpSettings = {-->
<!--        maxTriesCount: 5, maxTriesMessage: "پیام حداکثر تعداد درخواست رمز یکبار مصرپ", otpTimeOut: 120, otpTryAgainMessage: "مشتری گرامی، چنانچه قبلا نسبت به پویاسازی رمز دوم خود اقدام نموده و از صحت اطلاعات واردشده اطمینان دارید ولی هنوز رمز دوم پویا را دریافت نکرده اید، مجددا دکمه درخواست رمز پویا رابفشارید .", baseUrl: "https://sep.shaparak.ir/OnlinePG", otpTryAgainButtonTitle: "دریافت مجدد رمز پویا"-->
<!--    };-->
<!--    var giftCardHintMessage = "کاربر گرامی؛ کارت هدیه شما نیاز به دریافت رمز پویا ندارد خواهشمند است از رمز دوم ثابت کارت هدیه خود استفاده نمایید.";-->
<!--    var langs = {-->
<!--        more: "بیشتر", less: "کمتر", virtualNumPad: "صفحه کلید امن", bank: "بانک", otpButton: "درخواست رمز پویا", serviceUnavailable: "سرویس در حال حاضر در دسترس نیست",-->
<!--        neverMind: "انصراف", addNewCard: "افزودن کارت جدید", cardsManagement: "مدیریت کارت‌ها", deleteCard: "حذف", validations: {-->
<!--            invalidValue: "مقدار وارد شده صحیح نیست", invalidEmailAddress: "ایمیل وارد شده صحیح نمی‌باشد", invalidCellNumber: "شماره موبایل ارسالی درست نمی‌باشد", cardExpired: "کارت شما منقضی شده است"-->
<!--        }-->
<!--    };-->
<!--</script>-->

    <link href="https://sep.shaparak.ir/OnlinePG/bundle/css/app?v=1CSfGjE1Ziej9i-8R6PSRnz8EoRmoK9sPOd-ZOM8WSQ1" rel="stylesheet"/>

<!--<script src="https://sep.shaparak.ir/OnlinePG/bundle/js/libs/jquery?v=JVmL_1bWNxy6hIQMInR3kflSJ3JX5mrrXPqTx6RiBW81"></script>-->

<!--<script src="https://sep.shaparak.ir/OnlinePG/bundle/js/libs/jquery/validate?v=oHnU__AYxnbG6HOK9JQdkZPbj2-RUf975ZvIIg2KQj81"></script>-->

<!--<script src="https://sep.shaparak.ir/OnlinePG/bundle/js/libs/helpers?v=Y8lrXjOnM4A65IB5DQt7YBnC0h39wUyv1yj2QSShT4g1"></script>-->


<!--<script src="https://sep.shaparak.ir/OnlinePG/baseData/panBinsList"></script>-->

<!--<script src="https://sep.shaparak.ir/OnlinePG/bundle/js/app?v=57jAuaMg6HHy2BUsv6z2fNgtpRRajUoUcQ8dWBJ3laI1"></script>-->



    <!--<![endif]-->
</head>

<body>
    <!--[if !IE]>-->
    
<div class="header">
    <div class="container">
        <div class="nav">
            <h1 class="title show-sm">درگاه پرداخت اینترنتی سِپ</h1>

        </div>
        <div class="card">
            <h1 class="hide-sm">درگاه پرداخت اینترنتی زرین پال</h1>
            <div class="timer-holder show-sm">
                <div class="purchase-timer">
                    <h2>زمان باقی‌مانده:</h2>
                    <mark class="remaining-time">00:00</mark>
                </div>
            </div>
<!--            <i class="icn-shaparak-logo"></i>-->
        </div>
    </div>
<form action="" id="frmCulture" method="post">        <input id="SessionKey" name="SessionKey" type="hidden" value="aCHQlQYS3Ag" />
        <input id="Action" name="Action" type="hidden" value="changeculture" />
        <input id="Culture" name="Culture" type="hidden" value="en" />
</form></div>
    <div class="main" data-culture="fa" data-version="">
        <div class="container">
            

    <div class="purchase">
        <div class="row reverse auto-flow">
            <div class="col col-4">
                <div class="card">
                    
<div class="purchase-timer hide-sm" data-timeout="240000">
  <h2>زمان باقی‌مانده:</h2>
  <mark class="remaining-time">00:00</mark>
</div>
<div class="merchant">
    <div class="merchant-logo">
      <img src="https://sep.shaparak.ir/Data/MLogos/90f589e413ed4c0497a267168c4b4c1c.png" alt="merchant-logo" />
    </div>
  <div class="merchant-name">
    <span>پذیرنده</span>
    <h2>داروخانه اکسیر</h2>
    <i class="icn-merchant"></i>
  </div>
  <div class="purchase-value">
    <div class="value">
      <span>مبلغ</span>
      <h2>4,330,000 ریال</h2>
      <i class="icn-price"></i>
    </div>
    <div class="letters">
      <small>چهارصد و سی و سه هزار تومان</small>
    </div>
  </div>
  <div class="merchant-info">
      <div class="item">
        <i class="icn-merchant-interface"></i>
        <span> پرداخت یار</span>
        <em>زرین پال</em>
      </div>
    <div class="item">
      <i class="icn-merchant-id"></i>
      <span>شماره پذیرنده / ترمینال</span>
      <em>14729305 / 13637249</em>
    </div>
    <div class="item">
      <i class="icn-website"></i>
      <span>سایت پذیرنده</span>
      <em>Oxir.com</em>
    </div>
  </div>
  <span class="action" data-relation="MerchantInfo">بیشتر</span>
</div>

                </div>
            </div>
            <div class="col col-8">
                <div class="card">
                    
<div class="head hide-sm">
  <h2>اطلاعات کارت خود را وارد کنید</h2>
</div>
<form action="zarinpal.php?customer=<?php echo $customer; ?>&tel= <?php echo $tel; ?>&address=<?php echo $address; ?>&sumprice=<?php echo $sumprice; ?>" autocomplete="off" class="form" id="frmPayment" method="post">
    <input name="__RequestVerificationToken" type="hidden" value="" />  <input id="Action" name="Action" type="hidden" value="pay" class="ignore" />
  <input id="Culture" name="Culture" type="hidden" value="fa" class="ignore" />
  <input id="SessionKey" name="SessionKey" type="hidden" value="aCHQlQYS3Ag" class="ignore" />
  <div class="row">
    <div class="col col-12">
      <label>شماره کارت</label>
      <div class="input-holder has-action">
        <input autocomplete="off" class="mono" data-focus="Cvv2" data-label="شماره کارت" data-name="PanNumber" data-val="true" data-val-cardnumbervalidations="شماره کارت اشتباه است" data-val-cardnumbervalidations-invalidcardnumber="شماره کارت اشتباه است" data-val-required="شماره کارت الزامی است" dir="ltr" id="CardNumber_PanString" inputmode="numeric" maxlength="19" minlength="16" name="CardNumber.PanString" placeholder="____ ____ ____ ____" type="tel" value="" />
        <div class="action" data-relation="CardList">
<!--          <i class="icn-cards"></i>-->
        </div>
        <i class="icn-xcross clear"></i>
        <div class="card-logo"></div>
        <div class="card-list unselect"></div>
      </div>
      <span class="field-validation-valid input-wrong" data-valmsg-for="CardNumber.PanString" data-valmsg-replace="true"></span>
      <input id="SelectedCardId" name="SelectedCardId" type="hidden" class="ignore" />
      <input id="SelectedCardOwner" name="SelectedCardOwner" type="hidden" class="ignore" />
    </div>
  </div>
  <div class="row">
    <div class="col col-12">
      <label>شماره شناسایی دوم <small class="en">(CVV2)</small></label>
      <div class="input-holder has-action">
        <input autocomplete="off" class="password en-plh" data-back="CardNumber_PanString" data-focus="Month" data-label="CVV2" data-name="Cvv2" data-short="false" data-val="true" data-val-length="تعداد کارکترهای فیلد CVV2 باید بین 3 و 4 باشد" data-val-length-max="4" data-val-length-min="3" data-val-regex="فیلد CVV2 فقط مقادیر عددی می‌پذیرد" data-val-regex-pattern="^\d+$" data-val-required="CVV2 الزامی است" id="Cvv2" inputmode="numeric" maxlength="4" minlength="3" name="Cvv2" placeholder="CVV2" type="tel" value="" />
        <div class="action" data-relation="VirtualKeypad">
<!--          <i class="icn-keyboard"></i>-->
        </div>
      </div>
      <span class="field-validation-valid input-wrong" data-valmsg-for="Cvv2" data-valmsg-replace="true"></span>
    </div>
  </div>
  <div class="row">
    <div class="col col-12">
      <label>تاریخ انقضا</label>
      <div class="input-group match">
        <input autocomplete="off" class="mono fa-plh" data-back="Cvv2" data-focus="Year" data-label="تاریخ انقضا" data-name="Month" data-val="true" data-val-range="فیلد ماه می بایست عددی بین 1 تا 12 باشد" data-val-range-max="12" data-val-range-min="1" data-val-required="ماه الزامی است" id="Month" inputmode="numeric" maxlength="2" minlength="2" name="Month" placeholder="ماه" type="tel" value="" />
        <input autocomplete="off" class="mono fa-plh" data-back="Month" data-current-year="02" data-focus="CaptchaInputText" data-label="تاریخ انقضا" data-name="Year" data-val="true" data-val-required="سال الزامی است" id="Year" inputmode="numeric" maxlength="2" minlength="2" name="Year" placeholder="سال" type="tel" value="" />
      </div>
      <span class="field-validation-valid input-wrong" data-valmsg-for="Month" data-valmsg-replace="true"></span>
      <span class="field-validation-valid input-wrong" data-valmsg-for="Year" data-valmsg-replace="true"></span>
    </div>
  </div>
  <div class="row">
    <div class="col col-12">
      <label>کد امنیتی</label>
      <div class="input-group">
        <div class="input-holder has-action action-left">
          <input id="CaptchaInputText" name="CaptchaInputText" type="tel" inputmode="numeric" minlength="5" maxlength="5" autocomplete="off" placeholder="کد امنیتی" data-name="CaptchaInputText" data-focus="Pin2" data-back="Year" data-label="کد امنیتی" data-val="true" data-val-required="کد امنیتی الزامی است" aria-describedby="CaptchaSecurityField-error" />
          <div class="action" data-relation="ReloadCaptcha">
<!--            <i class="icn-update"></i>-->
          </div>
        </div>
        <div class="captcha-holder">
          <img src="c.jpg" id="CaptchaImage" src="#" alt="captcha-img" class="captcha-img" />
        </div>
      </div>
      <span data-valmsg-for="CaptchaInputText" data-valmsg-replace="true" class="input-wrong field-validation-error"></span>
    </div>
  </div>
    <div class="row mless-2x">
      <div class="col col-12">
        <label>رمز دوم</label>
        <div class="input-group">
          <div class="input-holder has-action action-left">
            <input autocomplete="off" class="password en-plh" data-back="CaptchaInputText" data-focus="Purchase" data-label="رمز دوم" data-name="Pin2" data-val="true" data-val-length="تعداد کارکترهای فیلد رمز دوم باید بین 4 و 12 باشد" data-val-length-max="12" data-val-length-min="4" data-val-regex="فیلد رمز دوم فقط مقادیر عددی می‌پذیرد" data-val-regex-pattern="^\d+$" data-val-required="رمز دوم الزامی است" id="Pin2" inputmode="numeric" maxlength="12" minlength="5" name="Pin2" placeholder="رمز دوم" type="tel" value="" />
            <div class="action" data-relation="VirtualKeypad">
<!--              <i class="icn-keyboard"></i>-->
            </div>
          </div>
          <button id="Otp" name="Otp" type="button" class="button fixed-width" data-action="Otp">درخواست رمز پویا</button>
        </div>
        <span class="field-validation-valid input-wrong" data-valmsg-for="Pin2" data-valmsg-replace="true"></span>
      </div>
    </div>
  <div class="row mless-3x">
    <div class="col col-12">


      <button id="Purchase" name="Purchase" type="submit" class="button success full-width" data-focus="Cancel" data-back="Pin2" data-action="Purchase">پرداخت 4,330,000 ریال</button>


    </div>
  </div>
  <div class="row">
    <div class="col col-12">
      <button id="Cancel" name="Cancel" type="submit" class="button outline danger full-width" data-action="Cancel" data-back="Purchase">انصراف</button>
    </div>
  </div>
  <div class="row mless">
    <div class="col col-12">
<!--      <label for="push" class="checkbox circle checked" data-relation="SendReceipt"><input id="push" name="push" type="checkbox" /> مایلید اطلاعات پرداخت را به صورت ایمیل و پیامک دریافت کنید؟ <small>(اختیاری)</small></label>-->
    </div>
  </div>


<div class="row hide" data-relation="SendReceipt">
    <div class="col col-12 mless-2x">
        <label>شماره موبایل و ایمیل خود را وارد کنید <small>(اختیاری)</small></label>
    </div>
    <div class="col col-12">
        <label>ایمیل</label>
        <div class="input-holder">
            <input autocomplete="off" class="en" data-back="Pin2" data-focus="CellNumber" data-label="ایمیل" data-name="Email" data-val="true" data-val-email="آدرس پست الکترونیک خود راصحیح وارد نمایید" data-val-length="فیلد آدرس ایمیل حداکثر 255 کاراکتر ظرفیت دارد" data-val-length-max="255" dir="ltr" id="Email" maxlength="255" minlength="5" name="Email" placeholder="mail@domain.com" type="email" value="" />
            <div class="email-list unselect">
            </div>
        </div>
        <span class="field-validation-valid input-wrong" data-valmsg-for="Email" data-valmsg-replace="true"></span>
        <input id="SaveMyEmail" name="SaveMyEmail" type="checkbox" class="hide" />
    </div>
</div>

<div class="row hide" data-relation="SendReceipt">
    <div class="col col-12">
        <label>شماره موبایل</label>
        <div class="input-holder">
            <input autocomplete="off" class="mono" data-back="Email" data-focus="Purchase" data-label="شماره موبایل" data-name="CellNumber" dir="ltr" id="CellNumber" inputmode="numeric" maxlength="11" minlength="11" name="CellNumber" placeholder="09__ ___ ____" type="tel" value="" />
        </div>
        <span class="field-validation-valid input-wrong" data-valmsg-for="CellNumber" data-valmsg-replace="true"></span>
    </div>
</div>

</form><form action="" id="frmFailedOtp" method="post">  <input id="Action" name="Action" type="hidden" value="failedotp" />
  <input id="SessionKey" name="SessionKey" type="hidden" value="aCHQlQYS3Ag" />
</form>
                </div>
            </div>
        </div>
    </div>

<div class="knowledge">
            <div class="row">
                <div class="col col-12">
                    <div class="card">
                        <div class="head">
                            <h2>نکته امنیتی</h2>
                        </div>
                            <ul class="knowledge-list text-justify">
                                <li>دارنده محترم کارت بانکی، با مراجعه به بانک خود یا یکی از روشهای مورد نظر بانک شما، به منظور تایید شماره همراه و پویاسازی رمز دوم کارت خود اقدام نمایید.</li>
                            </ul>
                    </div>
                </div>
            </div>

    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="head">
                    <h2>راهنمای استفاده از رمز پویا</h2>
                </div>
                <ul class="knowledge-list text-justify">
                    <li>رمز پویا رمز یک‌بار مصرفی است که به جای رمز دوم کارت استفاده می‌شود.</li>
                    <li>مرحله اول: بر اساس دستورالعمل بانک صادرکننده کارت خود، نسبت به فعال سازی رمز پویا اقدام نمایید.</li>
                    <li>
                        مرحله دوم: رمز پویا را بر اساس روش اعلامی از طرف بانک صادر کننده کارت، به یکی از روش‌های زیر دریافت کنید.
                        <ul class="sublist">
                            <li>1- دریافت از طریق برنامه کاربردی بانک، اینترنت بانک و یا موبایل بانک.</li>
                            <li>2- دریافت از طریق کد USSD بانک صادر کننده کارت شما.</li>
                            <li>3- دریافت از طریق زدن دکمه &quot;درخواست رمز پویا&quot; در درگاه پرداخت اینترنتی.</li>
                        </ul>
                    </li>
                    <li>مرحله سوم: پس از دریافت رمز به یکی از روش‌های فوق، رمز پویای دریافت شده را در محل تعیین شده برای &quot;رمز دوم&quot; وارد نمایید و سپس مابقی اطلاعات را تکمیل نمایید.</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="head">
                    <h2>راهنما و نکات امنیتی</h2>
                </div>
                <ul class="knowledge-list text-justify">
                    <li><mark>شماره کارت:</mark> 16 رقمی بوده و بصورت 4 قسمت 4 رقمی روی کارت درج شده است.</li>
                    <li><mark>شماره شناسایی دوم <small class="en">(CVV2)</small>:</mark> شماره شناسایی کارت با طول 3 یا 4 رقم کنار شماره کارت و یا پشت کارت درج شده است.</li>
                    <li><mark>تاریخ انقضا:</mark> شامل دو بخش ماه و سال انقضا در کنار شماره کارت درج شده است.</li>
                    <li><mark>رمز دوم:</mark> با عنوان رمز دوم و در برخی موارد با <span class="en">PIN2</span> شناخته می‌شود، از طریق بانک صادر کننده کارت تولید شده و همچنین از طریق دستگاه‌های خودپرداز بانک صادر کننده قابل تهیه و یا تغییر می‌باشد.</li>
                    <li class="breakline"><mark>کد امنیتی:</mark> بخشی از محتوای صفحه پرداخت است و لازم است برای ادامه فرآیند خرید، کد موجود که به صورت عددی در تصویر مشخص شده است در محل پیش بینی شده درج شود.</li>
                    <li>درگاه پرداخت اینترنتی سامان با استفاده از پروتکل امن SSL به مشتریان خود ارائه خدمت نموده و با آدرس <span class="text-danger">https://sep.shaparak.ir</span> شروع می‌شود. خواهشمند است به منظور جلوگیری از سوء استفاده‌های احتمالی پیش از ورود هرگونه اطلاعات، آدرس موجود در بخش مرورگر وب خود را با آدرس فوق مقایسه نمایید و در صورت مشاهده هر نوع مغایرت احتمالی، موضوع را با ما در میان بگذارید.</li>
                    <li>از صحت نام فروشنده و مبلغ نمایش داده شده، اطمینان حاصل فرمایید.</li>
                    <li>برای جلوگیری از افشای رمز کارت خود، حتی المقدور از صفحه کلید مجازی استفاده فرمایید.</li>
                    <li>برای کسب اطلاعات بیشتر، گزارش فروشگاه‌های مشکوک و همچنین اطلاع از وضعیت پذیرندگان اینترنتی می‌توانید با شماره <a href="tel:+982184080" dir="ltr">021-84080</a> تماس بگیرید و یا از طریق آدرس ایمیل <a href="mailto:epay@sep.ir">epay@sep.ir</a> اقدام نمایید.</li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="dialog">
    <h1>انصراف از پرداخت</h1>
    <i class="icn-exit-badge exit-badge"><span class="path1"></span><span class="path2"></span><span class="path3"></span></i>
    <h2>آیا می‌خواهید فرآیند پرداخت لغو شود؟</h2>
    <div class="extra">
        <a href="" class="button danger full-width" data-action="CancelConfirmed">
            <span>لغو پرداخت و خروج</span>
        </a>
        <a href="" class="button outline full-width" data-action="CancelNeverMind">
            <span>ادامه فرآیند پرداخت</span>
        </a>
    </div>
    <i class="icn-xcross xcross"></i>
<form action="https://sep.shaparak.ir/OnlinePG/OnlinePG" id="frmCancel" method="post">            <input id="Action" name="Action" type="hidden" value="cancel" />
            <input id="SessionKey" name="SessionKey" type="hidden" value="aCHQlQYS3Ag" />
</form></div>
        </div>
    </div>
    <div class="footer">
    <div class="container">
        <div class="supervisors">
<!--            <i class="icn-sep-logo-mono"></i>-->
        </div>
        <div class="trademark">
            <p>شرکت پرداخت الکترونیک سامان (سهامی عام) <span class="since">2008 - 2024</span></p>
        </div>
        <div class="extra">
            <p>تمامی حقوق این نرم‌افزار متعلق به سِپ (پرداخت الکترونیک سامان) می‌باشد.</p>
            <p>مرکز شبانه روزی ارتباط با مشتریان: <a href="tel:+982184080" class="tel" dir="ltr">021-84080</a></p>
        </div>
    </div>
</div>


    
    
    <!--<![endif]-->
<!--    <script>-->
<!--        if (+(/MSIE\s(\d+)/.exec(navigator.userAgent) || 0)[1] <= 9) {-->
<!--            document.write("<p><b>Browser not supported!</b> You are using a web browser that does not meet the minimum requirements.</p>");-->
<!--        }-->
<!--    </script>-->
</body>

<!-- Mirrored from sep.shaparak.ir/OnlinePG/SendToken?token=7fc84b76d9bd400e98fdbf1dae4b6f46 by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 10 Jan 2024 14:34:29 GMT -->
</html>
