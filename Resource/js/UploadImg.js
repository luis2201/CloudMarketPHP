class UploadImg {

    archivo(evt, id) {
      let files = evt.target.files;  //Extrayendo la lista de objetos del input
      let f = files[0];

      if (f.type.match('image.*')) {
        let reader = new FileReader();
        reader.onload = ((theFile) => {
          return (e) => {
            document.getElementById(id).innerHTML = ['<img class="w-75 p-3" src="', e.target.result, '" title="', escape(theFile.name), '"/>'].join('');
          }
        })(f);
        reader.readAsDataURL(f);
      }
    }

}