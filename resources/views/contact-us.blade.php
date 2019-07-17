<?php $active = 'contactus'; ?>
@extends('statics_page')

@section('content')
    <div class="show-page-text">
        <div class="" >
            <div class="row page-boxer">
                <h3 class="lsi-header"><span>CONTACT  TO {{config('config.PROJECTNAME')}}</span></h3>
                <div class="body-page-boxer contact-forms clearfix" >
                    <div class="contact-info">Do you need a help? Please feel free to contact us if have any questions, problems, comments regarding {{config('config.Projectname')}} partnerships, PR or affiliate relations. If you’d like to leave us feedback about our site, don't hesitate. We’d love to hear from you.
                    </div>
                    <form class="contact-form" action="{{url('/sendContact')}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                        <div class="f-row"><input type="text" name="name" class="form-control" placeholder="Your Name*" required /></div>
                        <div class="f-row"><input type="email" name="email" class="form-control" placeholder="Your Email*" required /></div>
                        <div class="f-row"><input type="text" name="subject" class="form-control" placeholder="Your Subject*" required /></div>
                        <!-- <div class="f-row"><input type="text" name="keywords" class="form-control" placeholder="Enter Keywork*" required /></div> -->
                        <div class="f-row"><textarea required name="message" class="form-control" placeholder="Your Message*"></textarea></div>
                        <div class="f-row">
                            <div id="reCaptchaSubmit" class="g-recaptcha"></div>
                        </div>
                        <div class="f-row"><button type="submit" class="btn btn-primary btn-md btn-block btn-submit">Submit</button></div>
                    </form>
                    <div class="other-contact">
                        <div class="contact-header" >Are you a Merchant?</div>
                        <div class="contact-mail">Email: <a href="mailto:{{'contacts@'.config('config.domain')}}" title="mail">{{'contacts@'.config('config.domain')}}</a></div>
                        <div class="contact-desc">{{config('config.Projectname')}} is always proud to satisfy customers by providing them with the latest {{config('config.coupon')}} codes, the latest deals and the latest discounts. Besides, we are committed to ensuring that all the {{config('config.coupon')}} codes, deals or discounts we publish are 100% accurate. If you are worried that any information showed is inaccurate or would like us to remove any codes or {{config('config.coupon')}}s featured on the website, please feel free to let us know.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var widgetId1;
        var CaptchaCallback = function () {
            widgetId1 = grecaptcha.render('reCaptchaSubmit', {'sitekey': '{{ $reCapcha_public_key }}'});
        };
        var $form = $('.contact-form');
        $form.on('submit', function (e) {
            e.preventDefault();
            $('button[type="submit"]').addClass('disabled');
            $.ajax({
                type: 'post',
                url: $form.attr('action'),
                data: $form.serialize(),
                success: function (data) {
                    if (data.status == 'success') {
                        $form[0].reset();
                        $('button[type="submit"]').prev('span').remove();
                        $("<span>Thank you for contact us.</span>").insertBefore($('button[type="submit"]'));
                    } else if (data.status == 'error') {
                        $("<span class='help-block myErrorClass'>" + data.msg + "</span>").insertBefore($('button[type="submit"]'));
                    }
                    $('button[type="submit"]').removeClass('disabled');
                    grecaptcha.reset(widgetId1);
                }
            });
        });
    </script>
@endsection