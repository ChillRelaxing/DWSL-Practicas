const form = document.getElementById('form')
const departamento = document.getElementById('departamento')
const municipio = document.getElementById('municipio')

//Eventos

departamento.addEventListener('change', () =>{
    if (departamento.value != null){
        getMunicipios(departamento.value)
    }
})

const getMunicipios = (id) =>{
    const url = "http://localhost/practicas7/municipios.php?id=" + id
    fetch(url, {
        method: 'GET',
        headers: {"Content-Type": "aplication/json"}
    })
    .then(response => {
        if(response.ok){
            return response.json()
        }else{
            throw new Error('Error de servidor')
        }
    })
    .then(data => {
        municipio.innerHTML = ''
        data.forEach(element =>{
            municipio.innerHTML = `
                <option value="${element.id}">
                    ${element.nombre}
                </option>
            `
        })
    })
    .catch(error => {
        
    })
}