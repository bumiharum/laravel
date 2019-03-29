@extends('layouts.main')

@section('stylesheets')
  <link rel="stylesheet" type="text/css" href="/css/home.css">
  <link href="/css/jquery.lighter.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/css/strip.css">
  <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet">
@endsection

@section('title', 'Bunga')

@section('content')

  <div id="car" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
      <li data-target="#car" data-slide-to="0" class="active"></li>
      <li data-target="#car" data-slide-to="0"></li>
      <li data-target="#car" data-slide-to="0"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="https://www.wibe.in/wp-content/uploads/2013/06/slide4-1800x800.jpg" class="img-fluid mx-auto d-block">
      </div>
      <div class="carousel-item">
        <img src="https://www.invisionapp.com/assets/img/wallpapers/company.jpg" class="img-fluid mx-auto d-block">
      </div>
      <div class="carousel-item">
        <img src="http://www.bgsenergy.co.uk/wp-content/uploads/2017/05/1.jpg" class="img-fluid mx-auto d-block">
      </div>
      <a href="#car" class="carousel-control-prev" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </a>
      <a href="#car" class="carousel-control-next" data-slide="next">
        <span class="carousel-control-next-icon"></span>
      </a>
    </div>
  </div>

<section style="background-color: white">

  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-md-4  container-home">
        <blockquote class="blockquote" id="sejarah">
          <p class="mb-0" style="color: grey"><i><small><b>“Education is the key to unlock the golden door of freedom”.</b></small></i></p>
          <footer class="blockquote-footer"><i><small>George Washington Carver</small></i></footer>
        </blockquote>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card container-image-text">
          <img src="https://www.butterfield.com/blog/wp-content/uploads/2016/11/cartagena-1600x700.jpg" alt="Notebook" class="img-fluid">
          <div class="card-body content-image-text">
            <h1 class="h1-sejarah">Sejarah</h1>
            <p class="p-sejarah"><b>Sekolah Menengah Atas Negeri (SMAN) 1 Ciseeng didirikan atas inisiatif dari Pemerintah Kabupaten Bogor di tahun 2006 yang saat itu memiliki Kebijakan "1 Kecamatan - 1 SMA/SMK" dengan tujuan peningkatan IPM Kabupaten Bogor menuju "Kabupaten Termaju" di Indonesia.</b></p>
          </div>
        </div>
      </div>
    </div>



    {{-- MADING --}}
    <div class="row justify-content-md-center">
      <div class="col-md-4 col-mading">
        <h1 class="text-center h1-mading" id="berita" style="color: #4a4d56;"><i class="far fa-newspaper"></i>&nbsp;<b>MADING</b></h1>
      </div>
    </div>

    <div class="row">
      @foreach($posts as $post)
      <div class="col-6 col-md-4">
        <div class="card card-mading">
          <img class="card-img-top" src="{{asset('img/'. $post->image)}}" alt="Card image cap">
          <div class="card-body card-body-mading">
            <a href="/blog/{{$post->slug}}" class="card-title-mading"><h5 class="card-title h6-mading"><b>{{$post->title}}</b></h5></a>
            <p class="card-text p-mading">{{substr(strip_tags($post->body), 0, 120)}} {{strlen(strip_tags($post->body)) > 120 ? " ..." : ""}}</p>
            <small class="text-muted p-mading-cat">{{$post->category->name}}</small>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <section class="lsb">
      <div class="row justify-content-md-center">
        <div class="col-md-4">
          <a href="/blog" class="btn btn-block btn-me a-lsb">LIHAT SEMUA BERITA</a>
        </div>
      </div>
    </section> {{-- END MADING --}}

  </div> {{-- END CONTAINER --}}
</section>

{{-- COUNTER --}}
<section class="background-color-counter-body" style="background-color: white;"><br>
  <div class="container">

    <div class="card-counter">
      <div class="row">
        <div class="col-6 col-md-3 text-center"><br>
          <img src="{{asset('img/teacher2.png')}}" alt="" class="img-fluid" style="border-radius: 50%; width: 200px"><br><br>
          <h3 class="h3-counter"><b>GURU</b></h3>
          <h1 class="h1-statistic-counter statistic-counter">34</h1>
        </div>
        <div class="col-6 col-md-3 text-center"><br>
          <img src="{{asset('img/student.png')}}" alt="" class="img-fluid" style="border-radius: 50%; width: 200px"><br><br>
          <h3 class="h3-counter"><b>SISWA</b></h3>
          <h1 class="h1-statistic-counter statistic-counter">804</h1>
        </div>
        <div class="col-6 col-md-3 text-center"><br>
          <img src="{{asset('img/room.png')}}" alt="" class="img-fluid" style="border-radius: 50%; width: 200px"><br><br>
          <h3 class="h3-counter"><b>KELAS</b></h3>
          <h1 class="h1-statistic-counter statistic-counter">24</h1>
        </div>
        <div class="col-6 col-md-3 text-center"><br>
          <img src="{{asset('img/test.png')}}" alt="" class="img-fluid" style="width: 200px"><br><br>
          <h3 class="h3-counter"><b>LAB</b></h3>
          <h1 class="h1-statistic-counter statistic-counter">24</h1>
        </div>
      </div>
    </div>
  </div>
</section> {{-- END COUNTER --}}


{{-- PRESTASI --}}
<section style="background-color: white;">
  <div class="container">

    <div class="header-prestasi">
      <div class="row justify-content-md-center">
        <div class="col-md-4" style="padding: 37px"><hr>
          <h1 class="text-center h1-mading text-efect" id="berita" style="color: #4a4d56;"><i class="fas fa-award"></i>&nbsp;<b>PRESTASI</b></h1>
        </div>
      </div>
    </div>

    <div class="row">
      @foreach($achievements as $achieve)
      <div class="col-6 col-md-4">
        <div class="card card-prestasi">
          <div class="row">
            <div class="col-md-4">
              <div class="card-header card-header-prestasi">
                <img src="{{asset('img/'. $achieve->image)}}" alt="" class="img-fluid img-prestasi">
              </div>
            </div>
            <div class="col-md-8">
              <div class="card-body card-body-prestasi">
                <h6 class="h6-prestasi"><b>{{$achieve->name}}</b></h6>
                <h6 class="p-prestasi-desc">{{$achieve->description}}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    </div>
  </div>
</section> {{-- --}}

{{-- GALERI --}}
<section style="background-color: white;" class="container-galery">
  <div class="container-fluid">

    <div class="row justify-content-md-center">
      <div class="col-md-3" style="padding: 37px">
        <h1 class="text-center h1-galery" id="berita" style="color: #4a4d56;"><i class="far fa-images"></i>&nbsp;<b>GALERI</b></h1>
      </div>
    </div>

    <div class="card-galery">
      <div class="row">
      @foreach($galery as $image)
        <div class="col-4 col-md-4" style="padding: 0px;">
          <a href="{{asset('img/'. $image->image)}}" class="strip" data-strip-group="mygroup" data-strip-caption="{{$image->description}}">
            <img src="{{asset('img/'. $image->image)}}" class="img-fluid image" style="filter: grayscale(35%);">
          </a>
        </div>
      @endforeach
      </div>
    </div>
  </div>
</section> {{-- END GALERI --}}

<section style="padding: 40px 0;">
  <div class="container">
    <div class="tik-tik" style="text-align:center">
      <span class="dot1"></span>
      <span class="dot2"></span>
      <span class="dot3"></span>
      <span class="dot4"></span>
    </div><br>

    <div class="row justify-content-md-center">
      <div class="col-lg-3 col-md-4 col-sm-12">
        <div class="card">
          <div class="container-image">
          <img class="card-img-top image" src="https://buj.co.uk/wp-content/uploads/2018/06/Sara-Crop-300x300.jpg" alt="Card image cap" style="border-radius: 0;">
          </div>
          <div class="card-body">
            <h5>Your Name</h5>
            <h6><b>KEPALA SEKOLAH</b></h6>
          </div>
        </div>
    </div>
    </div><br>

    <div class="row justify-content-md-center">
      @for($i=0; $i < 3; $i++)
      <div class="col-sm-6 col-md-3">
        <div class="card">
          <img class="card-img-top image" src="https://www.inthelighturns.com/funeral-information/wp-content/uploads/2018/05/Photo-by-Kat-Jayne-from-Pexels-300x300.jpg" alt="Card image cap">
          <div class="card-body">
            <h5><b>Your Name</b></h5>
            <h6 class="text-muted">Position</h6>
          </div>
        </div><br>
      </div>
      @endfor
    </div>

    <div class="row justify-content-md-center">
      <div class="col-sm-6 col-md-3">
        <div class="card">
          <img class="card-img-top image" src="https://www.inthelighturns.com/funeral-information/wp-content/uploads/2018/05/Photo-by-Kat-Jayne-from-Pexels-300x300.jpg" alt="Card image cap">
          <div class="card-body">
            <h5><b>Your Name</b></h5>
            <h6><b>KEPALA TATA USAHA</b></h6>
          </div>
        </div>
      </div>
    </div>
  </div><br>
  <div style="text-align:center">
    <span class="dot1"></span>
    <span class="dot2"></span>
    <span class="dot3"></span>
    <span class="dot4"></span>
  </div>
</section>

<div style="margin-top: -25px; background-color: #ddd">


<section style="height: 10px;"></section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.5005797310982!2d106.66284831396021!3d-6.458080664941809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69e79c93d9ed29%3A0xe4c69f9b6a9d991b!2sSMA+Negeri+1+Ciseeng!5e0!3m2!1sen!2sid!4v1552817044523" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>


@endsection

@section('scripts')
<script src="/js/jquery.lighter.js" type="text/javascript"></script>
<script type="text/javascript" src="/js/home.js"></script>
<script type="text/javascript" src="/js/strip.pkgd.min.js"></script>
<script type="text/javascript">
  jQuery('.statistic-counter').counterUp({
    delay: 10,
    time: 2000
    });
</script>

@endsection
