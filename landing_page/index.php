<?php
$host       = "localhost";
$user       = "root";
$pass       = "";
$db         = "crud_php";

$koneksi    = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi) { //cek koneksi
    die("Tidak bisa terkoneksi ke database");
}
$nama       = "";
$alamat     = "";
$no_hp      = "";
$pesanan    = "";
$sukses     = "";
$error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if (isset($_POST['simpan'])) { //untuk create
  $nama       = $_POST['nama'];
  $alamat     = $_POST['alamat'];
  $no_hp      = $_POST['no_hp'];
  $pesanan    = $_POST['pesanan'];

  if ($nama && $alamat && $no_hp && $pesanan) {
        $sql1   = "insert into table_pemesanan(nama,alamat,no_hp,pesanan) values ('$nama','$alamat','$no_hp','$pesanan')";
        $q1     = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses     = "Pesanan Terkirim";
            $nama = $alamat = $no_hp = $pesanan = "";
            // echo "<script>alert('$sukses');</script>";
        } else {
            $error      = "Pesanan Gagal Terkirim";
        }
  } else {
      $error = "Silakan masukkan semua data";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TourID - Travel agency</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="../favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./aseets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  <!-- 
    - js link
  -->
  <script src="../aseets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</head>


<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="tel:+01123456790" class="helpline-box">

          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>

            <p class="helpline-number">+62 (8957) 567 901</p>
          </div>

        </a>

        <a href="#" class="logo">
          <img src="./aseets/img/logo.png" width="190px" height="100" alt="Tourly logo">
        </a>


      </div>
    </div>

    <div class="header-bottom">
      <div class="container">

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="../assets/logo.png" alt="Tourly logo">
            </a>

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <ul class="navbar-list">

            <li>
              <a href="#home" class="navbar-link" data-nav-link>home</a>
            </li>

            <li>
              <a href="#" class="navbar-link" data-nav-link>about us</a>
            </li>

            <li>
              <a href="#destination" class="navbar-link" data-nav-link>destination</a>
            </li>

            <li>
              <a href="#package" class="navbar-link" data-nav-link>packages</a>
            </li>

            <li>
              <a href="#gallery" class="navbar-link" data-nav-link>gallery</a>
            </li>

            <li>
              <a href="#contact" class="navbar-link" data-nav-link>contact us</a>
            </li>

          </ul>

        </nav>

        <button class="btn btn-primary">Book Now</button>

      </div>
    </div>

  </header>





  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Journey to explore Indonesia</h2>

          <p class="hero-text">
            Nikmati liburan anda melihat pesona keindahan alam dan budaya 
            di seluruh Indonesia dengan paket liburan yang menyenangkan. Mari bergabung dalam perjalanan bersama kami
          </p>

          <div class="btn-group">
            <button class="btn btn-primary">Learn more</button>

            <button class="btn btn-secondary">Book now</button>
          </div>

        </div>
      </section>



      <!-- 
        - #TOUR SEARCH
      -->

      <section class="tour-search">
        <div class="container">
              <p class="section-subtitle">Input Data</p>

              <h2 class="h2 section-title">INPUT PESANAN PAKET LIBURAN</h2>
              <form action="" method="POST">
              <div class="mb-3">
                <label for="nama" class="form-label fw-semibold">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>" style="border-color: #814e2b; background-color: rgba(129, 78, 43, 0.03)" />
              </div>
              <div class="mb-3">
                <label for="alamat" class="form-label fw-semibold">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>" style="border-color: #814e2b; background-color: rgba(129, 78, 43, 0.03)" aria-describedby="emailHelp" />
              </div>
              <div class="mb-3">
                <label for="no_hp" class="form-label fw-semibold">No HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?php echo $no_hp ?>" style="border-color: #814e2b; background-color: rgba(129, 78, 43, 0.03)" aria-describedby="emailHelp" />
              </div>
              <div class="mb-3">
                <label for="pesanan" class="form-label fw-semibold">Pesanan</label>
                <textarea class="form-control" id="pesanan" name="pesanan" value="<?php echo $pesanan ?>" style="border-color: #814e2b; height: 10em; background-color: rgba(129, 78, 43, 0.03)" rows="3"></textarea>
              </div>
              <button type="submit" name="simpan" class="btn btn-primary px-5 py-2">Kirim</button>
              </form>
            </div>
          </div>
        </div>
      </section>





      <!-- 
        - #POPULAR
      -->

      <section class="popular" id="destination">
        <div class="container">

          <p class="section-subtitle">Uncover place</p>

          <h2 class="h2 section-title">Popular destination</h2>

          <p class="section-text">
            Kami menawarkan rekomendasi tempat yang paling banyak dikunjungi, anda dapat melihat info lengkap di bawah ini
          </p>

          <ul class="popular-list">

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./aseets/img/popular-1.jpg" alt="Puja Mandala, Bali" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Bali</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Puja Mandala</a>
                  </h3>

                  <p class="card-text">
                    Mari bersenang-senang dan nikmati liburanmu bersama TravelID.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./aseets/img/popular-2.jpg" alt="Candi Borobudur, Jogjakarta" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Jogjakarta</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Candi Borobudur</a>
                  </h3>

                  <p class="card-text">
                    Mari bersenang-senang dan nikmati liburanmu bersama TravelID.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./aseets/img/popular-3.jpg" alt="Labuan Bajo, NTT" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">NTT</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Labuan Bajo</a>
                  </h3>

                  <p class="card-text">
                    Mari bersenang-senang dan nikmati liburanmu bersama TravelID.
                  </p>

                </div>

              </div>
            </li>

          </ul>

          <button class="btn btn-primary">More destintion</button>

        </div>
      </section>





      <!-- 
        - #PACKAGE
      -->

      <section class="package" id="package">
        <div class="container">

          <p class="section-subtitle">Popular Packeges</p>

          <h2 class="h2 section-title">Checkout Our Packeges</h2>

          <p class="section-text">
            Kami menawarkan paket liburan seperti penginapan, tiket masuk wisata, makanan dan pendamping tour.
            Mari rasakan keseruan liburan anda bersama dengan TravelID
          </p>

          <ul class="package-list">

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="./aseets/img/packege-1.jpg" alt="Experience The Great Holiday On Beach" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Experience The Great Holiday On Beach</h3>

                  <p class="card-text">
                  Paket liburan yang menarik untuk anda, segera pesan tiket liburan ini dan bersiaplah untuk melakukan perjalanan bersama TravelID.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Indonesia</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(25 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $750
                    <span>/ per orang</span>
                  </p>
                <!--
                  <button class="btn btn-secondary">Book Now</button> -->
                
                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="./aseets/img/packege-2.jpg" alt="Summer Holiday To The Oxolotan River" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Visiting Unique Regional Cultures</h3>

                  <p class="card-text">
                    Paket liburan yang menarik untuk anda, segera pesan tiket liburan ini dan bersiaplah untuk melakukan perjalanan bersama TravelID.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Indonesia</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(20 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $520
                    <span>/ per orang</span>
                  </p>
                <!--
                  <button class="btn btn-secondary">Book Now</button> -->

                </div>

              </div>
            </li>

            <li>
              <div class="package-card">

                <figure class="card-banner">
                  <img src="./aseets/img/packege-3.jpg" alt="Santorini Island's Weekend Vacation" loading="lazy">
                </figure>

                <div class="card-content">

                  <h3 class="h3 card-title">Vacation In the Mountains</h3>

                  <p class="card-text">
                  Paket liburan yang menarik untuk anda, segera pesan tiket liburan ini dan bersiaplah untuk melakukan perjalanan bersama TravelID.
                  </p>

                  <ul class="card-meta-list">

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="time"></ion-icon>

                        <p class="text">7D/6N</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="people"></ion-icon>

                        <p class="text">pax: 10</p>
                      </div>
                    </li>

                    <li class="card-meta-item">
                      <div class="meta-box">
                        <ion-icon name="location"></ion-icon>

                        <p class="text">Indonesia</p>
                      </div>
                    </li>

                  </ul>

                </div>

                <div class="card-price">

                  <div class="wrapper">

                    <p class="reviews">(40 reviews)</p>

                    <div class="card-rating">
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                      <ion-icon name="star"></ion-icon>
                    </div>

                  </div>

                  <p class="price">
                    $660
                    <span>/ per orang</span>
                  </p>
                <!--
                  <button class="btn btn-secondary">Book Now</button> -->

                </div>

              </div>
            </li>

          </ul>

          <button class="btn btn-primary">View All Packages</button>

        </div>
      </section>





      <!-- 
        - #GALLERY
      -->

      <section class="gallery" id="gallery">
        <div class="container">

          <p class="section-subtitle">Photo Gallery</p>

          <h2 class="h2 section-title">Photo's From Travellers</h2>

          <p class="section-text">
            Abadikan momen perjalanamu mengunjungi tempat wisata bersama teman, keluarga, dan orang terdekatmu.
          </p>

          <ul class="gallery-list">

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./aseets/img/gallery-1.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./aseets/img/gallery-2.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./aseets/img/gallery-3.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./aseets/img/gallery-4.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./aseets/img/gallery-5.jpg" alt="Gallery image">
              </figure>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">Ready For Unforgatable Travel. Remember Us!</h2>

            <p class="section-text">
              Anda bisa menghubungi customer kami mengenai paket liburan, kami siap membantu anda dalam perjalan liburan yang menyenangkan
            </p>
          </div>

          <button class="btn btn-secondary">Contact Us !</button>

        </div>
      </section>

    </article>
  </main>





  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./aseets/img/logo.png" alt="Tourly logo">
          </a>

          <p class="footer-text">
            TravelID adalah agen travel perjalanan liburan di Indonesia, kami akan selalu memberikan pelayanan liburan terbaik untuk anda
          </p>

        </div>

        <div class="footer-contact">

          <h4 class="contact-title">Contact Us</h4>

          <p class="contact-text">
            Feel free to contact and reach us !!
          </p>

          <ul>

            <li class="contact-item">
              <ion-icon name="call-outline"></ion-icon>

              <a href="tel:+01123456790" class="contact-link">+62 (8957) 567 901</a>
            </li>

            <li class="contact-item">
              <ion-icon name="mail-outline"></ion-icon>

              <a href="mailto:info.tourly.com" class="contact-link">JourneytourID@gmail.com</a>
            </li>

            <li class="contact-item">
              <ion-icon name="location-outline"></ion-icon>

              <address>3146 Madiun, Indonesia</address>
            </li>

          </ul>

        </div>

        <div class="footer-form">

          <p class="form-text">
            Subscribe our newsletter for more update & news !!
          </p>

          <form action="" class="form-wrapper">
            <input type="email" name="email" class="input-field" placeholder="Enter Your Email" required>

            <button type="submit" class="btn btn-secondary">Subscribe</button>
          </form>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2023 <a href="">codewithsadee</a>. All rights reserved
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>