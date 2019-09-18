<div class="sidebar" data-color="orange">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
  -->
    <div class="logo">
      <center><img src="{{ URL::asset('image/serabine-mini.png') }}" class="logo-mini" alt="Serabine.co" style="height:60px;width:60px"></center>
      <h5 class="simple-text logo-normal" align="center">
        Serabine.co
      </h5>
    </div>
    <div class="sidebar-wrapper" id="sidebar-wrapper">
      <ul class="nav">
        <li>
          <a href="{{ url('dashboard') }}">
            <i class="now-ui-icons design_app"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li>
          <a href="{{ url('karyawan') }}">
            <i class="now-ui-icons education_atom"></i>
            <p>Karyawan</p>
          </a>
        </li>
        <li>
          <a href="{{ route('hitung') }}">
            <i class="now-ui-icons location_map-big"></i>
            <p>Mamdani</p>
          </a>
        </li>
        <li>
          <a href="{{ route('hasil') }}">
            <i class="now-ui-icons ui-1_bell-53"></i>
            <p>Hasil</p>
          </a>
        </li>
      </ul>
    </div>
</div>
