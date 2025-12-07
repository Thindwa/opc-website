@extends('layouts.frontend')

@section('content')

<!-- Banner Section -->
{{-- <div id="banner-area" class="banner-area" style="background-image: url('{{ asset('frontendassets/images/banner/banner1.jpg') }}')">
  <div class="banner-text">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <div class="banner-heading">
            <h1 class="banner-title">Contact Us</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Contacts</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> --}}

<!-- Contact Section -->
<section class="contact-section section-padding">
  <div class="container">

    <div class="row text-center mb-5">
      <div class="col-12">
        <h2 class="section-title">Reaching our Office</h2>
        <div class="title-divider bg-danger"></div>
        <h4 class="section-sub-title">Find Our Location</h4>
      </div>
    </div>

    <div class="row justify-content-center">

      @foreach([
          ['icon' => 'fas fa-map-marker-alt', 'title' => 'Contact Address:', 'text' => 'The Chief Secretary, Office of the President and Cabinet, Capital Hill Circle, Private Bag 301, Capital City, Lilongwe 3, Malawi.'],
          ['icon' => 'fa fa-envelope', 'title' => 'Email Us', 'text' => 'opc@opc.gov.mw'],
          ['icon' => 'fa fa-phone-square', 'title' => 'Call Us', 'text' => '(+265) 111789311 / 111789 411']
      ] as $contact)
      <div class="col-md-4">
        <div class="content-card card bg-light-red text-center mb-4">
          <div class="card-body">
            <div class="icon-wrapper bg-danger text-white rounded-circle mb-3 mx-auto">
              <i class="{{ $contact['icon'] }} fa-2x"></i>
            </div>
            <h4 class="content-title">{{ $contact['title'] }}</h4>
            <p class="content-text">{{ $contact['text'] }}</p>
          </div>
        </div>
      </div>
      @endforeach

    </div>

    <div class="gap-60"></div>

    <!-- Google Map -->
    <div class="google-map mb-5">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3065.4916181403846!2d33.78752357334662!3d-13.946697680176698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1921d370a3efe6b3%3A0x468cd9b572a9016a!2sOffice%20of%20President%20and%20Cabinet!5e1!3m2!1sen!2smw!4v1688919887578!5m2!1sen!2smw" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>

    {{-- <!-- Contact Form -->
    <div class="row">
      <div class="col-md-12">
        <h3 class="column-title text-center">We Love to Hear from You</h3>
        <form id="contact-form" action="#" method="post" role="form">
          <div class="error-container"></div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Name</label>
                <input class="form-control" name="name" id="name" type="text" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Email</label>
                <input class="form-control" name="email" id="email" type="email" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label>Subject</label>
                <input class="form-control" name="subject" id="subject" type="text" required>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label>Message</label>
            <textarea class="form-control" name="message" id="message" rows="8" required></textarea>
          </div>
          <div class="text-center">
            <button class="btn btn-danger btn-lg" type="submit">Send Message</button>
          </div>
        </form>
      </div>
    </div> --}}

  </div>
</section>

<!-- Custom Styles -->
<style>
/* Banner */
.banner-area {
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
    height: 250px;
    position: relative;
}
.banner-area::before {
    content: '';
    background: rgba(0,0,0,0.6);
    position: absolute;
    width: 100%;
    height: 100%;
}
.banner-text {
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
}

/* Titles */
.banner-title {
    font-size: 1.5rem;
    font-weight: bold;
}

/* Titles */
.section-title {
  font-size: 2rem;
  font-weight: bold;
  text-transform: uppercase;
  color: #2c3e50;
}
.section-sub-title {
  font-size: 1.2rem;
  color: #555;
}
.title-divider {
  width: 60px;
  height: 4px;
  margin: 1rem auto;
  background: #eb7571;
}

/* Cards */
.content-card {
  border: none;
  border-radius: 10px;
  background: #fff5f5;
  box-shadow: 0 10px 20px rgba(0,0,0,0.05);
  transition: 0.3s ease-in-out;
}
.content-card:hover {
  transform: translateY(-5px);
  background: #ffecec;
}

/* Icons */
.icon-wrapper {
  width: 70px;
  height: 70px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
}

/* Forms */
form .form-control {
  border-radius: 8px;
}

/* Responsive */
@media (max-width: 768px) {
  .section-title {
    font-size: 1.5rem;
  }
}
</style>

@endsection
