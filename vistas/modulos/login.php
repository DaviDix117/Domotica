<section class="login-page">

  <div class="login-box">

    <div class="login-logo">

      <a href="#" style="color:#000;"><b style="color:#fff;">Domotica</b>HOME</a>

    </div>


    <!-- /.login-logo -->
    <!-- <div class="card "> -->

      <div class="card-body login-card-body">

        <p class="login-box-msg" style="color:#fff;">Iniciar Sesion</p>



        <form  method="post">

          <div class="input-group mb-3">

            <input type="text" class="form-control" placeholder="Usuario" name="ingUsuario" required>

            <div class="input-group-append">

              <div class="input-group-text" style="color:#fff;">

                <span class="fas fa-user"></span>

              </div>

            </div>

          </div>



          <div class="input-group mb-3">

            <input type="password" class="form-control" placeholder="Password" name="ingPassword" required>

            <div class="input-group-append">

              <div class="input-group-text" style="color:#fff;">

                <span class="fas fa-lock"></span>

              </div>

            </div>

          </div>



          <div class="row">

            <!-- /.col -->
            <div class="col-4" style="margin-right: auto; margin-left: auto;">

              <button type="submit" class="btn btn-dark">Ingresar</button>

            </div>
            <!-- /.col -->
          </div>
          <?php 

              $login = new usuariosControlador();
              $login -> ctrIngreso();

           ?> 

        </form>

      </div>
      <!-- /.login-card-body -->
    <!-- </div> -->
  </div>
  
</section>