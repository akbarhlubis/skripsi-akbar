<!-- component -->
<!-- This is an footer component -->
<footer class="py-20 text-white px-14 footer bg-primary">
    <aside>
      <img class="w-20" src="https://teknokrat.ac.id/wp-content/uploads/2022/04/UNIVERSITASTEKNOKRAT-e1647677057867-768x774-min.png" alt="">
      <h2 class="mb-2 text-2xl">{{Config::get('app.name')}}</h2>
      <p class="mb-1  md:w-[40%] w-full">{{$setting->description}}</p>
      <div class="grid grid-flow-col gap-4">
        <a href="https://www.instagram.com/{{$setting->instagram}}/"><i class="bi bi-instagram"></i></a> 
        <a href="https://www.youtube.com/channel/UCYVRIU8V_Td9fHJRA2u57cg"><i class="bi bi-youtube"></i></a> 
        <a href="https://www.facebook.com/Teknokrat"><i class="bi bi-facebook"></i></a>
      </div>
    </aside> 
    <nav class="flex gap-20">
      <div>
        <header class="footer-title">Tautan</header> 
        <div class="grid grid-flow-row gap-4">
          <a href="{{route('about-page')}}" class="">Tentang Kami</a>
          <a href="{{route('posts-page')}}" class="">Kegiatan</a>
        </div>
      </div>
      <div>
        <header class="footer-title">Hubungi Kami</header> 
        <div class="grid grid-flow-row gap-4">
          <p>Direktorat Kemahasiswaan</p>
          <a href="https://wa.me/{{$setting->phone}}">{{$setting->phone}} (Chat Only)</a>
          <a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
        </div>
      </div>
    </nav>
  </footer>