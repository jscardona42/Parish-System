 		function cargarTipodoc(){
          var tipodoc = document.getElementById("tipodoc_td").value;
          document.getElementById("tipodoc").value=tipodoc;
        }

        function cargarEstadocivil(){
          var estadocivil = document.getElementById("estadocivil_es").value;
          document.getElementById("estadocivil").value=estadocivil;
        }

        function cargarNacionalidad(){
          var nacionalidad = document.getElementById("nacionalidad_na").value;
          document.getElementById("nacionalidad").value=nacionalidad;
        }

        function cargarGenero(){
          var genero = document.getElementById("genero_ge").value;
          document.getElementById("genero").value=genero;
        }

        function load(page){
    var parametros = {"action":"ajax","page":page};
    $("#loader").fadeIn('slow');
    $.ajax({
      url:'paises_ajax.php',
      data: parametros,
       beforeSend: function(objeto){
      $("#loader").html("<img src='loader.gif'>");
      },
      success:function(data){
        $(".outer_div").html(data).fadeIn('slow');
        $("#loader").html("");
      }
    })
  }
 
    $('#dataUpdate').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var codigo = button.data('codigo') // Extraer la información de atributos de datos
      var id = button.data('id') // Extraer la información de atributos de datos
      var nombre = button.data('nombre') // Extraer la información de atributos de datos
      var moneda = button.data('moneda') // Extraer la información de atributos de datos
      var capital = button.data('capital') // Extraer la información de atributos de datos
      var continente = button.data('continente') // Extraer la información de atributos de datos
      
      var modal = $(this)
      modal.find('.modal-title').text('Modificar país: '+nombre)
      modal.find('.modal-body #id').val(id)
      modal.find('.modal-body #codigo').val(codigo)
      modal.find('.modal-body #nombre').val(nombre)
      modal.find('.modal-body #moneda').val(moneda)
      modal.find('.modal-body #capital').val(capital)
      modal.find('.modal-body #continente').val(continente)
      $('.alert').hide();//Oculto alert
    })
    
    $('#dataDelete').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget) // Botón que activó el modal
      var id = button.data('id') // Extraer la información de atributos de datos
      var modal = $(this)
      modal.find('#id_pais').val(id)
    })
 
  $( "#actualidarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "modificar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#datos_ajax").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#datos_ajax").html(datos);
          
          load(1);
          }
      });
      event.preventDefault();
    });
    
    $( "#guardarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "agregar.php",
          data: parametros,
           beforeSend: function(objeto){
            $("#datos_ajax_register").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $("#datos_ajax_register").html(datos);
          $('#dataDelete').modal('show');
          
          load(1);
          }
      });
      event.preventDefault();
    });
    
    $( "#eliminarDatos" ).submit(function( event ) {
    var parametros = $(this).serialize();
       $.ajax({
          type: "POST",
          url: "eliminar.php",
          data: parametros,
           beforeSend: function(objeto){
            $(".datos_ajax_delete").html("Mensaje: Cargando...");
            },
          success: function(datos){
          $(".datos_ajax_delete").html(datos);
          
          $('#dataDelete').modal('hide');
          load(1);
          }
      });
      event.preventDefault();
    });

    function readUrl(input) {
  
  if (input.files && input.files[0]) {
    let reader = new FileReader();
    reader.onload = (e) => {
      let imgData = e.target.result;
      let imgName = input.files[0].name;
      input.setAttribute("data-title", imgName);
      console.log(e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }

function alertDGC(mensaje)
{
    var dgcTiempo=500
    var ventanaCS='<div class="dgcAlert"><div class="dgcVentana"><div class="dgcCerrar"></div><div class="dgcMensaje">'+mensaje+'<br><div class="dgcAceptar">Aceptar</div></div></div></div>';
    $('body').append(ventanaCS);
    var alVentana=$('.dgcVentana').height();
    var alNav=$(window).height();
    var supNav=$(window).scrollTop();
    $('.dgcAlert').css('height',$(document).height());
    $('.dgcVentana').css('top',((alNav-alVentana)/2+supNav-100)+'px');
    $('.dgcAlert').css('display','block');
    $('.dgcAlert').animate({opacity:1},dgcTiempo);
    $('.dgcCerrar,.dgcAceptar').click(function(e) {
        $('.dgcAlert').animate({opacity:0},dgcTiempo);
        setTimeout("$('.dgcAlert').remove()",dgcTiempo);
    });
}
window.alert = function (message) {
  alertDGC(message);
};

}