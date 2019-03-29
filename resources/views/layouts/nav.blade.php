<header id="sticky-header">
  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <a href="/" class="navbar-brand">
        SMA NEGERI 1 CISEENG
      </a>
      <button data-toggle="collapse" data-target="#menu" class="navbar-toggler">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <span class="mr-auto"></span>

        <ul class="navbar-nav">
          @if(!Auth::check())
          <li class="nav-item"><a href="/" class="nav-link {{Request::is('/') ? 'active' : ''}}">Beranda</a></li>
          <li class="nav-item dropdown">
          <a class="nav-link {{Request::is('visi-misi') || Request::is('hubungan') ?  'active' : ''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil &nbsp;<i class="fas fa-chevron-circle-down"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item page-scroll" href="/#sejarah">Sejarah</a>
            <a class="dropdown-item" href="http://dapo.dikdasmen.kemdikbud.go.id/sekolah/4BD5C9A9B1532AADDA38" target="_blank">Identitas Sekolah</a>
            <a class="dropdown-item" href="/visi-misi">Visi & Misi</a>
            <a class="dropdown-item" href="#">Struktur Organisasi</a>
            <a class="dropdown-item" href="/sarpras">Sarana & Prasarana</a>
            <a class="dropdown-item" href="/gtk">Staf Guru & TU</a>
            <a class="dropdown-item" href="/eskul">Ekstrakulikuler</a>
            <a class="dropdown-item {{Request::is('hubungan') ?  'active' : ''}}" href="/hubungan">Hubungan</a>
              </div>
            </li>
          <li class="nav-item"><a href="/#berita" class="nav-link {{Request::is('blog') ? 'active' : ''}}">Berita</a></li>
          <li class="nav-item"><a href="#berita" class="nav-link">Manajemen</a></li>
          <li class="nav-item"><a href="#berita" class="nav-link">Galeri</a></li>
          <li class="nav-item"><a href="#berita" class="nav-link">PPDB</a></li>

          @endif
          @if (Auth::check())
          @if(Request::is('posts'))
          <li class="nav-item"><a href="/posts/create" class="nav-link btn btn-primary btn-sm" style="color: white">Add Posts</a></li>&nbsp;
          <li class="nav-item"><a href="/categories" class="nav-link btn btn-primary btn-sm" style="color: white">Add Categories</a></li>
          @elseif(Request::is('galery'))
          <li class="nav-item"><a href="/galery/create" class="nav-link btn btn-primary btn-sm" style="color: white">New Create</a></li>
          @elseif(Request::is('videos'))
          <li class="nav-item"><a href="/videos/create" class="nav-link btn btn-primary btn-sm" style="color: white">New Create</a></li>
          @elseif(Request::is('teachers'))
          <li class="nav-item"><a href="/teachers/create" class="nav-link btn btn-primary btn-sm" style="color: white">Add Teachers</a></li>&nbsp;
          <li class="nav-item"><a href="/studies" class="nav-link btn btn-primary btn-sm" style="color: white">Add Studies</a></li>
          @elseif(Request::is('administrator'))
          <li class="nav-item"><a href="/administrator/create" class="nav-link btn btn-primary btn-sm" style="color: white">Add Administrator</a></li>&nbsp;
          <li class="nav-item"><a href="/roles" class="nav-link btn btn-primary btn-sm" style="color: white">Add Roles</a></li>
          @elseif(Request::is('infrastructures'))
          <li class="nav-item"><a href="/pictures" class="nav-link btn btn-primary btn-sm" style="color: white">View All</a></li>
          @elseif(Request::is('pictures'))
          <li class="nav-item"><a href="/pictures/create" class="nav-link btn btn-primary btn-sm" style="color: white">Add Infrastructures</a></li>
          @elseif(Request::is('achievements'))
          <li class="nav-item"><a href="/achievements/create" class="nav-link btn btn-primary btn-sm" style="color: white">Add Achievements</a></li>
          @elseif(Request::is('extracurriculars'))
          <li class="nav-item"><a href="/extras" class="nav-link btn btn-primary btn-sm" style="color: white">View All</a></li>
          @elseif(Request::is('extras'))
          <li class="nav-item"><a href="/extras/create" class="nav-link btn btn-primary btn-sm" style="color: white">Add Extracurriculars</a></li>
          @endif
          <li class="nav-item dropdown">
          <a class="nav-link {{Request::is('visi-misi') || Request::is('hubungan') ?  'active' : ''}}" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} &nbsp;<i class="fas fa-chevron-circle-down"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item page-scroll" href="/posts">Posts</a>
            <a class="dropdown-item page-scroll" href="/galery">Galery</a>
            <a class="dropdown-item page-scroll" href="/videos">Videos</a>
            <a class="dropdown-item page-scroll" href="/teachers">Teachers</a>
            <a class="dropdown-item page-scroll" href="/administrator">Administrator</a>
            <a class="dropdown-item page-scroll" href="/infrastructures">Infrastructures</a>
            <a class="dropdown-item page-scroll" href="/extracurriculars">Extracurriculars</a>
            <a class="dropdown-item page-scroll" href="/achievements">Achievements</a>
            <a class="dropdown-item" href="/logout">Logout</a>
              </div>
            </li>
          @endif
        </ul>
      </div>
     </div>
  </nav>
</header>
