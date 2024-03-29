// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())

let provincia = document.getElementById('provincia')

provincia.addEventListener('change', (e) => {
  let localidad = document.getElementById('localidad')
  localidad.innerHTML = '<option value="">Seleccioná...</option>'  
  html = localidad.innerHTML

  if (e.target.value) {
    data = {provincia: e.target.value }

    fetch('../controller/getLocalidades.php', {
        method: 'POST',
        body: JSON.stringify(data),
        headers:{
          'Content-Type': 'application/json'
        }
    })
    .then(data => {
      return data.json()
    })
    .then(resJson => {
      if(resJson.status == 0) {
        resJson.data.forEach(e => {
          html += '<option value="' + e.id + '">'+e.nombre+'</option>'
        });
        localidad.innerHTML = html
      }
    })
  }
})
