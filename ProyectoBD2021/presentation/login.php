
<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

        <title>Login</title>

        <!-- JS ---->
        <script src="../JS/JQuery-3.4.1.js" type="text/javascript"></script>
        <script src="../JS/Sesion.js" type="text/javascript"></script>
        <script src="../JS/Validaciones.js" type="text/javascript"></script>
        <script src="../JS/SweetAlert.js" type="text/javascript"></script>
        <script src="../script/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../Iconos/js/all.min.js"></script>
       
        <!-- CSS ---->
        <link rel="stylesheet" type="text/css" href="../Estilo/Principal.css">
        <link rel="stylesheet" type="text/css" href="../Estilo/SweetAlert.css">
        <link rel="stylesheet" type="text/css" href="../script/css/bootstrap.min.css">
        <link rel="stylesheet" href="../Iconos/css/all.min.css">

        <script type="text/javascript">
            window.onload=function(){
              
                !function(a){
                    a(function(){
                        a('[data-toggle="password"]').each(function(){
                            var b = a(this);
                            var c = a(this).parent().find(".input-group-text");
                            
                            c.css("cursor", "pointer").addClass("input-password-hide");
                            c.on("click", function(){
                                if (c.hasClass("input-password-hide")){
                                    c.removeClass("input-password-hide").addClass("input-password-show");
                                    c.find(".fa").removeClass("fa-eye").addClass("fa-eye-slash");
                                    b.attr("type", "text")
                                } else{
                                    c.removeClass("input-password-show").addClass("input-password-hide");
                                    c.find(".fa").removeClass("fa-eye-slash").addClass("fa-eye");
                                    b.attr("type", "password")
                                }
                            })
                        })
                    })
                }(window.jQuery);
            }
        </script>

    </head>

    <body class="login">

        <header>

        </header>

        <main>

           <section class="container-fluid">
                <section class="row justify-content-center">
                    <section class="col-12 col-sm-6 col-md-3">
                        <div class="div-container">
                            <div class="card-header text-center">
                                <h5 class="text-black">Iniciar sesión</h5>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="correo">Ingrese su correo</label>
                                <input  class="form-control" aria-describedby="emailHelp" type="email" id="correo"  onkeypress="return (event.charCode != [32])"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Ingrese su contraseña</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="contrasena" data-toggle="password" onkeypress="return NumerosLetras(event) || (event.charCode != [32])"/>
                                    <div class="input-group-append">
                                        <div class="input-group-text"><i class="fas fa-eye"></i></div>
                                    </div>    
                                </div>                                
                            </div>
                            <button class="btn btn-info btn-block" id="enter" onclick="IniciarSesion()">Ingresar</button>
                            <br>
                            <div class="forgot-link d-flex aling-items-center justify-content-between">
                                <a href="../index.php">Volver</a>
                            </div>
                            
                        </div>
                    <section>        
                </section>
            </section>          


        </main>

        <script>
            // tell the embed parent frame the height of the content
            if (window.parent && window.parent.parent){
              window.parent.parent.postMessage(["resultsFrame", {
                height: document.body.getBoundingClientRect().height,
                slug: "zkou4dej"
              }], "*")
            }

            // always overwrite window.name, in case users try to set it manually
            window.name = "result"
        </script>

        <script type="text/javascript">
            const btnEnter = 13;

            addEventListener("keypress", function(evento){
                if(evento.keyCode == btnEnter){
                    IniciarSesion();
                }
            })
        </script>


    </body>

</html>
