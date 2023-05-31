<!DOCTYPE html>
<html lang="en">
  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('css/bootstrap.css')}}"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
<head>

</head>
<body>
  <div id="Mynav">
    Mersin Üniversitesi Yetenek Sınavı Başvuru Sistemi
    
  </div>
  <div id="container">
    <header>
      <img id="headerResim" src="{{asset('img/res2.jpg')}}" alt="">
    </header>

    <section>

      <nav class="nvb">
        <ul>
          <li><a href="{{url('/')}}">Anasayfa</a></li>
          <li><a href="{{'/duyuruSayfasi.blade'}}">Duyuru Sayfası</a></li>
          <li><a href="welcome.blade.php">GuzelSanatlarBaşvuruFormu</a></li>
          <li><a href="welcome.blade.php">BesyoBaşvuruFormu</a></li>
          <li><a href="welcome.blade.php">KonservatuarBaşvuruFormu</a></li>
          <li><a href="welcome.blade.php">İletişim</a></li>

          
          
        </ul>   
      </nav>
      <main>
        @yield('contents')
      </main>
    </section>
    <div class="footer">
       
      <footer><a href="login">Admin Giriş</a></footer>
    </div>

  </div>
  
</body>