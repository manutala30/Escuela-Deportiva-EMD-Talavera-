// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
/*Funciones para el registro e inicio de sesion*/
$(function() {
  $('#login-form-link').click(function(e) {
    $("#login-form").delay(100).fadeIn(100);
    $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });
  $('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
    $("#login-form").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
  });

});

/*Cookies*/
$(document).ready(function() {
  var cookie = false;
  var cookieContent = $('.cookie-disclaimer');

  checkCookie();

  if (cookie === true) {
    cookieContent.hide();
  }

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
  }

  function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
      var c = ca[i].trim();
      if (c.indexOf(name) === 0) return c.substring(name.length, c.length);
    }
    return "";
  }

  function checkCookie() {
    var check = getCookie("emtalavera.com");
    if (check !== "") {
      return cookie = true;
    } else {
      return cookie = false; //setCookie("acookie", "accepted", 365);
    }

  }
  $('.accept-cookie').click(function () {
    setCookie("emtalavera.com", "accepted", 365);
    cookieContent.hide(500);
  });
});
/*Calendario*/
$.datepicker.regional['es'] = {
  closeText: 'Cerrar',
  prevText: '< Ant',
  nextText: 'Sig >',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
  dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
  weekHeader: 'Sm',
  dateFormat: 'yy/mm/dd',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''


};
$.datepicker.setDefaults($.datepicker.regional['es']);
$(function () {
  $("#datepicker").datepicker(
      {
        beforeShowDay: $.datepicker.noWeekends,
        minDate: 0,
        firstDay: 1,
        datesDisabled: [
          "17/05/2021","19/04/2019","20/04/2019","01/05/2019",
          "21/05/2019","29/06/2019","16/07/2019","15/08/2019",
          "18/09/2019","19/09/2019","20/09/2019","12/10/2019",
          "31/10/2019","01/11/2019","08/12/2019","25/12/2019"
        ]

      }
  ).datepicker("setDate", new Date());
  $('.#datepicker').datepicker({
    beforeShow: function(input, inst) {
      inst.dpDiv.css({"z-index":100});
    }
  });
});
function scrollUp(){

  var currentScroll = document.documentElement.scrollTop;

  if (currentScroll > 0){
    window.requestAnimationFrame(scrollUp);
    window.scrollTo (0, currentScroll - (currentScroll / 10));
  }
}


///

buttonUp = document.getElementById("button-up");

window.onscroll = function(){

  var scroll = document.documentElement.scrollTop;

  if (scroll > 30){
    buttonUp.style.transform = "scale(1)";
  }else if(scroll < 50){
    buttonUp.style.transform = "scale(0)";
  }

}
