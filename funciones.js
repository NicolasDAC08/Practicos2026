const inputpoke = document.getElementById('inputpoke');
const btnthen = document.getElementById('btnthen');
const btnasync = document.getElementById('btnasync');
const nombrepoke = document.getElementById('nombrepoke');
const imagenpoke = document.getElementById('imagenpoke');
const mensajeerror = document.getElementById('mensajeerror');

//borra los anteriores resultados
function cleaner(){
    nombrepoke.textContent = "";
    imagenpoke.src = "";
    imagenpoke.alt = "";
    imagenpoke.style.display = "none";
    mensajeerror.textContent = "";
}

//obtiene el valor del pokemon atraves de input y dice: si esta vacio tirar mensaje de error y no retorna nada si no retorna el valor del input
function obtenervalor(){
    const valor=inputpoke.value.trim().toLowerCase();
    if(valor === ""){
        mensajeerror.textContent ="porfavor, ingresa un nombre o un id de pokemon";
        return null;
    }
    return valor;
}

// muestra el pokemon en el index con su nombre y su imagen y limpia por las dudas el mensaje de error
function mostrarpokemon(datos){
    nombrepoke.textContent = datos.name;
    //                     👇campo de la api que apunta a la imagen oficial del sprite frontal por defecto del pokemon
    imagenpoke.src = datos.sprites.front_default;
    imagenpoke.alt = "imagen del " + datos.name;
    imagenpoke.style.display = 'block';
    mensajeerror.textContent = "";
}


//aca se hace la busqueda del pokemon con then y catch, si no encuentra el pokemon tira un error y lo muestra en el index
function buscarConThen(){
    cleaner();
    const valor = obtenervalor();
    //aca verifica que obtenervalor no haya retornado null o sea que el usuario no haya ingresado un valor, si es asi no hace nada y termina aca la funcion
    if(valor === null){
        return;
    }
    //aca declara la url de la api con el valor ingresado por el usuario y hace la peticion fetch
    const url = 'https://pokeapi.co/api/v2/pokemon/' + valor;
    //entra a la url con el nombre del pokemon
    fetch(url)
        //la promesa con la repuesta de la api
        .then(function(response) {
            //si la cabecera de la respuesta no entra en el rango de 200-299(ok)
            if (!response.ok) {
                //crea otra promesa que detiene el codigo actual y produce una excepcion que sera atrapada por el catch
                throw new Error("el pokemon no fue encontrado pa (codigo " + response.status + ")");
            }
            //retorna la promesa con los datos en formato json
            return response.json();
        })
        //otra promesa que recibe los datos en json y llama a la funcion mostrarpokemon para mostrar el pokemon en el index
        .then(function(data){
            mostrarpokemon(data);
        })
        //atrapa cualquier error que haya ocurrido en las promesas anteriores (en el throw new Error) y muestra el mensaje de error con mensajeerror()
        .catch(function(error){
            mensajeerror.textContent.style.color = "red";
            mensajeerror.textContent = "error: " + error.message;
        });
    
}


//aca lo que hace es lo mismo que la funcion anterior pero en este caso la funcion es asincrona lo que hace que automaticamente duevuelva una poromesa
async function buscadorconasync(){
    cleaner();
    const valor = obtenervalor();
    if (valor === null) {
        return;
    }

    const url = 'https://pokeapi.co/api/v2/pokemon/' + valor;

    try {
        //aca para la ejecucion del codigo hasta que q la promesa fetch se resuelva y devuelva la respuesta de la api
        const response = await fetch(url);

        if(!response.ok){
            throw new Error("el pokemon no fue encontrado pa (codigo " + response.status + ")");
        }
        //aca para la ejecucion del codigo hasta que la promesa response.json() se resuelva y devuelva los datos en formato json
        const data = await response.json();
        mostrarpokemon(data);
    } catch(error){
        mensajeerror.textContent.style.color = "red";
        mensajeerror.textContent = "error: " + error.message;
    }
}

//aca se agregan los event listener a los botones para sus correspondientes funciones con click
btnthen.addEventListener('click', buscarConThen);
btnasync.addEventListener('click', buscadorconasync);