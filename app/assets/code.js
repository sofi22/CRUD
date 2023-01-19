const app = new (function(){
    this.tbody = document.getElementById("tbody");
    this.id = document.getElementById("id");
    this.nombre = document.getElementById("nombre");
    this.apellido = document.getElementById("apellido");
    this.email= document.getElementById("email");

this.listado = () => {
        fetch("../controllers/listado.php")
        .then((res) => res.json())
        .then((data) => {
            this.tbody.innerHTML="";
            data.forEach((item) => {
                this.tbody.innerHTML += `
                <tr>
                    <td>${item.id}</td>
                    <td>${item.nombre}</td>
                    <td>${item.apellido}</td>
                    <td>${item.email}</td>
                    <td> 
                        <a href="javascript:;" class="btn btn-warning btn-sm" onclick="app.editar(${item.id})">Editar</a>
                        <a href="javascript:;" class="btn btn-danger  btn-sm" onclick="app.eliminar(${item.id})">Eliminar</a>
 
                    </td>
                </tr>
`;
            });
        })
        .catch((error) => console.log(error));
    };
this.guardar =() =>{
        var from = new FotmData();
        from.append("nombre", this.nombre.value);
        from.append("apellido", this.apellido.value);
        from.append("email", this.email.value);
        if (this.id.value + ""){
            fetch("../controllers/guardar.php",{
                method : "POST",
                body: from,
            })
            .then((res)=>res.json())
            .then((data)=>{
            alert("creado con exito");
            this.listado();
            this.limpiar();
            
            })
            .catch((error)=>console.log(error));
                
        }else{
            fetch("../controllers/actualizar.php",{
                method : "POST",
                body: from,
            })
            .then((res)=>res.json())
            .then((data)=>{
            alert("actualizado con exito");
            this.listado();
            this.limpiar();
            
            })
            .catch((error)=>console.log(error));
        }
               };
this.editar = (id) => {
                var form = new FormData();
                        form.append("id", id);
            fetch("../controllers/editar.php", {
                method: "POST",
                body: form,
            
            })
            .then((res) => res.json())
            .then((data) => {
                this.id.value =data.id;
                this.nombre.value = data.nombre;
                this.apellido.value = data.apellido;
                this.email.value = data.email;
            })
            .catch((error) => console.log(error));
              };    
this.eliminar = (id) => {
                var form = new FormData();
                form.append("id", id);
                            fetch("../controllers/eliminar.php", {
                    method: "POST",
                    body: JSON.stringify({id}),
    
                })
                .then((res) => res.json())
                .then((data) => {
                    alert("Eliminado con exito");
                    this.listado();
    
                })
                .catch((error) => console.log(error));
    
    
    
               };   
this.limpiar = () => {
                this.id.value = "";
                this.nombre.value = "";
                this.apellido.value ="";
                this.email.value = "";
    
               }; 
                
     
                                  
              
})();
    app.listado();
        