import Dropzone from "dropzone";

const dropzone = new Dropzone("#dropzone", {
   dictDefaultMessage: "Sube aqui tu imagen",
   acceptedFiles: ".png, .jpg, .jpeg, .gif",
   addRemoveLinks: true,
   dictRemoveFileConfirmation: "Borrar imagen",
   maxFiles: 1,
   uploadMultiple: false, 
});

dropzone.on("sending", function(file, xhr, formDAta){
   console.log(file);
});

dropzone.on("removefile", function(){
   console.log("Archivo eliminado");
});