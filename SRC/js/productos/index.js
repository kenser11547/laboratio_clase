const formulario = document.querySelector('form')

const guardar = async (e) => {
    e.preventDefault();

    if(validarFormulario(formulario, ['producto_id'])){
        const formData = new FormData(formulario);
        formData.append('tipo', 1)
        formData.delete('producto_id')
        const url = `/laboratorio_clase/controllers/productos/index.php`
        const config = {
            method : 'POST',
            body: formData
        }
        try {
            const respuesta = await fetch(url, config);
            const data = await respuesta.json();

            const {codigo, mensaje, detalle} = data;
            alert(mensaje)

            switch (codigo) {
                case 1:
                    formulario.reset();
                    break;
                case 0:
                    console.log(detalle)
                    break;
                default:
                    break;
            }
        }catch (error){
            console.log(error)
        }
    }else{
        alert('Debe llenar todos los datos')
        return;
    }
}
formulario.addEventListener('submit', guardar)