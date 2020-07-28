@extends('front-end.layout.app')
@section('content')

<section class="page-contact text-center" style="background-image: url('{{ asset('front/photo/bgcontact.png') }}') ">
  <div class="bg">

    <div class="container textcontent">
        <h1>Contact Us</h1>


  </div>


    </div>
</section>

            {{-- <h2 class="h2-custom text-center">{{$title}}</h2> --}}

                <div class=" container contact-form">
                    <div class="row">
                        <div class="col-12">
                            <section class="no-padding">
                                <!-- Google Map -->
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27630.773127179702!2d31.220550219606846!3d30.041257290523514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145846c5d4058d01%3A0x3802da3bf4a72d0!2z2KfZhNiv2YLZitiMINin2YTYr9mC2YnYjCDYp9mE2KzZitiy2Kk!5e0!3m2!1sar!2seg!4v1592837628316!5m2!1sar!2seg" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>                <!-- end: Google Map -->
                                <!-- end: Google Map -->
                            </section>
                        </div>

                        <div class="line"></div>
                        <div class="co-lg-4 col-md-4 col-12 address">
                            <div>
                                <h3 class="text-uppercase">Get In Touch</h3>

                               <div class="row">
                                        <div class="col-md-12 boxs">
                                            <div class="icon-box effect small clean">
                                                <div class="icon">
                                                    <a href="#"><i  class="fas fa-map-marker-alt"></i></a>
                                                </div>
                                                <div class="textp">
                                                    <h4>Address : </h4>
                                                    <p>
                                                        795 Folsom Ave, Suite 600
                                                        San Francisco, CA 94107
                                                    </p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-md-12 boxs">
                                            <div class="icon-box effect small clean">
                                                <div class="icon">
                                                    <a href="#"><i  class="fa fa-envelope" ></i></a>
                                                </div>
                                                <div class="textp">
                                                    <h4>Email : </h4>
                                                    <p>
                                                        admin@eamil.com
                                                    </p>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-md-12 boxs">
                                            <div class="icon-box effect small clean">
                                                <div class="icon">
                                                    <a href="#"><i  class="fa fa-phone-alt" ></i></a>
                                                </div>
                                                <div class="textp">
                                                    <h4>Phone : </h4>
                                                    <p>
                                                       +02 012584846528
                                                    </p>
                                                </div>

                                            </div>
                                        </div>



                                        </div>

                            </div>
                        </div>


                        <div class="co-lg-8 col-md-8 col-12">
                            <div class="card">
                                <form method="post" action="{{route('create.contactus')}}">
                                    <div class="row">
                                    <h3>Drop Us a Message</h3>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                @CSRF

                                                <input type="text" name="name" class="form-control" placeholder="Your Name *"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Your Email *" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="phone" class="form-control" placeholder="Your Phone Number *"  />
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <textarea name="message" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" name="btnSubmit" class="btn btn-warning btn-circle text-uppercase mleft " value="Send Message" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>



                </div>






@endsection
