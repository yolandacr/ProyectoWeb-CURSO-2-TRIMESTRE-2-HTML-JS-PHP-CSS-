const formulario = document.getElementById("registro");
      const inputs = document.querySelectorAll("#registro input");
      
      
          const expresiones = {
              nombre: /^[a-zA-Z0-9]+$/,
              clave:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/,
              
          };
      
      
          const campos = {
              nombre: false,
              clave: false,
          }
      
      
      const validarFormulario = (e) => {
          switch (e.target.name) {
              case "nombre":
                validarCampo(expresiones.nombre,e.target,'nombre');
                  break;
      
              case "clave":
                  validarCampo(expresiones.clave,e.target,'clave');
                  
                  break;
          }
      }
      
      
      //funcion tipo flecha para validar cada uno de los campos
      const validarCampo= (expresion,input,campo)=>{
          if (expresion.test(input.value)) {
              document.getElementById(campo).style.display = "none";
              if(input.value==''){
              campos[campo]=false;
              }
              campos[campo]=true;
              
          } else {
              document.getElementById(campo).style.display = "block";
              campos[campo]=false;
              
          }
      }
      
      //funcion flecha que pone evento en cada uno de los input del formulario cuando se levanta una tecla y cuando se clicka fuera
      inputs.forEach((input) => {
          input.addEventListener("keyup", validarFormulario);
          input.addEventListener("blur", validarFormulario);
      });
      
      formulario.addEventListener("keyup", (e) => {
          
      
          
              if(campos.nombre && campos.clave){
                const boton= document.getElementById('boton');
                boton.disabled=false;
              
                  
              }else{
                boton.disabled=true;
              }
      
          
      });

