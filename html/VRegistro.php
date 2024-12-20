<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/reg.css">
    <title>Registro | INVIMA</title>
</head>
<body>
    <header>
        <div class="bg-primary w-100 d-flex justify-content-between align-items-center" id="div-gov_co">
            <img src="../img/logo_gov.co.png" alt="img gov.co" class="py-2" height="45px">
            <button class="btn btn-primary"> PQRSD ></button>
        </div>
        <br>
        <div class="w-100 d-flex justify-content-around align-items-center py-2">
            <img src="../img/Logo-potencia-de-la-vida 1.png" alt="Logo-potencia-de-la-vida">
            <div class="input-wrapper d-flex align-items-center">
                <input type="text" placeholder="Buscar..." class="input-search">
                <img src="/permisoslaborales/resources/img/icons/search.png" alt="">
            </div>            
            <img src="../img/Logo_Invima-Te-Acompana_0.png" alt="Logo_Invima-Te-Acompana" class="py-2" height="45px">
        </div>
        <br>
        <div class="w-100 d-flex justify-content-between align-items-center" id="div-menu-header">
            <img src="../img/blanco.png" alt="img gov.co" class="py-2" height="45px">
        </div>
    </header>
    <br>
    <div class="container">
        <div class="login-container">
            <div class="col-md-6">
                <h6 class="title1">¡Bienvenido de nuevo!</h6>
                <h4 class="title1"> Por favor, regístrese</h4><br>
                <div class="form-login">
                    <form action="../PHP/registro.php" method="POST">
                        <div class="form-group">
                            <label for="tipoDocumento">Tipo de documento</label><br>
                            <select name="tipoDocumento" id="tipoDocumento" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="Cédula de Ciudadanía">Cédula de Ciudadanía</option>
                                <option value="Tarjeta de Identidad">Tarjeta de Identidad</option>
                                <option value="Cédula de Extranjería">Cédula de Extranjería</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="numid">Número de Identificación</label>
                            <input type="number" name="numid" class="form-control" id="numid" placeholder="Documento de identidad" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Correo electrónico" required>
                        </div>
                        <div class="form-row">
                            <label class="lb1" for="Cont">Contraseña</label>
                            <label class="lb3" for="Ccont">Confirmar Contraseña</label>
                        </div>
                        <div class="form-row1">
                            <input type="password" class="form-control1" id="Cont" name="Cont" required>
                            <input type="password" class="form-control2" id="Ccont" name="Ccont" required>
                        </div>
                        <div class="form-group">
                            <input type="checkbox" id="remember-me" required>
                            <a href="https://app.invima.gov.co/oficina-virtual/infoac/politicas" target="_blank" style="color: black;" >Estoy de acuerdo con los términos y condiciones</a>
                        </div>
                        <button type="submit" class="btn-sesion">Registrarse</button>
                        <br><br>
                        <a href="../Login.html" class="btn-reg">Iniciar sesión </a>
                        <a href="../Login.html" class="forgot-password">¿Ya tienes una cuenta?</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <br>
    <footer>
        <div class="d-flex justify-content-between">
            <div>
                <img src="../img/Logo_Invima-Te-Acompana_Blanco.png" alt="Logo_Invima-Te-Acompana_Blanco" class="py-2" height="45px">
                <div>
                    <p>Sede principal: Carrera 10 #64 - 28 Bogotá, Colombia <br>
                    Teléfono conmutador: (+57)(601) 7422121 <br>
                    Contáctenos PQRSD <br>
                    Horario de atención: Lunes a Viernes 7:30 a.m. a 3:30 p.m. <br>
                    Línea anticorrupción: (+57)(601) 7458593 <br>
                    Notificaciones Judiciales: notificaciones_judiciales@invima.gov.co <br>
                    Transparencia Invima: soytransparente@invima.gov.co</p>
                </div>
                <div class="d-flex" id="div-social-media">
                    <a href="https://www.instagram.com/invimacolombia/">
                        <img src="../img/instagram.png" alt="instagram"> 
                    </a>
                    <a href="https://www.youtube.com/c/InvimaColombiaOficial">
                        <img src="../img/youtube.png" alt="youtube">
                    </a>
                    <a href="https://twitter.com/invimacolombia?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor">
                        <img src="../img/twitter.png" alt="twitter">
                    </a>    
                    <a href="https://www.facebook.com/InvimaColombia/?locale=es_LA">
                        <img src="../img/facebook.png" alt="facebook">
                    </a>
                </div>
            </div>
            <div>
                <h2>ENLACES DE INTERÉS</h2>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">EL INSTITUTO</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">QUÉ HACEMOS</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">ATENCIÓN AL CIUDADANO</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">TRÁMITES Y SERVICIOS</div>
                </div>
            </div>
            <div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">NORMATIVIDAD</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">PARTICIPA</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">SALA DE PRENSA</div>
                </div>
                <div class="div-links-interest">
                    <img src="/permisoslaborales/resources/img/icons/Arrow - Right 2.png" alt="arrow" class="icon-arrow">
                    <div class="px-2">TRANSPARENCIA</div>
                </div>
            </div>
        </div>
        <hr class="opacity-100">
        <div class="w-100 d-flex justify-content-between">
            <img src="../img/blanco.png" alt="invima-blanco">
            <img src="../img/logo gov-03 1.png" alt="invima-blanco">
        </div>
    </footer>
</body>
</html>
