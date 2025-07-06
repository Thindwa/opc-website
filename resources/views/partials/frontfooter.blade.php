<footer id="footer" class="footer bg-overlay">
  <div class="footer-main py-5">
    <div class="container">
      <div class="row justify-content-between">
        <!-- About Us Section -->
        <div class="col-lg-4 col-md-6 footer-widget footer-about mb-4 mb-md-0">
          <h3 class="widget-title text-white mb-4">About Us</h3>
          <img loading="lazy" width="200" class="footer-logo mb-3" src="frontendassets/images/footer-logo.png" alt="OPC Logo">
          <p class="text-light" style="text-align: justify; line-height: 1.6;">
            The Office of the President and Cabinet (OPC) is responsible for providing advice and support to the President and Cabinet as well as providing oversight leadership in the Public Service.
          </p>
          
          <div class="footer-social mt-4">
            <ul class="list-inline">
              <li class="list-inline-item"><a href="https://facebook.com/opcmalawi" aria-label="Facebook" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a></li>
              <li class="list-inline-item"><a href="https://twitter.com/opcmalawi" aria-label="Twitter" class="text-white"><i class="fab fa-twitter fa-lg"></i></a></li>
              <li class="list-inline-item"><a href="https://instagram.com/opcmalawi" aria-label="Instagram" class="text-white"><i class="fab fa-instagram fa-lg"></i></a></li>
              <li class="list-inline-item"><a href="https://youtube.com/opcmalawi" aria-label="YouTube" class="text-white"><i class="fab fa-youtube fa-lg"></i></a></li>
            </ul>
          </div>
        </div>

        <!-- Contacts Section -->
        <div class="col-lg-4 col-md-6 footer-widget mb-4 mb-md-0">
          <h3 class="widget-title text-white mb-4">Our Contacts & Hours</h3>
          <div class="working-hours text-light">
            <p style="text-align: justify; line-height: 1.6;">
              <i class="fas fa-map-marker-alt mr-2"></i> The Secretary to the President and Cabinet,<br>
              Office of the President and Cabinet,<br>
              Capital Hill Circle, Private Bag 301,<br>
              Capital City, Lilongwe 3, Malawi.
            </p>              
            <p class="mb-1"><i class="fas fa-phone-alt mr-2"></i> Telephone: <a href="tel:+2651789311" class="text-white">+265 178 9311</a> / <a href="tel:+2651789411" class="text-white">+265 178 9411</a></p>
            <p class="mb-1"><i class="fas fa-envelope mr-2"></i> Email: <a href="mailto:opc@opc.gov.mw" class="text-white">opc@opc.gov.mw</a></p>
            <p class="mb-0"><i class="fas fa-clock mr-2"></i> Monday - Friday: 07:00 - 16:30</p>
          </div>
        </div>

        <!-- Governance Section -->
        <div class="col-lg-3 col-md-6 footer-widget">
          <h3 class="widget-title text-white mb-4">Governance</h3>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-light"><i class="fas fa-chevron-right mr-2 text-success"></i> National Planning Commission</a></li>
            <li class="mb-2"><a href="#" class="text-light"><i class="fas fa-chevron-right mr-2 text-success"></i> Public Service Reforms</a></li>
            <li class="mb-2"><a href="#" class="text-light"><i class="fas fa-chevron-right mr-2 text-success"></i> Human Resource Management</a></li>
            <li class="mb-2"><a href="#" class="text-light"><i class="fas fa-chevron-right mr-2 text-success"></i> Anti Corruption Bureau</a></li>
            <li class="mb-2"><a href="#" class="text-light"><i class="fas fa-chevron-right mr-2 text-success"></i> Malawi Law Commission</a></li>
            <li class="mb-2"><a href="#" class="text-light"><i class="fas fa-chevron-right mr-2 text-success"></i> Malawi Electoral Commission</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Copyright Section -->
  <div class="copyright py-3 bg-dark">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 mb-3 mb-md-0">
          <div class="copyright-info text-center text-md-left">
            <span class="text-light">Copyright &copy; <script>document.write(new Date().getFullYear())</script>, Office of the President and Cabinet. Developed by <a href="#" class="text-success">Dept. of E-Government</a></span>
          </div>
        </div>

        <div class="col-md-6">
          <div class="footer-menu text-center text-md-right">
            <ul class="list-inline mb-0">
              <li class="list-inline-item"><a href="{{route('about')}}" class="text-light">About</a></li>
              <li class="list-inline-item mx-2">|</li>
              <li class="list-inline-item"><a href="{{route('profile')}}" class="text-light">H.E. Profile</a></li>
              <li class="list-inline-item mx-2">|</li>
              <li class="list-inline-item"><a href="{{route('executive')}}" class="text-light">Executive</a></li>
              <li class="list-inline-item mx-2">|</li>
              <li class="list-inline-item"><a href="news-left-sidebar.html" class="text-light">News</a></li>
              <li class="list-inline-item mx-2">|</li>
              {{-- <li class="list-inline-item"><a href="{{route('management')}}" class="text-light">Management</a></li> --}}
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Back to Top Button -->
  <div id="back-to-top" class="back-to-top position-fixed">
    <button class="btn btn-success rounded-circle" title="Back to Top" style="width: 50px; height: 50px;">
      <i class="fa fa-arrow-up"></i>
    </button>
  </div>
</footer>

<style>
.footer {
background: linear-gradient(rgba(0,0,0,0.8), rgba(0,0,0,0.8)), url('frontendassets/images/footer-bg.jpg');
background-size: cover;
background-position: center;
color: #fff;
}

.widget-title {
font-size: 1.25rem;
font-weight: 600;
position: relative;
padding-bottom: 10px;
}

.widget-title:after {
content: '';
position: absolute;
left: 0;
bottom: 0;
width: 50px;
height: 2px;
background: #28a745;
}

.footer-social a {
display: inline-block;
width: 36px;
height: 36px;
line-height: 36px;
text-align: center;
background: #980816;
border-radius: 50%;
margin-right: 8px;
transition: all 0.3s;
}

.footer-social a:hover {
background: #28a745;
color: #fff;
transform: translateY(-3px);
}

.copyright {
border-top: 1px solid #980816;
}

.list-arrow li {
position: relative;
padding-left: 20px;
margin-bottom: 10px;
}

.list-arrow li:before {
content: '\f054';
font-family: 'Font Awesome 5 Free';
font-weight: 900;
position: absolute;
left: 0;
color: #28a745;
font-size: 12px;
}

@media (max-width: 768px) {
.footer-widget {
  margin-bottom: 30px;
}

.footer-menu ul li {
  display: block;
  margin-bottom: 5px;
}
}
</style>