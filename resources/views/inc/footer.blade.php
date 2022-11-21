<style>
  .site-footer
  {
    background-color:#c8b033;
    padding:45px 0 20px;
    font-size:15px;
    line-height:24px;
    color:black;
  }
  .site-footer hr
  {
    border-top-color:black;
    opacity:0.5
  }
  .site-footer hr.small
  {
    margin:20px 0
  }
  .site-footer h6
  {
    color:#fff;
    font-size:16px;
    text-transform:uppercase;
    margin-top:5px;
    letter-spacing:2px
  }
  .site-footer a
  {
    color:black;
  }
  .site-footer a:hover
  {
    color:#3366cc;
    text-decoration:none;
  }
  .footer-links
  {
    padding-left:0;
    list-style:none
  }
  .footer-links li
  {
    display:block
  }
  .footer-links a
  {
    color:black;
  }
  .footer-links a:active,.footer-links a:focus,.footer-links a:hover
  {
    color:#3366cc;
    text-decoration:none;
  }
  .footer-links.inline li
  {
    display:inline-block
  }
  .site-footer .social-icons
  {
    text-align:right
  }
  .site-footer .social-icons a
  {
    width:40px;
    height:40px;
    line-height:40px;
    margin-left:6px;
    margin-right:0;
    border-radius:100%;
    background-color:#33353d
  }
  .copyright-text
  {
    margin:0
  }
  @media (max-width:991px)
  {
    .site-footer [class^=col-]
    {
      margin-bottom:30px
    }
  }
  @media (max-width:767px)
  {
    .site-footer
    {
      padding-bottom:0
    }
    .site-footer .copyright-text,.site-footer .social-icons
    {
      text-align:center
    }
  }
  .social-icons
  {
    padding-left:0;
    margin-bottom:0;
    list-style:none
  }
  .social-icons li
  {
    display:inline-block;
    margin-bottom:4px
  }
  .social-icons li.title
  {
    margin-right:15px;
    text-transform:uppercase;
    color:#96a2b2;
    font-weight:700;
    font-size:13px
  }
  .social-icons a{
    background-color:#eceeef;
    color:#818a91;
    font-size:16px;
    display:inline-block;
    line-height:44px;
    width:44px;
    height:44px;
    text-align:center;
    margin-right:8px;
    border-radius:100%;
    -webkit-transition:all .2s linear;
    -o-transition:all .2s linear;
    transition:all .2s linear
  }
  .social-icons a:active,.social-icons a:focus,.social-icons a:hover
  {
    color:#fff;
    background-color:#29aafe
  }
  .social-icons.size-sm a
  {
    line-height:34px;
    height:34px;
    width:34px;
    font-size:14px
  }
  .social-icons a.facebook:hover
  {
    background-color:#3b5998
  }
  .social-icons a.twitter:hover
  {
    background-color:#00aced
  }
  .social-icons a.linkedin:hover
  {
    background-color:#007bb6
  }
  .social-icons a.dribbble:hover
  
    background-color:#ea4c89
  }
  @media (max-width:767px)
  {
    .social-icons li.title
    {
      display:block;
      margin-right:0;
      font-weight:600
    }
  }
</style>
    
<!-- Site footer -->
<footer class="site-footer">
  <div class="container">
    <div class="row">

      <div class="col-5">
        <h6>MediClick</h6>
        <p class="text-justify">MediClick is a web application for Appointment Scheduling System and
         Health Records Management of Medical Clinics.</p>
      </div><!--End of Column-->

      <div class="col-sm">
        <h6></h6>
        <ul class="footer-links">
          <li><a href="/about">About Us</a></li>
          <li><a href="/termsandconditions">Terms and Conditions</a></li>
          <li><a href="/privacypolicies">Privacy Policy</a></li>
          <li><a href="/pricing">Pricing</a></li>
          
        </ul>
      </div><!--End of Column-->

      <div class="col-5">
        <h6>We want to hear from you!</h6>
        <div class="card-body">
          <form method="POST" action="/pages/feedbacks">
            @csrf

            <div class="row mb-3">
              <label for="Name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
              <div class="col-md-8">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your Name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div><!--End of Row-->
            </div><!--End of column-->

            <div class="row mb-3">
              <label for="Message" class="col-md-4 col-form-label text-md-end">{{ __('Message') }}</label>
              <div class="col-md-8">
                      <textarea rows="3" id="message" type="text" class="form-control @error('message') is-invalid @enderror" name="message" value="{{ old('message') }}" required autocomplete="message" placeholder="Enter your feedback"></textarea>
                      @error('message')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                </div><!--End of Row-->
             </div><!--End of column-->

             <div class="row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-warning">
                      {{ __('Submit') }}
                  </button>
                </div><!--End of Row-->
              </div><!--End of column-->

          </form>



          
                </div><!--End of Row-->
             </div><!--End of column-->

                </div><!--End of Row-->
              </div><!--End of column-->

          </form>

        </div><!--End of Card-body-->

      </div><!--End of column-->

    </div><!-- End of Row -->
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by 
          <a href="#">MediClick | Philippines</a>.
          </p>
        </div><!--End of Column-->
      </div><!--End of Row-->
  </div><!-- End of Container -->
</footer>

    