<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  @include('./template/head')

  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">

      @include('./template/nav')
      
      <div class="bg-dark">
        <img class="img-fluid position-absolute end-0" src="assets/img/hero/hero-bg.png" alt="" />

        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section>
          @yield('content')
        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


      </div>

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    @include('./template/footer')

  </body>

</html>