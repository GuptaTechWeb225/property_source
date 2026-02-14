<style>
    @import url('{{ asset('backend/assets/css/email-verification.css') }}');
  </style>
<!-- Custom CSS  end -->

<div class="page-content">
  <!-- Start email template  -->
  <div class="email-template">
      <!-- Start template header  -->
      <div class="template-heading">
          <!-- logo  -->
          <img src="{{ @globalAsset(setting('favicon')) }}" alt="Frame">
      </div>
      <!-- end template header  -->
      <!-- Start template body  -->
      <div class="template-body">
          <div class="content-part">
              <p class="ot-primary-text">{{ _trans('landlord.reset password') }}</p>
              <p>{{ _trans('landlord.hello user') }}</p>
              <p>
                {{ _trans('landlord.you are receiving this email because a request has been received to change the password for your LandLord account') }}
              </p>


              <p> {{ _trans('landlord.click the link below to reset your LandLord account password') }}
              </p>
              <p>
                  {{ _trans('landlord.this link will expire in 15 minutes and can only be used once') }}
              </p>
          </div>
          <!-- template button start -->
          <div class="template-btn-container">
              <a href="{{ route('reset-password', [$data->email, $data->token]) }}" class="template-btn">
                <span>{{ _trans('landlord.reset password') }}</span>
              </a>
          </div>
          <!-- template button end -->
          <div class="content-part">
            <h5>{{ _trans('landlord.or') }}</h5>
            <p>{{ _trans('landlord.if the button above does not work paste this link into your web browser') }}</p>
            <p>
                <a class="link" href="{{ route('reset-password', [$data->email, $data->token]) }}">{{ route('reset-password', [$data->email, $data->token]) }}</a>
            </p>
            <p>{{ _trans('landlord.if you did not make this request please contact us or ignore this message') }}</p>
          </div>
      </div>
      <!-- end template body  -->
      <!-- Start template footer  -->
      <div class="template-footer">
          <div class="template-footer-image">
              <!-- logo  -->
              <img src="{{ @globalAsset(setting('light_logo')) }}" alt="Logo">
          </div>

          <p>{{ Setting('footer_text') }}</p>
      </div>
  </div>
  <!-- End email template  -->
</div>
